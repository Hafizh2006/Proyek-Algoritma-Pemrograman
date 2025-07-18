<?php 
session_start();

if (!isset($_SESSION['loginAdmin'])){
    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Management</title>
    <link rel="stylesheet" href="../asset/admin/dashboard.css"> 
</head>
<body>
    <header class="navbar">
        <div class="navbar-left">
            <span>Tahun ajaran 2024/2025</span>
        </div>
        
        <div class="navbar-right">
            <a href="index.php">Home</a>
            <a href="logout.php">Log out</a>
            <a href="profile.php"><span class="user-icon">&#128100;</span></a>
        </div>
    </header>

    <main class="main-content">
        <div class="cards-container">
            <div class="card">
                <div class="card-image-placeholder"></div>
                <a href="tambah.php"><button class="card-button">TAMBAH DATA</button></a>
            </div>

            <div class="card">
                <div class="card-image-placeholder"></div>
                <a href="lihat.php"><button class="card-button">LIHAT DATA</button></a>
            </div>

            <div class="card">
                <div class="card-image-placeholder"></div>
                <a href="ubah.php"><button class="card-button">UBAH DATA</button></a>
            </div>

            <div class="card">
                <div class="card-image-placeholder"></div>
                <a href="hapus.php"><button class="card-button">HAPUS DATA</button></a>
            </div>

            <div class="card">
            <div class="card-image-placeholder"></div>
                <a href="cari.php"><button class="card-button">CARI DATA</button></a>
            </div>
            </div>
        </div>
    </main>
</body>
</html>