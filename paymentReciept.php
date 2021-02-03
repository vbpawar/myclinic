<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

function patientDetails()
{
  $output  = '';
    include 'connection.php';
    $paymentId = 1;
    $sql       = "SELECT pm.firstName,pm.surname,pm.mobile1,opm.patientId,DATE_FORMAT(opm.visitDate,'%d %b %Y') visitDate  
FROM opd_patient_payment_master opm LEFT JOIN patient_master pm ON pm.patientId = opm.patientId
WHERE opm.paymentId =  $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            $patientName = $academicResults['firstName'].' '.$academicResults['surname'];
            $patientId = $academicResults['patientId'];
            $tDate = $academicResults['visitDate'];
            $mobile = $academicResults['mobile1'];
            $output .= '<p style=""><b>Receipt No : </b>Pune/19-20/008 <b style="margin-left :350px">Date:</b>'.$tDate.'</p>
            <p style=""><b>Patient Name :</b>'.$patientName.'<b style="margin-left :100px">Reg No. :</b>'.$patientId.' <b style="margin-left :170px">Cell No:</b>'.$mobile.' </p>';
        }
    }
    return $output;
}

function billDetails()
{
    include 'connection.php';
    $paymentId = 1;
    $output    = '';
    $sql       = "SELECT opm.patientId,opm.billDetails,opm.total,opm.pending
FROM opd_patient_payment_master opm
WHERE opm.paymentId =  $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            $str             = explode(';', $academicResults['billDetails']);
            for ($i = 0; $i < count($str); $i++) {
                $output .= '
        <tr>
          <th style="font-weight: normal;">' . $str[$i] . '</th>
        </tr>';
            }
            $output .= '<tr>
    <th>Payable Amount:' . number_format($academicResults['total'],2) . '</th>
   
  </tr>';
        }
    }
    return $output;
}
function paymentHistory()
{
    include 'connection.php';
    $paymentId = 1;
    $output    = '';
    $sql       = "SELECT opm.amount,opm.paymentMode FROM opd_payment_transaction_master opm WHERE opm.paymentId = $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
          $output .= '<p><h3 style="margin-left: 300px; margin-top :"15px">Payment History</h3></p>
          <table style="width:80%; margin-left :40px">
        <tr>
          <th>Payment Mode</th>
         <th>Amount</th>
        </tr>';
            while($academicResults = mysqli_fetch_assoc($jobQuery)){
              $output .='<tr>
              <td >'.$academicResults['paymentMode'].'</td>
              <td>'.$academicResults['amount'].'</td>
            </tr>';
            }
            $output .='</table>';
        }
    }
    return $output;
}
$html = '<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<body>

    <table width="100%" border=0 width=1000 style="border-collapse:collapse;">
<tr>
<td width="15%">
<img src="img/medical.jpg" width="120" >
</td>
<td width="50%">
<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;">S.NO.46,Vartak Pride,D.P.Road,KarveNagar,Maharashtra, Pune 411004</p>
<p > <img src="img/web.jpg" height="32px;" >www.aloha.com  <img src="img/mobile.jpg" height= 32px; style="margin-left: 40px">9087878787 <img src="img/landline.jpg" height="32px" style="margin-left: 40px">020-25449102</p>

</td>
</tr>
</table>
</div>

    <hr style="margin-top: 35px;">

    <p><h1 style="margin-left: 300px;">Receipt</h1></p>
    '.patientDetails().'
    
  
    <p ><h3 style="margin-left: 300px;">Receipt Details</h3></p>
    <table style="width:100%">
 ' . billDetails() . '
</table>
<br>
'.paymentHistory().'
<br>
<p style="margin-top: 35px;"><b>LDR Clinic</b></p>

</body>
</html>';

$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array(
    "Attachment" => false
));

exit(0);
?> 