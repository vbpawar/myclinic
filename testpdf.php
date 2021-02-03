<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';

/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();


function patientsDetails($paymentId){
    $output='';
    include 'connection.php';
    $sql= "SELECT opdm.recieptId,pm.firstName,pm.middleName,pm.surname,opdm.visitDate,pm.mobile1,pm.address From opd_patient_payment_master  opdm  Left Join patient_master  pm ON pm.patientId = opdm.patientId WHERE opdm.paymentId=$paymentId";
    $query=mysqli_query($conn,$sql);
    if($query!=null){
        $affected=mysqli_num_rows($query);
        if($affected>0){
            $result=mysqli_fetch_assoc($query);
            $output.='
            <div class="row">
            <div class="col-md-12">
                <address>
                <strong>Receipt No: </strong>'.$result['recieptId'].'
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Date: </strong>'.$result['visitDate'].'<br>
             
                <strong>Name: </strong>'.$result['firstName'].' '.$result['middleName'].' '.$result['surname'].'
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Cell No: </strong>'.$result['mobile1'].'
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        &nbsp;&nbsp;&nbsp;                                                                                                                    
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Address: </strong>'.$result['address'].'
              </address>
            </div>   
        </div>
  
        ';
        }
    }
    return $output;
}

function billDetails($paymentId){
    $output='';
    include 'connection.php';
    $sql="SELECT bd.feesType,bd.fees,opdm.originalAmt,opdm.total,opdm.pending,opdm.discount from opd_patient_payment_master  opdm  LEFT JOIN  Bill_Details bd on bd.paymentId = opdm.paymentId 
    WHERE opdm.paymentId =  $paymentId";
    $query=mysqli_query($conn,$sql);
    if($query!=null){
        $total =0;$discount=0;$originalAmt=0;$pending=0;
        $affected=mysqli_num_rows($query);
        
        if($affected >0){
          $result=mysqli_fetch_assoc($query);
          
            $output.='
            <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong >Receipt Details</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Type</strong></td>
                                <td class="text-center"><strong>Fees</strong></td>
                             
                               
                            </tr>
                        </thead>
                        <tbody>';
                        $output .= '
                            <tr>
                                <td>'.$result['feesType'].'</td>
                                <td class="text-center">'.$result['fees'].'</td>
                               
                            </tr>';
          
          $output .= '      
                            <tr>
                                
                                <td class="thick-line text-right"><strong>Total</strong></td>
                                <td class="thick-line text-center">'.$result['fees'].'</td>
                            </tr>';

                               
          $output .= '      
          <tr>
              
              <td class=" text-right"><strong>Original Amount</strong></td>
              <td class=" text-center">'.$result['originalAmt'].'</td>
          </tr>';
          $output .= '      
        
          <tr>
              
          <td class=" text-right"><strong>Discount</strong></td>
          <td class=" text-center">'.$result['discount'].'</td>
      </tr>'
            ;
          $output .= ' <tr>     
          <td class=" text-right"><strong>Pending Amount</strong></td>
              <td class=" text-center">'.$result['pending'].'</td>
          </tr>
                         
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            ';
        }
    }
    return $output;
}
$html = 
'<link rel="stylesheet" href="dompdf/style.css">
<head>
    <title> Reciept</title>
   
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
        <div class="invoice-title" style="margin-left:80px">
            <h3>S.No.46,Vartak Pride,D.P.Road,Karvenagr,Pune-411004</h3><br>
            <img class="img-fluid " src="img/web.jpg"  height="10%" width="10% ">www.aloha.com
        </div>
       
       
        <hr>
        <h4 class="text-center">Receipt</h4>
        '. patientsDetails(1).'

         
   
       
    </div>
</div>
'.billDetails(1).'

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
