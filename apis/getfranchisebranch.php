<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['franchiseid'])){
$sql = "SELECT hbm.branchId,hbm.branchName,hbm.latitude,hbm.longitude,hbm.mapURL,hbm.mobile1,hbm.mobile2,hbm.landline1,hbm.landline2,hbm.fax,hbm.branchAddress,hbm.isActive,hbm.country,hbm.state,hbm.state,hbm.city,hbm.franchiseid,fm.franchisename 
FROM hospital_branch_master hbm INNER JOIN franchise_master fm ON fm.franchiseid = hbm.franchiseid 
WHERE hbm.franchiseid =$franchiseid ";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All Branchs Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Please Logout and login again",
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameters missing",
        'Responsecode' => 300
    ); 
}
mysqli_close($conn);
exit(json_encode($response));
?> 