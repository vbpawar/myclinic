<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
date_default_timezone_set('Asia/Kolkata');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/patients/';
if (isset($_POST['firstName']) && isset($_POST['surname'])  && isset($_POST['mobile1']) && isset($_POST['address']) && isset($_POST['gender'])
 && isset($_POST['height']) && isset($_POST['country']) && isset($_POST['state']) && isset($_POST['maritalstatus']) && isset($_POST['pincode']) ) {
    
    $birthdate     = isset($_POST['birthdate']) ? $_POST['birthdate'] : 'NULL';
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
    $firstVisitDate = date('Y-m-d');
    $lastVisitDate  = date('Y-m-d');
    // $nextVisitDate  = date('y-m-d');
    $nextVisitDate  = isset($_POST['nextVisitDate']) ? $_POST['nextVisitDate'] : 'NULL';
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
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : 'NULL';
    $hardDrink = isset($_POST['hardDrink']) ? $_POST['hardDrink'] : 'NULL';
    
    $address = mysqli_real_escape_string($conn, $address);
    
    $sql = "INSERT INTO patient_master (firstName,middleName,surname,gender,height,weight,birthdate,religion ,allergy,email,mobile1,mobile2,
     landline,city,address,referredby,firstVisitDate,lastVisitDate,nextVisitDate,smoking,alcohol,tobacco,HTN,diabetes, 
     cholestrol,history,occupation,lifestyle,urban,economicStrata,country,state,maritalstatus,pincode,remarks,hardDrink,branchId) 
     VALUES ('$firstName', '$middleName', '$surname', '$gender', '$height', '$weight', '$birthdate', '$religion', '$allergy',
      '$email', '$mobile1', '$mobile2', '$landline', '$city', '$address', '$referredby', '$firstVisitDate', '$lastVisitDate', '$nextVisitDate',
       '$smoking', '$alcohol', '$tobacco', '$HTN', '$diabetes', '$cholestrol', '$history', '$occupation', '$lifestyle', '$urban', '$economicStrata','$country','$state',
       '$maritalstatus','$pincode','$remarks','$hardDrink','$branchId')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $patientId = $conn->insert_id;
        if (isset($_FILES["imgname"]["type"])) {
            $imgname    = $_FILES["imgname"]["name"];
            $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $dir . $patientId . ".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
        }
        if (isset($_FILES["imgPic"]["type"])) {
            $imgname    = $_FILES["imgPic"]["name"];
            $sourcePath = $_FILES['imgPic']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $dir . $refferId . ".jpg"; // Target path where file is to be stored
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
            'Message' => "Patient Registration Completed",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => $mobile1." Contact number already exists",
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