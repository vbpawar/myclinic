<?php
include 'connection.php';
$sql="SELECT ADDDATE(CURRENT_DATE, INTERVAL -8 DAY) fromDate,ADDDATE(CURRENT_DATE, INTERVAL -1 DAY) toDate,
 DATE_FORMAT(concat(year(CURRENT_DATE),'-04-1'), '%d-%m-%Y') FinancialYearStart, 
 DATE_FORMAT(concat(year(CURRENT_DATE)+1,'-03-31'), '%d-%m-%Y') FinancialYearEnd";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$fromDate=$row["fromDate"];
$toDate= $row["toDate"];
$FinancialYearStart=$row["FinancialYearStart"];
$FinancialYearEnd= $row["FinancialYearEnd"];
echo ("$FinancialYearStart");
echo ("$FinancialYearEnd");
mysqli_close($conn);
?>
