<?php
require_once 'algoritmaUtama.php';

$hasilPencarian = null;
$nimYangDicari = '';
$pesan = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nim_cari']) && !empty(trim($_POST['nim_cari']))) {
        $nimYangDicari = trim($_POST['nim_cari']);

        $semuaDataMahasiswa = ambilData();

        $hasilPencarian = cari($semuaDataMahasiswa, $nimYangDicari);

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
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="hapus.css">
</head>
<body>
   <div class="container">
        <div class="login-box">
            <div class="form">
                <h1>CARI DATA MAHASISWA</h1>
                <form method="POST" id = "formdaftar" action="proses.php"><br>
                    <input type="text" placeholder="Masukkan NIM" name="nama" id = "nama"><br>
                    <button type = "submit" name = "daftar" class = "tombol">CARI</button>
                </form>
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
                            <th><?php echo htmlspecialchars($hasilPencarian['nim']); ?></th>
                            <th><?php echo htmlspecialchars($hasilPencarian['nama']); ?></th>
                            <th><?php echo htmlspecialchars($hasilPencarian['jenis']); ?></th>
                            <th><?php echo htmlspecialchars($hasilPencarian['tanggalLahir']); ?></th>
                            <th><?php echo htmlspecialchars($hasilPencarian['fakultas']); ?></th>
                            <th><?php echo htmlspecialchars($hasilPencarian['jurusan']); ?></th>
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