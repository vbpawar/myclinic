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

$sql = "SELECT bd.feesType,SUM(bd.fees) test FROM Bill_Details bd";
if(!empty($_POST['fromDate']) && !empty($_POST['uptoDate'])){
    $sql .= " INNER JOIN opd_payment_transaction_master opd ON opd.paymentId = bd.paymentId WHERE opd.paymentDate BETWEEN '$fromDate' AND '$uptoDate'";
}
if(isset($_POST['branchId']) && !empty($_POST['branchId']) && $_POST['branchId'] != 0){
    $sql .= " AND opm.branchId = $branchId";
}
$sql .= " GROUP BY bd.testId";
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
mysqli_close($conn);
exit(json_encode($response));
?> 