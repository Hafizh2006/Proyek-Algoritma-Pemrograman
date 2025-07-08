<?php
session_start(); 
// var_dump($_SESSION['loginAdmin']); die;


if (!isset($_SESSION['loginAdmin'])) {
    header("Location:login.php");
    exit();
}

// ambil semua function
require_once "../Algoritma/algoritmaUtama.php";

if (isset($_POST['submit'])) {
    tambahData($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nim">NIM : </label>
        <input type="number" id="nim" name="nim" required>
        <br>
        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama" required>
        <br>
        <label for="jenis">Jenis Kelamin : </label>
        <input type="text" id="jenis" name="jenis" required>
        <br>
        <label for="fakultas">Fakultas : </label>
        <input type="text" id="fakultas" name="fakultas" required>
        <br>
        <label for="jurusan">Program Studi : </label>
        <input type="text" id="jurusan" name="jurusan" required>
        <br>
        <label for="">Tahun Ajaran :</label>
        <input type="text" id="tahunAjaran" name="tahunAjaran" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
    <a href="index.php"><button>Kembali</button></a>
</body>
</html>