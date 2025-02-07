<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/about.css">
    <title>Document</title>
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

    </style>
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

    <div style="margin-top: 120px;" class="container">
        <div class="body">
        <div class="heading">TENTANG SAYA</div>
        <img width="350px" height="200px" src="../img/foto.jpeg" alt="" srcset="">
        <p>Nama : <span>Helwina Putri Ramadhani</span></p>
        <p>Tempat Lahir : <span> Pekanbaru</span></p>
        <p>Tanggal Lahir : <span>10 November 2003</span></p>
        <p>Kelas : <span> Alpro1 </span></p>
        <p>Instagram : <span>@winnay.a</span></p>
        <p>Facebook : <span> - </span></p>
        <p>Whatsapp : <span> </span></p>
        <p>Email : <span> helwinaputri2003@gmail.com </span></p>
        </div>
    </div>
</body>
</html>

