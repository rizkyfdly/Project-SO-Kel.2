<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../../auth/login.php");
    exit;
}

require_once '../../config/database.php';

$data = mysqli_query($conn,"SELECT * FROM barang ORDER BY id_barang DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Barang</title>
</head>
<body>

<h2>Kelola Barang</h2>

<a href="../dashboard.php">Dashboard</a> |
<a href="tambah.php">Tambah Barang</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Deskripsi</th>
    <th>Stok</th>
    <th>Kondisi</th>
    <th>Aksi</th>
</tr>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)) :

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nama_barang']; ?></td>

<td><?= $row['deskripsi']; ?></td>

<td><?= $row['stok']; ?></td>

<td><?= $row['kondisi']; ?></td>

<td>

<a href="edit.php?id=<?= $row['id_barang']; ?>">
Edit
</a>

|

<a
href="hapus.php?id=<?= $row['id_barang']; ?>"
onclick="return confirm('Hapus barang?')">
Hapus
</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</body>
</html>