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
  $academicQuery = mysqli_query($conn,"SELECT count(cc.callId) cnt1, c.name from call_center cc left JOIN call_center_patients ccp on cc.clientId=ccp.clientId left JOIN cities c on ccp.city=c.id
   where date(cc.appointmentDate) BETWEEN '$fromDate' AND '$uptoDate'  group BY c.name");
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

     $academicQuery = mysqli_query($conn,"SELECT count(cc.callId) cnt2, c.name from call_center cc left JOIN call_center_patients ccp on
                  cc.clientId=ccp.clientId left JOIN states c on ccp.state=c.id where date(cc.appointmentDate) BETWEEN '$fromDate' AND '$uptoDate'  group BY c.name");
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
     $academicQuery = mysqli_query($conn,"SELECT count(cc.callId) cnt3, c.name from call_center cc
                 left JOIN call_center_patients ccp on cc.clientId=ccp.clientId left JOIN countries c on 
     ccp.country=c.id where date(cc.appointmentDate) BETWEEN '$fromDate' AND '$uptoDate'  group BY c.name");
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

     $response = array('Message' => "Data fetched successfully", "city" => $categoryRecords,"Country"=>$substyleRecords, "State"=>$styleRecord, 'Responsecode' => 200);
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