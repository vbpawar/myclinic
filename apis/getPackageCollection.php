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
$sql = "SELECT COUNT(opt.transactionId) billedP,opt.paymentDate paymentDate,SUM(opt.amount) amount,SUM(opd.total) total
FROM opd_payment_transaction_master opt INNER JOIN opd_patient_payment_master opd ON opd.paymentId = opt.paymentId 
WHERE opt.paymentDate 
BETWEEN '$fromDate' AND '$uptoDate' AND opd.isPackage = 1  GROUP BY opt.paymentDate";
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