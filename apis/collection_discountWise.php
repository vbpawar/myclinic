<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
extract($_POST);

$discount      = null;
$sql_1         = "SELECT opd.discountType,SUM(opd.discount) discount,dm.discountType ditype FROM opd_patient_payment_master opd 
          INNER JOIN DiscountMaster dm ON dm.discountId = opd.discountType GROUP BY opd.discountType";
$academicQuery = mysqli_query($conn, $sql_1);
if ($academicQuery != null) {
    $academicAffected = mysqli_num_rows($academicQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($academicQuery)) {
            $discount[] = $academicResults;
        }
    }
    
}

$response = array(
    'Message' => "Data fetched successfully",
    'Discount' => $discount,
    'Responsecode' => 200
);

mysqli_close($conn);
print json_encode($response);
?>