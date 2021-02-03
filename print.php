<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
extract($_GET);
$advice = null;
$patientName = null;
$nextVisitDate=null;
$vidate = $_GET['visitDate'];
$sign = null;

function fetchmedicinedata($patientId,$visitDate,$doctorId)
{
    include 'connection.php';
    $output = '';
    $sql    = "SELECT * FROM patient_prescription_medicine ppm
     WHERE ppm.patientId = $patientId AND ppm.visitDate = '$visitDate' AND ppm.doctorId = $doctorId";
    $result = mysqli_query($conn, $sql);
    $i      = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $i++;
            $output .= '<tr>
            <td style="width:2%;">' . $i . '</td>
            <td><strong>' . $row['name'] . '</strong>-' . $row['type'] . '<br>'.$row['genName'].'</td>
            <td style="width:5%;text-align:center">' . $row['morning'] . '</td>
            <td style="width:5%;text-align:center">' . $row['evining'] . '</td>
            <td style="width:5%;text-align:center">' . $row['night'] . '</td>
            <td style="width:5%;text-align:center">' . $row['period'] . '</td>
            <td style="width:30%;text-align:center">' . $row['instruction'] . '</td>
        </tr>';
        }
    }
    return $output;
}
function fetchPrescriptiondata($patientId,$visitDate,$doctorId)
{
    include 'connection.php';
    $output = '';
    $sql    = "SELECT pm.nextVisitDate,pm.advice,pt.firstName,pt.weight,pt.surname,pt.birthDate,pt.address,pt.mobile1,DATE_FORMAT(pt.firstVisitDate,'%d %b %Y') firstVisitDate
    ,pt.gender,pom.pulse ,pom.bp,YEAR(CURDATE()) - YEAR(pt.birthDate) AS age,DATE_FORMAT(pm.nextVisitDate,'%d %b %Y') nextVisitDate
    FROM patient_medication pm LEFT JOIN patient_master pt ON pt.patientId = pm.patientId
    LEFT JOIN patient_onassessment_master pom ON pom.patientId = pm.patientId AND pom.visitDate = pm.visitDate
    WHERE pm.patientId = $patientId AND pm.visitDate = '$visitDate' AND pm.doctorId = $doctorId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        global $advice,$patientName,$nextVisitDate;
        $nextVisitDate = $row['nextVisitDate'];
        $patientName = $patientId.'_'.$row['firstName'].'_'.$row['surname'].'_'.$visitDate;
        $advice = $row['advice'];
        $output .= ' <tr > <p>  <div style="margin-bottom:15px"><b>Name:&nbsp;&nbsp;</b>'.$row['firstName'].' '.$row['surname'].'  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
         <b>Reg.No:</b>&nbsp;&nbsp;'.$patientId.'  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
         <b>Cell No:</b>&nbsp;&nbsp;'.$row['mobile1'].' 
         <b style="margin-left:200px">   Date:&nbsp;&nbsp;'.$row['firstVisitDate'].'</b></p></p>
    <div ><p><b>Age :</b>&nbsp;&nbsp;'.$row['age'].' &nbsp;&nbsp;&nbsp;&nbsp;
    <b>&nbsp;&nbsp;&nbsp;&nbsp;Weight:</b>&nbsp;&nbsp;'.$row['weight'].' &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
    <b>BP:</b>'.$row['bp'].'  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pulse:</b> '.$row['pulse'].'  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<b>BMI:</b>23.08</div> 
</tr>';
$output .= '<tr><td>1</td><td>2</td></tr>';
    }
   
    return $output;
}
function doctor_details($doctorId){
        include 'connection.php';
        $output = '';
        $sql    = "SELECT * FROM user_master um WHERE um.userId = $doctorId";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            global $sign;$sign = $row['username'];
            $output .= '<td>
            <h1 class="heading"><strong>
      <div style="color: #0087C3;font-size: 20px;font-family: SourceSansPro;text-align:right;">'.$row['username'].'</div></strong></h1>
            <h2 class="heading">
                  <div style="color: #555555;font-family: Arial, sans-serif;font-size: 14px;font-family: SourceSansPro;text-align:right;">
                    '.$row['sign'].'<br/>
                    Mobile no. '.$row['mobile'].'
                    </div>
                    

            </h2>
</td>';
        }
        return $output;
}



