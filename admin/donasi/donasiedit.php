<?php
    include("../../koneksi.php");

    $judul = '';
    $publisher = '';
    $deskripsi = '';
    $id = '';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $result = mysqli_query($mysqli, "SELECT * FROM donasi WHERE id_donasi=$id");
    
        while($user_data = mysqli_fetch_array($result))
        {
            $judul = $user_data['judul'];
            $publisher = $user_data['publisher'];
            $deskripsi = $user_data['deskripsi'];
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donasi</title>
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Tombol kembali */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            text-decoration: none;
            background-color: #d32f2f;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .back-button:hover {
            background-color: #b71c1c;
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffe5e5; /* merah keputihan */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 350px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #b00020;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        .form-container input[type="text"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #d32f2f;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-container input[type="submit"]:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>

    <!-- Tombol Kembali -->
    <a href="donasi.php" class="back-button">← Kembali</a>

    <!-- Form di tengah -->
    <div class="center-container">
        <div class="form-container">
            <h2>Edit Donasi</h2>
            <form action="donasiedit.php" method="post">
                <div>
                    <label>judul</label>
                    <input name="judul" type="text" value="<?php echo $judul;?>">
                </div>  
                <div>
                    <label>publisher</label>
                    <input name="publisher" type="text" value="<?php echo $publisher;?>">
                </div> 
                <div>
                    <label>deskripsi</label>
                    <input name="deskripsi" type="text" value="<?php echo $deskripsi;?>">
                </div> 
                <div>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="Simpan" value="Simpan">
                </div>
            </form>
        </div>
    </div>

</body>
</html>



<?php
include("../../koneksi.php");

if (isset($_POST['Simpan'])) {
    // var_dump($_POST);
    // die();
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $publisher = $_POST['publisher'];
    $deskripsi = $_POST['deskripsi'];

    // Update data
    $sql = "UPDATE donasi SET judul='$judul', publisher='$publisher', deskripsi='$deskripsi' WHERE id_donasi=$id";
    // var_dump($sql);
    // die();
    if (mysqli_query($mysqli, $sql)) {
        header("Location: donasi.php"); // kembali ke halaman admin
        exit();
    } else {
        echo "Gagal update data: " . mysqli_error($mysqli);
    }
}

?>
