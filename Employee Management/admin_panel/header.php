<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
    <style>
     * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}
    
    nav ul {
    list-style-type: none;
    margin: 0;
    padding: 32px 18px;
    background-color: #333;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    padding: 12px 10px;
    font-size: 20px;

}
nav ul li a:hover{
    border-bottom: 3px solid red;
}
.admin{
    float:right;
    color:white;
}
</style>
</head>
<body>
<nav>
        <ul>
           <li> <a href="home.php"><i class="fas fa-home"></i> / Dashboard</a></li>
           <h2 class=admin>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'admin'; ?>!</h2>
        </ul>
    </nav>
</body>
</html>