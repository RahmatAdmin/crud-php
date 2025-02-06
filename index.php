<?php
include './config/config.php';

$QUERY = "SELECT * FROM data";
$RESULT = $connection->query($QUERY);

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/index.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../public/index.css">
    <title>Document</title>
</head>
<body>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <img style="width: 50px; height: 50px; border-radius: 100%;" src="./src/img/logo.jpg" alt="" srcset="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/project/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./pages/dashboard.php">Data Cake</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./pages/about.php">About</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<div>
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="src/img/cake.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Slamat Datang Di Toko Cake Online</h1>
        <p style="text-align: justify;" class="lead">ini adalah sebuah sistem berbasis web untuk mengelola dan memanajemen data-data kue yang tersedia secara otomatis dan online. dilengkapi dengan fitur CRUD untuk owner dapat melihat data kue, membuat data kue, mengedit data, dan menghapus data dengan sangat efisien</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2"><a style="color: white; text-decoration: none;" href="pages/dashboard.php">Dashboard</a></button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a style="color: rgb(0, 0, 0); text-decoration: none;" href="./pages/about.php">About Me</a></button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <?php while($data = $RESULT->fetch_assoc()): ?>
      <div class="col-12 col-sm-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $data["nama"] ?></h5>
            <p class="card-text">jenis : <?= $data["author"] ?></p>
            <p class="card-text">Deskripsi : <?= $data["deskripsi"] ?></p>
            <a href="#" class="btn btn-primary">Rp. <?= number_format($data["harga"], 0,',', '.') ?></a>
            <button class="btn btn-outline-primary">Beli</button>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
