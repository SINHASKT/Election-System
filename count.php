<html>
<head><title>count</title>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

<?php
$host='localhost';
$user='root';
$pass='';
$db='election';
$con=mysqli_connect($host,$user,$pass,$db);
if($con)
{
$fetch="SELECT * from count";
$result=mysqli_query($con,$fetch);
$n=mysqli_num_rows($result);
echo"<h1>Results</h1>";
echo"<table id=customers><tr><th>ID<th>Name<th>Party<th>Count</tr><br>";
	for($i=1;$i<=$n;)
	{
	$fetch="SELECT * from count where Num='$i'";
	$result=mysqli_query($con,$fetch);
	$row=mysqli_fetch_array($result);
	$Name=$row['Name'];
	$ID=$row['ID'];
	$Count=$row['Count'];
	$Party=$row['Party'];
	echo"<tr><td>$ID<td>$Name<td>$Party<td>$Count</tr>";
	$i=$i+1;
	}
}
 ?>
</body>
</html>