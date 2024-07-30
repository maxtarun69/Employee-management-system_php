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
    <link rel="stylesheet" href="../css/responsive.css">
    <title>Dropdown Menu</title>
</head>
<body>

<div class="menu_bar">
    <img src="../assets/Oficeostrich.png" alt="Employee Icon" style="height: 60px;">
    <div class="menu_toggle" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menu">
        <li><a href="emp_dash.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php"><i class="fas fa-phone"></i></a></li>
        <li>
            <p style="color:black;">Welcome,<a href="#"> <i class="fas fa-user"></i></a></p>
            <div class="menu">
                <a href="profile.php">Profile</a>
                <a href="#">Reset Password</a>
            </div>
        </li>
        <li><a class="logout" href="#" onclick="location.href='logout.php'"><i class="fas fa-sign-out" style="color:red"></i></a></li>
    </ul>
</div>

<script>
    function toggleMenu() {
        var menu = document.getElementById('menu');
        if (menu.classList.contains('active')) {
            menu.classList.remove('active');
        } else {
            menu.classList.add('active');
        }
    }
</script>

</body>
</html>
