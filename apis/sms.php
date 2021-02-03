<?php
$nextVisit = "2020-09-06";
$date = date_create($nextVisit);
$date=  date_format($date,"YmdHi");
echo $date;
?>