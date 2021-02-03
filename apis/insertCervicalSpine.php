<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['patientId']) && isset($_POST['visitDate']) && isset($_POST['cerFunDisabilityScore']) && isset($_POST['cerVasScore']) && isset($_POST['cerPresentSymptoms']) && isset($_POST['cerPresentSince']) && isset($_POST['cerCommencedAsResult'])
    && isset($_POST['cerSymptAtOnset']) && isset($_POST['cerConstSympt']) && isset($_POST['cerAggrFactor']) && isset($_POST['cerRelFactor']) && isset($_POST['carSymptoms'])
    && isset($_POST['cerMedications']) && isset($_POST['cerGenHealth']) && isset($_POST['cerImaging']) && isset($_POST['cerResurgery']) && isset($_POST['cerNightPain']) &&
    isset($_POST['cerAccidents']) && isset($_POST['cerWeightLoss']) && isset($_POST['cerSitting']) && isset($_POST['cerStanding']) && isset($_POST['protrudedHead']) &&
     isset($_POST['cerderagement']) && isset($_POST['cerTestMovement']) && isset($_POST['cerMomentLoss'])) {
    
        mysqli_query($conn, "DELETE FROM cervical_spine_assessment WHERE patientId = $patientId AND visitDate= '$visitDate'");
    $sql = "INSERT INTO cervical_spine_assessment (patientId,visitDate,cerFunDisabilityScore,cerVasScore,cerPresentSymptoms,cerPresentSince,cerCommencedAsResult,cerSymptAtOnset,cerConstSympt,cerAggrFactor
    ,cerRelFactor,carSymptoms,cerMedications,cerGenHealth,cerImaging,cerResurgery,cerNightPain,cerAccidents,cerWeightLoss,cerSitting,cerStanding,protrudedHead,cerderagement,
    cerTestMovement,cerMomentLoss,disturbedSleep) 
     VALUES ('$patientId','$visitDate','$cerFunDisabilityScore','$cerVasScore','$cerPresentSymptoms','$cerPresentSince','$cerCommencedAsResult','$cerSymptAtOnset','$cerConstSympt','$cerAggrFactor',
     '$cerRelFactor','$carSymptoms','$cerMedications','$cerGenHealth','$cerImaging','$cerResurgery','$cerNightPain','$cerAccidents','$cerWeightLoss','$cerSitting','$cerStanding'
     ,'$protrudedHead','$cerderagement','$cerTestMovement','$cerMomentLoss','$disturbedSleep')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);


    if ($rowsAffected == 1) {
        $patientId = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT *,DATE_FORMAT(visitDate,'%d %b %Y') visitD FROM cervical_spine_assessment where cerSpineId = $patientId");
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
            "Data" => $sql
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