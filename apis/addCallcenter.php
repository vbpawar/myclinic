<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "updateCall.php";
include "addPatientInCall.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
date_default_timezone_set('Asia/Kolkata');
extract($_POST);
if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['birthdate']) 
&& isset($_POST['gender']) && isset($_POST['mobile']) && isset($_POST['city']) 
&& isset($_POST['state'])) {
    $middleName            = isset($_POST['middleName']) ? $_POST['middleName'] : 'NULL';
    $email                 = isset($_POST['emailId']) ? $_POST['emailId'] : 'NULL';
    $landline              = isset($_POST['landline']) ? $_POST['landline'] : 'NULL';
    $nearByArea            = isset($_POST['nearByArea']) ? $_POST['nearByArea'] : 'NULL';
    $country               = isset($_POST['country']) ? $_POST['country'] : 'NULL';
    $pincode               = isset($_POST['zipcode']) ? $_POST['zipcode'] : 'NULL';
    $reference             = isset($_POST['reference']) ? $_POST['reference'] : 'NULL';
    $callDateTime          = date("Y-m-d h:i:s");//isset($_POST['callDateTime']) ? $_POST['callDateTime'] : 'NULL';
    $disease               = isset($_POST['desease']) ? $_POST['desease'] : 'NULL';
    $remarks               = isset($_POST['remarks']) ? $_POST['remarks'] : 'NULL';
    $folowupNeeded         = isset($_POST['folowupNeeded']) ? $_POST['folowupNeeded'] : 'NULL';
    $folowupNeededDateTime = isset($_POST['follwupdate']) ? $_POST['follwupdate'] : 'NULL';
    $attendedBy            = isset($_POST['attendedBy']) ? $_POST['attendedBy'] : 'NULL';
    $branchId              = isset($_POST['branchId']) ? $_POST['branchId'] : 'NULL';
    $doctorId              = isset($_POST['userId']) ? $_POST['userId'] : 'NULL';
   // $feedback              = isset($_POST['feedback']) ? $_POST['feedback'] : 'NULL';
    $callStatus            = isset($_POST['callStatus']) ? $_POST['callStatus'] : '1';
    $appointmentDate       = isset($_POST['appointmentDate']) ? $_POST['appointmentDate']:'NULL';

    if(isset($_POST['clientId']) && !empty($_POST['clientId'])){
        $sql = "UPDATE call_center_patients SET firstName = '$firstName',middleName = '$middleName',lastName = '$lastName',email='$email',mobile = '$mobile' ,landline ='$landline' ,nearByArea = '$nearByArea',city = '$city',state = '$state',country = '$country',
        pincode = '$pincode',reference = '$reference',gender = '$gender',dateOfBirth = '$birthdate' WHERE clientId = $clientId";
$query = mysqli_query($conn, $sql);
$rowsAffected = mysqli_affected_rows($conn);
if ($rowsAffected >0 || $rowsAffected == 0 ) {
    $sql = "INSERT INTO call_center(clientId,callDateTime,branchId,doctorId,disease,appointmentDate,remarks,folowupNeeded,
    folowupNeededDateTime,attendedBy,callStatus) VALUES ($clientId,'$callDateTime',$branchId,$doctorId,'$disease', 
    '$appointmentDate', '$remarks', '$folowupNeeded', '$folowupNeededDateTime', '$attendedBy','$callStatus')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $callId        = $conn->insert_id;
        $message = $susername.' has update the details and book an appointment of user '.$firstName.' '.$lastName;
        $value = auditlog('call_center','create',$suserid,$callId,$message);
        $query = "SELECT cc.callId,cc.clientId,cc.callDateTime,cc.branchId,cc.doctorId,cc.disease,
        DATE_FORMAT(cc.appointmentDate,'%W %d %b %Y-%H:%i:%s') appointment,cc.appointmentDate,cc.remarks,cc.folowupNeeded,cc.attendedBy,cc.callStatus,cc.feedback,st.name AS stateName,ct.name AS cityName,cc.folowupNeededDateTime follow,DATE_FORMAT(cc.folowupNeededDateTime,'%W %d %b %Y-%H:%i:%s') folowupNeededDateTime,um.username,hb.branchName,ccp.firstName,ccp.middleName,ccp.lastName,ccp.email,ccp.mobile,ccp.landline,ccp.nearByArea,ccp.city,ccp.city,ccp.state,ccp.country,ccp.pincode,ccp.reference,ccp.gender,ccp.dateOfBirth
        FROM call_center cc 
        INNER JOIN call_center_patients ccp ON ccp.clientId = cc.clientId LEFT JOIN states st ON st.id = ccp.state 
        LEFT JOIN cities ct ON ct.id = ccp.city LEFT JOIN user_master um ON um.userId = cc.doctorId LEFT JOIN hospital_branch_master hb ON hb.branchId = cc.branchId WHERE cc.callId = $callId";
        $academicQuery = mysqli_query($conn,$query);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Appointment schedule Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $records,
            'Responsecode' => 305
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

    $sql = "INSERT INTO call_center_patients(firstName,middleName,lastName,email,mobile,landline,nearByArea,city,state,country, 
    pincode,reference,gender,dateOfBirth) VALUES ('$firstName', '$middleName', '$lastName', '$email', '$mobile', 
    '$landline','$nearByArea', '$city', '$state', '$country', '$pincode', '$reference', '$gender', '$birthdate')";
    
    $R = addPatientCall($_POST);
    if($R == 1){
       
        $response = array(
            'Message' => "Patient added successfully",
            "THIS HAS ADDED" => $records,
            'Responsecode' => 200
        );
    }
    
 
 
$query = mysqli_query($conn, $sql);
    
$rowsAffected = mysqli_affected_rows($conn);
if ($rowsAffected == 1) {
    $clientId        = $conn->insert_id;
    $sql = "INSERT INTO call_center(clientId,callDateTime,branchId,doctorId,disease,appointmentDate,remarks,folowupNeeded,
    folowupNeededDateTime,attendedBy) VALUES ($clientId,'$callDateTime',$branchId,$doctorId,'$disease', '$appointmentDate', '$remarks', '$folowupNeeded', '$folowupNeededDateTime', '$attendedBy')";
   $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $callId        = $conn->insert_id;
        $message = $susername.' has added the new customer and book an appointment of customer '.$firstName.' '.$lastName;
        $value = auditlog('call_center','create',$suserid,$callId,$message);
        $query = "SELECT cc.callId,cc.clientId,cc.callDateTime,cc.branchId,cc.doctorId,cc.disease,
        DATE_FORMAT(cc.appointmentDate,'%W %d %b %Y-%H:%i:%s') appointment,cc.appointmentDate,cc.remarks,cc.folowupNeeded,cc.attendedBy,cc.callStatus,cc.feedback,st.name AS stateName,ct.name AS cityName,cc.folowupNeededDateTime follow,DATE_FORMAT(cc.folowupNeededDateTime,'%W %d %b %Y-%H:%i:%s') folowupNeededDateTime,um.username,hb.branchName,ccp.firstName,ccp.middleName,ccp.lastName,ccp.email,ccp.mobile,ccp.landline,ccp.nearByArea,ccp.city,ccp.city,ccp.state,ccp.country,ccp.pincode,ccp.reference,ccp.gender,ccp.dateOfBirth
        FROM call_center cc 
        INNER JOIN call_center_patients ccp ON ccp.clientId = cc.clientId LEFT JOIN states st ON st.id = ccp.state 
        LEFT JOIN cities ct ON ct.id = ccp.city LEFT JOIN user_master um ON um.userId = cc.doctorId LEFT JOIN hospital_branch_master hb ON hb.branchId = cc.branchId WHERE cc.callId = $callId";
        $academicQuery = mysqli_query($conn, $query);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
           
        }

        $response = array(
            'Message' => "Call Added Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );

       
    

        

    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $records,
            'Responsecode' => 305
        ); 
    }
    

} else {
    $f = updateCall($_POST);
    if($f == 1){
    $response = array(
        'Message' => "Contact already existed data updated successfully",
        'Responsecode' => 504
    );
}else{
    $response = array(
        'Message' => "Contact existed data updated successfully",
        'Responsecode' => 509
    );
}
}

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