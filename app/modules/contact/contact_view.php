<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nutriPT - Contact Us</title>
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; // Base URL tanımı
    ?>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
</head>
<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

<section class="hero">
    <div class="hero-content">
        <h1>Contact Us</h1>
        <p>We're here to help you with any questions or concerns you may have!</p>
    </div>
</section>

<main>
    <section class="contact-info">
        <div class="container">
            <h2>Get in Touch</h2>
            <p>If you have any questions, feedback, or would like more information about our services, please feel free to reach out to us using the form below or through the contact details provided. We look forward to hearing from you!</p>
        </div>
    </section>

    <section class="contact-form">
        <div class="container">
            <h2>Contact Form</h2>
            <form action="/submit_contact_form.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <h2>Our Contact Details</h2>
            <p>If you prefer to reach out directly, you can contact us using the details below:</p>
            <ul>
                <li><strong>Phone:</strong> +1 (123) 456-7890</li>
                <li><strong>Email:</strong> <a href="mailto:support@nutript.com">support@nutript.com</a></li>
                <li><strong>Address:</strong> 123 Wellness St., Healthy City, HC 12345</li>
            </ul>
        </div>
    </section>
</main>

<footer class="contact-footer">
    <div class="container">
        <p>&copy; 2024 nutriPT. All Rights Reserved.</p>
        <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
    </div>
</footer>

</body>
</html>
