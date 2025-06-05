<?php
include "../../koneksi.php";

// Ambil ID Donasi dari URL
if (isset($_GET['id_donasi'])) {
    $id_donasi = $_GET['id_donasi'];

    // Ambil detail donasi
    $query_donasi = mysqli_query($mysqli, "SELECT * FROM donasi WHERE id_donasi = '$id_donasi'");
    $donasi = mysqli_fetch_assoc($query_donasi);

    if (!$donasi) {
        die("Donasi tidak ditemukan.");
    }

    // Ambil laporan terkait
    $query_laporan = "SELECT * FROM laporan WHERE id_donasi = '$id_donasi' ORDER BY tanggal DESC";
    $laporan_result = mysqli_query($mysqli, $query_laporan);

    if (!$laporan_result) {
        die("Query laporan gagal: " . mysqli_error($mysqli));
    }

} else {
    header("Location: laporan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Detail Donasi</title>
    <link rel="stylesheet" href="../style.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            position: fixed;
            height: 100vh;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            color: #ecf0f1;
            display: block;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .donasi-detail {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .laporan-table, .sub-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .laporan-table thead, .sub-table thead {
            background-color: #2c3e50;
            color: white;
        }

        .laporan-table th, .laporan-table td,
        .sub-table th, .sub-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .sub-table {
            width: 95%;
            margin: 10px auto;
            background-color: #fdfdfd;
        }

        .accept {
            color: green;
            text-decoration: none;
        }
        .reject {
            color: red;
            text-decoration: none;
        }
        .done {
            color: gray;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="../admin/admin.php"><h2>Admin Panel</h2></a>
    <a href="../user/user.php">Pengguna</a>
    <a href="../donasi/donasi.php">Donasi</a>
    <a href="../laporan/laporan.php" class="active">Laporan</a>
    <a href="../transaksi/transaksi.php">Transaksi</a>
    <a href="../metode/metode.php">Metode</a>
    <a href="../../login/loginpage.php">Keluar</a>
</div>

<div class="main-content">
    <h2>Detail Donasi</h2>

    <div class="donasi-detail">
        <h3><?= htmlspecialchars($donasi['judul']) ?></h3>
        <p><strong>Publisher:</strong> <?= htmlspecialchars($donasi['publisher']) ?></p>
        <p><strong>Deskripsi:</strong> <?= htmlspecialchars($donasi['deskripsi']) ?></p>
        <p><strong>Target:</strong> <?= htmlspecialchars($donasi['target']) ?></p>
    </div>

    <h3>Laporan Terkait</h3>

    <?php if (mysqli_num_rows($laporan_result) > 0): ?>
        <table class="laporan-table">
            <thead>
                <tr>
                    <th>ID Laporan</th>
                    <th>ID User</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($laporan = mysqli_fetch_assoc($laporan_result)): ?>
                    <tr>
                        <td><?= $laporan['id_laporan'] ?></td>
                        <td><?= $laporan['id_user'] ?></td>
                        <td><?= $laporan['id_transaksi'] ?></td>
                        <td><?= $laporan['tanggal'] ?></td>
                        <td><?= $laporan['deskripsi'] ?></td>
                        <td><?= $laporan['status'] ?></td>
                        <td>
                            <?php if ($laporan['status'] == 'pending'): ?>
                                <a class="accept" href='laporanstatus.php?id=<?= $laporan['id_laporan'] ?>&status=terima'>Terima</a> |
                                <a class="reject" href='laporanstatus.php?id=<?= $laporan['id_laporan'] ?>&status=tolak'>Batalkan</a>
                            <?php else: ?>
                                <span class="done">Selesai</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                    // Ambil data transaksi terkait
                    $id_transaksi = $laporan['id_transaksi'];
                    $query_transaksi = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
                    if ($transaksi = mysqli_fetch_assoc($query_transaksi)):
                    ?>
                        <tr>
                            <td colspan="7">
                                <table class="sub-table">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>ID Metode</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $transaksi['id_transaksi'] ?></td>
                                            <td><?= $transaksi['id_metode'] ?></td>
                                            <td><?= $transaksi['tanggal'] ?></td>
                                            <td><?= "Rp " . number_format($transaksi['jumlah'], 0, ',', '.') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada laporan.</p>
    <?php endif; ?>

    <a href="../laporan/laporan.php" class="back-button">← Kembali ke Laporan</a>
</div>

</body>
</html>
