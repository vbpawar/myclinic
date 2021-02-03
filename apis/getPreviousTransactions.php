<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$tempMedicines = null;
$temparray = null;
extract($_POST);
if(isset($_POST['patientId'])){
    $today = date('Y-m-d');
$sql = "SELECT opm.recieptId,opm.originalAmt,opm.discount,opm.paymentId,opm.patientId,opm.total,opm.pending,um.username,opm.doctorId,opm.discountType,opm.received,opm.visitDate,opm.isPackage,opm.packageId
FROM opd_patient_payment_master opm 
INNER JOIN user_master um ON um.userId = opm.doctorId 
WHERE opm.patientId = $patientId AND opm.visitDate = '$today' AND isDeleted = 1";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $paymentId = $academicResults['paymentId'];

            $billDetails = null;
            $query = "SELECT fees,feesType,paymentId,testId,Quantity FROM Bill_Details  WHERE paymentId = $paymentId";
            $jobQuery_1 = mysqli_query($conn, $query);
            if ($jobQuery_1 != null) {
                $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                if ($academicAffected_1 > 0) {
                    while ($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)) {
                        $billDetails[] = $academicResults_1;
                    }
                }
            }
            $temparray =  array("billdetails"=> $billDetails);
            $tempMedicines =  array_merge($academicResults,$temparray);	
            $records[] = $tempMedicines;
        }
        
        $response = array(
            'Message' => "All Payments Fetched successfully",
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
        'Message' => "Please Logout and login again",
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 404
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 