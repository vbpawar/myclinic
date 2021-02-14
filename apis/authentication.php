<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$temp = null;
extract($_POST);
if (isset($_POST['username']) && isset($_POST['passwrd'])) {
    $sql      = "SELECT um.userId,um.username,um.branchId,rm.role,hbm.franchiseid,ur.roleid FROM user_master um 
    INNER JOIN user_role_mapping ur ON ur.userid = um.userId INNER JOIN rolemaster rm ON rm.roleId = ur.roleid
     INNER JOIN hospital_branch_master hbm ON hbm.branchId = um.branchId
    WHERE um.mobile = '$username' AND um.upassword = '$passwrd'";
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $records = mysqli_fetch_assoc($jobQuery);
            $response        = array(
                'Message' => "Login successfull",
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
            'Responsecode' => 500
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 500
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>