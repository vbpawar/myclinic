<?php
function auditlog($tablename,$actiontype,$userid,$rowid,$message){
    include '../connection.php';
    $flag = 0;
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO audit_log(tablename	,actiontype,userid,rowid,message,ipaddress) 
     VALUES ('$tablename','$actiontype','$userid','$rowid','$message','$ip')";
    $query = mysqli_query($conn, $sql);
    if ($query != null) {
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $logid  = $conn->insert_id;
        $flag = 1;
    } else {
        $flag = 0;
    }
}else{
    $flag = 0;
}
return $flag;
}
?> 