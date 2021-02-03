<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['contactNo'])){
$sql = "SELECT pm.patientId,COALESCE(pm.firstName,'') firstName,COALESCE(pm.middleName,'') middleName,COALESCE(pm.surname,'') surname,
COALESCE(pm.gender,'') gender,COALESCE(pm.height,'') height,COALESCE(pm.weight,'') weight,COALESCE(pm.birthDate,'') birthDate,
COALESCE(pm.religion,'') religion,COALESCE(pm.landline,'') landline,COALESCE(pm.remarks,'') remarks,pm.email,pm.mobile1,
pm.mobile2,pm.referredby,pm.country,pm.pincode,pm.maritalstatus,pm.state,pm.city,pm.cholestrol,pm.diabetes,pm.firstVisitDate,
pm.lastVisitDate,pm.smoking,pm.alcohol,pm.tobacco,pm.HTN,pm.diabetes,pm.tobacco,COALESCE(DATE_FORMAT(pm.nextVisitDate,'%d %b %Y'),'-') nextVisitDate,
st.name stateName,ct.name cityName,pm.address FROM patient_master pm 
LEFT JOIN states st ON st.id = pm.state LEFT JOIN cities ct ON ct.id = pm.city
 where pm.mobile1=$contactNo ORDER BY pm.firstVisitDate DESC";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        $academicResults = mysqli_fetch_assoc($jobQuery);
            $records = $academicResults;
        
        $response = array(
            'Message' => "All Patients Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "Contact Number not present",
            "Data" => $records,
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Please Logout and login again",
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
}
mysqli_close($conn);
exit(json_encode($response));
?> 