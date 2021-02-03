<?php
session_start();
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
/* reference the Dompdf namespace */

use Dompdf\Dompdf;

/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
extract($_GET);
/*extract($_GET);
$fromDate=($_GET['fromDate']);
$toDate=($_GET['toDate']);*/
$franchiseid = isset($_GET['franchiseid']) ? $_GET['franchiseid']:$_SESSION['franchiseid'];
//****************************************************//
include 'connection.php';
$sql="SELECT ADDDATE(CURRENT_DATE, INTERVAL -8 DAY) fromDate,ADDDATE(CURRENT_DATE, INTERVAL -1 DAY) toDate,
 DATE_FORMAT(concat(year(CURRENT_DATE),'-04-1'), '%Y-%m-%d') FinancialYearStart, 
 DATE_FORMAT(concat(year(CURRENT_DATE)+1,'-03-31'), '%Y-%m-%d') FinancialYearEnd";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$fromDate=$row["fromDate"];
$toDate= $row["toDate"];
$FinancialYearStart=$row["FinancialYearStart"];
$FinancialYearEnd= $row["FinancialYearEnd"];

mysqli_close($conn);
//****************************************************//



function branchSalesSummary($fromDate,$toDate,$franchiseid)
{
    //$date=date_create($fromDate);
    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");


  $output  = '';

    include 'connection.php';
    $sql ="SELECT a.week,a.branchName,
    sum(case when a.flag = 'patient' then a.count else 0 end) patient,
    sum(case when a.flag = 'treat' then a.count else 0 end) treat,
    sum(case when a.flag = 'income' then a.count else 0 end) income
  From
  (SELECT week('$fromDate') week,count(pm.patientId) count,hbm.branchName, 'patient' as flag 
  FROM patient_master pm
  INNER JOIN hospital_branch_master hbm on
  pm.branchId=hbm.branchId
  where pm.createdAt BETWEEN '$fromDate' and '$toDate'  AND hbm.franchiseid = $franchiseid
  group by hbm.branchName,week('$fromDate')
  UNION
  SELECT week('$fromDate') week, COUNT(pm.patientId) count,hb.branchName,'treat' as flag
  FROM patient_medication pm
  INNER join user_master um on 
  um.userId=pm.doctorId
  INNER JOIN hospital_branch_master hb 
  on hb.branchId=um.branchId 
  WHERE pm.visitDate BETWEEN '$fromDate' AND '$toDate' AND hb.franchiseid = $franchiseid
  GROUP by week('$fromDate'),hb.branchName
  UNION
  SELECT week('$fromDate') week,SUM(opm.amount) count,hbm.branchName,'income'as  flag
  FROM opd_payment_transaction_master opm
  inner join opd_patient_payment_master oppm on
  oppm.paymentId=opm.paymentId
  INNER JOIN hospital_branch_master hbm on
  oppm.branchId=hbm.branchId
  where opm.paymentDate BETWEEN ('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
  group by week('$fromDate'),hbm.branchName) a group by a.branchName,a.week";

  $sql2="SELECT a.week,
  sum(case when a.flag = 'patient' then a.count else 0 end) patient,
  sum(case when a.flag = 'treat' then a.count else 0 end) treat,
  sum(case when a.flag = 'income' then a.count else 0 end) income
From
(SELECT week('$fromDate') week,count(pm.patientId) count,hbm.branchName, 'patient' as flag 
FROM patient_master pm
INNER JOIN hospital_branch_master hbm on
pm.branchId=hbm.branchId
where pm.createdAt BETWEEN '$fromDate' and '$toDate' 
group by hbm.branchName,week('$fromDate')
UNION
SELECT week('$fromDate') week, COUNT(pm.patientId) count,hb.branchName,'treat' as flag
FROM patient_medication pm
INNER join user_master um on 
um.userId=pm.doctorId
INNER JOIN hospital_branch_master hb 
on hb.branchId=um.branchId 
WHERE pm.visitDate BETWEEN '$fromDate' AND '$toDate'
GROUP by week('$fromDate'),hb.branchName
UNION
SELECT week('$fromDate') week,SUM(opm.amount) count,hbm.branchName,'income'as  flag
FROM opd_payment_transaction_master opm
inner join opd_patient_payment_master oppm on
oppm.paymentId=opm.paymentId
INNER JOIN hospital_branch_master hbm on
oppm.branchId=hbm.branchId
where opm.paymentDate BETWEEN ('$fromDate') and ('$toDate')
group by week('$fromDate'),hbm.branchName) a group by a.week";

    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
    $CTotal= mysqli_query($conn, $sql2);

    

    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];

            $academicResults2 = mysqli_fetch_assoc($CTotal);          
     
            $output .= '
   
    <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="4" style="background-color: #BB8FCE"><center>Branch Sales Summary</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="4"><center> '.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #D2B4DE ">
                <th>Branch</th> 
                <th># of Patients</th>
                <th># of Treatments</th>
                <th>Income</th>
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
              <td>'.$academicResults['branchName'].'</td>
              <td class="txt">'.$academicResults['patient'].'</td>
              <td class="txt">'.$academicResults['treat'].'</td>
              <td class="txt">'.$academicResults['income'].'</td>
              </tr>';
            }

             
            
            $output .=
            '<tr style="font-weight:bold;background-color: #F4ECF7 ">
            <td>'.'Total'.'</td>
            <td class="txt">'.$academicResults2['patient'].'</td>
            <td class="txt">'.$academicResults2['treat'].'</td>
            <td class="txt">'.$academicResults2['income'].'</td>
            </tr>
           
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}

