<?php

require_once 'config/database.php';

$id = $_GET['id'];

$barang = mysqli_query(
    $conn,
    "SELECT * FROM barang WHERE id_barang='$id'"
);

$data = mysqli_fetch_assoc($barang);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Barang</title>
</head>
<body>

<h1>Form Peminjaman</h1>

<p>
Barang:
<b><?= $data['nama_barang']; ?></b>
</p>

<form action="proses_pinjam.php" method="POST">

<input
    type="hidden"
    name="id_barang"
    value="<?= $data['id_barang']; ?>"
>

<p>Nama Lengkap</p>
<input type="text" name="nama_peminjam" required>

<p>NIM</p>
<input type="text" name="nim" required>

<p>No HP</p>
<input type="text" name="no_hp" required>

<p>Jumlah</p>
<input type="number" name="jumlah" min="1" required>

<p>Tanggal Pinjam</p>
<input type="date" name="tanggal_pinjam" required>

<p>Tanggal Kembali</p>
<input type="date" name="tanggal_kembali" required>

<br><br>

<button type="submit">
    Ajukan Peminjaman
</button>

</form>

</body>
</html>