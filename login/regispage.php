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
  
  <div class="signin-container">
    <h1 class="signin-title">Sign In</h1>
    <form action="regis.php" method="post" class="signin-form">
      <input type="text" id="username" name="username" placeholder="Username.." required />
      <input type="text" id="password" name="password" placeholder="Password.." required />
      <input type="text" id="email" name="email" placeholder="Email.." required />
      <button type="submit" name="submit" class="signin-button">Submit</button>
    </form>
  </div>
  
 <footer>
    <div class="home-foot">
    <h2>MADOKE<span style="color: #E195AB;">ANYA</span></h2><br>
    <h4>©copyright MADOKEANYA 2024.</h4>
    </div>
  </footer>

</body>
</html>