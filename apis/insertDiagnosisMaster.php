<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include 'auditlog.php';
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['diagnosis']) && isset($_POST['icdCode'])) {
    $sql = "INSERT INTO diagnosis_master(diagnosis,icdCode) VALUES ('$diagnosis','$icdCode')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $diagnosisId     = $conn->insert_id;
        $message = $susername.' has added new diagnosis '.$diagnosis;
        $value = auditlog('diagnosis_master','create',$suserid,$diagnosisId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM diagnosis_master where diagnosisId = $diagnosisId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Diagnosis Added Successfull",
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