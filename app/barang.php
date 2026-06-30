<?php

require_once 'config/database.php';

$data = mysqli_query($conn,"SELECT * FROM barang");

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Barang</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

<div class="max-w-7xl mx-auto py-10 px-5">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Daftar Barang UKKI
            </h1>

            <p class="text-slate-500 mt-1">
                Pilih barang yang ingin dipinjam.
            </p>

        </div>

        <a
        href="index.php"
        class="bg-slate-700 hover:bg-slate-800 text-white px-5 py-3 rounded-xl transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>

            Kembali

        </a>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-900 text-white">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Nama Barang
                    </th>

                    <th class="px-6 py-4 text-left">
                        Deskripsi
                    </th>

                    <th class="px-6 py-4 text-center">
                        Stok
                    </th>

                    <th class="px-6 py-4 text-center">
                        Kondisi
                    </th>

                    <th class="px-6 py-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($data)) : ?>

                <tr class="border-b hover:bg-slate-50 transition">

                    <td class="px-6 py-4 font-semibold text-slate-800">
                        <?= $row['nama_barang']; ?>
                    </td>

                    <td class="px-6 py-4 text-slate-600">
                        <?= $row['deskripsi']; ?>
                    </td>

                    <td class="px-6 py-4 text-center">

                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold">
                            <?= $row['stok']; ?>
                        </span>

                    </td>

                    <td class="px-6 py-4 text-center">

                        <?php

                        $warna = "bg-green-100 text-green-700";

                        if($row['kondisi'] == "Rusak Ringan")
                        {
                            $warna = "bg-yellow-100 text-yellow-700";
                        }

                        if($row['kondisi'] == "Rusak Berat")
                        {
                            $warna = "bg-red-100 text-red-700";
                        }

                        ?>

                        <span class="px-3 py-1 rounded-full font-semibold <?= $warna; ?>">
                            <?= $row['kondisi']; ?>
                        </span>

                    </td>

                    <td class="px-6 py-4 text-center">

                        <?php if($row['stok'] > 0) : ?>

                            <a
                            href="pinjam.php?id=<?= $row['id_barang']; ?>"
                            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">

                                <i class="fa-solid fa-hand-holding"></i>

                                Pinjam

                            </a>

                        <?php else : ?>

                            <span class="inline-block bg-red-100 text-red-600 px-4 py-2 rounded-lg font-semibold">

                                Stok Habis

                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

<script src="../assets/script.js"></script>

</body>
</html>