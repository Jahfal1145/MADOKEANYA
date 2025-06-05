<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Page</title>
  <link rel="stylesheet" href="../../style.css">
</head>
<body class="user-admin-body">

  <div class="user-admin-sidebar">
    <a href="../admin.php"><h2>Admin Panel</h2></a>
    <a href="../user/user.php">Pengguna</a>
    <a href="../donasi/donasi.php">Donasi</a>
    <a href="../laporan/laporan.php">Laporan</a>
    <a href="../transaksi/transaksi.php">Transaksi</a>
    <a href="../metode/metode.php">Metode</a>
    <a href="../../login/loginpage.php">Keluar</a>
  </div>

  <div class="user-admin-main-content">
    <div class="user-admin-card-container">
      <?php
      include "../../koneksi.php";
      $query_mysql = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error());
      while ($data = mysqli_fetch_array($query_mysql)) {
      ?>
      <div class="user-admin-card">
        <h3><?php echo $data['username']; ?></h3>
        <p><strong>ID:</strong> <?php echo $data['id_user']; ?></p>
        <p><strong>Password:</strong> <?php echo $data['password']; ?></p>
        <p><strong>Tipe:</strong> <?php echo $data['tipe']; ?></p>
        <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
        <p class="user-admin-actions">
          <a class="user-admin-edit" href='useredit.php?id=<?php echo $data['id_user']; ?>'>Edit</a>
          <a class="user-admin-delete" href='userdelete.php?id=<?php echo $data['id_user']; ?>'>Delete</a>
        </p>
      </div>
      <?php } ?>
    </div>
  </div>

  <script src="scripts.js"></script>
</body>
</html>
