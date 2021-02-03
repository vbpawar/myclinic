<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
include "auditlog.php";
$records  = null;
extract($_POST);
if (isset($_POST['paymentId']) && isset($_POST['received']) && isset($_POST['pending']) && isset($_POST['receivedBy']) && isset($_POST['paymentMode'])) {
    
    $paymentDetails = isset($_POST['paymentDetails']) ? $_POST['paymentDetails']:'NULL';
    $paymentDetails = mysqli_escape_string($conn,$paymentDetails);
    
    $sql   = "UPDATE opd_patient_payment_master SET pending = pending-$received,received=$received WHERE paymentId = $paymentId";
    $query = mysqli_query($conn, $sql);
    $paymentDate = date('Y-m-d');
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $sql   = "INSERT INTO opd_payment_transaction_master(paymentId,oldValue,newValue,amount,paymentMode,paymentModeDetail,paymentDate,receivedBy) VALUES
        ($paymentId,$pending,$pending-$received,$received,'$paymentMode','$paymentDetails','$paymentDate','$receivedBy')";
        $query = mysqli_query($conn, $sql);
        $rowsAffected = mysqli_affected_rows($conn);
        if ($rowsAffected  == 1) {
            $message = $susername.' has recorded the payment '.$received;
            $value = auditlog('opd_patient_payment_master','create',$suserid,$paymentId,$message);
            $response = array(
                'Message' => "Payment Marked Successfull",
                'Responsecode' => 200
            );
        }else{
        $response = array(
            'Message' => "Appointment Booked Successfull",
            'Responsecode' => 200
        );
    }  
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