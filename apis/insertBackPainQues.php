<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['patientId']) && isset($_POST['visitDate']) && isset($_POST['painIntensity']) && isset($_POST['personalCare']) && isset($_POST['lifting']) && isset($_POST['walking']) && isset($_POST['sitting1']) && isset($_POST['standing']) && isset($_POST['sleeping']) && isset($_POST['socialLife']) && isset($_POST['travel']) && isset($_POST['changingDegreeOfPain'])) {
    
    mysqli_query($conn, "DELETE FROM low_backpain_questionnaire WHERE patientId = $patientId AND visitDate= '$visitDate'");
    $sql = "INSERT INTO low_backpain_questionnaire(patientId,visitDate,painIntensity,personalCare,lifting,walking,sitting,standing,sleeping,socialLife,travel,changingDegreeOfPain) 
     VALUES ($patientId,'$visitDate','$painIntensity','$personalCare','$lifting','$walking','$sitting1','$standing','$sleeping','$socialLife','$travel','$changingDegreeOfPain')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    
    
    if ($rowsAffected == 1) {
        $patientId     = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT * FROM low_backpain_questionnaire where lbackpId  = $patientId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Added Successfull",
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