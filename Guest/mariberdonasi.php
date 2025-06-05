<?php
session_start();
include "../koneksi.php";

if (!isset($mysqli) || $mysqli->connect_error) {
    die("Koneksi gagal: " . ($mysqli->connect_error ?? 'Variabel $conn tidak ada'));
}

$result = $mysqli->query("SELECT * FROM donasi");
?>



<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MADOKEANYA</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <nav>
    <div class="home-nav">
    <div class="nav-kiri">
      <div class="nav-logo">
        <a href="../index.php"><img src="../foto/Logo.png" alt="Logo" width="50"></a>
      </div>
      <div class="nav-judul">
        <a href="../index.php"><span style="color: black;">MADOKE</span><span style="color:#E195AB;">ANYA</span></a>
      </div>
    </div>
    <div class="nav-kanan">
      <a href="mariberdonasi.php">Mari berdonasi!</a>
      <a href="tentangkami.php">Tentang Kami</a>
      <a href="hubungikami.php">Hubungi Kami</a>
      <a href="../login/loginpage.php">Login</a>
    </div>
  </nav>
</div>
    <center><h2>Tabel Donasi</h2></center>

<?php
if ($result->num_rows > 0) {
    echo '<div class="donasi-container">';
    while ($row = $result->fetch_assoc()) { ?>
        <div class="donasi-item">
            <div class="donasi-foto">
                <img src="../admin/donasi/fotopost/<?= $row['foto'] ?>" alt="<?= $row['judul'] ?>">
            </div>
            <div class="donasi-info">
                <div class="donasi-judul"><?= $row['judul'] ?></div>
                <div class="donasi-publisher">Publisher: <?= $row['publisher'] ?></div>
                <div class="donasi-deskripsi">
                    <?= strlen($row['deskripsi']) > 50 ? substr($row['deskripsi'], 0, 50) . '...' : $row['deskripsi']; ?>
                </div>
                <div class="donasi-target">Target: <?= $row['target'] ?></div>
                <a href="../login/loginpage.php">Lihat lebih lanjut</a>
            </div>
        </div>
<?php
    }
    echo '</div>';
} else {
    echo "<p>Tidak ada data donasi.</p>";
}
$mysqli->close();
?>


</body>
</html>