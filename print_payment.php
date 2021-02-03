<?php
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/mpdf/custom/temp/dir/path']);
$stylesheet = file_get_contents('mpdf/style.css');


$html = '
<!DOCTYPE html>
<html>

<style>
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
	
      <img src="img/medical.jpg" class="rounded-circle" width="80" />
	
	<hr>

	<h2 style="margin-left: 250px;">Receipt</h2>
	
	<span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Date:</b> fri-10 Jan 2020</span><br>

	<span><b>Receipt No : </b>Pune/19-20/008&nbsp; &nbsp; <b>Reg No. :</b> 2 <b>&nbsp; &nbsp; Patient Name :</b> Rohan Khatu </span><br>

	 <span style=""><b>Address:</b>Shaniwar wada</span>
	<hr>
	<h3 style="margin-left: 250px;">Bill Details</h3>
	<table style="width:100%">
  <tr>
    <th style="font-weight: normal;">CARDIOLOGIST</th>
    <td>1500.0</td>
  </tr>
  <tr>
    <th style="font-weight: normal;">2DECHO</th>
    <td>1500.0</td>
  </tr>
   <tr>
    <th>Payable Amount</th>
    <td>3000.0.0</td>
  </tr>
</table>

<p><h3 style="margin-left: 340px;">Payment History</h3></p>
	<table style="width:100%">
  <tr>
    <th>Payment Mode</th>
   <th>Amount</th>
   <th>Date</th>
  </tr>
  <tr>
    <td >Cash</td>
    <td>3000.0</td>
  </tr>
 
</table>

<p><h3 style="margin-left: 340px;">Doctor</h3></p>

</body>
</html>';

// $mpdf = new mPDF('utf-8', 'A4-C');
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);

//call watermark content aand image
$mpdf->SetWatermarkText('v');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
// $mpdf->Output("phpflow.pdf", 'F');

$mpdf->Output();

exit;
?>