<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../../auth/login.php");
    exit;
}

require_once '../../config/database.php';

$id = $_GET['id'];

$detail = mysqli_query(
$conn,
"SELECT
dp.id_barang,
dp.jumlah

FROM detail_peminjaman dp

JOIN peminjaman p
ON dp.id_peminjaman = p.id_peminjaman

WHERE p.id_peminjaman='$id'"
);

while($row = mysqli_fetch_assoc($detail))
{
    mysqli_query(
    $conn,
    "UPDATE barang
    SET stok = stok + ".$row['jumlah']."
    WHERE id_barang=".$row['id_barang']
    );
}

mysqli_query(
$conn,
"UPDATE peminjaman
SET status='Dikembalikan'
WHERE id_peminjaman='$id'"
);

header("Location: index.php");
exit;