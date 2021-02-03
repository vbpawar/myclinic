<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "auditlog.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/patients/';
if (isset($_POST['id'])) {
    $sql = "UPDATE exercise_photo_master SET title='$title',details='$details' WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    if($query!=null){
   if (isset($_FILES["userPic"]["type"])) {
    $imgname    = $_FILES["userPic"]["name"];
    $sourcePath = $_FILES['userPic']['tmp_name']; // Storing source path of the file in a variable
    $targetPath = $dir . $id . ".jpg"; // Target path where file is to be stored
    move_uploaded_file($sourcePath, $targetPath);
   }
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $message = $susername.' has updated the exercise '.$title;
        $value = auditlog('exercise_photo_master','update',$suserid,$id,$message);
     $sql = "SELECT * FROM  exercise_photo_master  where id = $id";
        $academicQuery = mysqli_query($conn,$sql);
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        
        $response = array(
            'Message' => "Update exercise Successfull",
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