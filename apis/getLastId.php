<?php
function getLastId($branchId)
{
    include "../connection.php";
    mysqli_set_charset($conn, 'utf8');
    $response = 0;
    
    $sql = "SELECT COALESCE(MAX(opm.recieptId),0) AS recieptId FROM opd_patient_payment_master opm WHERE opm.branchId = $branchId";
    
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            $records         = $academicResults;
            $response        = $academicResults['recieptId'];
        } else {
            $response = 0;
        }
    } else {
        $response = 0;
    }
    mysqli_close($conn);
    return $response;
}
?> 