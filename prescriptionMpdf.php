<?php
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/mpdf/custom/temp/dir/path']);
$stylesheet = file_get_contents('mpdf/style.css');
$allow_charset_conversion = true;
define("DOMPDF_UNICODE_ENABLED", true);
extract($_POST);
$response = [];
$doctorId  = 1;//$_POST['pdoctorId'];
$patientId = 1;//$_POST['ppatientId'];
$visitDate = '2020-03-20';//$_POST['pvisitDate'];
$lang_flag = 3;//$_POST['pflag'];
$sign      = '';
$advice='';
$patientName;
$nextVisitDate='';
$mCount = 0;
function doctor_details($doctorId)
{
    include 'connection.php';
    $output = '';
    
 mysqli_set_charset($conn,'utf8');
 $result = mysqli_query($conn,"SET NAMES utf8");
    $sql    = "SELECT um.username,um.mobile,um.sign FROM user_master um WHERE um.userId = $doctorId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        global $sign;
        $sign = $row['username'];
        $output .= '
<h4 ><div  style="padding-left:400px; margin-top:-100px;margin-bottom:0px;">' . $row['username'] . '<br>
<p style="font-weight: normal;margin-top:0px;margin-bottom:0px;">' . $row['sign'] . '</p>
<p style="font-weight: normal;margin-top:0px;margin-bottom:0px;">Mobile no:' . $row['mobile'] . '</p></div>  </h4>
';
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
            $nextVisitDate = '
          <strong>Next visit date:</strong>
          
            ' . $row['nextVisitDate'] . '/ as necessary [Please confirm appointment 10 days prior]<br>
          ';
        }
        if(!empty($row['advice'])){
            $advice = '
          <strong>Advice:</strong>
            ' .$row['advice'] . '<br>';
        }
        $bmiStr           = '';
        $weight          = '';
        $pulse = '';
        $bp = '';
        if (!empty($row['weight']) && !empty($row['height'])) {
            $height = $row['height'] / 100;
            $bmi    = floatval($row['weight']) / ($height * $height);
            $bmi    = number_format($bmi, 2);
            $bmiStr = '<span >BMI:<span>' . $bmi . '</span></span>';
        }
        if(!empty($row['weight'])){
            $weight = '<span >Weight:<span>' . $row['weight'] . '</span></span>';
        }
        if(!empty($row['bp'])){
            $bp = '<span >BP:<span>' . $row['bp'] . '</span></span>';
        }
        if(!empty($row['pulse'])){
            $pulse= '<span >Pulse:<span>' . $row['pulse'] . '</span></span>';
        }
        if(!empty($row['complaint'])){
            $complaint .='
            <strong><u>Clinical Notes</u>:</strong>
          
            ' . $row['complaint'] . '<br>
            ';
        }
        if(!empty($row['diagnosis'])){
            $diagnosis .='
            <strong><u>Clinical Diagnosis</u>:</strong>
            
            ' . $row['diagnosis'] . '<br><br>
            ';
        }
        
        $output .= '
        <div class="dt"><span >Date:<strong>' . $row['visitDate'] . '</strong></span></div>

   <p>Patient Name:<strong class="text-uppercase">' . $row['firstName'] . ' ' . $row['surname'] . '</strong>
   &nbsp;&nbsp;Reg No:<span>' . $patientId . '</span>&nbsp;&nbsp;
   Mobile No.:<span>' . $row['mobile1'] . '</span></p>

   <p >Age:<span>' . $row['age'] . '</span>&nbsp;&nbsp;'.$weight.'&nbsp;&nbsp; '.$bp.'&nbsp;&nbsp;'.$pulse.'&nbsp;&nbsp;'.$bmiStr.'</p>



<hr>
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
    
 mysqli_set_charset($conn,'utf8');
 $result = mysqli_query($conn,"SET NAMES utf8");

    $sql    = "SELECT mm.genName,ppm.type,ppm.name,ppm.morning,ppm.evining,ppm.night,ppm.period,ppm.patientId,ppm.visitDate,
    ppm.doctorId,(CASE WHEN 2=$flag THEN (SELECT im.hindi FROM instruction_master im WHERE im.instruction = ppm.instruction) WHEN 3=$flag 
    THEN (SELECT im.marathi FROM instruction_master im WHERE im.instruction = ppm.instruction)
    ELSE ppm.instruction END) instruction
    FROM patient_prescription_medicine ppm LEFT JOIN medicine_master mm ON mm.name = ppm.name AND mm.type = ppm.type 
    WHERE ppm.patientId = $patientId AND ppm.visitDate = '$visitDate' AND ppm.doctorId = $doctorId";
    $result = mysqli_query($conn, $sql);
    $i      = 0;
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Medicine</th>
                    <th>Morning</th>
                    <th >Afternoon</th>
                    <th>Night</th>
                    <th >Days</th>
                    <th >Remarks</th>
                </tr>
            </thead>
            <tbody>';
        while ($row = mysqli_fetch_array($result)) {
            $i++;
            $output .= ' <tr style="font-size:30px";>
        <td>' . $row['type'] . '<strong>-' . $row['name'] . '</strong><br>' . $row['genName'] . '</td>
        <td >' . $row['morning'] . ' </td>
        <td >' . $row['evining'] . '</td>
        <td>' . $row['night'] . '</td>
        <td >' . $row['period'] . '</td>
        <td>' . strtoupper($row['instruction']) . '</td>
    </tr>';
        }
        $output .= '</tbody></table><br>';
    }
    return $output;
}

$html = '<link rel="stylesheet" href="mpdf/style.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="UTF-8">
<style>
table, th, td {
  border: 1px solid grey;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
.dt{
       text-align: right;   
}
.im{
   
    display:block;
    Height:100px;
    Width:200px;
    object-fit:contain ;
   
  
}
</style>

</head>
<p class="im"><img src="img/auth/mybrand.png" >
                       
                            <strong style="padding-left:200px"> ' . doctor_details($doctorId) . '</strong> </p>
                            
                    <hr style="margin-top:0px;">

                ' . fetchPrescriptiondata(1, '2020-03-20', 1) . '
                  
                                   ' . fetchmedicinedata(1, '2020-03-20',1, 3) . '
                    
                   '.$advice.'
                '.$nextVisitDate.'
       

    <footer style="text-align:right;position:fixed;right:0;bottom:0; "><strong>' . $sign . '</strong></footer>
';
$response = array('Message'=>'print successfull','Responsecode'=>200);
// $mpdf = new mPDF('utf-8', 'A4-C');
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);

//call watermark content aand image
$mpdf->SetWatermarkText('   ');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->Output("phpflow.pdf", 'F');

$mpdf->Output();

exit;
?>