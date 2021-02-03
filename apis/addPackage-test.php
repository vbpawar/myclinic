<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['packageId']) && isset($_POST['testId']) && isset($_POST['quota'])) {
    $sql = "INSERT INTO package_details_master(packageId,testId,quota) VALUES($packageId,$testId,'$quota')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $itemId = $conn->insert_id;
        $message = $susername.' has added the package with quota '.$quota;
        $value = auditlog('package_details_master','create',$suserid,$itemId,$message);
        $sql = "SELECT pdm.itemId,pdm.quota,dtm.testName,dtm.fees FROM package_details_master pdm 
        INNER JOIN diagnostic_tests_master dtm ON dtm.testId = pdm.testId WHERE pdm.itemId = $itemId";
        $academicQuery = mysqli_query($conn, $sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Package test added successfull",
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