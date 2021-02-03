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
    $sql       = "SELECT opm.patientId,opm.total,opm.pending
FROM opd_patient_payment_master opm LEFT JOIN Bill_Details BD ON BD.paymentId = opm.paymentId
WHERE opm.paymentId =  $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                
            }
            // $str             = explode(';', $academicResults['billDetails']);
          
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
$html = '<html>
<head>
  <style>
    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: lightblue; }
    #footer .page:after { content: counter(page, upper-roman); }
  </style>
<body>
  <div id="header">
    <h1>ibmphp.blogspot.com</h1>
  </div>
  <div id="footer">
    <p class="page"><a href="ibmphp.blogspot.com"></a></p>
  </div>
  <div id="content">
    <p><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
  </div>
</body>
</html>
';

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