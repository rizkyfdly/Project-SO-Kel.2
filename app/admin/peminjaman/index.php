<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../../auth/login.php");
    exit;
}

require_once '../../config/database.php';

$query = mysqli_query(
$conn,
"SELECT
p.id_peminjaman,
pm.nama_peminjam,
b.nama_barang,
dp.jumlah,
p.status,
p.tanggal_pinjam,
p.tanggal_kembali

FROM peminjaman p

JOIN peminjam pm
ON p.id_peminjam = pm.id_peminjam

JOIN detail_peminjaman dp
ON p.id_peminjaman = dp.id_peminjaman

JOIN barang b
ON dp.id_barang = b.id_barang

ORDER BY p.id_peminjaman DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Data Peminjaman</title>
</head>
<body>

<h1>Data Peminjaman</h1>
<a href="../dashboard.php">Dashboard</a>
<table border="1" cellpadding="10">

<tr>
<th>Peminjam</th>
<th>Barang</th>
<th>Jumlah</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)) : ?>

<tr>

<td><?= $row['nama_peminjam']; ?></td>

<td><?= $row['nama_barang']; ?></td>

<td><?= $row['jumlah']; ?></td>

<td><?= $row['tanggal_pinjam']; ?></td>

<td><?= $row['tanggal_kembali']; ?></td>

<td><?= $row['status']; ?></td>

<td>

<?php if($row['status'] == 'Pending') : ?>

    <a href="setujui.php?id=<?= $row['id_peminjaman']; ?>">
        Setujui
    </a>

    |

    <a href="tolak.php?id=<?= $row['id_peminjaman']; ?>">
        Tolak
    </a>

<?php elseif($row['status'] == 'Disetujui') : ?>

    <a href="kembalikan.php?id=<?= $row['id_peminjaman']; ?>">
        Kembalikan
    </a>

<?php elseif($row['status'] == 'Ditolak') : ?>

    Ditolak

<?php elseif($row['status'] == 'Dikembalikan') : ?>

    Selesai

<?php endif; ?>

</td>

</tr>

<?php endwhile; ?>

</table>

</body>
</html>