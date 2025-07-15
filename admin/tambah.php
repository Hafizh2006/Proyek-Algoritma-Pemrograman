<?php
session_start(); 
// var_dump($_SESSION['loginAdmin']); die;


if (!isset($_SESSION['loginAdmin'])) {
    header("Location:login.php");
    exit();
}

// ambil semua function
require_once "../Algoritma/algoritmaUtama.php";


$berhasilTambah = false;
if (isset($_POST['submit'])) {
    tambahData($_POST);
    $berhasilTambah = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="../asset/admin/tambah.css">
</head>
<body>
    <?php if ($berhasilTambah): ?>
    <div id="popup-success" style="
        display: flex;
        position: fixed;
        top: 30px;
        left: 50%;
        transform: translateX(-50%);
        background: #4CAF50;
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
        <span>Data berhasil ditambahkan</span>
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

    <main class="container">
        <div class="form-card">
            <h2>TAMBAHKAN DATA MAHASISWA</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" placeholder="Masukkan NIM" name="nim" id="nim">
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Masukkan Nama" name="nama" id="nama">
                </div class="input-group">
                <div class="input-group">
                    <input type="date" id="tanggalLahir" name="tanggalLahir">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Jenis Kelamin" name="jenis" id="jenis">
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Fakultas" name="fakultas" id="fakultas">
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Program Studi" name="jurusan" id="jurusan">
                </div>

                <button type="submit" name="submit" class="submit-button">Tambahkan</button>
            </form>
        </div>
    </main>
</body>
</html>