<?php

include 'connect.php'; 
include'navbar.php'; 
// session_start();

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$name = isset($_SESSION['name']) ? $_SESSION['name'] : ''; 
$generated_otp = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';
$otp = isset($_POST['otp']) ? $_POST['otp'] : '';
$otp_err = "";
$otp_verified = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($otp)) {
        if ($otp == $generated_otp) {
           
            $otp_verified = true;
            $_SESSION['otp_verified'] = true;

            $update_sql = "UPDATE otp SET verified = 1 WHERE email = ?";
            if ($update_stmt = $conn->prepare($update_sql)) {
                $update_stmt->bind_param("s", $email);
                $update_stmt->execute();
                $update_stmt->close();
            }

           
            echo "<script>
              alert('OTP VERIFIED!!! Welcome, " . $_SESSION['name'] . "');
                window.location.href = 'login.php';
            </script>";
            exit(); 
        } else {
            
            echo "<script>alert('Invalid OTP. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Please enter an OTP.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
     <style>
        body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #4facfe, #00f2fe);
}

.container {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    width: 350px;
    margin: auto; /* Center the container */
    text-align: center;
    box-sizing: border-box;
    margin-top: 50px;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    border: 2px solid #4facfe;
    border-radius: 5px;
    transition: border-color 0.3s;
    box-sizing: border-box;
}

input[type="text"]:focus {
    border-color: #00f2fe;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #4facfe;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-weight: bold;
}

button:hover {
    background-color: #00f2fe;
}

.invalid-feedback {
    color: red; 
    font-size: 0.875rem; 
}

     </style>
</head>
<body>
    
<div class="container mt-5">
    <h2 class="mb-4">Verify OTP</h2>
    <form action="verify.php" method="POST">
        <div class="form-group">
            <label for="otp">OTP</label>
            <input type="text" class="form-control <?php echo (!empty($otp_err)) ? 'is-invalid' : ''; ?>" id="otp" name="otp" placeholder="Enter OTP">
            <span class="invalid-feedback"><?php echo $otp_err; ?></span>
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>
</div>
</body>
</html>
