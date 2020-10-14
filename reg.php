<html>

<?php
session_start();

$name=$_POST['name'];
$time=$_POST['time'];
$_SESSION['time']=$time;
$sub=$_POST['sub'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$_SESSION['email']=$email;
$source=$_POST['home'];
$dest=$_POST['work'];
$cap=$_POST['cap'];
$cost=$_POST['price'];
$_SESSION['username']=$_POST['new_uname'];
$new_uname=$_SESSION['username'];
$new_pw=$_POST['new_pw'];
$servername="localhost";
$username="root";
$password="root";
$_SESSION['name']=$name;
$conn=new mysqli($servername,$username,$password);
$sql="use Carpool";
mysqli_query($conn,$sql);


$sql="select * from REGISTER where username='$new_uname' or phone=$phone or email='$email'";
$res=mysqli_query($conn,$sql);
while(true){
if(mysqli_num_rows($res)!=0)
{
	echo "<script> window.alert('Record already exists! Try logging in. '); </script>";
	echo "<script> location.href='login1.html' </script> ";
        exit; 
        break;
}
else{
$sql="insert into REGISTER(username,password,phone,email,name,source,dest,capacity,price,time) values('$new_uname','$new_pw',$phone,'$email','$name','$source','$dest',$cap,$cost,'$time')";
mysqli_query($conn,$sql);
echo "<script> window.alert('Row added succesfully! Login to visit the website '); </script>";
echo "<script> location.href='login1.html' </script> ";

        exit;break;
}
}

mysqli_close($conn);

?>


</html>