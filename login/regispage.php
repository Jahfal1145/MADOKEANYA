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


<h1 class="login" >Sign In</h1>
  <form action="regis.php" method="post">

    <input type="text" id="username" name="username" placeholder="Username.." required>

    <input type="text" id="password" name="password" placeholder="Password.." required>

    <input type="text" id="email" name="email" placeholder="Email.." required>

        <select id="tipe" name="tipe" class="tipe">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>

    <button type="Submit" name="Submit">Submit</button>
  </form>

<footer>
  <h2>MADOKE<span style="color: #E195AB;">ANYA</span></h2><br>
    <h4>©copyright MADOKEANYA 2024.</h4>

</footer>

<script src="script.js"></script>
</body>
</html>