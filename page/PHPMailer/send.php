<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';

// Create an instance; passing `true` enables exceptions

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);


    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
     $mail->Username='nirup382001@gmail.com';
     $mail->Password='ooht miip kggr cdvb ';
     $mail->SMTPSecure='ss1';
     $email->POrt=465;
     $mail->setFrom('nirup382001.com', 'contact');
     $mail->addAddress($_POST["email"]);  


     $mail->isHTML(true);   
     $mail->Subject = $_POST["subject"];
     $mail->Subject =$_POST["message"];


     $mail->send();
        echo 'Message has been sent';
    }
   



?>
