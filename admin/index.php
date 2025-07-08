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
    <title>Admin Dashboard</title>
</head>
<body>
     <a href="tambah.php"><button>Tambah Data Mahasiswa</button></a>
     <a href="lihat.php"><button>Lihat Data</button></a>
     <a href="logout.php"><button>Logout</button></a>
</body>
</html>