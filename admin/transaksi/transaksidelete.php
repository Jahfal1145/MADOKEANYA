<?php
include("../../koneksi.php");

if (isset($_GET['id'])) {
    $id_hapus = $_GET['id'];

    $stmt = mysqli_prepare($mysqli, "DELETE FROM transaksi WHERE id_transaksi=?");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_hapus);

        if (mysqli_stmt_execute($stmt)) {

            header("Location: transaksi.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($mysqli);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($mysqli);
    }
} else {

    header("Location: transaksi.php");
    exit();
}

mysqli_close($mysqli);
?>