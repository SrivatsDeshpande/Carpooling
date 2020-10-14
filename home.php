<?php
session_start();
//echo "Value of cookie is ".$_COOKIE[$cookie_name];
?>
<html>
<h1 align="right">Welcome, <?php echo $_SESSION['username'] ; ?> :)</h1>
<div class="form">
<form  method="post">
<input type="text" name="source" placeholder="Enter source address">
<input type="submit" value="check">
</form></div>
<style>
	body {
	
	text-align: center;
	background-image: url(main.jpg);
	background-size: 100%;

}
h1{
		color : grey;
	font-family: "Times New roman", Times, Serif;
	font-weight: bold;

}
h3{
	
	color:red;
	}
a{
	color:grey;
}
input
{
	position: center;
	border: 3px solid grey;
	padding: 1px;
	box-shadow: 1px 1px #888888;
	height: 40px;
  -webkit-transition: height 0.4s ease-in-out;
  transition: height 0.4s ease-in-out;
  border-radius: 10px;
  background-color: #F1DEE8;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:hover {
  height: 50px;
  width:170px;
  background-color: silver;
 
}
input[type=password]:hover {
  height: 50px;
  width:170px;
  background-color: silver;
  
}
input[type=submit]:hover {
  height: 50px;
  width:85px;
  background-color: #45893D;
  text-align: center;
  
}
a:hover {
	background-color: D6ECBD;
	color: green;

	
}
.form {
	position: absolute;
	margin: 10% auto;
	left:45%;


</style>

<?php
$source=$_POST['source'];

$servername="localhost";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password);
$sql="use Carpool";
mysqli_query($conn,$sql);
$sql="select * from REGISTER where source='$source'  ";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)!=0)
{
$result=mysqli_fetch_assoc($res);
$driver_name=$result['username'];
$time=$result['time'];
$time1=substr($time,0,5);
$price=$result['price'];
$source=$result['source'];
$_SESSION['source']=$source;
$_SESSION['driver']=$driver_name;
$dest=$result['dest'];
$_SESSION['dest']=$dest;
echo "Destination: $dest<br>";
echo "Departure time = $time1 <br>";
$cap=$result['capacity'];

echo "Number of available seats: $cap <br>";


$price=$result['price'];
$_SESSION['fare']=$price;
echo "Cost = $price <br>";
if($cap>0)
{
	$sql="update REGISTER set capacity = $cap-1 where username='$driver_name'";
	mysqli_query($conn,$sql);
echo "<a href='confirmation.php'>Confirm your seat</a>";
}
else if($cap==0){
	echo "No more seats available";
}





}
else if($source=="")
{
	echo "Please enter source address";
} 
else {
	echo "No cars available";
}



?>
</body>
</html>