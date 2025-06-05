<?php
session_start();
require '../koneksi.php'; // atau sesuaikan path koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Querynya gunakan backtick karena 'user' adalah reserved word
    $query = "SELECT id_user, password, tipe FROM `user` WHERE username = ?";
    $stmt = $mysqli->prepare($query);

    // Cek jika prepare gagal
    if (!$stmt) {
        die("Query gagal dipersiapkan: (" . $mysqli->errno . ") " . $mysqli->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Cek apakah user ditemukan
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password, $tipe);
        $stmt->fetch();

        if ($password === $hashed_password) {
            $_SESSION['id_user'] = $id;
            $_SESSION['tipe'] = $tipe;

            // Redirect sesuai tipe
            if ($tipe === 'user') {
                header("Location: ../user/home.php");
            } elseif ($tipe === 'admin') {
                header("Location: ../admin/admin.php");
            } elseif ($tipe === 'penerima') {
                header("Location: ../penerima/penerima.php");
            }
            exit;
        } else {
            echo "❌ Password salah!";
        }
    } else {
        echo "❌ User tidak ditemukan!";
    }

    $stmt->close();
}
?>
