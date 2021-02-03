<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['branchId']) && isset($_POST['branchName']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['mapURL']) && isset($_POST['mobile1']) 
&& isset($_POST['mobile2']) && isset($_POST['franchiseidu'])) {
    $sql = "UPDATE hospital_branch_master SET branchName='$branchName',latitude='$latitude',longitude='$longitude',mapURL='$mapURL',mobile1='$mobile1',
    mobile2='$mobile2',country='$country',state='$state',city='$city', branchAddress='$branchAddress',franchiseid=$franchiseidu WHERE branchId = $branchId";
    $query = mysqli_query($conn, $sql);
    if($query!=null){
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
          //audit log
          $message = $susername.' has updated details of branch '.$branchName;
          $value = auditlog('hospital_branch_master','update',$suserid,$branchId,$message);
     $sql = "SELECT hbm.branchId,hbm.branchName,hbm.latitude,hbm.longitude,hbm.mapURL,hbm.mobile1,hbm.mobile2,hbm.landline1,hbm.landline2,hbm.fax,hbm.branchAddress,hbm.isActive,hbm.country,hbm.state,hbm.state,hbm.city,hbm.franchiseid,fm.franchisename 
     FROM hospital_branch_master hbm INNER JOIN franchise_master fm ON fm.franchiseid = hbm.franchiseid WHERE hbm.branchId = $branchId";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        
        $response = array(
            'Message' => "Update Branch Successfull",
            "Data" => $records,
            "sql" => $sql,
            'Responsecode' => 200
        );
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            'Responsecode' => 300
        ); 
    }
         
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
        );
    }
} 
else{
    $response = array(
        'Message' => mysqli_error($conn) . " failed",
        'Responsecode' => 600
    );
}
}
else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?> 