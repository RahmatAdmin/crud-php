<?php

include '../config/config.php';
include '../layouts/navbar.php';

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
