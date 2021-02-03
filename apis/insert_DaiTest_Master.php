<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['testName']) && isset($_POST['testDetails']) && isset($_POST['fees']) ) {
    $sql = "INSERT INTO diagnostic_tests_master(testName,testDetails,fees) VALUES ('$testName','$testDetails','$fees')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $testId    = $conn->insert_id;
        $message = $susername.' has added new procedure as '.$testName;
        $value = auditlog('diagnostic_tests_master','create',$suserid,$testId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM diagnostic_tests_master  where testId = $testId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Diagnosis Test Added Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
        );
    }
} else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
        
    );
}
mysqli_close($conn);
print json_encode($response);
?> 