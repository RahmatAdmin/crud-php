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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: blue;
            padding: 10px 20px;
        }
        .navbar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .nav-links {
            list-style: none;
            display: flex;
        }
        .nav-links li {
            margin: 0 10px;
        }
        .nav-links a {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
        }
        .nav-links a:hover {
            background-color: #555;
            border-radius: 4px;
        }
        .search-box {
            display: flex;
            align-items: center;
        }
        .search-box input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5px;
        }
        .search-box button {
            padding: 5px 10px;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .search-box button:hover {
            background-color: #218838;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 50px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .content {
            max-width: 50%;
        }
        .content h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .content p {
            text-align: justify;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .buttons a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-secondary {
            background-color: #f8f9fa;
            color: black;
            border: 1px solid #ccc;
        }
        .image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        
        .container {
        width: 80%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px 0;
    }
    .item {
        width: calc(50% - 10px);
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .item h3 {
        margin-bottom: 10px;
    }
    .item p {
        margin-bottom: 5px;
    }
    .price {
        font-weight: bold;
        color: #007bff;
    }
    .buy {
        padding: 8px 12px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .buy:hover {
        background-color: #0056b3;
    }
    .footer {
        background: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: relative;
        bottom: 0;
        width: 100%;
    }
    </style>
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
