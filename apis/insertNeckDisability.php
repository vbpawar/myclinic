<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['patientId']) && isset($_POST['visitDate']) && isset($_POST['painIntensity']) && isset($_POST['personalCare']) && isset($_POST['lifting']) && isset($_POST['work']) && isset($_POST['headaches']) && isset($_POST['concentration']) && isset($_POST['sleeping']) && isset($_POST['driving']) && isset($_POST['reading']) && isset($_POST['recreation'])) {
    
    mysqli_query($conn, "DELETE FROM neck_disability_index WHERE patientId = $patientId AND visitDate= '$visitDate'");
    $sql = "INSERT INTO neck_disability_index(patientId,visitDate,painIntensity,personalCare,lifting,work,headaches,concentration,sleeping,driving,reading,recreation) 
     VALUES ($patientId,'$visitDate','$painIntensity','$personalCare','$lifting','$work','$headaches','$concentration','$sleeping','$driving','$reading','$recreation')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $patientId     = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT * FROM neck_disability_index where ndisabilityId = $patientId");
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