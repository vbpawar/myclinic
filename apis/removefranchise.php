<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include 'auditlog.php';
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['franchiseid'])){
$sql = "DELETE FROM franchise_master WHERE franchiseid= $franchiseid LIMIT 1";

$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_affected_rows($conn);
    if ($academicAffected >0) {
        $message = $susername.' has removed franchise '.$username;
        $value = auditlog('franchise_master','delete',$suserid,$franchiseid,$message);
        $response = array(
            'Message' => "Franchise is Removed successfully",
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No branch present/ Invalid username or password",
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Please Logout and login again",
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