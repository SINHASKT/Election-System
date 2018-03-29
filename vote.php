<html>
<head><title>Voting</title>
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
	echo'<form action="done.php" action="get"><h2>Welcome to voter</h2><br>';
	echo"<table id=customers><tr><th>ID<th>Name<th>Party<th>Area<th>VOTE</tr><br>";
	$fetch="SELECT * from candi";
	$result=mysqli_query($con,$fetch);
	$n=mysqli_num_rows($result);
	for($i=1;$i<=$n;)
	{
	$fetch="SELECT * from candi where num='$i'";
	$result=mysqli_query($con,$fetch);
	$row=mysqli_fetch_array($result);
	$Name=$row['Name'];
	$ID=$row['ID'];
	$Party=$row['Party'];
	$Area=$row['Area'];
	echo"<tr><td>$ID<td>$Name<td>$Party<td>$Area<td><input type=radio name=n value='$ID'></tr>";
	$i=$i+1;
	}
	echo"<center><input type=image src=1.png><br>";
}
?>
</body>
</html>