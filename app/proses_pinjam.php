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

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Peminjaman Berhasil</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100 flex items-center justify-center min-h-screen">

<div class="bg-white rounded-3xl shadow-xl p-10 max-w-md w-full text-center">

    <div class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center">

        <i class="fa-solid fa-circle-check text-5xl text-green-600"></i>

    </div>

    <h1 class="text-3xl font-bold text-slate-800 mt-6">
        Peminjaman Berhasil!
    </h1>

    <p class="text-slate-600 mt-4 leading-relaxed">
        Permohonan peminjaman barang telah berhasil diajukan.
    </p>

    <div class="mt-6">

        <span class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full font-semibold">

            <i class="fa-solid fa-clock"></i>

            Status : Pending

        </span>

    </div>

    <a
    href="barang.php"
    class="mt-8 inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl transition">

        <i class="fa-solid fa-arrow-left"></i>

        Kembali ke Daftar Barang

    </a>

</div>

<script src="../assets/script.js"></script>

</body>
</html>