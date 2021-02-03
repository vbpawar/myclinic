<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response      = null;
$records       = null;
extract($_POST);
if (isset($_POST['postdata'])) {
    $someArray = json_decode($postdata, true);

    $patientId        = $someArray["patientId"];
    $doctorId         = $someArray["doctorId"];
    $exercise         = $someArray["exercise"];
    $visitDate        = $someArray["visitDate"];

    $sql = "DELETE FROM patient_prescribed_exercise WHERE visitDate = '$visitDate' AND patientId = $patientId";
    mysqli_query($conn,$sql); 
        foreach ($exercise as $key => $value) {
            $exerciseId   = mysqli_escape_string($conn, $exercise[$key]['exerciseId']);
            $details      = mysqli_escape_string($conn, $exercise[$key]['details']);
            $steps        = mysqli_escape_string($conn,$exercise[$key]['steps']);

            $query        = mysqli_query($conn, "INSERT INTO patient_prescribed_exercise(patientId,title,details,steps,doctorId,visitDate) 
            values ($patientId,'$exerciseId','$details','$steps',$doctorId,'$visitDate')");
        }
        $rowsAffected = mysqli_affected_rows($conn);
        if ($rowsAffected >0) {
            $response = array(
                'Message' => "Exercise saved successfully",
                'patientId'=>$patientId,
                'vdate'=>$visitDate,
                'doctorId'=> $doctorId,
                'Responsecode' => 200
            );
        } else {
            $response = array(
                'Message' => mysqli_error($conn) . "Message failed",
                'Responsecode' => 403
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