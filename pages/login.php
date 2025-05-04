<?php

use App\Auth;
use App\DB;
use App\Sesh;

require_once ('../vendor/autoload.php');


$authObj = new Auth();
$loginObj = new Sesh();

$loginObj->logIn();
$authObj->reDirectIfFound();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>

        body{
            background-color: #f3eaff;
        }

        .page-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
            padding-top: 20px;
        }

        header {
            width: 100%;
            background-color: #5f4b8b;
            padding: 20px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1000;


        }

        header h1 {
            font-family: 'Merriweather', serif;
            font-size: 26px;
        }

        nav {
            display: flex;
            gap: 10px;
            background-color: #4e3c75;
            padding: 8px 16px;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 20px;
            transition: background-color 0.3s, transform 0.2s;
        }

        nav a:hover {
            background-color: #6d59a5;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/LBMS/pages/layout/navbar.php'; ?>
<div class="page-content">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Welcome Back</h1>
                <p>Login to your account</p>
            </div>
            <form class="login-form" method="post">
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required autocomplete="off">
                        <span id="togglePassword" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="login-btn" name="logInBtn">Sign In</button>
                <div class="divider">
                    <span>OR</span>
                </div>
                <div class="oauth-buttons">
                    <button class="oauth-btn google"><i class="fab fa-google"></i> Google</button>
                    <button class="oauth-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</button>
                    <button class="oauth-btn github"><i class="fab fa-github"></i> GitHub</button>
                </div>
            </form>
            <div class="login-footer">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>
