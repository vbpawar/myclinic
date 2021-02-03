<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../upload/user/';
if (isset($_POST['userId']) && isset($_FILES["userPic"]["type"])) {
    
    $imgname    = $_FILES["userPic"]["name"];
    $sourcePath = $_FILES['userPic']['tmp_name']; // Storing source path of the file in a variable
    $targetPath = $dir . $userId . ".jpg"; // Target path where file is to be stored
    if (move_uploaded_file($sourcePath, $targetPath)) {
        $response = array(
            "Message" => "Profile Picture uploaded successfull",
            "Responsecode" => 200
        );
    } else {
        $response = array(
            "Message" => "Profile picture not uploaded",
            "Responsecode" => 400
        );
    } // Moving Uploaded file
    
} else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?> 