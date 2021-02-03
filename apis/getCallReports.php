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
$sql = "SELECT cs.clientId,um.username,cc.appointmentDate,cc.callDateTime,cs.firstName,cs.lastName,cs.nearByArea,cs.reference,cs.state,hp.branchName,hp.branchId,DATE_FORMAT(cc.appointmentDate,'%d %b %Y') createdAt,cc.attendedBy,cc.feedback
FROM call_center cc INNER JOIN call_center_patients cs  ON cs.clientId = cc.clientId Left JOIN user_master um on um.userId=cc.attendedBy
LEFT JOIN hospital_branch_master hp ON hp.branchId = cc.branchId
WHERE  cc.callDateTime BETWEEN '$fromDate' AND '$uptoDate' ";
if(isset($_POST['branchId']) && !empty($_POST['branchId']) && $_POST['branchId'] != 0){
    $sql .= " AND cc.branchId = $branchId";
}

$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            // $paymentId = $academicResults['paymentId'];
      
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