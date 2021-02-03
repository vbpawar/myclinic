<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/patients/';
if (isset($_POST['patientId']) && isset($_FILES["profilePic"]["type"])) {
    
    $imgname    = $_FILES["profilePic"]["name"];
    $sourcePath = $_FILES['profilePic']['tmp_name']; // Storing source path of the file in a variable
    $targetPath = $dir . $patientId . ".jpg"; // Target path where file is to be stored
    if (move_uploaded_file($sourcePath, $targetPath)) {
        $message = $susername.' has uploaded the profile picture of a customer ';
        $value = auditlog('patient_master','update',$suserid,$patientId,$message);
        $response = array(
            "Message" => "Profile Picture uploaded successfull",
            "Responsecode" => 200
        );
    } else {
        $response = array(
            "Message" => "Profile picture not uploaded",
            "Responsecode" => 400
        );
    } // Moving Uploaded file
    
} else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?> 