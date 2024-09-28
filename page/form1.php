<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        .container {
         background: white;
         padding: 30px;
         border-radius: 10px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
          width:100%; /* Adjust the width here */
          text-align: center;
          box-sizing: border-box; /* Ensures padding is included in width */
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
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #4facfe;
            border-radius: 5px;
            transition: border-color 0.3s;
            box-sizing: border-box; /* Ensures padding is included in width */
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
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
        .message {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <?php  include 'navbar.php'; ?>
    <br>
    <div class="container">
        <h2>Signup Form</h2>
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Submit</button>
            <?php if (isset($error)): ?>
                <div class="message"><?= $error; ?></div>
            <?php elseif (isset($success)): ?>
                <div class="message" style="color: green;"><?= $success; ?></div>
            <?php endif; ?>
        </form>
    </div>
  

</body>
</html>
