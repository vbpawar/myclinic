<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['medicineId']) && isset($_POST['name']) && isset($_POST['genName']) && isset($_POST['morning']) && isset($_POST['noon']) && isset($_POST['night']) && isset($_POST['days']) 
&& isset($_POST['instruction']) && isset($_POST['type'])) {
   
    $sql = "UPDATE medicine_master SET name='$name',genName='$genName',instruction='$instruction',morning='$morning',noon='$noon',night='$night',days='$days',type='$type' WHERE medicineId = $medicineId";
    $query = mysqli_query($conn, $sql);
    if($query!=null){
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated the medicine '.$name;
        $value = auditlog('medicine_master','update',$suserid,$medicineId,$message);
     $sql = "SELECT * FROM medicine_master  where medicineId = $medicineId";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        
        $response = array(
            'Message' => "Update Medicines Successfull",
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