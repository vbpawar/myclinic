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
            //if roles are multiple
            $access_sql = "SELECT activityid,activity,url,accessid FROM(";
            if($academicAffected > 1){
                $i=1;
                while($academicResults = mysqli_fetch_assoc($jobQuery)){
                    $roleid = $academicResults['roleid'];
                    $access_sql .="SELECT ac.activityid activityid,av.activity activity,av.url url,ac.accessid accessid FROM access_control ac 
                    INNER JOIN activities av ON av.activityid = ac.activityid WHERE ac.roleid = $roleid";
                   
                    if($academicAffected != $i){
                        $access_sql .=" UNION ";
                    }
                    $i++;
                    $records['logindetails']  = $academicResults; 
                }
                $access_sql .= " ) T GROUP BY activityid";
                $records['sql']  = $access_sql;
                $jobQuery_1 = mysqli_query($conn, $access_sql);
                if ($jobQuery_1 != null) {
                    $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                    if ($academicAffected_1 > 0) {
                        while($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)){
                            $temp[] = $academicResults_1;
                        }
                    }else{
                        $temp = null;
                    }
                } 
            }else{
                $academicResults = mysqli_fetch_assoc($jobQuery);
                $records['logindetails']  = $academicResults;
            }
            $records['sidebar']  = $temp;
            $response        = array(
                'Message' => "Welcome",
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
            'Message' => mysqli_error($conn),
            "Data" => $records,
            'Responsecode' => 500
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        "Data" => $records,
        'Responsecode' => 500
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>