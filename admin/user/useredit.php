<?php
    include("../../koneksi.php");

    $username = '';
    $password = '';
    $email = '';
    $tipe = '';
    $id = '';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $result = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user=$id");
    
        while($user_data = mysqli_fetch_array($result))
        {
            $username = $user_data['username'];
            $password = $user_data['password'];
            $email = $user_data['email'];
            $tipe = $user_data['tipe'];
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
    <a href="user.php" class="back-button">← Kembali</a>

    <!-- Form di tengah -->
    <div class="center-container">
        <div class="form-container">
            <h2>Edit User</h2>
            <form action="useredit.php" method="post">
                <div>
                    <label>Username</label>
                    <input name="username" type="text" value="<?php echo $username;?>">
                </div>  
                <div>
                    <label>Password</label>
                    <input name="password" type="text" value="<?php echo $password;?>">
                </div> 
                <div>
                    <label>Level</label>
                    <select id="level" name="tipe">
                        <option value="admin" <?php if($tipe == "admin") echo "selected"; ?>>Admin</option>
                        <option value="user" <?php if($tipe == "user") echo "selected"; ?>>User</option>
                    </select>
                </div>  
                <div>
                    <label>Email</label>
                    <input name="email" type="text" value="<?php echo $email;?>">
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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $tipe = $_POST['tipe'];

    // Update data
    $sql = "UPDATE user SET username='$username', password='$password', email='$email', tipe='$tipe' WHERE id_user=$id";
    // var_dump($sql);
    // die();
    if (mysqli_query($mysqli, $sql)) {
        header("Location: user.php"); // kembali ke halaman admin
        exit();
    } else {
        echo "Gagal update data: " . mysqli_error($mysqli);
    }
}

?>
