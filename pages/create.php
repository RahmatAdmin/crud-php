<?php

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
    <style>
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 150px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: none;
            height: 80px;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background: darkblue;
        }
    </style>


</head>
<body>

<header>
        <nav class="navbar">
            <img src="../logo.jpg" alt="Logo">
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
