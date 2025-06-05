<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include "../login/koneksi.php";

// Cek apakah sudah login sebagai penerima
if (!isset($_SESSION['id_penerima'])) {
    die("Anda harus login sebagai penerima");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $target = $_POST['target'];
    $foto = $_FILES['foto']['name'];
    $id_penerima = $_SESSION['id_penerima'];

    $target_dir = "../admin/fotopost/";
    $target_file = $target_dir . basename($foto);

    // Upload foto
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $stmt = $mysqli->prepare("INSERT INTO donasi (judul, deskripsi, target, foto, id_penerima, status) VALUES (?, ?, ?, ?, ?, 'pending')");
        $stmt->bind_param("ssisi", $judul, $deskripsi, $target, $foto, $id_penerima);
        $stmt->execute();
        echo "Donasi berhasil diajukan. Menunggu persetujuan admin.";
    } else {
        echo "Gagal upload foto.";
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Judul Donasi: <input type="text" name="judul"><br>
    Deskripsi: <textarea name="deskripsi"></textarea><br>
    Target (Rp): <input type="number" name="target"><br>
    Foto: <input type="file" name="foto"><br>
    <button type="submit">Ajukan Donasi</button>
</form>

</body>
</html>