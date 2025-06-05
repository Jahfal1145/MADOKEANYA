<?php
include "../../koneksi.php";
$query = mysqli_query($mysqli, "SELECT DISTINCT id_donasi FROM laporan") or die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laporan Donasi</title>
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
    .donasi-box {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .donasi-box a {
      text-decoration: none;
      color: #2c3e50;
      font-size: 18px;
      font-weight: bold;
    }
    .donasi-box a:hover {
      color: #1abc9c;
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
  <h2>Daftar Laporan Per Donasi</h2>

  <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <div class="donasi-box">
      <a href="transaksitabel.php?id_donasi=<?= $row['id_donasi'] ?>">Lihat Laporan untuk Donasi ID <?= $row['id_donasi'] ?></a>
    </div>
  <?php } ?>

</div>
</body>
</html>
