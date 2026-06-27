<?php

require_once 'config/database.php';

$nama = $_POST['nama_peminjam'];
$nim = $_POST['nim'];
$hp = $_POST['no_hp'];

$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

$tgl_pinjam = $_POST['tanggal_pinjam'];
$tgl_kembali = $_POST['tanggal_kembali'];

mysqli_query(
    $conn,
    "INSERT INTO peminjam
    (
        nama_peminjam,
        nim,
        no_hp
    )
    VALUES
    (
        '$nama',
        '$nim',
        '$hp'
    )"
);

$id_peminjam = mysqli_insert_id($conn);

mysqli_query(
    $conn,
    "INSERT INTO peminjaman
    (
        id_peminjam,
        tanggal_pinjam,
        tanggal_kembali
    )
    VALUES
    (
        '$id_peminjam',
        '$tgl_pinjam',
        '$tgl_kembali'
    )"
);

$id_peminjaman = mysqli_insert_id($conn);

mysqli_query(
    $conn,
    "INSERT INTO detail_peminjaman
    (
        id_peminjaman,
        id_barang,
        jumlah
    )
    VALUES
    (
        '$id_peminjaman',
        '$id_barang',
        '$jumlah'
    )"
);

echo "
<h2>Peminjaman Berhasil Diajukan</h2>

<p>Status peminjaman: Pending</p>

<a href='barang.php'>
Kembali ke Daftar Barang
</a>
";