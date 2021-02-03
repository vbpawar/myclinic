<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['fromDate']) && isset($_POST['uptoDate'])){
$sql = "SELECT pm.patientId,COALESCE(pm.firstName,'') firstName,COALESCE(pm.middleName,'') middleName,COALESCE(pm.surname,'') surname,
pm.mobile1,pm.firstVisitDate,pm.lastVisitDate,COALESCE(DATE_FORMAT(pm.nextVisitDate,'%d %b %Y'),'-') nextVisitDate,
COALESCE(DATE_FORMAT(pm.createdAt,'%d %b %Y'),'-') createdAt,
st.name stateName,ct.name cityName,pm.address,cut.name countryName FROM patient_master pm 
LEFT JOIN states st ON st.id = pm.state 
LEFT JOIN cities ct ON ct.id = pm.city 
LEFT JOIN countries cut on cut.id = pm.country
 WHERE date(pm.createdAt) BETWEEN '$fromDate' AND '$uptoDate'";

$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All Patients Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
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