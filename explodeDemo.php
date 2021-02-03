<?php 
include 'connection.php';
$records = null;
$patientId = 502;
$output = '';
$sql = "SELECT opm.patientId,opm.billDetails,opm.total,opm.pending,pm.firstName,pm.surname,pm.mobile1 
FROM opd_patient_payment_master opm LEFT JOIN patient_master pm ON pm.patientId = opm.patientId
WHERE opm.paymentId =  $patientId";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        $academicResults = mysqli_fetch_assoc($jobQuery);
            $records = $academicResults;
            $str = explode(';',$academicResults['billDetails']);
    for($i=0;$i<count($str);$i++){
        $output .=  '<table style="width:100%">
        <tr>
          <th style="font-weight: normal;">'.$str[$i].'</th>
          <td>1500.0</td>
        </tr>';
    } 
    $output .= '<tr>
    <th>Payable Amount</th>
    <td>3000.0.0</td>
  </tr>
</table>';
    }
}
echo $output;
?>