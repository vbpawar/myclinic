<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response   = null;
$records    = null;
$target_dir = "../upload/patientDocs/"; // Upload directory
$ds         = DIRECTORY_SEPARATOR;
$request    = 1;
extract($_POST);
if (isset($_POST['request'])) {
    $request = $_POST['request'];
}
if (isset($_POST['patientId'])) {
    // Upload file
    if ($request == 1) {
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $filename    = $_FILES['file']['name'];
        $file_parts = pathinfo($filename);
        $extension = $file_parts['extension'];
        $sql         = "INSERT INTO  patientDocs(patientId,extension) VALUES($patientId,'$extension')";
        $query       = mysqli_query($conn, $sql);
        
        $rowsAffected = mysqli_affected_rows($conn);
        if ($rowsAffected == 1) {
            $docId     = $conn->insert_id;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $docId.'.'.$extension)) {
                $filename = $docId.'.'.$extension;
                $response = array(
                    'Message' => "Document added Successfully",
                    "Data" => $records,
                    "file"=>$filename,
                    'Responsecode' => 200
                );
            } else {
                $response = array(
                    'Message' => "File has error",
                    "Data" => $records,
                    'Responsecode' => 200
                );
            }
        } else {
            $response = array(
                'Message' => mysqli_error($conn)."File has error",
                "Data" => $records,
                'sql'=>$sql,
                'Responsecode' => 300
            );
        }
    }
    
    // Remove file
    if ($request == 2) {
        $file         = $_POST['name'];
        $docId = explode('.',$file);
        $filename     = $target_dir . $_POST['name'];
        $sql          = "UPDATE  patientDocs SET isActive = 0 WHERE patientId=$patientId AND docId = '$docId[0]'";
        $query        = mysqli_query($conn, $sql);
        $rowsAffected = mysqli_affected_rows($conn);
        if ($rowsAffected == 1) {
            $response = array(
                'Message' => "Removed success",
                'Responsecode' => 200
            );
        }
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        "Data" => $records,
        'Responsecode' => 200
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>