$html = '<link rel="stylesheet" href="dompdf/style.css">
<html>
  <head>
    <meta charset="utf-8">
    <title>Prescription</title>
  </head>
  <body>
    <style>
            *
            {

            font-size: 12px;
            font-family: SourceSansPro;
                      color: #555555;
            }
            body
            {
                    width:100%;
            font-size: 14px;
            font-family: SourceSansPro;
            color: #555555;
                    margin:0;
                    padding:0;
            }

            p
            {
                    margin:0;
                    padding:0;
            }

            #wrapper
            {
                    width:180mm;
                    margin:0 3mm;
            }

            .page
            {
                    height:297mm;
                    width:210mm;
                    page-break-after:always;
            }

            table
            {


                    border-spacing:0;
                    border-collapse: collapse;

            }

            table td
            {

                    padding: 1mm;
            }

            table.heading
            {
                    height:20mm;
            }

            h1.heading
            {
                    font-size:16pt;
                    color:#000;
                    font-weight:normal;
            }

            h2.heading
            {
                    font-size:9pt;
                    color:#000;
                    font-weight:normal;
            }
        table td h3{
          color: #000000;
          font-size: 1.2em;
          font-weight: normal;
          margin: 0 0 0.2em 0;
        }
            hr
            {
                    color:#ccc;
                    background:#ccc;
            }

            #invoice_body
            {
                    height: 149mm;
            }

            #invoice_body , #invoice_total
            {
                    width:100%;
            }
            #invoice_body table , #invoice_total table
            {
                    width:100%;
                    border-top: 1px solid #ccc; */

                    border-spacing:0;
                    border-collapse: collapse;

            }

            #invoice_body table td , #invoice_total table td
            {
                    text-align:left;
                    font-size:9pt;

            }

            #invoice_body table td.mono  , #invoice_total table td.mono
            {
                    font-family:monospace;
                    text-align:left;
                    padding-left:3mm;
                    font-size:10pt;
            }

            #footer
            {
                    width:180mm;
                    margin:0 15mm;
                    padding-bottom:3mm;
            }
            #footer table
            {
                    width:100%;
                    border-left: 1px solid #ccc;
                    border-top: 1px solid #ccc;

                    background:#eee;

                    border-spacing:0;
                    border-collapse: collapse;
            }
            #footer table td
            {
                    width:25%;
                    text-align:center;
                    font-size:9pt;
                    border-right: 1px solid #ccc;
                    border-bottom: 1px solid #ccc;
            }
        #logo {
          float: left;
          margin-top: 8px;
        }

        #logo img {
          height: 40px;
        }

    </style>
    </head>
    
    <div id="wrapper">
            <table class="heading" style="width:100%;">
                    <tr>
                    
                            <td style="width:35mm;">
                <img src="medical.jpeg" width="100px" height="130px"/>
                            </td>
                '.doctor_details($_GET['doctorId']).'
                            <td style="width:30mm;">
                                <strong>
                                <div style="font-size: 14px;font-family: SourceSansPro;color: #000;padding-top:130px;    margin-left: -106px;">
                                Date:'.$vidate.'
                                </div>
                                </strong>
                </td>
                    </tr>
        </table>
                <table  style="width:100%;padding:0;">
              
                    <tr>
                 
                            <td style="width:35mm;">
                            </td>
                                <td style="font-size:18px;font-family: SourceSansPro;font-weight:bold;text-align:center;">
                               Prescription
                            </td>
                                <td style="width:30mm;">
                                </td>

                    </tr>
                    ' . fetchPrescriptiondata($_GET['patientId'],$vidate,$_GET['doctorId']) . '
                   
            </table>
      


            <div id="content">

                    <div id="invoice_body">
                            <table border="0">
                            <tr style="background:#fff;">
                                    <td style="width:5%;"><strong>Sr.no</strong></td>
                                    <td><strong> Medicine </strong></td>
                                    <td style="width:5%;text-align:center"><strong> Morning </strong></td>
                                    <td  style="width:5%;text-align:center"><strong> Afternoon </strong></td>
                                    <td style="width:5%;text-align:center"><strong> Night </strong></td>
                                    <td style="width:5%;text-align:center"><strong> Days </strong></td>
                                    <td style="width:30%;text-align:center"><strong> Remarks </strong></td>

                            </tr>

                                
                ' . fetchmedicinedata($_GET['patientId'],$vidate,$_GET['doctorId']) . '

                            </table>

                <table>
                                <tr>
                                <td><strong>Advice:</strong></td>
                                </tr>
                                <tr>
                                <td>'. $advice.'</td>
                                </tr>
                                <tr>
                                <td><strong>Next visit date:'.$nextVisitDate.'</strong></td>
                                </tr>
                                </table>
                               

            </div>
            <footer style="text-align:center;padding-left:400px;"><strong>'.$sign.'</strong></footer>

            </div>

  </body>
</html>';

$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream($patientName, array(
    "Attachment" => false
));
exit(0);
?>