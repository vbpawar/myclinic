<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['paymentId'])) {
    $sql = "UPDATE opd_patient_payment_master SET isDeleted = 0 WHERE paymentId = $paymentId";
    if(!empty($_POST['packageId']) && $_POST['packageId']>0){
        $patientId = isset($_POST['patientId']) ? $_POST['patientId']:'NULL';
        $delete = mysqli_query($conn,"DELETE FROM PackageAccount WHERE packageId=$packageId AND patientId = $patientId");
    }
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has removed the payment details ';
        $value = auditlog('opd_patient_payment_master','delete',$suserid,$paymentId,$message);
        $response = array(
            'Message' => "Reciept  removed successfull",
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