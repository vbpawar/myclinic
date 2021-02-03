<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['medicineTypeId'])){
$sql = "UPDATE medicine_type SET isActive = CASE WHEN isActive = 1 THEN  isActive = 0 WHEN 
isActive = 0 THEN  isActive = 0 END WHERE medicineTypeId= $medicineTypeId";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_affected_rows($conn);
    if ($academicAffected ==1) {
        $message = $susername.' has active/inactive the medicinetype ';
        $value = auditlog('medicine_type','delete',$suserid,$medicineTypeId,$message);
        $response = array(
            'Message' => "Medicine Type is activated successfully",
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
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 