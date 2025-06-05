<?php
include "../../koneksi.php";

// Ambil data donasi dan simpan ke array
$query_mysql = mysqli_query($mysqli, "SELECT DISTINCT id_donasi, judul FROM donasi") or die(mysqli_error($mysqli));
$donasi_data = [];
while ($data = mysqli_fetch_array($query_mysql)) {
  $donasi_data[] = $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Laporan</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Gaya seperti sebelumnya */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
    }

    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: #ecf0f1;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 20px;
    }

    .sidebar h2 {
      text-align: center;
      font-size: 22px;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 15px 20px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
    }

    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .card h3 {
      margin-bottom: 10px;
      font-size: 20px;
    }

    .card p {
      color: #555;
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
  <h2>Data Laporan per Donasi</h2>
  <div class="cards-container">

    <?php
    foreach ($donasi_data as $donasi) {
      echo '
        <a href="laporantabel.php?id_donasi=' . $donasi['id_donasi'] . '" style="text-decoration: none; color: inherit;">
          <div class="card">
            <h3>' . htmlspecialchars($donasi['judul']) . '</h3>
            <p>Lihat laporan untuk donasi ini</p>
          </div>
        </a>
      ';
    }
    ?>

  </div>
</div>

</body>
</html>
