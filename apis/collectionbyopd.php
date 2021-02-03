<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
extract($_POST);
$discount      = null;
$packages = null;
$records = null;
$packagewise = null;
if(!empty($_POST['fromDate']) && !empty($_POST['uptoDate'])){

$sql_1  = "SELECT SUM(opd.total) total,SUM(opd.received) received,SUM(opd.pending) pending,DATE_FORMAT(opd.createdAt,'%M') createdAt
FROM opd_patient_payment_master opd WHERE opd.isDeleted = 1 AND opd.isPackage = 0 AND opd.createdAt BETWEEN '$fromDate' AND '$uptoDate'";
}
if(isset($_POST['branchId']) && !empty($_POST['branchId']) && $_POST['branchId'] != 0){
    $sql_1 .= " AND opm.branchId = $branchId";
}

$sql_1 .= " GROUP BY MONTH(opd.createdAt)";
$academicQuery = mysqli_query($conn, $sql_1);
if ($academicQuery != null) {
    $academicAffected = mysqli_num_rows($academicQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($academicQuery)) {
            $discount[] = $academicResults;
        }
    }
}
$sql_2  = "SELECT SUM(opd.total) total,SUM(opd.received) received,SUM(opd.pending) pending,DATE_FORMAT(opd.createdAt,'%M') createdAt
FROM opd_patient_payment_master opd WHERE opd.isDeleted = 1 AND opd.isPackage = 1 GROUP BY MONTH(opd.createdAt)";
$academicQuery = mysqli_query($conn, $sql_2);
if ($academicQuery != null) {
    $academicAffected = mysqli_num_rows($academicQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($academicQuery)) {
            $packages[] = $academicResults;
        }
    }
    
}
$sql_3 = "SELECT opd.packageId,SUM(opd.total) total,SUM(opd.received) received,pm.title,COUNT(opd.packageId) package FROM opd_patient_payment_master opd INNER JOIN package_master pm ON pm.packageId = opd.packageId 
WHERE opd.isDeleted = 1 AND opd.isPackage = 1 GROUP BY opd.packageId";
$academicQuery = mysqli_query($conn, $sql_3);
if ($academicQuery != null) {
    $academicAffected = mysqli_num_rows($academicQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($academicQuery)) {
            $packagewise[] = $academicResults;
        }
    }
}

$records = array('OPD'=>$discount,'Package'=>$packages,'packagewise'=>$packagewise);
$response = array(
    'Message' => "Data fetched successfully",
    'Data' => $records,
    'Responsecode' => 200
);

mysqli_close($conn);
print json_encode($response);
?>