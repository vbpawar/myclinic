<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "getLastId.php";
include "packageOfPatient.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$tempMedicines = null;
$temparray = null;
$billDetails_q = null;
extract($_POST);
$str = array();
$packageUpdate = 0;
if (isset($_POST['postdata']) && isset($_POST['packageDetails']) && isset($_POST['uFlag'])) {
    $payId = null;
    $recieved = 0;
    $u = 0;//check for update or insert
    $someArray   = json_decode($postdata, true);
    $packages    = $_POST['packageDetails'];
    $isPackage   = 0;
    $originalAmt = $someArray['originalAmt'];
    $amount      = $someArray["amount"];
    $discount    = isset($someArray["discount"])? $someArray["discount"]:'NULL';
    $patientId   = $someArray["patientId"];
    $doctorId    = $someArray["doctorId"];
    $userId      = $someArray["userId"];
    $branchId    = $someArray["branchId"];
    $visitDate   = $someArray["visitDate"];//date('Y-m-d');
    $billDetails = $someArray["billDetails"];
    $discountType = ($someArray["discountType"]==0) ? "NULL":$someArray["discountType"];
    $recieptId   = getLastId($branchId)+1;

    if($uFlag['uFlag'] == 1 && $uFlag['paymentId'] != null){
        $payId = $uFlag['paymentId'];
        $packageUpdate =1;
        if(!empty($uFlag['recieved'])){
            $recieved = $uFlag['recieved'];
        }
        $u = 1;
        mysqli_query($conn,"DELETE FROM Bill_Details WHERE paymentId=$payId");
    }
    if($recieved <= $amount){
        $amount      = $amount-$recieved;
    }
    if($packages['flag'] == 1 && !empty($packages['packageId'])){
        $isPackage = 1;
        if($packageUpdate != 1){
        package($packages['packageId'],$patientId,$packages['packageCost'],1,$branchId,$userId,$packages['packageDuration']);
        }
    }
    $packageIdopd    = !empty($packages['packageId'])? $packages['packageId']:'NULL';

    if($u == 1){
        $sql         = "UPDATE opd_patient_payment_master SET branchId=$branchId,patientId=$patientId, doctorId=$doctorId,originalAmt='$originalAmt',
        total='$amount',discountType=$discountType,discount='$discount',received='$recieved',pending='$amount',
        visitDate='$visitDate',createdBy=$userId,isPackage=$isPackage,packageId=$packageIdopd WHERE paymentId = $payId";
        //VALUES ($recieptId,$branchId,$patientId,$doctorId,'$originalAmt','$amount',$discountType,'$discount','$recieved','$amount','$visitDate',$userId,$isPackage,$packageIdopd)";
    }else{
        $sql         = "INSERT INTO opd_patient_payment_master(recieptId,branchId,patientId, doctorId,originalAmt,total,discountType,discount,received,pending,visitDate,createdBy,isPackage,packageId)
        VALUES ($recieptId,$branchId,$patientId,$doctorId,'$originalAmt','$amount',$discountType,'$discount','$recieved','$amount','$visitDate',$userId,$isPackage,$packageIdopd)";
    }
    $query       = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        if($u==1){
            $tId      = $payId;
            $message = $susername.' has update the OPD payment of a customer ';
        $value = auditlog('opd_patient_payment_master','update',$suserid,$payId,$message);
        }else{
            $last_id  = mysqli_insert_id($conn);
            $tId      = strval($last_id);
            $message = $susername.' has generate the OPD payment of a customer ';
            $value = auditlog('opd_patient_payment_master','create',$suserid,$tId,$message);
        }
        foreach ($billDetails as $key => $value) {
            $feesType = $billDetails[$key]['feesType'];
            $Quantity = $billDetails[$key]['Quantity'];
            $fees = $billDetails[$key]['fees'];
            $testId = $billDetails[$key]['testId'];
            $sql         = "INSERT INTO Bill_Details(paymentId,testId,feesType,fees,Quantity)VALUES ($tId,'$testId','$feesType','$fees',$Quantity)";
            $query       = mysqli_query($conn, $sql);
        }
        $sql = "SELECT opm.recieptId,opm.originalAmt,opm.discount,opm.paymentId,opm.patientId,opm.total,opm.pending,um.username,opm.visitDate,
        opm.doctorId,opm.discountType,opm.total,opm.received,opm.isPackage FROM opd_patient_payment_master opm 
        INNER JOIN user_master um ON um.userId = opm.doctorId 
        WHERE opm.paymentId = $tId";
        // $sql      = "SELECT * FROM opd_patient_payment_master WHERE paymentId = $tId";
        $jobQuery = mysqli_query($conn, $sql);
        if ($jobQuery != null) {
            $academicAffected = mysqli_num_rows($jobQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($jobQuery);
               
                $query = "SELECT fees,feesType,paymentId,testId FROM Bill_Details pm WHERE paymentId = $tId";
            $jobQuery_1 = mysqli_query($conn, $query);
            if ($jobQuery_1 != null) {
                $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                if ($academicAffected_1 > 0) {
                    while ($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)) {
                        $billDetails_q[] = $academicResults_1;
                    }
                }
            }
            $temparray =  array("billdetails"=> $billDetails_q);
            $tempMedicines =  array_merge($academicResults,$temparray);	
            $records       = $tempMedicines;
                $response        = array(
                    'Message' => "Payment generated successfully",
                    "Data" => $records,
                    'Responsecode' => 200
                );
            } else {
                $response = array(
                    'Message' => "No data present",
                    "Data" => $records,
                    'Responsecode' => 401
                );
            }
        }else{
            $response = array(
                'Message' => "No data present",
                "Data" => $records,
                'Responsecode' => 409
            );
        }
        
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $sql,
            'Responsecode' => 205
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        "Data" => $records,
        'Responsecode' => 404
    );
}
mysqli_close($conn);
print json_encode($response);
?> 