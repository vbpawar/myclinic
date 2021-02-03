<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['classId']) && isset($_POST['discountId'])) {
    $sql = "INSERT INTO classDiscountMapping(classId,discountId) VALUES($classId,$discountId)";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $Id = $conn->insert_id;
        $message = $susername.' has mapped the discount class ';
        $value = auditlog('classDiscountMapping','update',$suserid,$Id,$message);
            $billDetails = null;
            $query = "SELECT dm.discountType,dm.discount,cd.classId FROM classDiscountMapping cd INNER JOIN DiscountMaster dm ON dm.discountId = cd.discountId WHERE cd.classId = $classId";
            $jobQuery_1 = mysqli_query($conn, $query);
            if ($jobQuery_1 != null) {
                $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                if ($academicAffected_1 > 0) {
                    while ($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)) {
                        $billDetails[] = $academicResults_1;
                    }
                }
            }
            $records =  array("details"=>$billDetails);
        $response = array(
            'Message' => "Discount type mapped  successfull",
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