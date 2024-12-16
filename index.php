<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "project_website"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data profil
$sql_profile = "SELECT * FROM profile WHERE id = 1";
$result_profile = $conn->query($sql_profile);
$profile = $result_profile->fetch_assoc();

// Ambil data portfolio
$sql_portfolio = "SELECT * FROM portfolio";
$result_portfolio = $conn->query($sql_portfolio);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Faza Dafina Putri Sarma - Portfolio</title>
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

<!-- Home Section Code -->
<section class="home" id="home">
    <div class="home-img">
    <img src="images/<?php echo $profile['image']; ?>" alt="Profile Faza">
    </div>

    <div class="home-content">
        <h3>Hi, Myself</h3>
        <h1><?php echo $profile['name']; ?></h1>
        <p>
            <?php echo $profile['bio']; ?>
        </p>
    </div>
</section>

<!-- About Section Code -->
<section class="about" id="about">
    <div class="about-img">
        <img src="images/profile.jpg" alt="Profile">
    </div>

    <div class="about-content">
        <h2 class="heading">About <span>Me</span></h2>
        <h3>I'm a <span>English Education Student</span></h3>
        <p>
            Saya adalah mahasiswa Pendidikan Bahasa Inggris yang percaya bahwa bahasa adalah kunci untuk membuka peluang global. Dalam perjalanan akademik saya di Universitas Bengkulu, saya semakin yakin akan pentingnya penguasaan bahasa Inggris...
        </p>
        <a href="about.php" class="read-more-btn">Read More</a>
    </div>
</section>

<!-- Portfolio Section Code -->
<section class="portfolio" id="portfolio">
    <h2 class="heading">My <span>Portfolio</span></h2>

    <!-- Grid Layout for Portfolio -->
    <div class="portfolio-content">
        <?php while ($row = $result_portfolio->fetch_assoc()): ?>
        <div class="portfolio-item">
            <a href="<?php echo $row['detail_page']; ?>">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                <h3><?php echo $row['title']; ?></h3>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Contact Section Code -->
<section class="contact" id="contact">

    <h2 class="heading">Contact <span>Me</span></h2>

    <form action="#">

        <div class="input-box">
            <input type="text" placeholder="Full Name">
            <input type="email" placeholder="Email Address">
        </div>

        <div class="input-box">
            <input type="text" placeholder="Phone Number">
            <input type="text" placeholder="Email Subject">
        </div>

        <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>

        <input type="submit" value="Send Message" class="btn">
    </form>

</section>

<!-- Footer Section Code -->
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

<?php
// Tutup koneksi database
$conn->close();
?>
