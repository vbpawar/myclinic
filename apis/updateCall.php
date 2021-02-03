<?php
function updateCall($data){
    include '../connection.php';
    $response = null;
extract($data);
if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['birthdate']) && isset($_POST['gender']) && isset($_POST['mobile']) && isset($_POST['city']) && isset($_POST['state'])) {
    $middleName            = isset($_POST['middleName']) ? $_POST['middleName'] : 'NULL';
    $email                 = isset($_POST['emailId']) ? $_POST['emailId'] : 'NULL';
    $landline              = isset($_POST['landline']) ? $_POST['landline'] : 'NULL';
    $nearByArea            = isset($_POST['nearByArea']) ? $_POST['nearByArea'] : 'NULL';
    $country               = isset($_POST['country']) ? $_POST['country'] : 'NULL';
    $pincode               = isset($_POST['zipcode']) ? $_POST['zipcode'] : 'NULL';
    $reference             = isset($_POST['reference']) ? $_POST['reference'] : 'NULL';

    $sql = "UPDATE call_center_patients SET firstName = '$firstName',middleName = '$middleName',lastName = '$lastName',email='$email',
    mobile = '$mobile' ,landline ='$landline' ,nearByArea = '$nearByArea',city = '$city',state = '$state',country = '$country',
    pincode = '$pincode',reference = '$reference',gender = '$gender',dateOfBirth = '$birthdate' WHERE mobile = '$mobile'";
    $query = mysqli_query($conn, $sql);
    
    if ($query !=  null) {
        $rowsAffected = mysqli_affected_rows($conn);
        if($rowsAffected > 0){
            $response = 1;
        }else{
            $response = 0;
        }  
    } else {
        $response = 0;
    }
}else{
    $response = 0;
}
return $response;
}
?> 