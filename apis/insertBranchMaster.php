<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['branchName']) && isset($_POST['mobile1']) && isset($_POST['franchiseid'])) {
    
    $sql = "INSERT INTO hospital_branch_master(branchName,mobile1,latitude,longitude,mapURL,mobile2,branchAddress,
    country,state,city,franchiseid) 
     VALUES ('$branchName','$mobile1','$latitude','$longitude','$mapURL','$mobile2','$branchAddress','$country',
     '$state','$city',$franchiseid)";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $patientId     = $conn->insert_id;
        //audit log
        $message = $susername.' has added new branch '.$branchName;
        $value = auditlog('hospital_branch_master','create',$suserid,$patientId,$message);
        
        $sql = "SELECT hbm.branchId,hbm.branchName,hbm.latitude,hbm.longitude,hbm.mapURL,hbm.mobile1,hbm.mobile2,hbm.landline1,hbm.landline2,hbm.fax,hbm.branchAddress,hbm.isActive,hbm.country,hbm.state,hbm.state,hbm.city,hbm.franchiseid,fm.franchisename 
        FROM hospital_branch_master hbm INNER JOIN franchise_master fm ON fm.franchiseid = hbm.franchiseid WHERE hbm.branchId = $patientId";
        $academicQuery = mysqli_query($conn, $sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Branch Added Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
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