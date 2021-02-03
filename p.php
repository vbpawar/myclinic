<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;
/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
define("DOMPDF_UNICODE_ENABLED", true);
extract($_GET);
$response = [];
$doctorId  = $_GET['pdoctorId'];
$patientId = $_GET['ppatientId'];
$visitDate = $_GET['pvisitDate'];
$lang_flag = $_GET['pflag'];
$sign      = '';
$advice='';
$patientName;
$nextVisitDate='';
$mCount = 0;
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
        $output .= '<div class="col-xs-7">
<h3><p class="font-weight-bold mb-1 "><strong>' . $row['username'] . '</strong></p></h3>
<p class="text-muted ">' . $row['sign'] . '</p>
<p class="text-muted ">Mobile no:' . $row['mobile'] . '  </p>
</div>';
    }
    return $output;
}

function fetchPrescriptiondata($patientId, $visitDate, $doctorId)
{
    include 'connection.php';
    $output = '';
    $complaint='';
    $diagnosis = '';
    $sql    = "SELECT pm.nextVisitDate,pm.advice,pt.firstName,pom.weight,pt.surname,pt.birthDate,pt.address,pt.mobile1,DATE_FORMAT(pt.firstVisitDate,'%a-%d %b %Y') firstVisitDate
    ,pt.gender,pom.pulse ,pom.bp,pom.height,YEAR(CURDATE()) - YEAR(pt.birthDate) AS age,DATE_FORMAT(pm.nextVisitDate,'%a-%d %b %Y') nextVisitDate,pm.complaint,pm.diagnosis,DATE_FORMAT(pm.visitDate,'%a-%d %b %Y') visitDate
    FROM patient_medication pm LEFT JOIN patient_master pt ON pt.patientId = pm.patientId
    LEFT JOIN patient_onassessment_master pom ON pom.patientId = pm.patientId AND pom.visitDate = pm.visitDate
    WHERE pm.patientId = $patientId AND pm.visitDate = '$visitDate' AND pm.doctorId = $doctorId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        global $advice, $patientName, $nextVisitDate;
        $patientName   = $patientId . '_' . $row['firstName'] . '_' . $row['surname'] . '_' . $visitDate;
        if(!empty($row['nextVisitDate'])){
            $nextVisitDate = '<div class="row ">
            <div class="col-xs-2 ">
          <strong>Next visit date:</strong>
          </div>
          <div class="col-xs-8 ">
            <p class="font-weight-bold mb-4 ">' . $row['nextVisitDate'] . '/ as necessary [Please confirm appointment 10 days prior]</p>
            </div>
         </div>';
        }
        if(!empty($row['advice'])){
            $advice = ' <div class="row ">
            <div class="col-xs-2">
          <strong>Advice:</strong>
          </div>
          <div class="col-xs-8 ">
            <p class="font-weight-bold mb-4 ">' .$row['advice'] . '</p>
            </div>
         </div>';
        }
        $bmiStr           = '';
        $weight          = '';
        $pulse = '';
        $bp = '';
        if (!empty($row['weight']) && !empty($row['height'])) {
            $height = $row['height'] / 100;
            $bmi    = floatval($row['weight']) / ($height * $height);
            $bmi    = number_format($bmi, 2);
            $bmiStr = '<span class="font-weight-bold mb-4">BMI:<span>' . $bmi . '</span></span>';
        }
        if(!empty($row['weight'])){
            $weight = '<span class="font-weight-bold mb-4">Weight:<span>' . $row['weight'] . '</span></span>';
        }
        if(!empty($row['bp'])){
            $bp = '<span class="font-weight-bold mb-4">BP:<span>' . $row['bp'] . '</span></span>';
        }
        if(!empty($row['pulse'])){
            $pulse= '<span class="font-weight-bold mb-4">Pulse:<span>' . $row['pulse'] . '</span></span>';
        }
        if(!empty($row['complaint'])){
            $complaint .='<div class="row ">
            <div class="col-xs-3">
            <strong><u>Clinical Notes</u>:</strong>
            </div>
            <div class="col-xs-9">
            <p class="font-weight-bold mb-4 ">' . $row['complaint'] . '</p>
            </div>
            </div>';
        }
        if(!empty($row['diagnosis'])){
            $diagnosis .='<div class="row ">
            <div class="col-xs-3">
            <strong><u>Clinical Diagnosis</u>:</strong>
            </div>
            <div class="col-xs-9">
            <p class="font-weight-bold mb-4 ">' . $row['diagnosis'] . '</p>
            </div>
            </div>';
        }
        
        $output .= '<div class="row">
<div class="col-xs-3">
</div>
<div class="col-xs-3">
</div>
<div class="col-xs-2">
</div>
<div class="col-xs-4">
   <p class="font-weight-bold mb-4">Date:<strong>' . $row['visitDate'] . '</strong></p>
</div>
</div>
<div class="row">
<div class="col-xs-12">
   <p class="font-weight-bold mb-4"><strong class="text-uppercase">' . $row['firstName'] . ' ' . $row['surname'] . '</strong>&nbsp;&nbsp;Reg No:<span>' . $patientId . '</span>&nbsp;&nbsp;Cell No:<span>' . $row['mobile1'] . '</span></p>
</div>
</div>
<div class="row ">
<div class="col-xs-12">
   <p class="font-weight-bold mb-4 ">Age:<span>' . $row['age'] . '</span>&nbsp;&nbsp;'.$weight.'&nbsp;&nbsp; '.$bp.'&nbsp;&nbsp;'.$pulse.'&nbsp;&nbsp;'.$bmiStr.'</p>
</div>

</div>
<hr class="my-5 ">
'.$complaint.'
'.$diagnosis.'
';
    }
    return $output;
}
function fetchmedicinedata($patientId, $visitDate, $doctorId, $flag)
{
    include 'connection.php';
    $output = '';
    $sql    = "SELECT mm.genName,ppm.type,ppm.name,ppm.morning,ppm.evining,ppm.night,ppm.period,ppm.patientId,ppm.visitDate,
    ppm.doctorId,(CASE WHEN 2=$flag THEN (SELECT im.hindi FROM instruction_master im WHERE im.instruction = ppm.instruction) WHEN 3=$flag 
    THEN (SELECT im.marathi FROM instruction_master im WHERE im.instruction = ppm.instruction)
    ELSE ppm.instruction END) instruction
    FROM patient_prescription_medicine ppm LEFT JOIN medicine_master mm ON mm.name = ppm.name AND mm.type = ppm.type 
    WHERE ppm.patientId = $patientId AND ppm.visitDate = '$visitDate' AND ppm.doctorId = $doctorId";
    $result = mysqli_query($conn, $sql);
    $i      = 0;
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="col-xs-12">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-uppercase small font-weight-bold ">Medicine</th>
                    <th style="width:10%;text-align:center" class="border-1 text-uppercase small font-weight-bold ">Morning</th>
                    <th style="width:10%;text-align:center" class="border-1 text-uppercase small font-weight-bold ">Afternoon</th>
                    <th style="width:10%;text-align:center" class="border-1 text-uppercase small font-weight-bold ">Night</th>
                    <th style="width:5%;text-align:center" class="border-1 text-uppercase small font-weight-bold ">Days</th>
                    <th class="text-uppercase small font-weight-bold" style="text-align:center;">Remarks</th>
                </tr>
            </thead>
            <tbody>';
        while ($row = mysqli_fetch_array($result)) {
            $i++;
            $output .= ' <tr>
        <td><small>' . $row['type'] . '<small><strong>-' . $row['name'] . '</strong><br>' . $row['genName'] . '</td>
        <td style="width:5%;text-align:center">' . $row['morning'] . '</td>
        <td style="width:5%;text-align:center">' . $row['evining'] . '</td>
        <td style="width:5%;text-align:center">' . $row['night'] . '</td>
        <td style="width:5%;text-align:center">' . $row['period'] . '</td>
        <td style="width:40%;text-align:center">' . strtoupper($row['instruction']) . '</td>
    </tr>';
        }
        $output .= '</tbody></table></div>';
    }
    return $output;
}

