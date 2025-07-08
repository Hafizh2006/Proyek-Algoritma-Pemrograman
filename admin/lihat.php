<?php 
session_start();

if (!isset($_SESSION['loginAdmin'])){
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
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <form action="" method="GET">
        <select name="sort" id="sort">
            <option value="1">Ascending</option>
            <option value="2">Descending</option>
        </select>
        <button type="submit" name="submit">Terapkan</button>
    </form>    
        <table>
            <thead>
                <th> Nim </th>
                <th> Nama </th>
                <th> Jenis Kelamin </th>
                <th> Fakultas </th>
                <th> Program Studi </th>
                <th> Tahun Ajaran </th>
            </thead>
            <tbody>
                <?php foreach ($dataMahasiswa as $mhs): ?>
                <tr>
                    <th><?php echo $mhs['nim'] ?></th>
                    <th><?php echo $mhs['nama'] ?></th>
                    <th><?php echo $mhs['jenis'] ?></th>
                    <th><?php echo $mhs['fakultas'] ?></th>
                    <th><?php echo $mhs['jurusan'] ?></th>
                    <th><?php echo $mhs['tahunAjaran'] ?></th>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        
    <a href="index.php"><button>Kembali</button></a>    
</body>
</html>