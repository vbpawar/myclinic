<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$temparray  = null;
$tempMedicines = null;
extract($_POST);
if(isset($_POST['fromDate']) && isset($_POST['uptoDate'])){
$sql = "SELECT opm.patientId,opt.oldValue, opm.paymentId,opm.recieptId,opm.originalAmt,opm.total,opm.discount,opm.received,opm.pending,DATE_FORMAT(opm.visitDate,'%d %b %Y') visitDate,
opm.isPackage,opm.packageId,opm.isDeleted,um.username,hp.branchName,DATE_FORMAT(opt.paymentDate,'%d %b %Y') createdAt,COALESCE(CONCAT(dm.discountType,'(',opm.discount,'%)'),'-') discountType,opt.amount,opt.paymentDate,opt.receivedBy,opt.paymentMode
FROM opd_payment_transaction_master opt INNER JOIN opd_patient_payment_master opm  
ON opt.paymentId = opm.paymentId
LEFT JOIN user_master um ON um.userId = opm.doctorId
LEFT JOIN hospital_branch_master hp ON hp.branchId = opm.branchId
LEFT JOIN DiscountMaster dm ON dm.discountId = opm.discountType
WHERE  opt.paymentDate BETWEEN '$fromDate' AND '$uptoDate' AND opm.isDeleted = 1";
if(isset($_POST['branchId']) && !empty($_POST['branchId']) && $_POST['branchId'] != 0){
    $sql .= " AND opm.branchId = $branchId";
}
$sql .= " ORDER BY opt.paymentDate ASC";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $paymentId = $academicResults['paymentId'];
            $patientId = $academicResults['patientId'];
        //patient details
        $patientdetails = null;
        $query = "SELECT pm.firstName,pm.surname FROM patient_master pm WHERE patientId = $patientId";
        $jobQuery_1 = mysqli_query($conn, $query);
        if ($jobQuery_1 != null) {
            $academicAffected_1 = mysqli_num_rows($jobQuery_1);
            if ($academicAffected_1 > 0) {
                $patientdetails  = mysqli_fetch_assoc($jobQuery_1);
            }
        }

            $billDetails = [];
            $query = "SELECT bd.feesType FROM Bill_Details bd WHERE paymentId = $paymentId";
            $jobQuery_1 = mysqli_query($conn, $query);
            if ($jobQuery_1 != null) {
                $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                if ($academicAffected_1 > 0) {
                    while ($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)) {
                        $billDetails[] = $academicResults_1['feesType'];
                    }
                }
            }
            $str = implode(',',$billDetails);
            $temparray =  array("billdetails"=>$str);
            $tempMedicines =  array_merge($academicResults,$temparray,$patientdetails);	
            $records[] = $tempMedicines;
        }
        
        $response = array(
            'Message' => "All collection Data Fetched successfully",
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
        'Message' => mysqli_error($conn),
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 