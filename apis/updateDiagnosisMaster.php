<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include 'auditlog.php';
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['diagnosisId']) && isset($_POST['diagnosis']) && isset($_POST['icdCode'])) {
    $sql = "UPDATE diagnosis_master SET diagnosis='$diagnosis',icdCode='$icdCode' WHERE diagnosisId = $diagnosisId";
    $query = mysqli_query($conn, $sql);
    if($query!=null){
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated diagnosis '.$diagnosis;
        $value = auditlog('diagnosis_master','update',$suserid,$diagnosisId,$message);
     $sql = "SELECT * FROM diagnosis_master where diagnosisId = $diagnosisId";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        $response = array(
            'Message' => "Update Diagnosis Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            'Responsecode' => 205
        ); 
    }
         
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
        );
    }
} 
else{
    $response = array(
        'Message' => mysqli_error($conn) . " failed",
        'Responsecode' => 600
    );
}
}
else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?> 