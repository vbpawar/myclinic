<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['franchiseid']) && isset($_POST['fname']) && isset($_POST['cperson']) && isset($_POST['emailid']) && isset($_POST['cnumber'])) {
    
    $sql = "UPDATE franchise_master SET franchisename='$fname',contactperson='$cperson',emailid='$emailid',
    contactnumber='$cnumber' WHERE franchiseid = $franchiseid";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated details of franchise '.$fname;
        $value = auditlog('franchise_master','update',$suserid,$franchiseid,$message);
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
            'Message' => "Franchise details update successfull",
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