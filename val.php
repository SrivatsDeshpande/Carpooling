


<?php
session_start();


// Assigning variables
$uname=$_POST['uname'];
$pw=$_POST['pw'];
$_SESSION['username']=$uname;



//sql
$servername="localhost";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password);

//database change
$sql="use Carpool";
mysqli_query($conn,$sql);
$sql="select name from users where username = '$uname' ";
$res=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($res);
$_SESSION['name']=$result['name'];



$sql="SELECT username,password from REGISTER where username='$uname'";
$res=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($res);
$username=$result['username'];
$password=$result['password'];
if ($username!=$uname){
	echo "<script>alert('User does not exist. Redirecting to sign up page ');</script>";
	echo "<script>location.href='register.html';</script>";
	exit;
}
else if($password!=$pw) {
	echo "<script>alert('Invalid password. Try again ');</script>";
	echo "<script>location.href='login1.html';</script>";
	
	exit;
}
else
{
	echo "<script>location.href='home.php';</script>";
}









?>

