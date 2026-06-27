<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>
</head>
<body>

<h1>Dashboard Admin UKKI</h1>

<p>
Selamat datang,
<b><?= $_SESSION['nama_admin']; ?></b>
</p>

<hr>

<h3>Menu Admin</h3>

<ul>

<li>
<a href="barang/index.php">
Daftar Barang
</a>
</li>

<li>
<a href="peminjaman/index.php">
Kelola Peminjaman
</a>
</li>

<li>
<a href="../auth/logout.php">
Logout
</a>
</li>

</ul>

<hr>



</body>
</html>