<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['doctorId'])){
$sql = "SELECT pdas.appointmentId,pdas.appointmentDate,pdas.scheduledBy,pdas.patientId,pm.firstName,pm.surname,um.username,
rm.doctorName,pm.firstVisitDate,pdas.doctorId,rm.address,DATE(pdas.appointmentDate) appointment,pm.mobile1
FROM patient_doctor_appointment_scheduling pdas INNER JOIN patient_master pm ON pm.patientId = pdas.patientId 
INNER JOIN user_master um ON um.userId = pdas.doctorId LEFT JOIN referring_master rm ON pm.referredby = rm.refferId
WHERE pdas.doctorId = $doctorId  ORDER BY pdas.appointmentDate DESC";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All Appointment Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
            "Data" => $records,
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Please Logout and login again",
        "Data" => $records,
        'Sql'=>$sql,
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