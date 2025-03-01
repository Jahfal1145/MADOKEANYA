<?php

    if (isset($_POST['Submit'])) {
        $username= $_POST['username'];
        $password= $_POST['password'];
        $email = $_POST['email'];
        $tipe = $_POST['tipe'];
        echo($password);

        include_once("koneksi.php");

        $result = mysqli_query($mysqli,"INSERT INTO user(username,password,email,tipe)
         VALUES('$username','$password','$email','$tipe')");
         
         if ($result) {
            if ($tipe == "admin") {
                header("location:../admin/admin.php");
            } else {
                header("location:../user/home.php");
            }

          header("location:../user/home.php");
        }
    }
?>
