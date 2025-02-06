<?php

include '../config/config.php';
include '../layouts/navbar.php';

if(isset($_POST["submit"])) {
    $nama = mysqli_real_escape_string($connection, $_POST["nama"]);
    $harga = (int) $_POST["harga"];
    $stock = (int) $_POST["stock"];
    $author = mysqli_real_escape_string($connection, $_POST["author"]);

    $QUERY = "INSERT INTO data (nama, harga, stock, author) VALUES (?, ?, ?, ?)";

    $stmt = $connection->prepare($QUERY);
    $stmt->bind_param("siis", $nama, $harga, $stock, $author);

    if($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        die("Gagal menyimpan data: " . $stmt->error);
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
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
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