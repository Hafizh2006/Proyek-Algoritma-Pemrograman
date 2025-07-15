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
    <link rel="stylesheet" href="../asset/user/lihat.css">
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

                    <div class="dropdown-content">
                        <h4>Urutkan:</h4>
                        <a href="?sort=1&submit=submit"><button class= "ascending">Ascending</button></a>
                        <a href="?sort=2&submit=submit"><button class="descending">Descending</button></a>
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
                            <td><?php echo $mhs['nim'] ?></td>
                            <td><?php echo $mhs['nama'] ?></td>
                            <td><?php echo $mhs['jenis'] ?></td>
                            <td><?php echo $mhs['tanggalLahir'] ?></td>
                            <td><?php echo $mhs['fakultas'] ?></td>
                            <td><?php echo $mhs['jurusan'] ?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>