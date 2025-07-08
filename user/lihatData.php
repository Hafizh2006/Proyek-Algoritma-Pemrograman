<?php 
session_start();

if (!isset($_SESSION['loginUser'])){
    header("Location:login.php");
    exit();
}


require_once "../Algoritma/algoritmaUtama.php";



if (isset($_GET['submit'])){

    if ($_GET['sort'] == 1){
        $dataMahasiswa = ambilData();
        $dataMahasiswa = selectionsort_ascending($dataMahasiswa);
        //var_dump($dataMahasiswa); die;
    }else if ($_GET['sort'] == 2){
        $dataMahasiswa = ambilData();
        $dataMahasiswa = selectionsort_descending($dataMahasiswa);
        //var_dump($dataMahasiswa); die;
    }

} else {
    $dataMahasiswa = ambilData();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/user/dashboard.css"> </head>
</head>
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
    <div class="container">
        <main>
            <div class="tahun-ajaran">
                Tahun ajaran 2024/2025
            </div>

            <div class="controls">
                <div class="dropdown">
                    <button class="dropbtn">
                        <span class="arrow-down"></span>
                    </button>
                    <div class="dropdown-content">
                        <h4>Urutkan berdasarkan:</h4>
                        <a href="?sort_column=nim&sort_order=ASC">NIM (Ascending)</a>
                        <a href="?sort_column=nim&sort_order=DESC">NIM (Descending)</a>
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
                        <?php foreach ($dataMahasiswa as $mhs): ?>
                        <tr>
                            <th><?php echo $mhs['nim'] ?></th>
                            <th><?php echo $mhs['nama'] ?></th>
                            <th><?php echo $mhs['jenis'] ?></th>
                            <th><?php echo $mhs['tanggalLahir'] ?></th>
                            <th><?php echo $mhs['fakultas'] ?></th>
                            <th><?php echo $mhs['jurusan'] ?></th>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>