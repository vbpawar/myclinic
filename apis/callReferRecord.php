<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;

extract($_POST);
if(isset($_POST['fromDate']) && isset($_POST['uptoDate'])){
$sql = "SELECT cc.branchId,COUNT(ccp.clientId) refCnt,ccp.reference
FROM  call_center_patients ccp 
INNER JOIN call_center cc on cc.callId=ccp.clientId
 LEFT JOIN hospital_branch_master hb  on hb.branchId=cc.branchId 
 where date(cc.callDateTime) BETWEEN '$fromDate' AND '$uptoDate'"; 
  if(isset($_POST['branchId']) && !empty($_POST['branchId']) && $_POST['branchId'] != 0){
    $sql .= "AND cc.branchId = $branchId";
      }
  $sql .=" GROUP BY ccp.reference";

 
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All ref Data Fetched successfully",
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
}
mysqli_close($conn);
exit(json_encode($response));
?> 