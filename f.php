<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

extract($_POST);

$visitDate =$_POST['visitDate'];
$patientId=  $_POST['patientId'];

function loaddata($patientid,$visitDate){
    $column = '';
include "connection.php";
 
  $records = null;
  $sql = "SELECT * FROM  patient_feedback WHERE patientid='$patientid' AND visitdate='$visitDate'";
  $academicQuery = mysqli_query($conn, $sql);
  
     if ($academicQuery != null) {
         $academicAffected = mysqli_num_rows($academicQuery);
         if ($academicAffected > 0) {
             $academicResults = mysqli_fetch_assoc($academicQuery);
             $records         = $academicResults;
         }
     }
    if($records !=null){
     $tdata = $records['tdata'];
     $someArray = json_decode($tdata, true);
     $column .='<table border="1"> <caption>(Kindly mark the appropriate columns)</caption>';
     $column .='<tr><th>CRITERIA</th><th>1 DOES NOT APPLY</th><th>2 POOR</th><th>3 FAIR</th><th>4 GOOD</th><th>5 EXCELLENT</th></tr>';
     $lenth = count($someArray);
     $arr = ['AMBIENCE', 'RECEPTION HOSPITALITY', 'PHYSIOTHERAPIST', 'ASSESSMENT & COUNSELLING', 'ACCESSIBILITY'];
     for($i=0;$i<$lenth;$i++){
         $column .='<tr>';
         $column .=' <th scope="row">'. $arr[$i] .'</th>';
         if ($someArray[$i]['apply'] > 0) {
          $column .='<td style="text-align:center">'.$someArray[$i]['apply'].'</td>';
      } else {
          $column .='<td></td>';
      }
      if ($someArray[$i]['poor'] > 0) {
          $column .='<td style="text-align:center">'.$someArray[$i]['poor'].'</td>';
      } else {
          $column .='<td></td>';
      }
      if ($someArray[$i]['fair'] > 0) {
          $column .='<td style="text-align:center">'.$someArray[$i]['fair'].'</td>';
      } else {
          $column .='<td></td>';
      }
      if ($someArray[$i]['good'] > 0) {
          $column .='<td style="text-align:center">'.$someArray[$i]['good'].'</td>';
      } else {
          $column .='<td></td>';
      }
      if ($someArray[$i]['excel'] > 0) {
          $column .='<td style="text-align:center">'.$someArray[$i]['excel'].'</td>';
      } else {
          $column .='<td></td>';
      }
      $column .= '</tr>';
     }
     $column .='</table>';
  }

    $output = '';
    $output.='<style>
    table, td, th {
      border: 1px solid black;
    }
    
    table {
      border-collapse: collapse;
      width: 100%;
      border-spacing: 15px;
    }
    
    th {
      height: 50px;
    }
    </style> <p  style="font-size: 16px; margin-left:10px">Thank you for being a part of our practice. So that we may better serve you in future appointments, we ask that you take a few minutes to fill out this survey, which is 100% confidential.</p>';  
    $output.='<p style="font-size: 17px; margin-left:10px">Name: <b><u>vikas pawar</u></b>  Age: <b><u>28</b></u></p>';
    $output.='<p style="font-size: 17px;font-weight:200; margin-left:10px;margin-top:10px">Phone:  <b><u>9657617896</u></b>  Place: <b><u>Pune</u></b></p>';
    $output .=$column;
    $output.='<p style="font-size: 16px;font-weight:200; margin-left:10px;margin-top:20px">Where did you find us:  <b><u>News Paper</u></b></p>';
    $output.='<p style="font-size: 16px;font-weight:200; margin-left:10px;margin-top:20px">Overall Experience:  <b><u>Good</u></b></p>';
    $output.='<p style="font-size: 16px;font-weight:200; margin-left:10px;margin-top:20px">Any Other Suggestions:  <b><u>Avergae</u></b></p>';
    return $output;
}

$html = '<html>
<link rel="stylesheet" href="mpdf/style.css">
<div class="container-fluid">                                    
<div class="row">

<img class="img-fluid" src="img/concent.jpg" width="100% " height="30%">

    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body form-group">
               
                <h3><center><b>Feedback Form</b></center></h3>
            
                     '.loaddata($patientid,$visitDate).' 
                  
                    </div>
                </div>

        </div>
    </div>

        </div>
</html>';

$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml(html_entity_decode($html));
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("payment.pdf", array(
    "Attachment" => false
));

exit(0);
?>