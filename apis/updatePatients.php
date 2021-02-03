<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/patients/';
if (isset($_POST['patientId']) && isset($_POST['firstName']) && isset($_POST['surname']) && isset($_POST['birthDate']) && isset($_POST['address']) && isset($_POST['gender'])
 && isset($_POST['height']) && isset($_POST['country']) && isset($_POST['state']) && isset($_POST['maritalstatus']) && isset($_POST['pincode']) && isset($_POST['referredbye'])) {
    
    $middleName     = isset($_POST['middleName']) ? $_POST['middleName'] : 'NULL';
 
    $weight         = isset($_POST['weight']) ? $_POST['weight'] : 'NULL';
    $religion       = isset($_POST['religion']) ? $_POST['religion'] : 'NULL';
    $allergy        = isset($_POST['allergy']) ? $_POST['allergy'] : 'NULL';
    $email          = isset($_POST['email']) ? $_POST['email'] : 'NULL';
    $mobile2        = isset($_POST['mobile2']) ? $_POST['mobile2'] : 'NULL';
    $mobile1        = isset($_POST['mobile1']) ? $_POST['mobile1'] : 'NULL';
    $landline       = isset($_POST['landline']) ? $_POST['landline'] : 'NULL';
    $city           = isset($_POST['city']) ? $_POST['city'] : 'NULL';
    $referredby     = isset($_POST['referredbye']) ? $_POST['referredbye'] : 'NULL';
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
    $hardDrink     = isset($_POST['hardDrink']) ? $_POST['hardDrink'] : 'NULL';

    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : 'NULL';
    $economicStrata = isset($_POST['economicStrata']) ? $_POST['economicStrata'] : 'NULL';
    $address = mysqli_real_escape_string($conn, $address);
    
    $sql = "UPDATE  patient_master SET firstName='$firstName',middleName='$middleName',surname='$surname',gender='$gender',height='$height',
    weight='$weight',birthDate='$birthDate',religion='$religion',allergy='$allergy',email='$email',
     landline='$landline',city='$city',address='$address',referredby='$referredby',firstVisitDate='$firstVisitDate',lastVisitDate='$lastVisitDate'
    ,smoking='$smoking',alcohol='$alcohol',tobacco='$tobacco',HTN='$HTN',diabetes='$diabetes', 
     cholestrol='$cholestrol',history='$history',occupation='$occupation',economicStrata='$economicStrata',
     country='$country',state='$state',maritalstatus='$maritalstatus',pincode='$pincode',remarks ='$remarks',hardDrink='$hardDrink' WHERE patientId='$patientId'";
  
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($query!=null) {
        $message = $susername.' has update the customer details of '.$firstName.' '.$surname;
        $value = auditlog('patient_master','update',$suserid,$patientId,$message);
        if (isset($_FILES["imgname"]["type"])) {
            $imgname    = $_FILES["imgname"]["name"];
            $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $dir . $patientId . ".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
        }
        $academicQuery = mysqli_query($conn, "SELECT *,st.name stateName,ct.name cityName 
        FROM patient_master pm LEFT JOIN states st ON st.id = pm.state 
        LEFT JOIN cities ct ON ct.id = pm.city where patientId = $patientId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Patient Details updated successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) ."failed",
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