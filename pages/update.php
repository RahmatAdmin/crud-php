<?php

$connection = new mysqli("localhost", 'root', '', 'taufik');

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $QUERY = "SELECT * FROM data WHERE id = ?";
    $action = $connection->prepare($QUERY);

   if($action === false) {
    die("tidak dapat ditemukan" . $connection->error);
   }

   $action->bind_param("i", $id);
   $action->execute();
   $results = $action->get_result();
   $data = $results->fetch_assoc();

   if(isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stock = $_POST["stock"];
    $author = $_POST["author"];
    $deskripsi = $_POST["deskripsi"];

    $QUERY_UPDATE = "UPDATE data SET nama=?, harga=?, stock=?, author=?, deskripsi=? WHERE id=?";
    $update = $connection->prepare($QUERY_UPDATE);
    $update->bind_param("sdissi", $nama, $harga, $stock, $author, $deskripsi, $id);

    if($update->execute()) {
        header("Location: dashboard.php");
    } else {
        die("gagal");
    }
    
   }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 400px;
            margin: 150px auto;
            padding: 20px;
            border: 1px solid #000;
        }
        h3 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #000;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
            background: gray;
            color: white;
            border: none;
            cursor: pointer;
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
    </style>
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
    <h3>Input Data</h3>
    <form method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= isset($data['nama']) ? $data['nama'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" value="<?= isset($data['harga']) ? $data['harga'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="<?= isset($data['stock']) ? $data['stock'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="<?= isset($data['author']) ? $data['author'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required><?= isset($data['deskripsi']) ? $data['deskripsi'] : ''; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn-submit">Submit</button>
    </form>
</div>

</body>
</html>




