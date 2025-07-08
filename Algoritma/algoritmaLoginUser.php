<?php 
session_start();


if ($_POST['username'] === 'mhs' && $_POST['password'] === 'mhs') {
    echo "<script>alert('Berhasil login');</script>";
    $_SESSION['loginUser'] = true;
    header("Location:../user/index.php");
    exit();
} else {
    echo "<script>alert('Username atau password salah')</script>";
    header("Location:../user/login.php");
    exit();
}

?>
