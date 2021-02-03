<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$categoryRecords = null;
$styleRecord = null;
$substyleRecords = null;
extract($_POST);
if(isset($_POST['fromDate']) && isset($_POST['uptoDate'])){


  $categoryRecords=null;
  $academicQuery = mysqli_query($conn,"SELECT COUNT(pm.patientId) cnt,um.username FROM patient_medication pm 
  LEFT JOIN user_master um on um.userId=pm.doctorId4
   WHERE date(pm.visitDate) BETWEEN '$fromDate' AND '$uptoDate'  GROUP BY pm.doctorId");
     if($academicQuery!=null)
     {
         $academicAffected=mysqli_num_rows($academicQuery);
         if($academicAffected>0)
         {
             while($academicResults = mysqli_fetch_assoc($academicQuery))
                 {
                     $categoryRecords[]=$academicResults;
                 }
         }

     }
     $styleRecord =null;

     $academicQuery = mysqli_query($conn,"SELECT COUNT(sp.patientId) cnt,um.username
      FROM lumbar_spine_assessment sp 
     LEFT JOIN user_master um on um.userId=sp.patientId
      WHERE date(sp.visitDate) BETWEEN '$fromDate' AND '$uptoDate'  GROUP BY sp.patientId");
     if($academicQuery!=null)
     {
         $academicAffected=mysqli_num_rows($academicQuery);
         if($academicAffected>0)
         {
             while($academicResults = mysqli_fetch_assoc($academicQuery))
                 {
                     $styleRecord[]=$academicResults;
                 }
         }

     }

     $substyleRecords =null;
     $academicQuery = mysqli_query($conn,"SELECT COUNT(sp.patientId) cnt,um.username
     FROM low_backpain_questionnaire sp 
    LEFT JOIN user_master um on um.userId=sp.patientId
     WHERE date(sp.visitDate) BETWEEN '$fromDate' AND '$uptoDate'  GROUP BY sp.patientId");
     if($academicQuery!=null)
     {
         $academicAffected=mysqli_num_rows($academicQuery);
         if($academicAffected>0)
         {
             while($academicResults = mysqli_fetch_assoc($academicQuery))
                 {
                     $substyleRecords[]=$academicResults;
                 }
         }

     }

     $response = array('Message' => "Data fetched successfully", "medication" => $categoryRecords,"spine"=>$substyleRecords, "back"=>$styleRecord, 'Responsecode' => 200);
    }
    else{
        $response = array(
            'Message' => "Parameter missing",
            'Responsecode' => 408
        );  
    }
    mysqli_close($conn);
    exit(json_encode($response));
?> 