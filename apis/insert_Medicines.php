
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');  
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['name']) && isset($_POST['genName']) && isset($_POST['morning'])  && isset($_POST['noon']) && isset($_POST['night'])  && isset($_POST['instruction'])
 && isset($_POST['days'])  && isset($_POST['isImportant']) && isset($_POST['type']))
 {
    $sql = "INSERT INTO medicine_master(name,genName,morning,noon,night,instruction,days,isImportant,type) 
     VALUES ('$name','$genName','$morning','$noon','$night','$instruction','$days','$isImportant','$type')";
    $query = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $medicineId     = $conn->insert_id;
        $message = $susername.' has added new medicine '.$name;
        $value = auditlog('medicine_master','create',$suserid,$medicineId,$message);
        $academicQuery = mysqli_query($conn, "SELECT * FROM medicine_master where medicineId = $medicineId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Medicine Added Successfull",
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