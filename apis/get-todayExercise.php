<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$medication = null;
extract($_POST);
if(isset($_POST['patientId']) && isset($_POST['visitDate'])){
$sql = "SELECT ppe.patientId,ppe.title,ppe.details,ppe.steps,ppe.doctorId,ppe.visitDate,ep.id 
FROM patient_prescribed_exercise ppe INNER JOIN exercise_photo_master ep ON ep.title = ppe.title 
WHERE ppe.patientId = $patientId AND ppe.visitDate = '$visitDate'";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All exercise Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "no data found",
            "Data" => $records,
            'Responsecode' => 202
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