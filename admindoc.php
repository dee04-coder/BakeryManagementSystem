<?php
session_start();
include('../config/constants.php');

// Check if user is already logged in
if(isset($_SESSION['user'])) {
    header('location:'.SITEURL.'admin/index.php');
    exit();
}

// Process login form
if(isset($_POST['submit'])) {
    // Get the Data from Login form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    // SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Count rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if($count==1) {
        // User Available and Login Success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; // To check whether the user is logged in or not and logout will unset it

        // Redirect to Home Page/Dashboard
        header('location:'.SITEURL.'admin/index.php');
        exit();
    } else {
        $message = "Username or Password is incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Food Order System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #ff4757;
            --secondary: #2f3542;
            --accent: #ffa502;
            --light: #f1f2f6;
            --dark: #2f3542;
            --text: #2f3542;
            --background: #ffffff;
        }

        body {
            background-color: #f9f9f9;
            color: var(--text);
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .login {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .myform {
            flex: 1;
            padding: 40px;
            min-width: 300px;
        }

        .image {
            flex: 1;
            min-width: 300px;
            overflow: hidden;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text-center {
            text-align: center;
            color: var(--secondary);
            font-size: 28px;
            margin-bottom: 20px;
        }

        .success {
            color: #4CAF50;
            background: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .error {
            color: #f44336;
            background: #ffebee;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            width: 100%;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--primary);
            outline: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #ff3742;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--secondary);
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .image {
                order: -1;
                height: 200px;
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: var(--primary);
            font-size: 32px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="container">
            <div class="myform">
                <div class="login-header">
                    <h1>BANTU BAKERY</h1>
                    <p>Admin Login Portal</p>
                </div>
                
                <h2 class="text-center">Admin Login</h2>

                <?php 
                if(isset($_SESSION['login'])) {
                    echo '<div class="success">' . $_SESSION['login'] . '</div>';
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])) {
                    echo '<div class="error">' . $_SESSION['no-login-message'] . '</div>';
                    unset($_SESSION['no-login-message']);
                }
                ?>

                <!-- Login Form Starts Here -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" placeholder="Enter Username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                </form>
                <!-- Login Form Ends Here -->
            </div>
            
            <div class="image">
                <img src="../images/admin-login.jpg" alt="Admin Login Image">
            </div>
        </div>
    </div>
</body>
</html>