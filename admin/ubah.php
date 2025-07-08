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
                <form method="POST" id = "formdaftar" action="../Algoritma/proses.php"><br>
                    <input type="text" placeholder="Masukkan NIM" name="nim" id = "nim"><br>

                    <input type="text" placeholder="Masukkan Nama" name="nama" id = "nama"><br>

                    <input type="text" placeholder="Masukkan Jenis Kelamin" name="jenis" id = "jenis"><br>

                    <input type="text" placeholder="Masukkan Fakultas" name="fakultas" id = "fakultas"><br>

                    <input type="text" placeholder="Masukkan Program Studi" name="jurusan" id = "jurusan"><br>

                    <input type="text" placeholder="Masukkan Tahun Ajaran" name="tahunAjaran" id = "tahunAjaran"><br>

                    <span class="error" id="errorNama"></span><br>
                    <button type = "submit" name = "daftar" class = "tombol">UBAH</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>