
<?php
    include 'header.php'; // Ensure footer is included properly
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Employee Management Model</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset some default styles */

/* Basic styling for the body and header */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f0f0f0;
    
}

header {
    background-color:blue;
    color: #fff;
    text-align: center;
    padding: 15px 0;
}

header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

/* Styling for main content sections */
main {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
}

section {
    margin-bottom: 20px;
}

section h2 {
    font-size: 1.8rem;
    margin-bottom: 10px;
}

section p {
    font-size: 1.2rem;
    line-height: 1.8;
}

ul {
    list-style-type: disc;
    margin-left: 20px;
}

li {
    font-size: 1.2rem;
    line-height: 1.6;
}


    </style>
</head>
<body>
    <header>
        <h1>About Employee Management Model</h1>
    </header>
    <main>
        <section>
            <h2>Overview</h2>
            <p>Your introduction and overview of the employee management model.</p>
        </section>
        <section>
            <h2>Key Features</h2>
            <ul>
                <li>Feature 1 View Employees</li>
                <li>Feature 2 Atandance</li>
                <li>Feature 3 Tasks</li>
                <li>Feature 4 Leave Application</li>
                <li>Feature 5 Report</li>
                <!-- Add more features as needed -->
            </ul>
        </section>
        <section>
            <h2>Implementation</h2>
            <p>How the model is implemented and its benefits.</p>
        </section>
    </main>
</body>
</html>
<?php
    include 'footer.php'; // Ensure footer is included properly
?>