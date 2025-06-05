<?php
include "../../koneksi.php";
$id_donasi = $_GET['id_donasi'];
$query = mysqli_query($mysqli, "SELECT * FROM laporan WHERE id_donasi = '$id_donasi'") or die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Laporan</title>
  <style>
    body {
      display: flex;
      background-color: #f0f2f5;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: #ecf0f1;
      padding-top: 20px;
      position: fixed;
      height: 100vh;
    }
    .sidebar a {
      display: block;
      padding: 15px 20px;
      color: #ecf0f1;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #34495e;
    }
    .main-content {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #2c3e50;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .btn-back {
      margin-top: 10px;
      display: inline-block;
      padding: 10px 15px;
      background-color: #1abc9c;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <a href="../admin/admin.php"><h2>Admin Panel</h2></a>
  <a href="../user/user.php">Pengguna</a>
  <a href="../donasi/donasi.php">Donasi</a>
  <a href="../laporan/laporan.php">Laporan</a>
  <a href="../transaksi/transaksi.php">Transaksi</a>
  <a href="../metode/metode.php">Metode</a>
  <a href="../../login/loginpage.php">Keluar</a>
</div>

<div class="main-content">
  <h2>Detail Laporan - Donasi ID <?= $id_donasi ?></h2>

  <a class="btn-back" href="transaksi.php">← Kembali ke Laporan</a>

  <table>
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
      <?php while ($row = mysqli_fetch_assoc($query)) { ?>
      <tr>
        <td><?= $row['id_laporan'] ?></td>
        <td><?= $row['id_user'] ?></td>
        <td><?= $row['id_transaksi'] ?></td>
        <td><?= $row['tanggal'] ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
          <?php if ($row['status'] == 'pending') { ?>
            <a href="terima.php?id=<?= $row['id_laporan'] ?>">Terima</a> |
            <a href="tolak.php?id=<?= $row['id_laporan'] ?>">Batalkan</a>
          <?php } else { ?>
            <span>Selesai</span>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
