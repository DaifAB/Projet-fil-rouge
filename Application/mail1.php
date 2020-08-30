<?php
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];
if(isset( $_POST['subject']))
$subject = $_POST['subject'];
if(isset( $_POST['recip']))
$recipient = $_POST['recip'];


$content="De: $name \n Email: $email \n Message: $message";
$mailheader = "De : $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email envoyé!";
?>



























<!--       _
       .__(.)< (SKETCH)
        \___)   
 ~~~~~~~~~~~~~~~~~~-->
