<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['patientId']) ) {
  

    $sql = "INSERT INTO lab_results_master(patientId,TestName,visitDate) 
     VALUES ('$patientId','$TestName','$visitDate')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    
    
    if ($rowsAffected == 1) {
        $labId     = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT lr.labId, pm.firstName,pm.surName,lr.TestName,lr.result,lr.visitDate,lr.doneBy
        FROM  lab_results_master  lr  LEFT JOIN patient_master pm
        ON pm.patientId =lr.patientId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "lab result Added Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500,
            "Data" => $records
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