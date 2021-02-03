<?php
function get_witals($bp,$temp, $spo2, $pulse, $height, $weight, $west, $hip, $patientId, $visitDate,$doctorId)
{
    include "../connection.php";
    $sql      = "SELECT * FROM patient_onassessment_master pom WHERE pom.patientId = $patientId AND pom.visitDate = '$visitDate'";
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $update = "UPDATE patient_onassessment_master SET doctorId=$doctorId, bp='$bp',pulse = '$pulse',spo2='$spo2',temperature='$temp',weight='$weight',waist='$west',
       height = '$height',hip='$hip' WHERE patientId = $patientId AND visitDate = '$visitDate'";
            mysqli_query($conn, $update);
            return 1;
        } else {
            $insert = "INSERT INTO patient_onassessment_master(doctorId,bp,pulse,spo2,temperature,weight,waist,height,hip,patientId,visitDate) 
        VALUES($doctorId,'$bp','$pulse','$spo2','$temp','$weight','$west','$height','$hip',$patientId,'$visitDate')";
            mysqli_query($conn, $insert);
            return 1;
        }
    } else {
        return 0;
    }
    return;
}
?> 