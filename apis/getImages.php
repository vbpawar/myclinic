<?php
header('Content-type: text/json'); //3
header('Content-type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response    = null;
$records     = null;
$result      = array();
$storeFolder = '../upload/patientDocs';
$ds          = DIRECTORY_SEPARATOR;
extract($_POST);
if (isset($_POST['patientId'])) {
    $academicQuery = mysqli_query($conn, "SELECT docId,extension FROM patientDocs where patientId = $patientId AND isActive = 1");
    if ($academicQuery != null) {
        $academicAffected = mysqli_num_rows($academicQuery);
        if ($academicAffected > 0) {
            while ($academicResults = mysqli_fetch_assoc($academicQuery)) {
                $obj['name'] = $academicResults['docId'].'.'.$academicResults['extension'];
                $obj['size'] = filesize($storeFolder.$ds.$academicResults['docId'].'.'.$academicResults['extension']);
                $records[]   = $obj;
            }
            $response = array(
                'Message' => "Fetched",
                'Data' => $records,
                'Responsecode' => 200
            );

        } else {
            $response = array(
                'Message' => "No Record Found",
                'Data' => $records,
                'Responsecode' => 300
            );
        }
    }else {
      $response = array(
          'Message' => mysqli_error($conn)."No Record Found",
          'Data' => $records,
          'Responsecode' => 300
      );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Data' => $records,
        'Responsecode' => 400
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