function procedureConsumptionDetail($fromDate,$toDate,$franchiseid)
{

    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT a.week,a.testName,
    sum(case when a.flag = 'TestCount' then a.count else 0 end) TestCount,
    sum(case when a.flag = 'TestIncome' then a.count else 0 end) TestIncome
  
  From
  
  (SELECT COUNT(bd.testId) count,week('$fromDate') week,tm.testName,'TestCount' as flag 
  FROM  bill_details bd INNER join diagnostic_tests_master
  tm on tm.testId=bd.testId
  Inner join opd_patient_payment_master oppm on
  oppm.paymentId=bd.paymentId
  INNER JOIN hospital_branch_master hbm ON oppm.branchId = hbm.branchId
  WHERE bd.createdAt BETWEEN ('$fromDate') AND ('$toDate') AND hbm.franchiseid = $franchiseid
  GROUP by week('$fromDate'),tm.testName
  
  UNION
  
  SELECT sum(bd.fees) count,week('$fromDate') week,tm.testName,'TestIncome'as flag FROM  bill_details bd 
  INNER JOIN diagnostic_tests_master tm on tm.testId=bd.testId
  Inner join opd_patient_payment_master oppm on
  oppm.paymentId=bd.paymentId
  INNER JOIN hospital_branch_master hbm ON oppm.branchId = hbm.branchId
  WHERE bd.createdAt BETWEEN ('$fromDate') AND ('$toDate') AND hbm.franchiseid = $franchiseid
  GROUP by week('$fromDate'),tm.testName)a GROUP BY a.testName";



    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];

           
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="3" style="background-color: #388E8E"><center>Procedure Consumption Detail</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="3"><center> '.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #64C2C2 ">
                <th></th> 
                <th>Count</th>
                <th>Income</th>
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['testName'].'</td>
            <td class="txt">'.$academicResults['TestCount'].'</td>
            <td class="txt">'.$academicResults['TestIncome'].'</td>
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}

function consultantWiseCollection($fromDate,$toDate,$franchiseid)
{

    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT SUM(opm.amount) amount,week('$fromDate') week, um.username FROM opd_payment_transaction_master opm
    inner join opd_patient_payment_master oppm on
    oppm.paymentId=opm.paymentId
    INNER join user_master UM on
    oppm.doctorId=um.userId
    INNER JOIN hospital_branch_master hbm ON oppm.branchId = hbm.branchId
    where opm.paymentDate BETWEEN('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
    group by week('$fromDate'), um.username";



    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];

            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="2" style="background-color: #8ac026"><center>Consultant Wise Collection Summary</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center>'.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #ccea94 ">
                <th></th> 
                <th>Income</th>
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['username'].'</td>
            <td class="txt">'.$academicResults['amount'].'</td>
            
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}


