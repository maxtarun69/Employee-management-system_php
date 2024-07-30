<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/user.css">

</head>
<body>
    <header>
        <h1 style="color:#fff">Contact Us</h1>
    </header>
    <main>
        <section>
            <h2>Get in Touch</h2>
            <form action="submit_contact_form.php" method="post">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </section>
        <section>
            <h2>Contact Information</h2>
            <ul>
                <li>Email: <a href="mailto:your-email@example.com">your-email@example.com</a></li>
                <li>WhatsApp: <a href="https://wa.me/1234567890">Message on WhatsApp</a></li>
                <!-- Replace the WhatsApp link with your actual WhatsApp link -->
            </ul>
        </section>
    </main>
</body>
</html>
