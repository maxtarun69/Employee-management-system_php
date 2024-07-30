<?php
include '../connection/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --color-primary: #0073ff;
            --color-white: #e9e9e9;
            --color-black: #141d28;
            --color-black-1: #212b38;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
        }

        .menu_bar {
            background-color: var(--color-black);
            height: 80px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
        }

        .logo {
            color: var(--color-white);
        }

        .logo span {
            color: var(--color-primary);
        }

        ul {
            list-style-type: none;
            display: flex;
            align-items: center;
        }

        ul li {
            margin: 0 10px;
        }

        ul li a {
            color: var(--color-white);
            text-decoration: none;
            padding: 10px;
        }

        ul li a:hover {
            color: var(--color-primary);
        }

        .menu {
            display: none;
            position: absolute;
            background-color: var(--color-black);
            padding: 10px;
            z-index: 1;
        }

        .menu a {
            display: block;
            color: var(--color-white);
            padding: 10px;
            text-decoration: none;
        }

        .menu a:hover {
            color: var(--color-primary);
        }

        .menu_bar li:hover .menu {
            display: block;
        }
        /* Styles for the login popup */
.login-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5); /* Semi-transparent background */
    z-index: 1000; /* Ensure the popup stays on top */
    justify-content: center;
    align-items: center;
}

.login-popup-content {
    background-color: #fefefe;
    padding: 20px;
    border: 1px solid #888;
    width: 300px;
    text-align: center;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

/* Styles for the main content */
.content {
    text-align: center;
    margin-top: 50px;
}

/* Responsive adjustments */
@media screen and (max-width: 600px) {
    .login-popup-content {
        width: 80%;
    }
}

    </style>
    <title>Dropdown Menu</title>
</head>
<body>

<div class="menu_bar">
    <h1 class="logo">Employee<span>Management.</span></h1>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#"><i class="fas fa-phone" style="color: #fff;"></i></a></li>
        <button onclick="openLogin()">Login</button>
        <li><a href="#"><i class="fas fa-registered" style="color: #fff;"></i></a></li>
    </ul>
</div>

<div id="loginPopup" class="login-popup">
    <div class="login-popup-content">
        <span class="close" onclick="closeLogin()">&times;</span>
    <div class="login-container">
        <h1 class="had">Login</h1>
        <form action="user_login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p><a href="register.html">Register</a></p>
        <p style="color: red;"><a href="forgot_password.php">Forgot Password?</a></p>
       
    </div>
</div>
</div>

   
</body>
</html>
<script>
// Function to open the login popup
function openLogin() {
    document.getElementById('loginPopup').style.display = 'flex'; // Display the popup
}

// Function to close the login popup
function closeLogin() {
    document.getElementById('loginPopup').style.display = 'none';
};
<script>