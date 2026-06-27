<?php

require_once 'config/database.php';

$data = mysqli_query($conn,"SELECT * FROM barang");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>

<h1>Daftar Barang UKKI</h1>

<a href="index.php">Kembali</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>Nama Barang</th>
    <th>Deskripsi</th>
    <th>Stok</th>
    <th>Kondisi</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) : ?>

<tr>

<td><?= $row['nama_barang']; ?></td>

<td><?= $row['deskripsi']; ?></td>

<td><?= $row['stok']; ?></td>

<td><?= $row['kondisi']; ?></td>

<td>
    <a href="pinjam.php?id=<?= $row['id_barang']; ?>">
        Pinjam
    </a>
</td>

</tr>

<?php endwhile; ?>

</table>

</body>
</html>