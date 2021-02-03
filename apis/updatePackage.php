<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['packageId']) && isset($_POST['packageTitle']) && isset($_POST['packageCost'])) {
    
    $packageTitle = mysqli_real_escape_string($conn, $packageTitle);
    $packageDetails = isset($_POST['packageDetails']) ? $_POST['packageDetails']:'NULL';
    $packageDetails = mysqli_real_escape_string($conn, $packageDetails);
    $isActive = isset($_POST['isActive']) ? $_POST['isActive']:'0';
    
    $sql = "UPDATE package_master SET title = '$packageTitle',details='$packageDetails',cost='$packageCost',isActive = $isActive 
    WHERE packageId = $packageId";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated the package '.$packageTitle;
        $value = auditlog('package_master','update',$suserid,$packageId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM package_master where packageId = $packageId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Package Updated Successfull",
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