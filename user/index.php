<?php 

if (!isset($_SESSION['loginUser'])){
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
            <a href="#">Home</a>
            <a href="#">Log out</a>
            <span class="user-icon">&#128100;</span>
        </div>
    </header>

    <main class="main-content">
        <div class="cards-container">
            <div class="card">
                <div class="card-image-placeholder"></div>
                <button class="card-button">LIHAT DATA</button>
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