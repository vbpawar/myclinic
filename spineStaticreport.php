<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();

extract($_POST);
$fromDate = '2020-03-16';
$uptoDate = '2020-03-25';



function patientDetails()
{
  $output  = '';
    include 'connection.php';
    $sql ="SELECT a.week,a.branchName,
  sum(case when a.flag = 'patient' then a.count else 0 end) patien,
  sum(case when a.flag = 'treat' then a.count else 0 end) treat,
  sum(case when a.flag = 'income' then a.count else 0 end) income
From
(SELECT week(pm.createdAt ) week,count(pm.patientId) count,hbm.branchName, 'patient' as flag 
FROM patient_master pm
INNER JOIN hospital_branch_master hbm on
pm.branchId=hbm.branchId
where pm.createdAt 
group by hbm.branchName,week(pm.createdAt )
UNION
SELECT week(pm.visitDate) week, COUNT(pm.patientId) count,hb.branchName,'treat' as flag
FROM patient_medication pm
INNER join user_master um on 
um.userId=pm.doctorId
INNER JOIN hospital_branch_master hb 
on hb.branchId=um.branchId 
WHERE pm.visitDate 
GROUP by week(pm.visitDate),hb.branchName
UNION
SELECT week(opm.paymentDate ) week,SUM(opm.amount) count,hbm.branchName,'income'as  flag
FROM opd_payment_transaction_master opm
inner join opd_patient_payment_master oppm on
oppm.paymentId=opm.paymentId
INNER JOIN hospital_branch_master hbm on
oppm.branchId=hbm.branchId
where opm.paymentDate 
group by week(opm.paymentDate ),hbm.branchName) a";

    $jobQuery  = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
          

            $branch = $academicResults['branchName'];
            $patientCnt = $academicResults['patien'];
            $cDate = $academicResults['cdate'];
            $treatCnt = $academicResults['treat'];
            $income = $academicResults['income'];
            $output .= '
            <table class="table" >
            <thead>
              <tr>
                  
                <th colspan="4"><center>Branch Sale Summary</center></th> 
              
              </tr>
              <tr>
                <th colspan="4"><center>Week '.$cDate.' :</center></th>
                 
              </tr>
            </thead>
        <thead>
              <tr>
                <th>Branch</th> 
                <th>Patient</th>
                <th>Treatments</th>
                <th>Income</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <th>'.$branch.'</th> 
               <th>'.$patientCnt.'</th>
               <th>'.$treatCnt.'</th>
               <th>'.$income.'</th>
              </tr>
            
            
            </tbody>
          </table>
            ';
        }
    }
    mysqli_close($conn);
    return $output;
}



$html = '<link rel="stylesheet" href="dompdf/style.css">
<head>
    <title>Payment Reciept</title>
</head>

<body>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <img class="img-fluid" src="img/auth/mybrand.png" width="40% " height="30%">
                                    </div>
                                    <div class="col-md-4">
                                       <h3>Management Summary Report</h3>
                                    </div>
                                    <div class="col-md-2"></div>

                                </div>
                                <div class="card-body template-demo">
                                    <div class="row">
                                       '.patientDetails().'
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

</body>

</html>';
set_time_limit(600);
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();

/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("report.pdf", array(
    "Attachment" => false
));
exit(0);
?> 