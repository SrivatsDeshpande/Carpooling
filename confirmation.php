<html>
<?php
SESSION_start();
$email = $_SESSION['email'];
$servername="localhost";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password);
$sql="use SRIVATS";
mysqli_query($conn,$sql);
$invoice=fopen("invoice.txt","w");
$msg="Hello, " .$_SESSION['name']."<br>". " You will be car pooling with " .$_SESSION['driver']. " from ". $_SESSION['source']. " to ". $_SESSION['dest'].".<br>". " Your total fare is: ".$_SESSION['fare'].",<br>";
fwrite($invoice,$msg);
$read= fopen("invoice.txt", "r") or die("Unable to open file!");
echo fread($read,filesize("invoice.txt"));


//Sending invoice
$to = '$email';
$subject = 'Your receipt for today\'s ride';
$headers= 'From: srivatsdeshpande@gmail.com';
$message = $msg;
if (mail($to,$subject,$message,$headers)){
    echo "Mail sent succesfully"; }
    else {
        echo "Unable to send";
    }

?>
</html>