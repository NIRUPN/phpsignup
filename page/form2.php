<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
             margin-top: 50px; /* Adjust if necessary */
             }
    
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #4facfe;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #00f2fe;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4">Login</h2>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</body>
</html>
