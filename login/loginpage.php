<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<nav>
 <div class="kiri">
    <div class="logo">
      <a href="index.php"><img src="../foto/Logo.png" alt="Logo" width="50"></a>
    </div>
    <div class="judul">
      <a href="../index.php"><span style="color: black;">MADOKE</span><span style="color:#E195AB;">ANYA</span></a>
    </div>
  </div>
</nav>

<div class="intro">
  <div class="login-container">
        <h1 class="login" >Log in</h1>
        <form action="login.php" method="post">
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="Username.." required>

            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Password.." required>

            <button class="button" type="submit">Login</button>
             <br>
            <h3 class="signuptext">doesnt have an account?<a href="regispage.php"class="signup"> sign up!</a></h3>
        </form>
  </div>
</div>

<footer>
  <h2>MADOKE<span style="color: #E195AB;">ANYA</span></h2><br>
    <h4>©copyright MADOKEANYA 2024.</h4>

</footer>

<script src="script.js"></script>
</body>
</html>