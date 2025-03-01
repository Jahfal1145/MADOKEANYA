<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    
    <nav>
        <ul>
            <a href="admin.php"><button><</button></a>
        </ul>
    </nav>

    <main>
    <table border='1'>
    <tr >
        <td>id</td>
        <td>nama</td>
        <td>username</td>
        <td>password</td>
        <td>level</td>
        <td>email</td>
    </tr>
    <?php 
include "../login/koneksi.php";
$query_mysql = mysqli_query($mysqli,"SELECT * FROM user")or die(mysqli_error());
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
?>
<tr>
    <td><?php echo $data['id_user']; ?></td>
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['password']; ?></td>
    <td><?php echo $data['tipe']; ?></td>
    <td ><a class="edit" href='edit.php?id=<?php echo $data['id'];?>'>Edit</a></td>
    <td ><a class="delete" href='delete.php?id=<?php echo $data['id'];?>'>Delete</a></td>

</tr>
<?php } ?>
</table>
    </main>

    <script src="scripts.js"></script>
</body>
<style>
    tr td a {
        text-decoration: none;
    }

    footer {
        text-align: center;
        margin-top: 50px;
    }
</style>
</html>