<?php
$host='localhost';
$user='root';
$pass='';
$db='election';
$con=mysqli_connect($host,$user,$pass,$db);
$n=10;
$ID='CD_05';
$Name='San';
$c=0;
$insert="INSERT INTO `count` (`Num`, `ID`, `Name`, `Count`) VALUES ('$n','$ID','$Name','$c')";
$result=mysqli_query($con,$insert);
echo"Done";
?>