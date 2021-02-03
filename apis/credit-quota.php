<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['detailId']) && isset($_POST['typeCount']) && isset($_POST['remark']) && isset($_POST['userId'])) {
    $typeCount = intval($typeCount);
    $sql       = "UPDATE  PackageCustomerDetails SET originalQuota = originalQuota+$typeCount,Quota = Quota+$typeCount WHERE detailId = $detailId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_affected_rows($conn);
        $insert           = "INSERT INTO PackageTransaction(detailId,transactionType,typeCount,userId,remarks) VALUES($detailId,'C',$typeCount,$userId,'$remark')";
        mysqli_query($conn, $insert);
        if ($academicAffected == 1) {
            $did      = $conn->insert_id;
            $sql      = "SELECT pt.transactionId,pt.transactionType,pt.userId,DATE_FORMAT(pt.created_at,'%d %b %Y') created_at,um.username,dt.testName
            FROM PackageTransaction pt INNER JOIN PackageCustomerDetails pd ON pd.DetailId = pt.detailId LEFT JOIN user_master um ON um.userId = pt.userId
            LEFT JOIN diagnostic_tests_master dt ON dt.testId = pd.TestId
            WHERE pt.transactionId=  $did";
            $jobQuery = mysqli_query($conn, $sql);
            if ($jobQuery != null) {
                $academicAffected = mysqli_num_rows($jobQuery);
                if ($academicAffected > 0) {
                    $academicResults = mysqli_fetch_assoc($jobQuery);
                    $records         = $academicResults;
                }
            }
            $response = array(
                'Message' => "Quota Credited successfully",
                "Data" => $records,
                'Responsecode' => 200
            );
        } else {
            $response = array(
                'Message' => "No user present/ Invalid username or password",
                "Data" => $records,
                'Responsecode' => 401
            );
        }
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