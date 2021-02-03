<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['packageId']) && isset($_POST['patientId']) && isset($_POST['packageCost']) && isset($_POST['isActive']) 
&& isset($_POST['packageDuration']) && isset($_POST['branchId']) && isset($_POST['userId'])) {
    
$sql = "INSERT INTO PackageAccount(packageId,patientId,packageCost,isActive,branchId,userId,packageDuration) 
VALUES($packageId,$patientId,'$packageCost',$isActive,$branchId,$userId,$packageDuration)";
    
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected >0) {
        $pId = $conn->insert_id;
        $insert = "INSERT INTO PackageCustomerDetails(pid,TestId,Quota,originalQuota) SELECT $pId,testId,quota,quota FROM package_details_master WHERE packageId = $packageId";
        mysqli_query($conn, $insert) or die(mysqli_error($conn));
       $academicQuery = mysqli_query($conn, "SELECT pa.packageId,pa.patientId,pa.packageCost,pa.isActive,pa.isDelete,pa.packageDuration,pa.expirayDate,
        DATE_FORMAT(pa.created_at,'%d %b %Y') purchaseDate,pm.title FROM PackageAccount pa 
        LEFT JOIN package_master pm ON pm.packageId = pa.packageId WHERE pa.packageId = $packageId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Package  Added Successfull",
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