<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['id'])) {
    $sql = "DELETE FROM exercise_photo_master WHERE id= $id";
    $query        = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected > 0) {
        $message = $susername.' has removed the exercise';
        $value = auditlog('exercise_photo_master','delete',$suserid,$id,$message);
        $response = array(
            'Message' => "Exercise removed successfully",
            'Responsecode' => 200
        );
    } else { 
        $response = array(
            "Message" => mysqli_error($conn) . "Failed",
            "Responsecode" => 500
        );
        
    }
} else {
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 402
    );
}
mysqli_close($conn);
print json_encode($response);
?>