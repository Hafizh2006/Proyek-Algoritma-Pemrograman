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
    <link rel="stylesheet" href="dashboard.css"> </head>
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
                <a href="tambah.php"><button class="card-button">TAMBAH DATA</button></a>
            </div>

            <div class="card">
                <div class="card-image-placeholder"></div>
                <a href="lihat.php"></a><button class="card-button">LIHAT DATA</button>
            </div>
        </div>
    </main>
</body>
</html>