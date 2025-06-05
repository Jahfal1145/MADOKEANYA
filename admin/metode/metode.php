<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Page</title>
  <link rel="stylesheet" href="style.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-color: #f0f2f5;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: #ecf0f1;
      display: flex;
      flex-direction: column;
      padding-top: 20px;
      position: fixed;
      height: 100%;
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

    .sidebar a.active {
      background-color: #1abc9c;
    }

    /* Konten utama */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }

    /* Kartu user */
    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 15px;
      width: calc(25% - 20px); /* 4 per baris, dikurangi gap */
      background-color: white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .card h3 {
      margin-top: 0;
      margin-bottom: 5px;
    }

    .card p {
      margin-bottom: 5px;
    }

    .card .actions a {
      margin-right: 10px;
      text-decoration: none;
    }

    .edit {
      color: green;
    }

    .delete {
      color: red;
    }

    /* Responsive: 2 per baris di layar kecil */
    @media (max-width: 768px) {
      .card {
        width: calc(50% - 20px);
      }
    }

    /* Responsive: 1 per baris di layar sangat kecil */
    @media (max-width: 480px) {
      .card {
        width: 100%;
      }

    }

    .card img {
    width: 263px;              /* Gambar selebar kartu */
    height: 191px;            /* Atur tinggi tetap (bisa kamu ubah) */
    object-fit: cover;        /* Potong gambar agar tidak terdistorsi */
    border-radius: 5px 5px 0 0; /* Bulatan hanya di bagian atas gambar */
    margin-bottom: 10px;
    }

    .floating-button {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background-color: #1abc9c;
  color: white;
  padding: 15px 25px;
  border-radius: 50px;
  text-decoration: none;
  font-size: 16px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
  transition: background-color 0.3s;
  z-index: 1000;
}

.floating-button:hover {
  background-color: #16a085;
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
    <div class="card-container">
      <?php
      include "../../koneksi.php";
      $query_mysql = mysqli_query($mysqli, "SELECT * FROM metode_pembayaran") or die(mysqli_error());
      while ($data = mysqli_fetch_array($query_mysql)) {
      ?>
      <div class="card">
        <img src="logometode/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>">
            <h3><?php echo $data['nama_metode']; ?></h3>
            <p><strong>ID:</strong> <?php echo $data['id_pembayaran']; ?></p>
             <p><strong>Perusahaan:</strong> <?php echo $data['perusahaan']; ?></p>
        <p class="actions">
          <a class="delete" href='metodedelete.php?id=<?php echo $data['id_metode']; ?>'>Delete</a>
        </p>
      </div>
      <?php } ?>
    </div>
  </div>

  <a href="metodetambah.php" class="floating-button">Tambah</a>


  <script src="scripts.js"></script>
</body>
</html>

