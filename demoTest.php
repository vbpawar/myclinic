<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';

/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

function doctor_details($userId){

    include 'connection.php';
    $output ='';
    $sql="SELECT username,sign,mobile FROM user_master um WHERE um.userId=$userId";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $output.='
        <div class="invoice-title">
                                                                                                                                                                                                                                                
            <h3>logo</h2><h4 class="pull-right">'.$row['username'].'</h4><br>
            <h6  style="margin-left:140px">'.$row['sign'].'</h6>
            <h6  style="margin-left:140px" class="pull-right">Mobile NO:'.$row['mobile'].'</h6>
        </div>
        ';
    }
    return $output;
}

function patients_details($patientId){
    include 'connection.php';
    $output ='';
    $sql ="SELECT pom.visitDate,pom.patientId,pom.pulse,pom.bp,pom.weight,pom.height,pm.firstName,pm.surname,ptm.complaint,ptm.diagnosis FROM patient_onassessment_master pom LEFT JOIN patient_master pm ON pm.patientId=pom.patientId LEFT JOIN patient_medication ptm ON ptm.patientId=pom.patientId where pm.patientId = $patientId ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $output.='
        <div class="row">
        <div class="col-md-6">
            <div style="margin-left:550px">
            <strong >Date:</strong>'.$row['visitDate'].'   
            </div><br>
            <strong >Reg No:</strong>'.$row['patientId'].'    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <strong >Name:</strong>'.$row['firstName'].' '.$row['surname'].'    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong >Pulse:</strong>'.$row['pulse'].'     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong >BP:</strong>'.$row['bp'].'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
            <strong >Weight:</strong>'.$row['weight'].'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong >Height:</strong>'.$row['height'].'
        </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-md-6">
    <strong ><u>Clinical Notes:</u></strong>'.$row['complaint'].' <br>
    <strong ><u>Clinical Diagnosis:</u></strong>'.$row['diagnosis'].' 
        </div>
        </div>
        ';
    }
    return $output;

}


$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<link rel="stylesheet" href="dompdf/style.css">
    
</head>

<body>
<style>
.invoice-title h2, .invoice-title h3 {
display: inline-block;
}

.table > tbody > tr > .no-line {
border-top: none;
}

.table > thead > tr > .no-line {
border-bottom: none;
}

.table > tbody > tr > .thick-line {
border-top: 2px solid;
}
</style>
<div class="container">
<div class="row">
    <div class="col-xs-12">
    '.doctor_details(1).'
       
        <hr>
       '.patients_details(1).'
        <div class="row">
            <div class="col-xs-6">
                <address>
                    <strong>Payment Method:</strong><br>
                    Visa ending **** 4242<br>
                    jsmith@email.com
                </address>
            </div>
            <div class="col-xs-6 text-right">
                <address>
                    <strong>Order Date:</strong><br>
                    March 7, 2014<br><br>
                </address>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Order summary</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td>BS-200</td>
                                <td class="text-center">$10.99</td>
                                <td class="text-center">1</td>
                                <td class="text-right">$10.99</td>
                            </tr>
                            <tr>
                                <td>BS-400</td>
                                <td class="text-center">$20.00</td>
                                <td class="text-center">3</td>
                                <td class="text-right">$60.00</td>
                            </tr>
                            <tr>
                                <td>BS-1000</td>
                                <td class="text-center">$600.00</td>
                                <td class="text-center">1</td>
                                <td class="text-right">$600.00</td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right">$670.99</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Shipping</strong></td>
                                <td class="no-line text-right">$15</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right">$685.99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>';
$dompdf->setPaper('A4', 'portrait');
$dompdf->loadHtml($html);

/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);
?>
