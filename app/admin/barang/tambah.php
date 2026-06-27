<?php

session_start();

require_once '../../config/database.php';

if(isset($_POST['simpan']))
{

$nama=$_POST['nama_barang'];
$deskripsi=$_POST['deskripsi'];
$stok=$_POST['stok'];
$kondisi=$_POST['kondisi'];

mysqli_query($conn,"
INSERT INTO barang
(
nama_barang,
deskripsi,
stok,
kondisi
)

VALUES

(
'$nama',
'$deskripsi',
'$stok',
'$kondisi'
)

");

header("Location:index.php");

}

?>

<h2>Tambah Barang</h2>

<form method="POST">

Nama Barang

<br>

<input type="text" name="nama_barang" required>

<br><br>

Deskripsi

<br>

<textarea name="deskripsi"></textarea>

<br><br>

Stok

<br>

<input type="number" name="stok" required>

<br><br>

Kondisi

<br>

<select name="kondisi">

<option>Baik</option>

<option>Rusak Ringan</option>

<option>Rusak Berat</option>

</select>

<br><br>

<button name="simpan">

Simpan

</button>

</form>