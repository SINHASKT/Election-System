<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Vote</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">

<style>

.pricingdiv{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  font-family: 'Source Sans Pro', Arial, sans-serif;
}

.pricingdiv ul.theplan{
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  border-top-left-radius: 50px;
  border-bottom-right-radius: 50px;
  color: white;
  background: #7c3ac9;
  position: relative;
  width: 250px; /* width of each table */
  margin-right: 10px; /* spacing between tables */
  margin-bottom: 1em;
  transition: all .5s;
}

.pricingdiv ul.theplan:hover{ /* when mouse hover over pricing table */
  transform: scale(1.05);
  transition: all .5s;
  z-index: 100;
  box-shadow: 0 0 10px gray;
}

.pricingdiv ul.theplan li{
  margin: 10px 20px;
  position: relative;
}

.pricingdiv ul.theplan li.title{
  font-size: 150%;
  font-weight: bold;
  text-align: center;
  margin-top: 20px;
  text-transform: uppercase;
  border-bottom: 5px solid white;
}

.pricingdiv ul.theplan:nth-of-type(2){
  background: #e53499;
}
    
.pricingdiv ul.theplan:nth-of-type(3){
  background: #2a2cc8;
}

.pricingdiv ul.theplan:last-of-type{ /* remove right margin in very last table */
  margin-right: 0;
}

/*very last LI within each pricing UL */
.pricingdiv ul.theplan li:last-of-type{
  text-align: center;
  margin-top: auto; /*align last LI (price botton li) to the very bottom of UL */
}  

.pricingdiv a.pricebutton{
  background: white;
  text-decoration: none;
  padding: 10px;
  display: inline-block;
  margin: 10px auto;
  border-radius: 5px;
  color: navy;
  text-transform: uppercase;
}

@media only screen and (max-width: 500px) {
  .pricingdiv ul.theplan{
    border-radius: 0;
    width: 100%;
    margin-right: 0;
  }
  
  .pricingdiv ul.theplan:hover{
    transform: none;
    box-shadow: none;
  }
  
  .pricingdiv a.pricebutton{
    display: block;
  }
}
/* Style the video: 100% width and height to cover the entire window */
#myVideo {
    position: fixed;
    right: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
}

/* Add some content at the bottom of the video/page */
.content {
    position: fixed;
    Top: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
}

/* Style the button used to pause/play the video */
#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
}

#myBtn:hover {
    background: #ddd;
    color: black;
}

</style>
</head>
<body>
<!-- The video -->
<video autoplay muted loop id="myVideo">
  <source src="bg.mp4" type="video/mp4">

</video>

<!-- Optional: some overlay text to describe the video -->
<div class="content">
  <h1>Welcome Voters</h1>
 </div>
<div class="pricingdiv">
<?php
session_start();
$host='localhost';
$user='root';
$pass='';
$db='election';
$con=mysqli_connect($host,$user,$pass,$db);
if($con)
{
	echo'<form action="done.php" action="get">';
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
	echo"<ul class=theplan><li class=title><span class='icon-trophy' style='color:yellow'></span><b>$ID</b></span></li><li display: inline;><b>Name:</b>$Name</li><li display: inline;><b>Party:</b>$Party</li><li><b>Area:</b>$Area</li><li><input type=image src=1.png height=50 width=50 name=n value='$ID'></li></ul>";
	$i=$i+1;
	}
}
?>
</div>

</body>
</html>