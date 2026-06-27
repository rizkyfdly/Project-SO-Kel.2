<?php

session_start();

require_once '../../config/database.php';

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM barang WHERE id_barang='$id'");

$row=mysqli_fetch_assoc($data);

if(isset($_POST['update']))
{

$nama=$_POST['nama_barang'];
$deskripsi=$_POST['deskripsi'];
$stok=$_POST['stok'];
$kondisi=$_POST['kondisi'];

mysqli_query($conn,"
UPDATE barang SET

nama_barang='$nama',
deskripsi='$deskripsi',
stok='$stok',
kondisi='$kondisi'

WHERE id_barang='$id'

");

header("Location:index.php");

}

?>

<h2>Edit Barang</h2>

<form method="POST">

Nama Barang

<br>

<input
type="text"
name="nama_barang"
value="<?= $row['nama_barang']; ?>"
>

<br><br>

Deskripsi

<br>

<textarea name="deskripsi"><?= $row['deskripsi']; ?></textarea>

<br><br>

Stok

<br>

<input
type="number"
name="stok"
value="<?= $row['stok']; ?>"
>

<br><br>

Kondisi

<br>

<select name="kondisi">

<option <?=($row['kondisi']=="Baik")?"selected":"";?>>
Baik
</option>

<option <?=($row['kondisi']=="Rusak Ringan")?"selected":"";?>>
Rusak Ringan
</option>

<option <?=($row['kondisi']=="Rusak Berat")?"selected":"";?>>
Rusak Berat
</option>

</select>

<br><br>

<button name="update">

Update

</button>

</form>