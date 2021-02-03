<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['branchid'])){
$sql = "SELECT hp.branchName,um.userId,um.username,um.upassword,um.mobile,um.addharId,um.designation,um.branchId,um.address,um.firmName,um.isActive,um.sign,um.createdAt,fm.franchisename,urm.roleid usertype FROM user_master um 
INNER JOIN hospital_branch_master hp ON hp.branchId = um.branchId INNER JOIN franchise_master fm ON fm.franchiseid = hp.franchiseid INNER JOIN user_role_mapping urm ON urm.userid = um.userId
  WHERE hp.branchid = $branchid ORDER BY hp.branchName";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        $response = array(
            'Message' => "All User Data Fetched successfully",
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
        'Message' => mysqli_error($conn),
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    ); 
}
mysqli_close($conn);
exit(json_encode($response));
?> 