<?php
function nextVisit($patientId, $nextvisitDate)
{
    include "../connection.php";
    $sql      = "UPDATE patient_master SET nextVisitDate ='$nextvisitDate' WHERE patientId = $patientId";
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_affected_rows($conn);
        if ($academicAffected > 0) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
    return;
}
?> 