<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['testId']) && isset($_POST['testName']) && isset($_POST['testDetails']) && isset($_POST['fees'])  ) {
    $sql = "UPDATE diagnostic_tests_master SET testName='$testName',testDetails='$testDetails',fees='$fees'  WHERE testId = $testId";
    $query = mysqli_query($conn, $sql);
    if($query!=null){
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated procedure details of '.$testName;
        $value = auditlog('diagnostic_tests_master','update',$suserid,$testId,$message);
     $sql = "SELECT * FROM diagnostic_tests_master where testId = $testId";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        $response = array(
            'Message' => "Update Diagnosis Successfull",
            "Data" => $records,
            'Responsecode' => 200
        );
    }else{
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $records,
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