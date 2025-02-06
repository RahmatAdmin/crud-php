<?php

include '../config/config.php';
include '../layouts/navbar.php';
include '../pages/delete.php';

$QUERY = "SELECT * FROM data";
$RESULT = $connection->query($QUERY);

$number = 1;

?>

<style>
     .container {
        width: 80%;
        margin: auto;
        padding: 20px 0;
    }
    .btn-add {
        display: inline-block;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #f4f4f4;
    }
    .inline-form {
        display: inline;
    }
    .btn-update, .btn-delete {
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }
    .btn-update {
        background-color: #28a745;
        color: white;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
</style>

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


