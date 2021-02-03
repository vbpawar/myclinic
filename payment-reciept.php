<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
extract($_POST);
$paymentId = isset($_POST['ppaymentId']) ? $_POST['ppaymentId']:1;

$sign = '-';
$clinic = '';
$branch = '';
function getBranchName($paymentId){
    include 'connection.php';
    $sql   = "SELECT hb.branchAddress,hb.branchName FROM opd_patient_payment_master opm 
    LEFT JOIN hospital_branch_master hb ON hb.branchId = opm.branchId
    WHERE opm.paymentId = $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            global $clinic,$branch;
            $clinic = $academicResults['branchAddress'];
            $branch = $academicResults['branchName'];
        }
    }
}
getBranchName($paymentId);
function patientDetails($paymentId,$branch)
{
  $output  = '';
    include 'connection.php';
    $sql   = "SELECT opm.recieptId,pm.firstName,pm.surname,pm.mobile1,opm.patientId,DATE_FORMAT(opm.visitDate,'%d %b %Y') visitDate,pm.address,um.username, (CASE WHEN MONTH(opm.visitDate)>=4 THEN
    concat(YEAR(opm.visitDate), '-',YEAR(opm.visitDate)+1) ELSE concat(YEAR(opm.visitDate)-1,'-', YEAR(opm.visitDate)) END) fyear
FROM opd_patient_payment_master opm 
LEFT JOIN patient_master pm ON pm.patientId = opm.patientId 
LEFT JOIN user_master um ON um.userId = opm.createdBy
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
            global $sign;
            $sign = $academicResults['username'];
            $rId = $branch.'/'.$academicResults['fyear'].'/000'.$academicResults['recieptId'];
            $output .= '<div class="row">
            <div class="col-xs-9"></div>
            <div class="col-xs-3">
            <p><span class="text-muted ">Date: </span><strong> '.$tDate.'</strong></p>
            </div>
                        </div>
                        <div class="row pb-5 p-5 ">
                        <div class="col-xs-12">
                        <p class="mb-1 "><span class="text-muted ">Reciept No. </span>'.$rId.'&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted ">Reg No. </span> '.$patientId.'
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted ">Patient Name: </span><strong>'.$patientName.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted ">Cell: </span> '.$mobile.'</p>
                        </div>
                    </div>
                    <div class="row pb-5 p-5">
                        <div class="col-xs-12">
                        <p class="mb-1 "><span class="text-muted">Address: </span> '.$academicResults['address'].'</p>
                        </div>
                    </div>';
        }
    }
    mysqli_close($conn);
    return $output;
}

function billDetails($paymentId)
{
    include 'connection.php';
    $output    = '';
    $sql       = "SELECT opm.patientId,opm.total,opm.pending,bd.feesType,bd.fees,opm.discount,opm.originalAmt
    FROM opd_patient_payment_master opm LEFT JOIN  Bill_Details bd on bd.paymentId = opm.paymentId 
    WHERE opm.paymentId =  $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);

    if ($jobQuery != null) {
        $total =0;$discount=0;$originalAmt=0;$pending=0;
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
$output .= '<div class="row p-5">
<div class="col-xs-12 ">
    <table class="table table-bordered">
        <tbody>';
        While($academicResults = mysqli_fetch_assoc($jobQuery)){

            $total= number_format($academicResults['total'],2);
            $originalAmt = $academicResults['originalAmt'];
            $discount = $academicResults['discount'];
            $pending = $academicResults['pending'];
            $output .= '
            <tr>
                  <td >'.$academicResults['feesType'].'</td>
                  <td>'.number_format($academicResults['fees'],2).'</td>
            </tr>';
                }
            $output .= '<tr>
            <td class="thick-line "><strong>Total amount</strong></td>
            <td class="thick-line "><strong>' .number_format($originalAmt,2).'</strong></td>
        </tr>';
        if($discount>0){
            $output .= '<tr>
            <td class="thick-line "><strong>Total Discount(%)</strong></td>
            <td class="thick-line "><strong>' .number_format($discount,2).'%</strong></td>
        </tr>';
        }
        $output .= '<tr>
            <td class="thick-line "><strong>Payble amount</strong></td>
            <td class="thick-line "><strong>' .$total.'</strong></td>
        </tr>';
        if($pending>0){
            $output .= '<tr>
            <td class="thick-line "><strong>Pending amount</strong></td>
            <td class="thick-line "><strong>' .number_format($pending,2).'</strong></td>
        </tr>';
        }
        $output .='
        </tbody>
    </table>
</div>
</div>';
        }
    }
    mysqli_close($conn);
    return $output;
}
function paymentHistory($paymentId)
{
    include 'connection.php';
    $output    = '';
    $sql       = "SELECT opm.amount,opm.paymentMode,DATE_FORMAT(opm.paymentDate,'%d %b %Y') paymentDate,COALESCE(opm.paymentModeDetail,'') paymentModeDetail
    FROM opd_payment_transaction_master opm WHERE opm.paymentId = $paymentId";
    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
$output .= ' <center>
<h4>Payment History</h4>
</center>
<div class="row">

<div class="col-xs-12">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="border-0 text-uppercase small font-weight-bold ">Payment Mode</th>
                <th class="border-0 text-uppercase small font-weight-bold ">Amount</th>
                <th class="border-0 text-uppercase small font-weight-bold ">Date</th>
            </tr>
        </thead>
        <tbody>';
        while($academicResults = mysqli_fetch_assoc($jobQuery)){    
            $output .='<tr>
            <td >'.$academicResults['paymentMode'].' <small>'.$academicResults['paymentModeDetail'].'</small></td>
            <td>'.number_format($academicResults['amount'],2).'</td>
            <td>'.$academicResults['paymentDate'].'</td>
            
          </tr>';
        }
          $output .='</tbody>
    </table>
</div>

</div>';
        }
    }
    mysqli_close($conn);
    return $output;
}
$html = '<link rel="stylesheet" href="dompdf/style.css">
<head>
    <title>Payment Reciept</title>
</head>
<div class="container">
    <div class=" row ">
        <div class="col-1 ">
            <div class="card ">
                <div class="card-body p-0 ">
                    <div class="row p-5 ">
                        <div class="col-xs-4">
                            <img class="img-fluid" src="img/auth/mybrand.png" width="60% " height="70%">
                        </div>

                        <div class="col-xs-6">
                            <strong><p class="font-weight-bold mb-1 ">'.$clinic.'</p></strong>
                        </div>
                    </div>
                   
                    <hr>
                    <center>
                    <h3>Reciept</h3>
                </center>
                    '.patientDetails($paymentId,$branch).'
                    <center><h4>Bill Details</h4></center>
                    '.billDetails($paymentId).'
                   '.paymentHistory($paymentId).'
                </div>
            </div>
        </div>
    </div>
    <footer style="text-align:right;position:fixed;right:0;bottom:0; "><strong>'.$sign.'</strong></footer>
</div>';
set_time_limit(600);
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("payment.pdf", array(
    "Attachment" => false
));
exit(0);
?> 