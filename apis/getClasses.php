<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$temparray = null;
$tempMedicines = null;
$sql = "SELECT dm.Id,dm.ClassType,hb.branchName,dm.branchId FROM DiscountMapping dm INNER JOIN hospital_branch_master hb ON hb.branchId = dm.branchId";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $Id = $academicResults['Id'];
        
            $billDetails = null;
            $query = "SELECT dm.discountType,dm.discount,cd.classId,cd.Id FROM classDiscountMapping cd INNER JOIN DiscountMaster dm ON dm.discountId = cd.discountId WHERE cd.classId = $Id";
            $jobQuery_1 = mysqli_query($conn, $query);
            if ($jobQuery_1 != null) {
                $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                if ($academicAffected_1 > 0) {
                    while ($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)) {
                        $billDetails[] = $academicResults_1;
                    }
                }
            }
            $temparray =  array("details"=>$billDetails);
            $tempMedicines =  array_merge($academicResults,$temparray);	
            $records[] = $tempMedicines;
        }
        $response = array(
            'Message' => "All Package data Fetched successfully",
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
        'Message' => "Please Logout and login again",
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
mysqli_close($conn);
exit(json_encode($response));
?> 