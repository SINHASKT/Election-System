<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACafad5d248afd2e8263adb66217a4d26e";
$token = "5ab77eae305dcc05067ce28d2fde25d1";
$client = new Client($sid, $token);
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
$ID="CD_".$n;
}
// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page
$client->messages->create(
$_POST['Number'],
array(
'from'=>'+1 309-271-0875 ',
'body'=>'Sucessfully Registered. Your Candidate ID is '.$ID
)
);
?>
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
$ID="CD_".$n;
$Area=$_POST['Area'];
$c=0;
$insert="INSERT INTO candi(Num,ID,Name,Party,Area) values ('$n','$ID','$Name','$Party','$Area')";
$result=mysqli_query($con,$insert);
$insert="INSERT INTO `count` (`Num`, `ID`, `Name`, `Party`, `Count`) VALUES ('$n','$ID','$Name','$Party','$c')";
$result=mysqli_query($con,$insert);
}
?>
