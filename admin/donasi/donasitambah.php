<?php
    include "../../koneksi.php";

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $target = $_POST['target'];
    $foto = $_FILES['foto']['name'];
    $deskripsi = $_POST['deskripsi'];
    $publisher = $_POST['publisher'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "fotopost/$foto");
    
    $sql = "INSERT INTO donasi (judul, target, foto, deskripsi, publisher) VALUES ('$judul', '$target', '$foto','$deskripsi','$publisher');";
    $result = mysqli_query( $mysqli, $sql);
}

// READ
$result = $mysqli->query("SELECT * FROM donasi");

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Donasi</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #ffffff;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
    }

    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
    }

    .back-button a {
      background-color: #d32f2f;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 10px;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      font-weight: bold;
      display: inline-block;
    }

    .form-container {
      background-color: #ffe5e5;
      padding: 30px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #c62828;
    }

    .form-container label {
      display: block;
      margin: 12px 0 6px;
      font-weight: bold;
    }

    .form-container input[type="text"],
    .form-container input[type="file"],
    .form-container textarea {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      margin-bottom: 5px;
    }

    .form-container textarea {
      resize: vertical;
      min-height: 80px;
    }

    .form-container button[type="submit"] {
      width: 100%;
      background-color: #d32f2f;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      margin-top: 15px;
      cursor: pointer;
    }

    .form-container button[type="submit"]:hover {
      background-color: #b71c1c;
    }
  </style>
</head>
<body>

  <div class="back-button">
    <a href="donasi.php">&larr; Kembali</a>
  </div>

  <div class="form-container">
    <h2>Tambah Tabel</h2>
    <form method="POST" enctype="multipart/form-data">
      <label>Nama Tabel:</label>
      <input type="text" name="judul" required>

      <label>target:</label>
      <input type="text" name="target" required>

      <label>Foto:</label>
      <input type="file" name="foto" required>
      *FOTO HARUS 263 x 191 px !

      <label>deskripsi:</label>
      <textarea name="deskripsi" required></textarea>

      <label>Publisher:</label>
      <input type="text" name="publisher" required>     

      <button type="submit" name="create">Tambah</button>
    </form>
  </div>

</body>
</html>

