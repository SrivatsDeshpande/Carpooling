<?php

$to = 'sridesh13@gmail.com';
$subject = 'Test email';
$headers= 'From: srivatsdeshpande@gmail.com';
$message = 'Sending an email to test if code is working';

if (mail($to,$subject,$message,$headers)){
    echo "Mail sent succesfully"; }
    else {
        echo "Unable to send";
    }

?>