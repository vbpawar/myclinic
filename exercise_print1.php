<?php
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/mpdf/custom/temp/dir/path']);
$stylesheet = file_get_contents('mpdf/style.css');

extract($_POST);
$patientId = 1;//$_POST['patientId'];
$doctorId = 1 ;//$_POST['doctorId'];
$visitDate = '2020-03-02';//$_POST['visitDate'];

function doctor_details($doctorId)
{
    include 'connection.php';
    $output = '';
    $sql    = "SELECT um.username,um.mobile,um.sign FROM user_master um WHERE um.userId = $doctorId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        global $sign;
        $sign = $row['username'];

        $output .= '<div>
        <h3><p><strong>' . $row['username'] . '</strong></p></h3>
        <p>' . $row['sign'] . '</p>
        <p>Mobile no:' . $row['mobile'] . '  </p>
        </div>';
    }
    return $output;
}


function patients_details($patientId){
  include 'connection.php';
  $output ='';
  $sql ="SELECT pm.patientId,pm.firstName,pm.surname,pm.mobile1  from patient_master pm  where pm.patientId = $patientId ";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
      $row=mysqli_fetch_array($result);
      $output.='

      <span><b> Patient Name :</b>'.$row['firstName'].' '.$row['surname'].'    &nbsp; &nbsp; <b>Reg No. :</b>'.$row['patientId'].'  <b>&nbsp; &nbsp; Contact No. :</b>'.$row['mobile1'].'</span><br>
  ';
  }
  return $output;

}


function exexcise_details($patientId,$visitDate){
  include 'connection.php';
  $output ='';
  $sql ="SELECT ex.title,ex.details,ex.patientId,ex.doctorId,ex.steps,ec.Id FROM patient_prescribed_exercise  ex 
  INNER JOIN  exercise_photo_master ec ON ec.title = ex.title where ex.patientId = $patientId AND ex.visitDate = '$visitDate'";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {

    $output .= '<table>
  
        <tr>
          <th>PHOTO</th>
          <th>TITLE</th>
        <th>DETAILS</th>
        <th>STEPS</th>
                                                                                                                                     
        </tr>
       
        ';
        while ($row = mysqli_fetch_array($result)) {
     
          $output .= '<tr>
      <td>  <img class="img-fluid" src="upload/exercise/'.$row['Id'].'.jpg" width="500% " height="600%"></td>
      <td>'.$row['title'].' </td>
      <td>'.$row['details'].' </td>
      <td>'.$row['steps'].' </td>
  </tr>';
      }
      $output .= '</table>';
 
  }
  return $output;     

}
$html ='

<html>
<link rel="stylesheet" href="mpdf/style.css">
<style>
table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  </style>
</style>
<body>
	<p>
        <img class="img-fluid" src="img/auth/mybrand.png" width="30% " height="40%">
      
	<div style="margin-top: -70px;margin-left: 200px;">
  '.doctor_details(1).'
	</div>

	<hr style="margin-top: 35px;">

	

  '. patients_details($patientId).'
	
	<h2 style="margin-left: 250px;">Exercise Details</h2>
   
      '.exexcise_details($patientId,$visitDate).' 

</body>
</html>';


// $mpdf = new mPDF('utf-8', 'A4-C');
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);

//call watermark content aand image
$mpdf->SetWatermarkText('   ');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
// $mpdf->Output("phpflow.pdf", 'F');

$mpdf->Output();

exit;
?>