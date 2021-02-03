<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
$medication = null;
$presMedication = null;
$tempMedicines = null;
extract($_POST);
if(isset($_POST['patientId'])){
$sql = "SELECT pm.patientId,pm.visitDate,pm.nextVisitDate,pm.complaint,pm.advice,pm.diagnosis,pm.doctorId,hm.branchName,um.username
FROM patient_medication pm INNER JOIN user_master um ON um.userId = pm.doctorId 
LEFT JOIN hospital_branch_master hm ON hm.branchId = um.branchId WHERE pm.patientId  = $patientId ORDER BY pm.visitDate DESC";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $medication = $academicResults;
            $visitDate = $academicResults['visitDate'];

            $presMedication = null;
            $query = "SELECT * FROM patient_prescription_medicine pm WHERE pm.patientId = $patientId AND pm.visitDate = '$visitDate'";
            $jobQuery_1 = mysqli_query($conn, $query);
            if ($jobQuery_1 != null) {
                $academicAffected_1 = mysqli_num_rows($jobQuery_1);
                if ($academicAffected_1 > 0) {
                    while ($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)) {
                        $presMedication[] = $academicResults_1;
                    }
                }
            }
            $temparray =  array("medicines"=> $presMedication);
            $tempMedicines =  array_merge($medication,$temparray);	
            $records[] = $tempMedicines;

        }
        $response = array(
            'Message' => "All medication Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "no data found",
            "Data" => $records,
            'Responsecode' => 202
        );
    }
}else{
    $response = array(
        'Message' => mysqli_error($conn),
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
}else{
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 404
    );  
}
mysqli_close($conn);
exit(json_encode($response));
?> 