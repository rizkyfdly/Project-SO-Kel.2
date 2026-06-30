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

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Barang</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

<div class="max-w-3xl mx-auto py-10 px-5">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Edit Barang
            </h1>

            <p class="text-slate-500 mt-1">
                Perbarui data barang inventaris.
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
                value="<?= $row['nama_barang']; ?>"
                required
                class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block font-semibold text-slate-700 mb-2">
                    Deskripsi
                </label>

                <textarea
                name="deskripsi"
                rows="4"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500"><?= $row['deskripsi']; ?></textarea>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Stok
                    </label>

                    <input
                    type="number"
                    name="stok"
                    value="<?= $row['stok']; ?>"
                    required
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                </div>

                <div>

                    <label class="block font-semibold text-slate-700 mb-2">
                        Kondisi
                    </label>

                    <select
                    name="kondisi"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

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

                </div>

            </div>

            <div class="flex justify-end gap-3 pt-4">

                <a href="index.php"
                class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </a>

                <button
                type="submit"
                name="update"
                class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white transition">

                    <i class="fa-solid fa-pen-to-square mr-2"></i>

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

<script src="../../../assets/script.js"></script>

</body>
</html>