<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$temparray  = null;
$tempMedicines = null;
extract($_POST);
if(isset($_POST['fromDate']) && isset($_POST['uptoDate'])){
$sql = "SELECT SUM(billedP) billedP,paymentDate,SUM(amount) amount,SUM(total) total,SUM(newR) newR,SUM(pending) pending FROM(
    SELECT COUNT(opt.transactionId) billedP,opt.paymentDate paymentDate,SUM(opt.amount) amount,SUM(opd.total) total,0 newR,SUM(opd.pending) pending
    FROM opd_payment_transaction_master opt INNER JOIN opd_patient_payment_master opd ON opd.paymentId = opt.paymentId 
    WHERE opt.paymentDate BETWEEN '$fromDate' AND '$uptoDate' AND opd.isPackage = 0 GROUP BY opt.paymentDate
        UNION
    SELECT 0 billedP,pm.firstVisitDate paymentDate,0 amount,0 total,COUNT(pm.patientId) newR,0 pending FROM patient_master pm
     WHERE pm.firstVisitDate BETWEEN '$fromDate' AND '$uptoDate' GROUP BY pm.firstVisitDate) T GROUP BY paymentDate";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        $response = array(
            'Message' => "All collection Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No data present",
            "Data" => $records,
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => mysqli_error($conn),
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 