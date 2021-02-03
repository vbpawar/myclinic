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
$sql = "SELECT pd.DetailId,pd.pId,pd.Quota,pd.TestId,(pd.originalQuota-pd.Quota) consumed,pd.originalQuota,DATE_FORMAT(pd.updated_at,'%d,%b %Y') lastUsed,dtm.testName FROM PackageCustomerDetails pd
LEFT JOIN diagnostic_tests_master dtm ON dtm.testId = pd.TestId WHERE pd.pId =  $pId";
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