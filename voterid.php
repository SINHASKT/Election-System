<?php
session_start();
if($_SESSION["fakeotp"]==1){
	echo '<script>';
	echo 'alert("Wrong OTP Entered")';
	echo '</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>otp verification</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">.be-detail-header { border-bottom: 1px solid #edeff2; margin-bottom: 50px; }</style>
</head>
<body>

<?php
require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;
$voteridr=$_SESSION["abc"];


/*
	$username = "achintyac77@gmail.com";
	$hash = "106ff03abe260d72b5b483984f58cab6e434d1ca0c25934f17d7d0750b12d4d2";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	
*/


	$numbers = $voteridr; // A single number or a comma-seperated list of numbers
if($_SESSION["fakeotp"]!=1){

	$name="123467890ABCDEFGHIJKLMN";
	$splitsvilla=str_split($name);
	$randomarraykeys=array_rand($splitsvilla,6);
	$mytoken="";
	for($i=0;$i<6;$i++){
		$mytoken.="".$splitsvilla[$randomarraykeys[$i]];
	}
	
	
	
	
/*	$message = "your otp for login is ".$mytoken;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";

	print($result);

	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";
	echo".............................................................................";
*/





// Get the PHP helper library from https://twilio.com/docs/libraries/php


// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACafad5d248afd2e8263adb66217a4d26e";
$token = "5ab77eae305dcc05067ce28d2fde25d1";
$client = new Client($sid, $token);
$client->messages->create(
    $numbers,
    array(
        'from'=>'+1 309-271-0875 ',
        'body' => "OTP FOR VOTING IS ".$mytoken
    )
);

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname= "otpdata";
			// Create connection
			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error)  die("Connection failed: " . $conn->connect_error);
			$sql="INSERT into verifyotp (phoneno , otp) values ('$numbers','$mytoken');";
			if(!$conn->query($sql)===TRUE)
				echo "failed to generate otp for the database purpose man";
			


	}

?>


<div class="container be-detail-container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" class="img-responsive" style="width:200px; height:200px;margin:0 auto;"><br>
            
            <h1 class="text-center">Verify your mobile number</h1><br>
              <p></p>
        <br>



<form action ="verifyotp.php" method="post">
	<div class="row">                    
                <div class="form-group col-sm-8">
                	 <span style="color:red;"></span>
	<input type="text" class="form-control" name="otp"><br>
	 </div>
	 <button type="submit" class="btn btn-primary  pull-right col-sm-3">Verify</button>
  </div>
            </form>
        <br><br>
        </div>
    </div>        
</div>
</body>
</html>
