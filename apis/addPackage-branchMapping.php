<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['packageId']) && isset($_POST['packageDiscount']) && isset($_POST['branchId'])) {
    $sql = "INSERT INTO package_branch_mapping(packageId,branchId,packageDiscount) VALUES($packageId,$branchId,'$packageDiscount')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $packageId = $conn->insert_id;
        $message = $susername.' has added/mapped the packgae discount to branch '.$packageDiscount;
        $value = auditlog('package_branch_mapping','create',$suserid,$packageId,$message);
        $sql = "SELECT pbm.mapId,pbm.packageId,pbm.branchId,pbm.packageDiscount,bm.branchName FROM package_branch_mapping pbm  
        INNER JOIN hospital_branch_master bm ON bm.branchId = pbm.branchId WHERE pbm.mapId= $packageId";
        $academicQuery = mysqli_query($conn, $sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Package mapped successfull",
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