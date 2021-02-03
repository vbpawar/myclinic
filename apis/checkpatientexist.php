<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['mobile'])){
    $sql = "SELECT pm.patientId FROM patient_master pm WHERE pm.mobile1 = '$mobile'";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        $academicResults = mysqli_fetch_assoc($jobQuery);
            $records = $academicResults;
        
        $response = array(
            'Message' => "All calls Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Please Logout and login again",
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