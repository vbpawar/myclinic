<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['fname']) && isset($_POST['cperson']) && isset($_POST['emailid']) && isset($_POST['cnumber'])) {
    $sql = "INSERT INTO franchise_master(franchisename,contactperson,emailid,pwd,contactnumber) 
     VALUES ('$fname','$cperson','$emailid','12345','$cnumber')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $franchiseid     = $conn->insert_id;
        $message = $susername.' has added new franchise '.$fname;
        $value = auditlog('franchise_master','create',$suserid,$franchiseid,$message);
$sql = "SELECT franchisename,franchiseid,contactperson,emailid,contactnumber,DATE_FORMAT(created,'%d-%b-%Y') created FROM franchise_master WHERE franchiseid=$franchiseid";
        $academicQuery = mysqli_query($conn, $sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Franchise Added Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500,
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