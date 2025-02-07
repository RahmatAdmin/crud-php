<?php

// koneksi ke database
$connection = new mysqli("localhost", 'root', '', 'taufik');

$QUERY = "SELECT * FROM data";
$RESULT = $connection->query($QUERY);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Sederhana</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <img src="./img/logo.jpg" alt="Logo">
            <ul class="nav-links">
                <li><a href="/project/index.php">Home</a></li>
                <li><a href="/project/pages/dashboard.php">Data Cake</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
            <div class="search-box">
                <input type="search" placeholder="Search">
                <button type="submit">Search</button>
            </div>
        </nav>
    </header>
</body>
</html>

<div class="container">
        <div class="image">
            <img src="./img/cake.png" alt="Cake Image">
        </div>
        <div class="content">
            <h1>Selamat Datang Di Toko Cake Online</h1>
            <p>Ini adalah sebuah sistem berbasis web untuk mengelola dan memanajemen data-data kue yang tersedia secara otomatis dan online. Dilengkapi dengan fitur CRUD untuk owner dapat melihat data kue, membuat data kue, mengedit data, dan menghapus data dengan sangat efisien.</p>
            <div class="buttons">
                <a class="btn-primary" href="pages/dashboard.php">Dashboard</a>
                <a class="btn-secondary" href="./pages/about.php">About Me</a>
            </div>
        </div>
    </div>

    <?php while($data = $RESULT->fetch_assoc()): ?>
    <div class="item">
        <h3><?= $data["nama"] ?></h3>
        <p>Jenis: <?= $data["author"] ?></p>
        <p>Deskripsi: <?= $data["deskripsi"] ?></p>
        <p class="price">Rp. <?= number_format($data["harga"], 0,',', '.') ?></p>
        <button class="buy">Beli</button>
    </div>
<?php endwhile; ?>

<div class="footer">
    &copy; <?= date("Y"); ?> Your Website. All Rights Reserved.
</div>
