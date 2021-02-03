<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['patientId'])){
$sql = "SELECT opp.paymentId,opp.originalAmt,opp.total,opp.discount,opp.received,opp.pending,opp.visitDate,
um.username,opp.recieptId,opp.isPackage,opp.packageId,opp.patientId
FROM opd_patient_payment_master opp
INNER JOIN user_master um ON um.userId = opp.doctorId WHERE opp.patientId  = $patientId AND opp.isDeleted = 1 ORDER BY opp.visitDate DESC";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All fees Fetched successfully",
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
        'Message' => mysqli_error($conn)."Please Logout and login again",
        "Data" => $records,
        'Sql'=>$sql,
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 405
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 