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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="margin-top: 150px;" class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Input Data</h3>
                    <form method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data["nama"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $data["harga"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="<?= $data["stock"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="<?= $data["author"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" value="<?= $data["deskripsi"]; ?>" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>