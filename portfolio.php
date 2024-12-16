<?php

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "project_website"; 

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data portfolio dari database
$sql = "SELECT * FROM portfolio";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Portfolio - Faza</title>
</head>

<body>
    <!-- Header Section -->
    <header>
        <a href="index.php" class="logo">Faza Dafina Putri Sarma</a>
        
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="top-btn">
            <a href="contact.php" class="nav-btn">Contact Me</a>
        </div>
    </header>

    <!-- Portfolio Section Code -->
    <section class="portfolio" id="portfolio">
        <h2 class="heading">My <span>Portfolio</span></h2>

        <!-- Grid Layout for Portfolio -->
        <div class="portfolio-content">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="portfolio-item">';
                    echo '<a href="' . $row['detail_page'] . '">';
                    echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="social">
            <a href="https://www.instagram.com/fzdafina"><i class='bx bxl-instagram'></i></a>
            <a href="https://www.youtube.com/@FazaDafinaPutri"><i class='bx bxl-youtube'></i></a>
        </div>
        <p class="copyright">
            &copy; faza@2024
        </p>
    </footer>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="script.js"></script>
</body>

</html>
