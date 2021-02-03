<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['feedbackname']) && isset($_POST['patientId'])) {
     $fage = isset($_POST['fage']) ? $_POST['fage']:'NULL';
     $fphone = isset($_POST['fphone']) ? $_POST['fphone']:'NULL';
     $fplace = isset($_POST['fplace']) ? $_POST['fplace']:'NULL';
     $findus = isset($_POST['findus']) ? $_POST['findus']:'NULL';
     $oexperience = isset($_POST['oexperience']) ? $_POST['oexperience']:'NULL';
     $fsuggestion = isset($_POST['fsuggestion']) ? $_POST['fsuggestion']:'NULL';
     $findus = isset($_POST['findus']) ? $_POST['findus']:'NULL';
     $visitDate = date('y-m-d');
     $tdata = isset($_POST['tdata']) ? $_POST['tdata']:'NULL';
     mysqli_query($conn, "DELETE FROM patient_feedback WHERE patientId = $patientId AND visitDate= '$visitDate'");
    $sql = "INSERT INTO patient_feedback(patientid,fname,age,phone,place,findus,experience,suggestions,tdata,visitdate) 
     VALUES ('$patientId','$feedbackname','$fage','$fphone','$fplace','$findus','$oexperience','$fsuggestion','$tdata','$visitDate')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $feedId  = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT * FROM patient_feedback where id = $feedId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Form Added Successfull",
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