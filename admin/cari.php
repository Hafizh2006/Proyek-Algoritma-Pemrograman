<?php
session_start();

if (!isset($_SESSION['loginAdmin'])){
    header("Location:login.php");
    exit();
}


require_once '../Algoritma/algoritmaUtama.php';

$hasilPencarian = null;
$nimYangDicari = '';
$pesan = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nim']) && !empty(trim($_POST['nim']))) {
        $nimYangDicari = ($_POST['nim']);
        $semuaDataMahasiswa = ambilData();
        $hasilPencarian = cari($semuaDataMahasiswa, $nimYangDicari);
        // var_dump($hasilPencarian); die;
        if ($hasilPencarian === null) {
            $pesan = "Data mahasiswa dengan NIM '" . htmlspecialchars($nimYangDicari) . "' tidak ditemukan.";
        }
    } else {
        $pesan = "Mohon masukkan NIM yang ingin dicari.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARI DATA MAHASISWA</title>
    <link rel="stylesheet" href="../asset/admin/cari.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-left">
            <span>Tahun ajaran 2024/2025</span>
        </div>
        
        <div class="navbar-right">
            <a href="index.php">Home</a>
            <a href="logout.php">Log out</a>
            <a><span class="user-icon">&#128100;</span></a>
        </div>
    </header>

   <div class="container">
        <div class="login-box">
            <div class="form">
                <h1>CARI DATA MAHASISWA</h1>
                <form method="POST" id = "formdaftar" action=""><br>
                    <input type="text" placeholder="Masukkan NIM" name="nim" id = "nim"><br>
                    <span class="error" id="errorNama"></span><br>
                    <button type ="submit" name ="submit" class ="tombol">CARI</button>
                </form>
            </div>
        </div>
    </div>
                <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Fakultas</th>
                            <th>Program studi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php if ($hasilPencarian !== null): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($hasilPencarian['nim']); ?></td>
                            <td><?php echo htmlspecialchars($hasilPencarian['nama']); ?></td>
                            <td><?php echo htmlspecialchars($hasilPencarian['jenis']); ?></td>
                            <td><?php echo htmlspecialchars($hasilPencarian['tanggalLahir']); ?></td>
                            <td><?php echo htmlspecialchars($hasilPencarian['fakultas']); ?></td>
                            <td><?php echo htmlspecialchars($hasilPencarian['jurusan']); ?></td>
                       </tr>
                <?php endif; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>