<?php

include '../config/config.php';
include '../layouts/navbar.php';

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
    </style>
</head>
<body>

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




