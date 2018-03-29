<?php

$host='localhost';
$user='root';
$pass='';
$db='election';
$con=mysqli_connect($host,$user,$pass,$db);
if($con)
{
$fetch="SELECT * from candi";
$result=mysqli_query($con,$fetch);
$n=mysqli_num_rows($result);
$n=$n+1;
$Name=$_POST['Name'];
$Party=$_POST['Party'];
$ID=$_POST['ID'];
$Area=$_POST['Area'];
$c=0;
$insert="INSERT INTO candi(Num,ID,Name,Party,Area) values ('$n','$ID','$Name','$Party','$Area')";
$result=mysqli_query($con,$insert);
$insert="INSERT INTO `count` (`Num`, `ID`, `Name`, `Party`, `Count`) VALUES ('$n','$ID','$Name','$Party','$c')";
$result=mysqli_query($con,$insert);
echo"Successfully Registered";
}
?>