<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
include "sendAppointmentSMS.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['patientId']) && isset($_POST['appointmentDate']) && isset($_POST['userId']) && isset($_POST['scheduledBy'])) {
    
    $sql   = "INSERT INTO patient_doctor_appointment_scheduling(patientId,appointmentDate,doctorId,scheduledBy) 
     VALUES ($patientId,'$appointmentDate',$userId,'$scheduledBy')";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        if(sendSMS($patientId,$appointmentDate)){
            $sms = 1;
        }else{
           $sms = 0;
        }
        $appointmentId = $conn->insert_id;
        $message = $susername.' has booked the appointment of a customer at date '.$appointmentDate;
        $value = auditlog('patient_doctor_appointment_scheduling','create',$suserid,$patientId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM patient_doctor_appointment_scheduling where appointmentId = $appointmentId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
               
            }
        }
        $response = array(
            'Message' => "Appointment Booked Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => "Appointment is already book",
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