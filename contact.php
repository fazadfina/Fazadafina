<?php
include 'config.php'; 

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message_content = $_POST['message'];

     $query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message_content')";
    if (mysqli_query($conn, $query)) {
        $message = "Your message has been sent successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Contact - Faza</title>
</head>

<body>
    <!-- Header Section -->
    <header>
        <a href="#home" class="logo">Faza Dafina Putri Sarma</a>
       
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="top-btn">
            <a href="#contact" class="nav-btn">Contact Me</a>
        </div>
    </header>

    <!-- Contact Section -->
    <section class="contact">
        <h2 class="heading">Contact Me</h2>

            <!-- Success/Error Message -->
            <?php if ($message != '') { ?>
                <p class="message"><?php echo $message; ?></p>
            <?php } ?>

            <!-- Contact Form -->
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" id="name" required placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" name="email" id="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" required placeholder="Enter the subject">
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea name="message" id="message" required placeholder="Write your message here"></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="social">
            <a href="https://www.instagram.com/fzdafina"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/@FazaDafinaPutri"><i class="bx bxl-youtube"></i></a>
        </div>
        <p class="copyright">
            &copy; faza@2024
        </p>
    </footer>

    <script src="script.js"></script>
</body>

</html>
