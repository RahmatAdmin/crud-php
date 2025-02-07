<?php
// koneksi ke database
$connection = new mysqli("localhost", 'root', '', 'taufik');

$QUERY = "SELECT * FROM data";
$RESULT = $connection->query($QUERY);

$number = 1;

// 
if(isset($_POST["id"])) {
    $id = $_POST["id"];

    $QUERY = "DELETE FROM data WHERE id = ?";
    $action = $connection->prepare($QUERY);
    $action->bind_param("i", $id);

    if($action->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        die("gagal" . $action->error);
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
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
    <button class="btn-add"><a href="create.php">Tambah Data</a></button>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($data = $RESULT->fetch_assoc()): ?>
                <tr>
                    <td><?= $number++ ?></td>
                    <td><?= $data["nama"] ?></td>
                    <td>Rp. <?= number_format($data["harga"], 0,',', '.') ?></td>
                    <td><?= $data["stock"] ?></td>
                    <td><?= $data["author"] ?></td>
                    <td><?= $data["deskripsi"] ?></td>
                    <td>
                        <form action="update.php" method="get" class="inline-form">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <button class="btn-update">Update</button>
                        </form>
                        <form action="delete.php" method="post" class="inline-form">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <button class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>


