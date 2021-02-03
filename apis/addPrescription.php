<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "witals.php";
include "updateNextvisitdate.php";
include "sendAppointmentSMS.php";
mysqli_set_charset($conn, 'utf8');
$response      = null;
$records       = null;
$transactionId = null;
extract($_POST);
$wital = null;
if (isset($_POST['postdata'])) {
    $someArray = json_decode($postdata, true);

    $remarks          = isset($someArray['remarks']) ? $someArray['remarks']:'NULL';
    $complaints       = isset($someArray['complaints']) ? $someArray['complaints']:'NULL';
    $diagnosis        = isset($someArray['diagnosis']) ? $someArray['diagnosis']:'NULL';

    $remarks          = mysqli_escape_string($conn, $remarks);
    $complaints       = mysqli_escape_string($conn, $complaints);
    $diagnosis        = mysqli_escape_string($conn, $diagnosis);
    $patientId        = $someArray["patientId"];
    $doctorId         = $someArray["doctorId"];
    $nextVisitDate    = $someArray["nextvisit"];
    $visitDate        =  $someArray["visitDate"];//date('Y-m-d');
    $medicinesDetails = $someArray["medicinesDetails"];
    if(!empty($someArray["bp"]) || !empty($someArray["pulse"]) || !empty($someArray["height"]) || !empty($someArray["weight"]) || !empty($someArray["west"]) || !empty($someArray["hip"]) || !empty($someArray["temp"]) || !empty($someArray["spo2"])){
        $wital = get_witals($someArray["bp"],$someArray["temp"],$someArray["spo2"],$someArray["pulse"],$someArray["height"],$someArray["weight"],$someArray["west"],$someArray["hip"],$someArray["patientId"],$visitDate,$someArray["doctorId"]);
    }
    //for update next visit date
    if(!empty($nextVisitDate) && !empty($patientId)){
       $visit= nextVisit($patientId,$nextVisitDate);
    }
    //for update the details
    mysqli_query($conn,"DELETE FROM patient_medication WHERE patientId = $patientId AND visitDate='$visitDate'");
    mysqli_query($conn,"DELETE FROM patient_prescription_medicine WHERE patientId = $patientId AND visitDate='$visitDate'");

    $sql              = "INSERT INTO patient_medication(patientId, visitDate,nextVisitDate,complaint,advice,diagnosis,doctorId) VALUES ($patientId,'$visitDate','$nextVisitDate','$complaints','$remarks','$diagnosis',$doctorId)";
    $query            = mysqli_query($conn, $sql);
    if ($query == 1) {
        $last_id = mysqli_insert_id($conn);
        $tId     = strval($last_id);
        foreach ($medicinesDetails as $key => $value) {
            $typeId       = mysqli_escape_string($conn, $medicinesDetails[$key]['typeId']);
            $medicineId   = mysqli_escape_string($conn, $medicinesDetails[$key]['medicineId']);
            $morning      = mysqli_escape_string($conn,$medicinesDetails[$key]['morning']);
            $evining      = mysqli_escape_string($conn,$medicinesDetails[$key]['evining']);
            $night        = mysqli_escape_string($conn,$medicinesDetails[$key]['night']);
            $duration     = mysqli_escape_string($conn,$medicinesDetails[$key]['duration']);
            $inst         = mysqli_escape_string($conn, $medicinesDetails[$key]['inst']);
            $query        = mysqli_query($conn, "INSERT INTO patient_prescription_medicine(patientId,visitDate,type,name,morning,evining,night,instruction,period,doctorId) 
            values ($patientId,'$visitDate','$typeId','$medicineId','$morning','$evining','$night','$inst','$duration','$doctorId')");
        }
        $rowsAffected = mysqli_affected_rows($conn);
        if ($rowsAffected >0) {
           // $msg = sendSMS($patientId,$nextVisitDate) ? 'Send':'Not send';
           if(sendSMS($patientId,$nextVisitDate)){
            $sms = 1;
        }else{
           $sms = 0;
        }
            $response = array(
                'Message' => "Prescription saved successfully",
                'patientId'=>$patientId,
                'doctorId'=>$doctorId,
                'vdate'=>$visitDate,
               'sms'=>$sms,
                'Responsecode' => 200
            );
        } else {
            $response = array(
                'Message' => mysqli_error($conn) . "Message failed",
                'Responsecode' => 403
            );
        }
    } else {
        $response = array(
            "Message" => mysqli_error($conn) . "Message failed",
            "query" => $sql,
            "Responsecode" => 404
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