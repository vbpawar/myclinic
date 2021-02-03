<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['callId']) && isset($_POST['feedback']) && isset($_POST['userId']) ) {
    $date=date('Y-m-d');
    $sql = "insert  into call_center_followups(callId,followUp,attendedBy,followUpDateTime) values('$callId','$feedback','$userId','$date')";
    $query = mysqli_query($conn, $sql);
    if($query!=null){
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $callFollowupsId  = $conn->insert_id;
        $message = $susername.' has noted the feedback of call ';
        $value = auditlog('call_center_followups','create',$suserid,$callId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM  where callFollowupsId = $callFollowupsId");
     $sql = "SELECT * FROM call_center_followups  where callId = $callId";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        
        $response = array(
            'Message' => "Feedback Logged",
            "Data" => $records,
            'Responsecode' => 200
        );
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            'Responsecode' => 200
        ); 
    }
         
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
        );
    }
} 
else{
    $response = array(
        'Message' => mysqli_error($conn) . " failed",
        'Responsecode' => 600
    );
}
}
else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?> 