function patientSummary($fromDate,$toDate,$franchiseid)
{

    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql =" SELECT week('$fromDate') week,count(pm.patientId) count,'New Registered Patients' as flag FROM patient_master pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
        where pm.createdAt BETWEEN ('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
        group by week('$fromDate')
        UNION
        SELECT week('$fromDate') week,COUNT(pm.`patientId`) count,'Existing Patients' as flag FROM `patient_master` pm
        INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
        WHERE pm.`createdAt` < ('$fromDate') AND hbm.franchiseid = $franchiseid
        GROUP BY week('$fromDate')
        UNION
        SELECT week('$fromDate') week,COUNT(ccf.followUp) count,'Call Center Follow Ups' as flag FROM `call_center_followups` ccf
        INNER join call_center cc on
        cc.callId=ccf.callId
        INNER JOIN hospital_branch_master hbm ON hbm.branchId = cc.branchId
        WHERE ccf.followUpDateTime  BETWEEN ('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
        GROUP BY week('$fromDate')
        UNION
         SELECT week('$fromDate') week,count(cc.callId) count, 'Referred Patients' as flag
          FROM `call_center` cc INNER JOIN call_center_patients ccp on ccp.clientId=cc.clientId
          INNER JOIN hospital_branch_master hbm ON hbm.branchId = cc.branchId
           WHERE cc.createdAt BETWEEN ('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
           GROUP by week('$fromDate')
        
        UNION
        SELECT  week('$fromDate') week,count(cc.callId) count,ccp.reference as flag FROM `call_center` cc
        INNER JOIN call_center_patients ccp on
        ccp.clientId=cc.clientId
        INNER JOIN hospital_branch_master hbm ON hbm.branchId = cc.branchId
         WHERE cc.createdAt BETWEEN ('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
        GROUP by ccp.reference ,week('$fromDate')";



    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];

                     
   
           
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="2" style="background-color: #CD8500"><center>Patient Summary</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center> '.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #FFD588 ">
                <th></th> 
                <th>Count</th>
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['flag'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
           
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}

function packageProcedureConsumptionSummary($fromDate,$toDate,$franchiseid)
{

    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT a.week,
    sum(case when a.flag = 'pkcCnt' then a.count else 0 end) ccount,
    sum(case when a.flag = 'pkgIncome' then a.count else 0 end) result,
    'Package Sales' as details
  From
(SELECT week('$fromDate') week,count(oppm.packageId) count,'pkcCnt' as flag FROM opd_patient_payment_master oppm
 INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where oppm.createdAt BETWEEN('$fromDate') and ('$toDate') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('$fromDate')
    UNION
    SELECT week('$fromDate') week,sum(bd.fees) count,'pkgIncome' as flag FROM opd_patient_payment_master oppm
    inner join bill_details bd on
    oppm.paymentId=bd.paymentId
 INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where bd.createdAt BETWEEN('$fromDate') and ('$toDate') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('$fromDate')) a GROUP BY a.week
    
    UNION
    SELECT b.week,
     sum(case when b.flag = 'testCnt' then b.count else 0 end) testCnt,
    sum(case when b.flag = 'testIncome' then b.count else 0 end) testIncome,
    'Procedure Sales' as details
  From
   ( SELECT week('$fromDate') week,count(bd.testId) count,'testCnt' as flag FROM opd_patient_payment_master oppm
    inner join bill_details bd on
    oppm.paymentId=bd.paymentId
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where bd.createdAt BETWEEN('$fromDate') and ('$toDate') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('$fromDate')
    UNION
    SELECT week('$fromDate') week,sum(bd.fees) count,'testIncome' as flag FROM opd_patient_payment_master oppm
    inner join bill_details bd on
    oppm.paymentId=bd.paymentId
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where bd.createdAt BETWEEN('$fromDate') and ('$toDate') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('$fromDate'))b GROUP by b.week";



    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];
         
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="3" style="background-color: #388E8E"><center>Package & Procedure Consumption Summary</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="3"><center>'.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #64C2C2 ">
                <th></th> 
                <th>Count</th>
                <th>Income</th>
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['details'].'</td>
            <td class="txt">'.$academicResults['ccount'].'</td>
            <td class="txt">'.$academicResults['result'].'</td>
           
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}
function packageConsumptionDetail($fromDate,$toDate,$franchiseid)
{

    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT a.week,a.title,a.count,b.income from
    (SELECT week('$fromDate') week,pm.title,count(oppm.packageId) count,'pkcCnt' as flag FROM opd_patient_payment_master oppm
    INNER join package_master pm on 
    pm.packageId=oppm.packageId
     INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where oppm.createdAt BETWEEN('$fromDate') and ('$toDate') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('$fromDate'),pm.title) a
    
    inner join 
    
    (SELECT week('$fromDate'),pm.title,sum(oppm.total) income,'pkgIncome' as flag FROM opd_patient_payment_master oppm
    INNER join package_master pm on 
    pm.packageId=oppm.packageId
          INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where oppm.createdAt BETWEEN('$fromDate') and ('$toDate') and oppm.isPackage=1 AND hbm.franchiseid =$franchiseid
    group by week('$fromDate'),pm.title) b
    on a.title=b.title";



    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];
         
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="3" style="background-color: #388E8E"><center>Package Consumption Detail</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="3"><center> '.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #64C2C2 ">
                <th></th> 
                <th>Count</th>
                <th>Income</th>
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['title'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
            <td class="txt">'.$academicResults['income'].'</td>
           
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}

function dayWisePatientCount($fromDate,$toDate,$franchiseid)
{

    $fd=date_format(date_create($fromDate),"d-M-Y");
    $td=date_format(date_create($toDate),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="ELECT week('$fromDate') week,COUNT(pm.patientId) count,
    DATE_FORMAT(pm.lastVisitDate, '%d-%b-%Y') date FROM patient_master pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    where pm.lastVisitDate BETWEEN('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
    GROUP BY date(pm.lastVisitDate)";

    $jobQuery  = mysqli_query($conn, $sql);
    // $WeekData= mysqli_query($conn, $sql);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
            // $academicResults1 = mysqli_fetch_assoc($WeekData);          
            // $Week = $academicResults1['week'];
         
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="2" style="background-color: #CD8500"><center>Day Wise Patient Count</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center> '.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #FFD588 ">
                <th></th> 
                <th>Count</th>
              
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['date'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}

function newPatientAcquisitionTrend($FinancialYearStart,$FinancialYearEnd,$franchiseid)
{
  $fd=date_format(date_create($FinancialYearStart),"d-M-Y");
  $td=date_format(date_create($FinancialYearEnd),"d-M-Y");
    $output  = '';
    include 'connection.php';
    
    $sql ="SELECT  CONCAT('week',' ',week(pm.createdAt)) week,COUNT(pm.patientId) count FROM patient_master pm 
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    WHERE (pm.createdAt) >= '$FinancialYearStart' and (pm.createdAt) <= '$FinancialYearEnd' AND hbm.franchiseid =$franchiseid
    GROUP BY week(pm.createdAt)";

   

    $jobQuery  = mysqli_query($conn, $sql);

  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
          
         
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="2" style="background-color: #CD8500"><center>New Patient Acquisition Trend (New patients registered every week)</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center>'.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #FFD588 ">
                <th></th> 
                <th>Count</th>
              
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['week'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
        
           
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}
function patientDropoutTrend($FinancialYearStart,$FinancialYearEnd,$franchiseid)
{
    $fd=date_format(date_create($FinancialYearStart),"d-M-Y");
    $td=date_format(date_create($FinancialYearEnd),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT COUNT(pm.patientId) count,CONCAT('week',' ',week(pm.`firstVisitDate`)) week 
    FROM patient_master pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
      WHERE   pm.firstVisitDate=pm.lastVisitDate and pm.nextVisitDate < CURRENT_DATE
       AND  (pm.firstVisitDate) >= '$FinancialYearStart' and (pm.firstVisitDate) <= '$FinancialYearEnd' AND hbm.franchiseid = $franchiseid
       group by week(pm.`firstVisitDate`)";

    $jobQuery  = mysqli_query($conn, $sql);
  
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
           
         
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="2" style="background-color: #CD8500"><center>Patient Dropout Trend (Single Visit Patients – came once and never returned)</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center>'.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #FFD588 ">
                <th></th> 
                <th>Count</th>
              
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['week'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
        
           
              </tr>';
            }

            $output .='
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}

function StaffAllocation($franchiseid)
{
    
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT COUNT(um.userId) count,hb.branchName FROM `user_master` um
    INNER JOIN hospital_branch_master hb
    on hb.branchId=um.branchId WHERE hb.franchiseid = $franchiseid
    GROUP BY hb.branchId";

    $sql2="SELECT 
    sum(case when a.flag = 'total' then a.count else 0 end) total
   
  From
  (SELECT COUNT(um.userId) count,hb.branchName,'total' as flag FROM `user_master` um
      INNER JOIN hospital_branch_master hb
      on hb.branchId=um.branchId
      WHERE hb.franchiseid = $franchiseid
      GROUP BY hb.branchId) a";

    $jobQuery  = mysqli_query($conn, $sql);
    $total= mysqli_query($conn ,$sql2);
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
          $academicResults3 = mysqli_fetch_assoc($total);
        
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                  
                    <th colspan="2" style="background-color: #A5ABAA"><center>Staff Allocation</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center>BY Center</center></th>
     
                    </tr>
                <tr style="background-color: #DAE1E0  ">
                <th></th> 
                <th>Count</th>
              
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['branchName'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
        
           
              </tr>';
            }

            $output .='
            <tr style="font-weight:bold;background-color: #EBF3F2 ">
            <td>'.'Total'.'</td>
            <td class="txt">'.$academicResults3['total'].'</td>
        
                      </tr>
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}
function peakVolumeDay($FinancialYearStart,$FinancialYearEnd,$franchiseid)
{
  $fd=date_format(date_create($FinancialYearStart),"d-M-Y");
  $td=date_format(date_create($FinancialYearEnd),"d-M-Y");
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT COUNT(pm.patientId) count,DAYNAME(pm.createdAt) day FROM `patient_master` pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    WHERE (pm.`createdAt`) >= '$FinancialYearStart' and (pm.`createdAt`) <= '$FinancialYearEnd' AND hbm.franchiseid =$franchiseid
        GROUP by DAYNAME(pm.createdAt)";

  
    $jobQuery  = mysqli_query($conn, $sql);
    
  

        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            
         
        
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                    
                    <th colspan="2" style="background-color:#A5ABAA"><center>Peak Volume Day (Total Patients)</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center>'.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #DAE1E0 ">
                <th></th> 
                <th>Count</th>
              
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['day'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
        
           
              </tr>';
            }

            $output .='
        
            </tbody>
          </table>
            ';   
        }
    }
    mysqli_close($conn);
    return $output;
}
function peakVolumeHour($FinancialYearStart,$FinancialYearEnd,$franchiseid)
{
  $fd=date_format(date_create($FinancialYearStart),"d-M-Y");
  $td=date_format(date_create($FinancialYearEnd),"d-M-Y"); 
  $output  = '';
    include 'connection.php';
    
    $sql ="SELECT COUNT(PatientID)count,Bucket
    FROM
    (Select 
           case 
               when a. AMPM='PM' and a.Hour =12 and Min <= 59    then '12PM  - 1PM'
               when a. AMPM='PM' and a.Hour =1 and Min <= 59     then '1PM    - 2PM'
               when a. AMPM='PM' and a.Hour =2 and Min <= 59     then '2PM    - 3PM'
               when a. AMPM='PM' and a.Hour =3 and Min <= 59     then '3PM    - 4PM'
               when a. AMPM='PM' and a.Hour =4 and Min <= 59     then '4PM    - 5PM'
               when a. AMPM='PM' and a.Hour =5 and Min <= 59     then '5PM    - 6PM'
               when a. AMPM='PM' and a.Hour =6 and Min <= 59     then '6PM    - 7PM'
               when a. AMPM='PM' and a.Hour =7 and Min <= 59     then '7PM    - 8PM'
               when a. AMPM='PM' and a.Hour =8 and Min <= 59     then '8PM    - 9PM'
               when a. AMPM='PM' and a.Hour =9 and Min <= 59     then '9PM    - 10PM'
               when a. AMPM='PM' and a.Hour =10 and Min <= 59    then '10PM   - 11PM'
               when a. AMPM='PM' and a.Hour =11 and Min <= 59    then '11PM   - 12AM'
               when a. AMPM='AM' and a.Hour =12 and Min <= 59    then '12AM   - 1AM'
               when a. AMPM='AM' and a.Hour =1 and Min <= 59     then '1AM    - 2AM'
               when a. AMPM='AM' and a.Hour =2 and Min <= 59     then '2AM    - 3AM'
               when a. AMPM='AM' and a.Hour =3 and Min <= 59     then '3AM    - 4AM'
               when a. AMPM='AM' and a.Hour =4 and Min <= 59     then '4AM    - 5AM'
               when a. AMPM='AM' and a.Hour =5 and Min <= 59     then '5AM    - 6AM'
               when a. AMPM='AM' and a.Hour =6 and Min <= 59     then '6AM    - 7AM'
               when a. AMPM='AM' and a.Hour =7 and Min <= 59     then '7AM    - 8AM'
               when a. AMPM='AM' and a.Hour =8 and Min <= 59     then '8AM    - 9AM'
               when a. AMPM='AM' and a.Hour =9 and Min <= 59     then '9AM    - 10AM'
               when a. AMPM='AM' and a.Hour =10 and Min <= 59    then '10AM   - 11AM'
               when a. AMPM='AM' and a.Hour =11 and Min <= 59    then '11AM   - 12PM'
               
               end Bucket,
           PatientID
                
    
    from
    (SELECT pm.patientId PatientID,DATE_FORMAT(pm.createdAt, '%d %m %Y') Date,
    TIME_FORMAT(pm.createdAt, '%h %i %s %p') Time,
    TIME_FORMAT(pm.createdAt, '%h') Hour,
    TIME_FORMAT(pm.createdAt, '%i') Min,
    TIME_FORMAT(pm.createdAt, '%p') AMPM
    FROM `patient_master` pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    WHERE (pm.`createdAt`) >= '$FinancialYearStart' and (pm.`createdAt`) <= '$FinancialYearEnd' AND hbm.franchiseid =$franchiseid
    )a)b GROUP  BY b.Bucket";

  
    $jobQuery  = mysqli_query($conn, $sql);
   
        if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
   
            $output .= '
                        
       <table id="BSS" class="table table-bordered">

                    <tr>
                    
                    <th colspan="2" style="background-color:#A5ABAA"><center>Peak Volume Hour  (Total Patients)</center></th> 
  
                    </tr>
                    <tr>
                        <th colspan="2"><center>'.$fd.' to '.$td.'</center></th>
     
                    </tr>
                <tr style="background-color: #DAE1E0 ">
                <th></th> 
                <th>Count</th>
              
                </tr>   
        <tbody>';

            while($academicResults = mysqli_fetch_assoc($jobQuery)){
                      
                
            $output .= '<tr>
            <td>'.$academicResults['Bucket'].'</td>
            <td class="txt">'.$academicResults['count'].'</td>
        
           
              </tr>';
            }

            $output .='
        
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
  <style>
  .txt{
      text-align:right;
  }
  </style>
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
                                     
                                    </div>
                                    <div class="col-md-2"></div>

                                </div>
                                <div class="card-body template-demo">
                                    <div class="row">
                                    
                                   '.branchSalesSummary($fromDate,$toDate,$franchiseid).'
                                    </div>
                                    
                                    <div class="row">
                                    '.packageProcedureConsumptionSummary($fromDate,$toDate,$franchiseid).'
                                     </div>

                                     <div class="row">
                                     '.packageConsumptionDetail($fromDate,$toDate,$franchiseid).'
                                      </div>

                                    <div class="row">
                                    '.procedureConsumptionDetail($fromDate,$toDate,$franchiseid).'
                                     </div>

                                     <div class="row">
                                     '.consultantWiseCollection($fromDate,$toDate,$franchiseid).'
                                      </div>
                                      
                                     <div class="row">
                                     '.patientSummary($fromDate,$toDate,$franchiseid).'
                                      </div>

                                      <div class="row">
                                      '.dayWisePatientCount($fromDate,$toDate,$franchiseid).'
                                       </div>

                                       <div class="row">
                                      '.newPatientAcquisitionTrend($FinancialYearStart,$FinancialYearEnd,$franchiseid).'
                                       </div>
                                      
                                       
                                       <div class="row">
                                      '.patientDropoutTrend($FinancialYearStart,$FinancialYearEnd,$franchiseid).'
                                       </div>
                                       <div class="row">
                                      '.StaffAllocation($franchiseid).'
                                       </div>
                                       <div class="row">
                                       '.peakVolumeDay($FinancialYearStart,$FinancialYearEnd,$franchiseid).'
                                        </div>
                                        <div class="row">
                                        '.peakVolumeHour($FinancialYearStart,$FinancialYearEnd,$franchiseid).'
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