<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['instructionId']) && isset($_POST['instruction']) && isset($_POST['hindi']) && isset($_POST['marathi'])  ) {
    
    $instruction = mysqli_escape_string($conn,$instruction);
    $hindi = mysqli_escape_string($conn,$hindi);
    $marathi = mysqli_escape_string($conn,$marathi);
    $sql = "UPDATE instruction_master SET instruction='$instruction',hindi='$hindi',marathi='$marathi' WHERE instructionId = $instructionId";
    
    $query = mysqli_query($conn, $sql);
    if($query!=null){
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated the instruction '.$instruction;
        $value = auditlog('instruction_master','update',$suserid,$instructionId,$message);
     $sql = "SELECT * FROM instruction_master  where instructionId = $instructionId";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        
        $response = array(
            'Message' => "Update instruction Successfull",
            "Data" => $records,
            "sql" => $sql,
            'Responsecode' => 200
        );
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $records,
            "sql" =>  $sql,
            'Responsecode' => 200
        ); 
    }
         
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500,
            "sql" => $sql
        );
    }
} 
else{
    $response = array(
        'Message' => mysqli_error($conn) . " failed",
        'Responsecode' => 600,
        "sql" => $sql
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