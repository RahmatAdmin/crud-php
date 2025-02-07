<?php


$connection = new mysqli("localhost", 'root', '', 'taufik');


$QUERY = "SELECT * FROM data";
$RESULT = $connection->query($QUERY);

$number = 1;


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


