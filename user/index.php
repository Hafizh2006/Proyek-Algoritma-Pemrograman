<?php 
session_start();

if (!isset($_SESSION['loginUser'])){
    header("Location:login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Management</title>
    <link rel="stylesheet" href="../asset/user/dashboard.css"> </head>
<body>
    <header class="navbar">
        <div class="navbar-left">
            <span>Tahun ajaran 2024/2025</span>
        </div>
        <div class="navbar-right">
            <a href="index.php">Home</a>
            <a href="logout.php">Log out</a>
            <span class="user-icon">&#128100;</span>
        </div>
    </header>
    <main class="main-content">
        <div class="cards-container">
            <div class="card">
                <div class="card-image-placeholder"></div>
                <a href="lihatData.php"><button class="card-button">LIHAT DATA</button></a>
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