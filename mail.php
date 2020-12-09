<?php


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// the message
// $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// send email
mail($email,$subject ,$message  );

header( "location: https://taomuza201.github.io/natthapong.github.io/index#contact" );
exit(0);
?>