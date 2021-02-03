<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['branchId'])){
$sql = "UPDATE  hospital_branch_master SET isActive = CASE WHEN isActive = 1 THEN  isActive = 0 WHEN 
isActive = 0 THEN  isActive = 0 END WHERE branchId= $branchId";

$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_affected_rows($conn);
    if ($academicAffected >0) {
        $message = $susername.' has inactive branch '.$branchName;
        $value = auditlog('hospital_branch_master','delete',$suserid,$branchId,$message);
        $response = array(
            'Message' => "Branch is activated successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No branch present/ Invalid username or password",
            "Data" => $records,
            'sql'=>$sql,
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
}else{
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 