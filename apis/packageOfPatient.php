<?php
$response = null;
function package($packageId, $patientId, $packageCost, $isActive, $branchId, $userId, $packageDuration)
{
    include '../connection.php';
    $sql = "INSERT INTO PackageAccount(packageId,patientId,packageCost,isActive,branchId,userId,packageDuration,expirayDate)
    SELECT $packageId,$patientId,'$packageCost',$isActive,$branchId,$userId,$packageDuration,(CURRENT_DATE + INTERVAL MAX(pd.quota) DAY)  FROM package_details_master pd WHERE packageId = $packageId"; 
    // VALUES($packageId,$patientId,'$packageCost',$isActive,$branchId,$userId,$packageDuration)";
    mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected > 0) {
        $pId           = $conn->insert_id;
        $insert        = "INSERT INTO PackageCustomerDetails(pid,TestId,Quota,originalQuota) SELECT $pId,testId,quota,quota FROM package_details_master WHERE packageId = $packageId";
        $academicQuery = mysqli_query($conn, $insert);
        if ($academicQuery != null) {
            $academicAffected = mysqli_affected_rows($conn);
            if ($academicAffected > 0) {
                $response = 1;
            }else{
                $response = 0;
            }
        } else {
            $response = 0;
        }
    }else{
        $response = 0;
    }
    return $response;
}
?> 