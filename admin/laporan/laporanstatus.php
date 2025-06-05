<?php
include "../../koneksi.php";

if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id_laporan = $_GET['id'];
    $aksi = $_GET['aksi'];

    if ($aksi == 'terima') {
        $status = 'berhasil';
    } elseif ($aksi == 'tolak') {
        $status = 'ditolak';
    } else {
        die("Aksi tidak valid.");
    }

    $query = mysqli_query($mysqli, "UPDATE laporan SET status='$status' WHERE id_laporan='$id_laporan'");

    if ($query) {
        header("Location: laporan.php"); // Kembali ke halaman laporan
        exit();
    } else {
        echo "Gagal mengubah status.";
    }
} else {
    echo "ID atau aksi tidak ditemukan.";
}
?>
