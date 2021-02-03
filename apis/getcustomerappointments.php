<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['branchid']) && isset($_POST['role'])){
    if($role == 9 || $role == 5){
        $sql = "SELECT pd.appointmentId,pm.firstName,pm.surname,pd.scheduledBy,um.username,DATE(pd.appointmentDate) apdate,DATE_FORMAT(pd.appointmentDate,'%a,%d-%M-%y,%h:%i:%s') appointmentdate,fm.franchisename,hp.branchName
        FROM patient_doctor_appointment_scheduling pd INNER JOIN patient_master pm ON pm.patientId = pd.patientId INNER JOIN user_master um ON um.userId = pd.doctorId
        INNER JOIN hospital_branch_master hp ON hp.branchId = um.branchId INNER JOIN franchise_master fm ON fm.franchiseid = hp.franchiseid
        WHERE DATE(pd.appointmentDate) >= CURRENT_DATE ORDER BY DATE(pd.appointmentDate) ASC";
    }else if($role == 6 || $role == 8){
       $sql = "SELECT pd.appointmentId,pm.firstName,pm.surname,pd.scheduledBy,um.username,DATE(pd.appointmentDate) apdate,DATE_FORMAT(pd.appointmentDate,'%a,%d-%M-%y,%h:%i:%s') appointmentdate,fm.franchisename,hp.branchName FROM patient_doctor_appointment_scheduling pd 
       INNER JOIN patient_master pm ON pm.patientId = pd.patientId INNER JOIN user_master um ON um.userId = pd.doctorId 
       INNER JOIN hospital_branch_master hp ON hp.branchId = um.branchId INNER JOIN franchise_master fm ON fm.franchiseid = hp.franchiseid WHERE hp.franchiseid = $franchiseid AND DATE(pd.appointmentDate) >= CURRENT_DATE ORDER BY DATE(pd.appointmentDate) ASC";

    }else{
        $sql = "SELECT pd.appointmentId,pm.firstName,pm.surname,pd.scheduledBy,um.username,DATE(pd.appointmentDate) apdate,DATE_FORMAT(pd.appointmentDate,'%a,%d-%M-%y,%h:%i:%s') appointmentdate,fm.franchisename,hp.branchName
        FROM patient_doctor_appointment_scheduling pd INNER JOIN patient_master pm ON pm.patientId = pd.patientId INNER JOIN user_master um ON um.userId = pd.doctorId
        INNER JOIN hospital_branch_master hp ON hp.branchId = um.branchId INNER JOIN franchise_master fm ON fm.franchiseid = hp.franchiseid
        WHERE um.branchId = $branchid AND DATE(pd.appointmentDate) >= CURRENT_DATE ORDER BY DATE(pd.appointmentDate) ASC";
    }

$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        $response = array(
            'Message' => "All log Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Please Logout and login again",
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