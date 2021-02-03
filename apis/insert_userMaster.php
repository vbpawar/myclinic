<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['username']) && isset($_POST['upassword']) && isset($_POST['mobile']) && isset($_POST['addharId'])  && isset($_POST['designation'])
&& isset($_POST['address']) && isset($_POST['firmName']) && isset($_POST['branchName']) ) {
    
    $sql = "INSERT INTO user_master(username,upassword,mobile,addharId,designation,address,firmName,branchId,sign) 
     VALUES ('$username','$upassword','$mobile','$addharId','$designation','$address','$firmName','$branchName','$sign')";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    
    if ($rowsAffected == 1) {
        $userId  = $conn->insert_id;
        $query = mysqli_query($conn, "INSERT INTO user_role_mapping(userid,roleid) VALUES($userId,$usertype)");
        $message = $susername.' has added new user '.$username;
        $value = auditlog('user_master','create',$suserid,$userId,$message);
        
        $sql = "SELECT hp.branchName,um.userId,um.username,um.upassword,um.mobile,um.addharId,um.designation,um.branchId,um.address,um.firmName,um.isActive,um.sign,um.createdAt,fm.franchisename
        FROM user_master um INNER JOIN hospital_branch_master hp ON hp.branchId = um.branchId INNER JOIN franchise_master fm ON fm.franchiseid = hp.franchiseid WHERE um.userId=$userId";
      
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "User Added Successfull",
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