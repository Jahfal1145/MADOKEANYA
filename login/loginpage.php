<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MADOKEANYA</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body class="body-login">
  <nav>
    <div class="home-nav">
      <div class="nav-kiri">
        <div class="nav-logo">
          <a href="index.php"><img src="../foto/Logo.png" alt="Logo" width="50"></a>
        </div>
        <div class="nav-judul">
          <a href="../index.php"><span style="color: black;">MADOKE</span><span style="color:#E195AB;">ANYA</span></a>
        </div>
      </div>
      <div class="nav-kanan">
        <a href="../guest/mariberdonasi.php">mari berdonasi!</a>
        <a href="../guest/tentangkami.php">Tentang Kami</a>
        <a href="../guest/hubungikami.php">Hubungi Kami</a>
        <a href="../login/loginpage.php">login</a>
      </div>
    </div>
  </nav>

  <div class="login-intro">
    <div class="login-login-container">
      <h1 class="login-login">Log in</h1>
      <form action="login.php" method="post">
        <label for="username"></label>
        <input type="text" id="username" name="username" placeholder="Username.." required>

        <label for="password"></label>
        <input type="password" id="password" name="password" placeholder="Password.." required>

        <button class="login-button" type="submit">Login</button>
        <br>
        <h3 class="login-signuptext">
          doesn't have an account?
          <a href="regispage.php" class="login-signup">sign up!</a>
        </h3>
      </form>
    </div>
  </div>

 <footer>
    <div class="home-foot">
    <h2>MADOKE<span style="color: #E195AB;">ANYA</span></h2><br>
    <h4>©copyright MADOKEANYA 2024.</h4>
    </div>
  </footer>
  
  <script src="script.js"></script>
</body>

</html>