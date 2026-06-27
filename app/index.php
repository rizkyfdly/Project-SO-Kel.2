<?php
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistem Peminjaman UKKI</title>
</head>
<body>

<h1>Sistem Peminjaman Barang UKKI</h1>

<?php if($conn): ?>
<!-- <p style="color:green">
    Berhasil terhubung ke database MySQL!
</p> -->
<?php endif; ?>

<hr>

<h3>Menu</h3>

<a href="barang.php">
    <button>Lihat Barang</button>
</a>

<a href="auth/login.php">
    <button>Login Admin</button>
</a>

</body>
</html>