<?php
include "connection.php";
$visitDate = date('y-m-d');
$records = null;
$sql = "SELECT * FROM  patient_feedback WHERE patientid=211 AND visitdate='$visitDate'";
$academicQuery = mysqli_query($conn, $sql);

   if ($academicQuery != null) {
       $academicAffected = mysqli_num_rows($academicQuery);
       if ($academicAffected > 0) {
           $academicResults = mysqli_fetch_assoc($academicQuery);
           $records         = $academicResults;
       }
   }
if($records !=null){
   $tdata = $records['tdata'];
   $someArray = json_decode($tdata, true);
   $column = '';
   $column .='<table border="1"> <caption>(Kindly mark the appropriate columns)</caption>';
   $column .='<tr><th>CRITERIA</th><th>1 DOES NOT APPLY</th><th>2 POOR</th><th>3 FAIR</th><th>4 GOOD</th><th>5 EXCELLENT</th></tr>';
   $lenth = count($someArray);
   $arr = ['AMBIENCE', 'RECEPTION HOSPITALITY', 'PHYSIOTHERAPIST', 'ASSESSMENT & COUNSELLING', 'ACCESSIBILITY'];
   for($i=0;$i<$lenth;$i++){
       $column .='<tr>';
       $column .=' <th scope="row">'. $arr[$i] .'</th>';
       if ($someArray[$i]['apply'] > 0) {
        $column .='<td>'.$someArray[$i]['apply'].'</td>';
    } else {
        $column .='<td></td>';
    }
    if ($someArray[$i]['poor'] > 0) {
        $column .='<td>'.$someArray[$i]['poor'].'</td>';
    } else {
        $column .='<td></td>';
    }
    if ($someArray[$i]['fair'] > 0) {
        $column .='<td>'.$someArray[$i]['fair'].'</td>';
    } else {
        $column .='<td></td>';
    }
    if ($someArray[$i]['good'] > 0) {
        $column .='<td>'.$someArray[$i]['good'].'</td>';
    } else {
        $column .='<td></td>';
    }
    if ($someArray[$i]['excel'] > 0) {
        $column .='<td>'.$someArray[$i]['excel'].'</td>';
    } else {
        $column .='<td></td>';
    }
    $column .= '</tr>';
   }
   $column .='</table>';
}
?>