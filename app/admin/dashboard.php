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

<a href="../auth/logout.php">
    Logout
</a>

</body>
</html>