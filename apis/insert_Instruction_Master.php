<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['instruction']) && isset($_POST['hindi']) && isset($_POST['marathi'])) {
    $sql = "INSERT INTO instruction_master(instruction,hindi,marathi) VALUES ('$instruction','$hindi','$marathi')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);    
    if ($rowsAffected == 1) {
        $instructionId     = $conn->insert_id;
        $message = $susername.' has added new instruction '.$instruction;
        $value = auditlog('instruction_master','create',$suserid,$instructionId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM instruction_master where instructionId = $instructionId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Instruction Added Successfull",
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