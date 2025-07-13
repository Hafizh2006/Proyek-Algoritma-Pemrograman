<?php 
session_start();
if (!isset($_SESSION['loginAdmin'])){
    header("Location:login.php");
    exit();
}

require_once "../Algoritma/algoritmaUtama.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ubah($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="../asset/admin/hapus.css">
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
   <div class="container">
        <div class="login-box">
            <div class="form">
                <h1>UBAH DATA MAHASISWA</h1>
                <form action="" method="POST" id = "formdaftar"><br>
                    <input type="text" placeholder="Masukkan NIM" name="nim" id = "nim" required><br>

                    <input type="text" placeholder="Masukkan Nama" name="nama" id = "nama"><br>

                    <input type="text" placeholder="Masukkan Jenis Kelamin" name="jenis" id = "jenis"><br>

                    <input type="text" placeholder="Masukkan Fakultas" name="fakultas" id = "fakultas"><br>

                    <input type="text" placeholder="Masukkan Program Studi" name="jurusan" id = "jurusan"><br>

                    <span class="error" id="errorNama"></span><br>
                    <button type = "submit" name = "daftar" class = "tombol">UBAH</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>