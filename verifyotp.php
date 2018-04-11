<?php
session_start();
?>

<?php
			
			$recieved_otp=$_POST["otp"];
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname= "otpdata";
			$conn = new mysqli($servername, $username, $password,$dbname);
				if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
			$sql="select  phoneno  from verifyotp where otp =\"$recieved_otp\"";
			$sql2="delete from verifyotp where otp =\"$recieved_otp\"";
			$result=$conn->query($sql);
			$row = $result->fetch_assoc();
			
						if($_SESSION["abc"]==$row["phoneno"])
							{
								echo "<b><br><h1>successfully otp matched wih phoneno";
								$conn->query($sql2);	
								header("Location: vote2.php"); /* Redirect browser */
							}
						else{
							$_SESSION["fakeotp"]=1;
							header("Location: voterid.php"); 
						}
							
?>
