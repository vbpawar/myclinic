<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/patients/';
if (isset($_POST['patientId']) && isset($_POST['firstName']) && isset($_POST['surname']) && isset($_POST['birthDate']) && isset($_POST['mobile1']) && isset($_POST['address']) && isset($_POST['gender'])) {
    
    $middleName     = isset($_POST['middleName']) ? $_POST['middleName'] : 'NULL';
    $height         = isset($_POST['height']) ? $_POST['height'] : 'NULL';
    $weight         = isset($_POST['weight']) ? $_POST['weight'] : 'NULL';
    $religion       = isset($_POST['religion']) ? $_POST['religion'] : 'NULL';
    $allergy        = isset($_POST['allergy']) ? $_POST['allergy'] : 'NULL';
    $email          = isset($_POST['email']) ? $_POST['email'] : 'NULL';
    $mobile2        = isset($_POST['mobile2']) ? $_POST['mobile2'] : 'NULL';
    $landline       = isset($_POST['landline']) ? $_POST['landline'] : 'NULL';
    $city           = isset($_POST['city']) ? $_POST['city'] : 'NULL';
    $referredby     = isset($_POST['referredby']) ? $_POST['referredby'] : 'NULL';
    $firstVisitDate = isset($_POST['firstVisitDate']) ? $_POST['firstVisitDate'] : 'NULL';
    $lastVisitDate  = isset($_POST['lastVisitDate']) ? $_POST['lastVisitDate'] : 'NULL';
    $smoking        = isset($_POST['smoking']) ? $_POST['smoking'] : 'NULL';
    $alcohol        = isset($_POST['alcohol']) ? $_POST['alcohol'] : 'NULL';
    $tobacco        = isset($_POST['tobacco']) ? $_POST['tobacco'] : 'NULL';
    $HTN            = isset($_POST['HTN']) ? $_POST['HTN'] : 'NULL';
    $diabetes       = isset($_POST['diabetes']) ? $_POST['diabetes'] : 'NULL';
    $cholestrol     = isset($_POST['cholestrol']) ? $_POST['cholestrol'] : 'NULL';
    $history        = isset($_POST['history']) ? $_POST['history'] : 'NULL';
    $occupation     = isset($_POST['occupation']) ? $_POST['occupation'] : 'NULL';
    $lifestyle      = isset($_POST['lifestyle']) ? $_POST['lifestyle'] : 'NULL';
    $urban          = isset($_POST['urban']) ? $_POST['urban'] : 'NULL';
    $economicStrata = isset($_POST['economicStrata']) ? $_POST['economicStrata'] : 'NULL';
    
    $address = mysqli_real_escape_string($conn, $address);
    
    $sql = "UPDATE patient_master SET urban = '$urban',firstName = '$firstName', middleName = '$middleName',surname = '$surname',
    gender = '$gender', height='$height',weight = '$weight',birthDate ='$birthDate', religion='$religion',allergy = '$allergy',
    email = '$email',mobile1 ='$mobile1',mobile2 = '$mobile2',landline = '$landline',city='$city', address='$address',referredby= '$referredby',
    firstVisitDate = '$firstVisitDate',lastVisitDate = '$lastVisitDate',nextVisitDate = '$nextVisitDate',smoking = '$smoking',alcohol = '$alcohol',
    tobacco = '$tobacco',HTN = '$HTN',diabetes = '$diabetes',cholestrol = '$cholestrol',history = '$history',occupation = '$occupation',
    lifestyle = '$lifestyle',urban = '$urban',economicStrata='$economicStrata' WHERE patientId = $patientId";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        if (isset($_FILES["imgname"]["type"])) {
            $imgname    = $_FILES["imgname"]["name"];
            $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $dir . $patientId . ".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
        }
        $academicQuery = mysqli_query($conn, "SELECT * FROM patient_master where patientId = $patientId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Patient Data Updated Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
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