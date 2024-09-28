<?php
ob_start();
session_start();
?>

<?php

include 'connect.php';
// include 'navbar.php';
include 'form1.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';

// Capture the name from the POST request
$name = $_POST['name'] ?? ''; 
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$name_err = $email_err = $password_err = "";
$otp_sent = false; 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $check_email_sql = "SELECT 1 FROM otp WHERE email = ?";
    if ($stmt = $conn->prepare($check_email_sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email is already registered, show an alert and stop further execution
            echo "<script>alert('Email is already registered: " . $_SESSION['email'] . ". Please use a different email.');</script>";

            $stmt->close();
            $conn->close();
            exit(); 
        } 
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }

    
    if (empty($name_err) && empty($email_err) && empty($password_err)) {
        $generated_otp = rand(100000, 999999);
        $sql = "INSERT INTO otp (name, email, password, otp, verified) VALUES (?, ?, ?, ?, 0)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $name, $email, $password, $generated_otp);
            if ($stmt->execute()) {
                // Send OTP via email
                $mail = new PHPMailer(true); 
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'nirup382001@gmail.com'; // Your Gmail address
                    $mail->Password = 'ooht miip kggr cdvb'; // Your Gmail app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('your_email@gmail.com', 'Your Name');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Your OTP Code for Signup';
                    $mail->Body = 'Your OTP code for signup is: <strong>' . $generated_otp . '</strong>';

                    $mail->send();
                    $otp_sent = true; 

                    
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['otp'] = $generated_otp;
                    header("Location: verify.php");
                    exit();
                } catch (Exception $e) {
                    echo 'OTP could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            } else {
                echo "Error inserting data: " . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing insert statement: " . $conn->error;
        }
    }

    $conn->close();
    ob_end_flush();
}
