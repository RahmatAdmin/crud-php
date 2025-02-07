<?php

// koneksi ke database
$connection = new mysqli("localhost", 'root', '', 'taufik');

if(isset($_POST["submit"])) {
    $nama = mysqli_real_escape_string($connection, $_POST["nama"]);
    $harga = (int) $_POST["harga"];
    $stock = (int) $_POST["stock"];
    $author = mysqli_real_escape_string($connection, $_POST["author"]);
    $deskripsi = mysqli_real_escape_string($connection, $_POST["deskripsi"]);

    $QUERY = "INSERT INTO data (nama, harga, stock, author, deskripsi) VALUES (?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($QUERY);
    if($stmt === false ) {
        die("error :" . $connection->error);
    }
    
    $stmt->bind_param("siiss", $nama, $harga, $stock, $author, $deskripsi);

    if($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        die("Gagal menyimpan data: " . $stmt->error);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Kue</title>
    <link rel="stylesheet" href="../css/create.css">
</head>
<body>

<header>
        <nav class="navbar">
            <img src="../img/logo.jpg" alt="Logo">
            <ul class="nav-links">
                <li><a href="/project/index.php">Home</a></li>
                <li><a href="/project/pages/dashboard.php">Data Cake</a></li>
                <li><a href="/project/pages/about.php">About</a></li>
            </ul>
            <div class="search-box">
                <input type="search" placeholder="Search">
                <button type="submit">Search</button>
            </div>
        </nav>
    </header>
    
<div class="container">
    <h3>Input Data Kue</h3>
    <form method="post">
        <div class="form-group">
            <label for="nama">Nama Kue</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="author">Jenis Kue</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn-submit">Submit</button>
    </form>
</div>

</body>
</html>
