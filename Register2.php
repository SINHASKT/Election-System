<?php
session_start();

$na=$_GET["name"];
$ag=$_GET["age"];
$lo=$_GET["location"];
$ph=$_GET["phno"];
echo "<b>in page<br>";

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname= "otpdata";
			
			$conn = new mysqli($servername, $username, $password,$dbname);
			if ($conn->connect_error) 
    			die("Connection failed: " . $conn->connect_error);

    		$check_duplicate="select age from register_voter where phone =$ph";
    		$counting=$conn->query($check_duplicate)->fetch_assoc();
    		if(!is_null($counting)){
    			$_SESSION["registered"]=1;
    			echo "im running nigga";
    			//header("Location: Login_v13/index.html"); 
    			}
    		else{
    			$sql="insert into register_voter(name,age,location,phone) values ('$na','$ag','$lo','$ph')";
					if($conn->query($sql)==TRUE)
						echo "inserted your data into database";
					else
						echo "failed to inset data to database";	
    		}
    		
			
?>

 