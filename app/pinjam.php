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
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Peminjaman Barang</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

<div class="max-w-3xl mx-auto py-10 px-5">

    <!-- Header -->

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Form Peminjaman
            </h1>

            <p class="text-slate-500 mt-1">
                Lengkapi data peminjaman barang.
            </p>

        </div>

        <a
        href="barang.php"
        class="bg-slate-700 hover:bg-slate-800 text-white px-5 py-3 rounded-xl transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>

            Kembali

        </a>

    </div>

    <!-- Card -->

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="mb-8">

            <p class="text-slate-500 text-sm">
                Barang yang dipilih
            </p>

            <div class="mt-2 bg-indigo-50 border border-indigo-200 rounded-xl p-4">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center text-white">

                        <i class="fa-solid fa-box"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg text-slate-800">
                            <?= $data['nama_barang']; ?>
                        </h2>

                        <p class="text-slate-500">
                            Stok : <?= $data['stok']; ?>
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <form action="proses_pinjam.php" method="POST" class="space-y-6">

            <input
            type="hidden"
            name="id_barang"
            value="<?= $data['id_barang']; ?>">

            <div>

                <label class="block font-semibold text-slate-700 mb-2">
                    Nama Lengkap
                </label>

                <input
                type="text"
                name="nama_peminjam"
                required
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        NIM
                    </label>

                    <input
                    type="text"
                    name="nim"
                    required
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                </div>

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        No HP
                    </label>

                    <input
                    type="text"
                    name="no_hp"
                    required
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                </div>

            </div>

            <div>

                <label class="block font-semibold text-slate-700 mb-2">
                    Jumlah Barang
                </label>

                <input
                type="number"
                name="jumlah"
                min="1"
                required
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Tanggal Pinjam
                    </label>

                    <input
                    type="date"
                    name="tanggal_pinjam"
                    required
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                </div>

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Tanggal Kembali
                    </label>

                    <input
                    type="date"
                    name="tanggal_kembali"
                    required
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                </div>

            </div>

            <div class="flex justify-end gap-3 pt-4">

                <a
                href="barang.php"
                class="px-6 py-3 bg-slate-200 hover:bg-slate-300 rounded-xl transition">

                    Batal

                </a>

                <button
                type="submit"
                class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition">

                    <i class="fa-solid fa-paper-plane mr-2"></i>

                    Ajukan Peminjaman

                </button>

            </div>

        </form>

    </div>

</div>

<script src="../assets/script.js"></script>

</body>
</html>