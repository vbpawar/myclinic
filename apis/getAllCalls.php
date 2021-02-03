<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['fromDate']) && isset($_POST['uptoDate'])){
    $flag = isset($_POST['flag']) ? $_POST['flag']:0;
    $s = '';
    if($flag == 1){
        $s =  " WHERE DATE(cc.appointmentDate) BETWEEN '$fromDate' AND '$uptoDate'";
    }else{
        $s =  " WHERE cc.appointmentDate BETWEEN '$fromDate' AND '$uptoDate'";
    }
    $sql = "SELECT cc.callId,cc.clientId,cc.callDateTime,cc.branchId,cc.doctorId,cc.disease,
    DATE_FORMAT(cc.appointmentDate,'%W %d %b %Y-%H:%i:%s') appointment,cc.appointmentDate,cc.remarks,cc.folowupNeeded,
    cc.attendedBy,cc.callStatus,cc.feedback,st.name AS stateName,ct.name AS cityName,cc.folowupNeededDateTime follow,
    COALESCE(DATE_FORMAT(cc.folowupNeededDateTime,'%W %d %b %Y-%H:%i:%s'),'-') folowupNeededDateTime,um.username,hb.branchName,ccp.firstName,ccp.middleName,ccp.lastName,ccp.email,ccp.mobile,ccp.landline,ccp.nearByArea,ccp.city,ccp.city,ccp.state,ccp.country,ccp.pincode,ccp.reference,ccp.gender,ccp.dateOfBirth
    FROM call_center cc 
    INNER JOIN call_center_patients ccp ON ccp.clientId = cc.clientId LEFT JOIN states st ON st.id = ccp.state 
    LEFT JOIN cities ct ON ct.id = ccp.city LEFT JOIN user_master um ON um.userId = cc.doctorId LEFT JOIN hospital_branch_master hb ON hb.branchId = cc.branchId";
    $sql .=$s;
     if(isset($_POST['branchId']) && !empty($_POST['branchId']) && $_POST['branchId'] != 0){
        $sql .= " AND cc.branchId = $branchId";
    }
    $sql .= " ORDER BY cc.appointmentDate DESC";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        $response = array(
            'Message' => "All calls Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
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
}else{
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 404
    ); 
}
mysqli_close($conn);
exit(json_encode($response));
?> 