$html = '<link rel="stylesheet" href="dompdf/style.css">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
  *{ font-family: DejaVu Sans !important;}
</style>
</head>
<div class="container">

    <div class=" row ">
        <div class="col-12 ">
                    <div class="row p-5 " id="header">
                        <div class="col-xs-4 ">
                        <img class="img-fluid" src="img/auth/mybrand.png" width="60% " height="70%">
                        </div>
                       ' . doctor_details($doctorId) . '
                    </div>
                    <div class="col-xs-1"></div>
                    <hr class="my-5 ">

                ' . fetchPrescriptiondata($patientId, $visitDate, $doctorId) . '
                    <div class="row p-5 ">
                                   ' . fetchmedicinedata($patientId, $visitDate, $doctorId, $lang_flag) . '
                    </div>
                   '.$advice.'
                '.$nextVisitDate.'
        </div>
    </div>

    <footer style="text-align:right;position:fixed;right:0;bottom:0; "><strong>' . $sign . '</strong></footer>
</div>';
$response = array('Message'=>'print successfull','Responsecode'=>200);
$dompdf->loadHtml($html);

/* Render the HTML as PDF */
$dompdf->render();
/* Output the generated PDF to Browser */

$dompdf->stream($patientName, array(
    "Attachment" => false
));
?> 