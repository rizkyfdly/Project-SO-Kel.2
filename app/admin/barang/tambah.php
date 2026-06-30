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

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Barang</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

<div class="max-w-3xl mx-auto py-10 px-5">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Tambah Barang
            </h1>

            <p class="text-slate-500 mt-1">
                Tambahkan data barang inventaris baru.
            </p>

        </div>

        <a href="index.php"
        class="bg-slate-700 hover:bg-slate-800 text-white px-5 py-3 rounded-xl transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>

            Kembali

        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form method="POST" class="space-y-6">

            <div>

                <label class="block font-semibold text-slate-700 mb-2">
                    Nama Barang
                </label>

                <input
                type="text"
                name="nama_barang"
                required
                placeholder="Masukkan nama barang"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block font-semibold text-slate-700 mb-2">
                    Deskripsi
                </label>

                <textarea
                name="deskripsi"
                rows="4"
                placeholder="Masukkan deskripsi barang..."
                class="w-full border border-slate-300 rounded-xl px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Stok
                    </label>

                    <input
                    type="number"
                    name="stok"
                    required
                    placeholder="0"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                </div>

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Kondisi
                    </label>

                    <select
                    name="kondisi"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                        <option>Baik</option>
                        <option>Rusak Ringan</option>
                        <option>Rusak Berat</option>

                    </select>

                </div>

            </div>

            <div class="flex justify-end gap-3 pt-4">

                <a href="index.php"
                class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </a>

                <button
                type="submit"
                name="simpan"
                class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

<script src="../../../assets/script.js"></script>

</body>
</html>