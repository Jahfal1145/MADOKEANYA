<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($mysqli,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0)

    $data = mysqli_fetch_assoc($login);

    if($data['tipe']=="admin"){

        $_SESSION['username'] = $username;
        $_SESSION['TIPE'] = "admin";
        header("location:../admin/admin.php");

    }else if($data['tipe']=="user"){

        $_SESSION['username'] = $username;
        $_SESSION['TIPE'] = "user";
        header("location:../user/home.php");

    }else{
    header("location:salah.php");
}