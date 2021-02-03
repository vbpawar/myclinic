<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['detailId']) && isset($_POST['typeCount']) && isset($_POST['transactionId'])) {
    $typeCount = intval($typeCount);
    $sql      = "UPDATE  PackageCustomerDetails SET Quota = Quota+$typeCount WHERE detailId = $detailId";
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_affected_rows($conn);
        mysqli_query($conn,"DELETE FROM PackageTransaction WHERE transactionId = $transactionId");
        $response = array(
            'Message' => "Transaction reverted successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
       
    } else {
        $response = array(
            'Message' => "Please Logout and login again",
            "Data" => $records,
            'Responsecode' => 300
        );
    }
} else {
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );
}
mysqli_close($conn);
exit(json_encode($response));
?> 