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
$sql = "SELECT * FROM patient_medication pm LEFT JOIN patient_prescription_medicine ppm ON ppm.patientId = pm.patientId
WHERE pm.patientId = $patientId AND pm.visitDate = '$visitDate' AND ppm.visitDate = '$visitDate'";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All medication Data Fetched successfully",
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