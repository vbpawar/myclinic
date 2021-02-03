<?php
header('Content-Type: application/json');
function addPatientCall($data){
    include '../connection.php';
    $response = null;
extract($data);

    
if (isset($_POST['firstName']) && isset($_POST['lastName']) &&
 isset($_POST['birthdate']) && isset($_POST['gender']) && isset($_POST['mobile']) 
 && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['branchId'])) {
    
    
    $sql = "INSERT INTO patient_master (firstName,surname,gender,birthdate,
    mobile1,city,state,branchId) 
     VALUES ('$firstName', '$lastName', '$gender', '$birthdate',
         '$mobile','$city' ,'$state','$branchId')";
        
    $query = mysqli_query($conn, $sql);
    
    $response=1;
    
    
}else{
    $response = 0;
}
return $response;
}
?> 