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

// Ambil data dari tabel about
$sql_about = "SELECT * FROM about WHERE id = 1"; // ambil data berdasarkan id = 1
$result_about = $conn->query($sql_about);
$about = $result_about->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>About - Faza Dafina Putri Sarma</title>
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

    <!-- About Section Code -->
    <section class="about" id="about">
        <div class="about-img">
         <img src="<?php echo $about['image']; ?>" alt="Profile">
        </div>

        <div class="about-content">
            <h2 class="heading">About <span>Me</span></h2>
            <h3>I'm a <span>English Education Student</span></h3>
            <p>
                <?php echo $about['bio']; ?>
            </p>
        </div>
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
