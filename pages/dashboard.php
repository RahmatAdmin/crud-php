<?php

include '../config/config.php';
include '../layouts/navbar.php';
include '../pages/delete.php';

$QUERY = "SELECT * FROM data";
$RESULT = $connection->query($QUERY);

$number = 1;

?>

<div style="margin-top: 150px;" class="container">
<main class="mt-12">
<table>
        <thead>
            <button class="btn btn-outline-primary mt-4"><a style="text-decoration: none;" href="create.php">Tambah Data</a></button>
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
                    <td class="d-flex justify-content-center">
    <div class="row w-100">
        <div class="col-12 col-sm-6 mb-2">
            <form action="update.php" method="get">
                <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                <button class="btn-update w-100">update</button>
            </form>
        </div>
        <div class="col-12 col-sm-6">
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <button class="btn-delete w-100">delete</button>
            </form>
        </div>
    </div>
</td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>
</div>

</body>
</html>


