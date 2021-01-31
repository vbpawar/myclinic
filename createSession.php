<?php
extract($_GET);
if(isset($_GET['page']) && isset($_GET['franchiseid']) && isset($_GET['userId']) && isset($_GET['branchId']) && isset($_GET['username']) && isset($_GET['role']) && isset($_GET['roleName'])){
    session_start();
    $_SESSION['userId'] = $userId;
    $_SESSION['branchId'] = $branchId;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $_SESSION['roleName'] = $roleName;
    $_SESSION['franchiseid'] = $franchiseid;
    $_SESSION['company'] = 'Soulsoft';
    $_SESSION['hospital'] = 'Myclinic';
    $_SESSION['favicon'] = 'temp-icon.png';
    $page = $page;
header('Location:'.$page);
}else{
    header('Location:index.php');
}
?>