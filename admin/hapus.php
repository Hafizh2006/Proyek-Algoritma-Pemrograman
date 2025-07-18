<?php 
session_start();


if (!isset($_SESSION['loginAdmin'])){
    header("Location:login.php");
    exit();
}

require_once "../Algoritma/algoritmaUtama.php";

$berhasilHapus = "";

if (isset($_POST['submit'])){
    $berhasilHapus = hapus($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
    <link rel="stylesheet" href="../asset/admin/hapus.css">
</head>
<body>

    <?php if ($berhasilHapus === true): ?>
        <div id="popup-success" style="
            display: flex;
            position: fixed;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: #78af4cff;
            color: white;
            padding: 18px 32px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            z-index: 9999;
            font-size: 1.1em;
            align-items: center;
            gap: 10px;
            min-width: 220px;
            justify-content: center;
            ">
            <span>Data berhasil dihapus</span>
        </div>
    <script>
        setTimeout(function() {
            document.getElementById('popup-success').style.display = 'none';
        }, 2000);
    </script>
    <?php endif; ?>
    
    <?php if ($berhasilHapus === false): ?>
        <div id="popup-success" style="
            display: flex;
            position: fixed;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff1a05ff;
            color: white;
            padding: 18px 32px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            z-index: 9999;
            font-size: 1.1em;
            align-items: center;
            gap: 10px;
            min-width: 220px;
            justify-content: center;
            ">
            <span>Data tidak berhasil dihapus</span>
        </div>
    <script>
        setTimeout(function() {
            document.getElementById('popup-success').style.display = 'none';
        }, 2000);
    </script>
    <?php endif; ?>

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
    
   <div class="container">
        <div class="login-box">
            <div class="form">
                <h1>HAPUS DATA MAHASISWA</h1>
                <form method="POST" id = "formdaftar" action="" ><br>
                    <input type="text" placeholder="Masukkan NIM" name="nim" id ="nim"><br>
                    <span class="error" id="errorNama"></span><br>
                    <button type="submit" name="submit" class="tombol">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>