<?php
session_start();
include 'connect.php';
include 'form2.php';
$email = $password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_input = $_POST['email'];
    $password_input = $_POST['password'];

    
    $sql = "SELECT password, name FROM otp WHERE email = '$email_input'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];
            $name = $row['name'];  
           
            if ($password_input === $stored_password) {
                
                $_SESSION['email'] = $email_input;
                $_SESSION['name'] = $name;

                
                echo "<script>
                    alert('Login successful. Welcome, " . $_SESSION['name'] . "!');
                    window.location.href = 'welcome.php';
                </script>";
            } else {
                echo "<script>alert('Password not matching, please enter the correct one!')</script>";
            }
        } else {
            echo "<script>alert('Email does not exist.')</script>";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
