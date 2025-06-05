<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donasi Page</title>
  <link rel="stylesheet" href="../../style.css" />
</head>
<body class="donasi-admin-body">

  <div class="donasi-admin-sidebar">
    <a href="../admin.php"><h2>Admin Panel</h2></a>
    <a href="../user/user.php">Pengguna</a>
    <a href="../donasi/donasi.php">Donasi</a>
    <a href="../laporan/laporan.php">Laporan</a>
    <a href="../transaksi/transaksi.php">Transaksi</a>
    <a href="../metode/metode.php">Metode</a>
    <a href="../../login/loginpage.php">Keluar</a>
  </div>

  <div class="donasi-admin-main-content">
    <div class="donasi-admin-card-container">
      <?php
      include "../../koneksi.php";
      $query_mysql = mysqli_query($mysqli, "SELECT * FROM donasi") or die(mysqli_error());
      while ($data = mysqli_fetch_array($query_mysql)) {
      ?>
      <div class="donasi-admin-card">
        <img src="fotopost/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>">
        <h3><?= $data['judul']; ?></h3>
        <p><strong>ID:</strong> <?= $data['id_donasi']; ?></p>
        <p><strong>publisher:</strong> <?= $data['publisher']; ?></p>
        <p><strong>tanggal:</strong> <?= $data['tanggal']; ?></p>
        <p><strong>deskripsi:</strong> <?= $data['deskripsi']; ?></p>
        <p class="donasi-admin-actions">
          <a class="donasi-admin-edit" href='donasiedit.php?id=<?= $data['id_donasi']; ?>'>Edit</a>
          <a class="donasi-admin-delete" href='donasidelete.php?id=<?= $data['id_donasi']; ?>'>Delete</a>
        </p>
      </div>
      <?php } ?>
    </div>
  </div>

  <a href="donasitambah.php" class="donasi-admin-floating-button">Tambah</a>

  <script src="scripts.js"></script>
</body>
</html>
