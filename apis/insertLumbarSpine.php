<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['patientId']) && isset($_POST['visitDate']) && isset($_POST['factor']) && isset($_POST['reliving']) && isset($_POST['presentSince']) && isset($_POST['symptomsAtOnset']) &&   isset($_POST['constantSymptoms']) &&
   isset($_POST['interSymptoms']) && isset($_POST['specSymptoms']) && isset($_POST['bladder']) && isset($_POST['medications']) && isset($_POST['GeneralHealth']) && 
   isset($_POST['imaging']) && isset($_POST['recentsurgery']) && isset($_POST['nightPain']) && isset($_POST['accidents']) && isset($_POST['weightLoss']) && isset($_POST['sitting'])
   && isset($_POST['lordosis']) && isset($_POST['derangement']) && isset($_POST['mechTherapy']) && isset($_POST['funDisabilityScore']) && isset($_POST['vasScore']) &&
    isset($_POST['presentSymptoms']) && isset($_POST['commencedAsResult']) && isset($_POST['prevTreatments']) && isset($_POST['motorDeficit']) && isset($_POST['sensoryDeficit'])
    && isset($_POST['lateralshift']) && isset($_POST['moveMentLoss']) && isset($_POST['testMovement'])) {
    

        mysqli_query($conn,"DELETE FROM lumbar_spine_assessment WHERE patientId = $patientId AND visitDate= '$visitDate'");
    $sql = "INSERT INTO lumbar_spine_assessment (patientId,visitDate,aggravatingFactor,relivingFactor,presentSince,symptomsAtOnset,constantSymptoms,interSymptoms,specSymptoms,bladder,medications,
    GeneralHealth,imaging,recentsurgery,nightPain,accidents,weightLoss,sitting,lordosis,derangement,mechTherapy,funDisabilityScore,vasScore,presentSymptoms,commencedAsResult,
    prevTreatments,motorDeficit,moveMentLoss,testMovement,sensoryDeficit,lateralshift) 
     VALUES ($patientId,'$visitDate','$factor','$reliving','$presentSince','$symptomsAtOnset','$constantSymptoms','$interSymptoms','$specSymptoms','$bladder','$medications','$GeneralHealth','$imaging'
     ,'$recentsurgery','$nightPain','$accidents','$weightLoss','$sitting','$lordosis','$derangement','$mechTherapy','$funDisabilityScore','$vasScore','$presentSymptoms',
     '$commencedAsResult','$prevTreatments','$motorDeficit','$moveMentLoss','$testMovement','$sensoryDeficit','$lateralshift')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);


    if ($rowsAffected == 1) {
        $patientId = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT * FROM lumbar_spine_assessment where lsAId = $patientId");
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