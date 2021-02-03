<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$result = null;
extract($_POST);
if(isset($_POST['pId'])){
$sql = "SELECT pt.transactionId,pt.transactionType,pt.userId,DATE_FORMAT(pt.created_at,'%d %b %Y') created_at,um.username,dt.testName,pt.typeCount,pt.detailId
FROM PackageTransaction pt INNER JOIN PackageCustomerDetails pd ON pd.DetailId = pt.detailId LEFT JOIN user_master um ON um.userId = pt.userId
LEFT JOIN diagnostic_tests_master dt ON dt.testId = pd.TestId
WHERE pt.transactionId= $pId";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All Package data Fetched successfully",
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
        'Message' => "Please Logout and login again",
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
}
else{
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );   
}
mysqli_close($conn);
exit(json_encode($response));
?> 