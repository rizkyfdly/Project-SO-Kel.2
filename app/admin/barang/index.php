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
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Barang</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body class="bg-slate-100">

<div class="max-w-7xl mx-auto p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Kelola Barang
            </h1>

            <p class="text-slate-500 mt-1">
                Data seluruh barang inventaris UKKI
            </p>

        </div>

        <div class="flex gap-3">

            <a href="../dashboard.php"
            class="px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-800 text-white transition">

                <i class="fa-solid fa-arrow-left mr-2"></i>
                Dashboard

            </a>

            <a href="tambah.php"
            class="px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white transition">

                <i class="fa-solid fa-plus mr-2"></i>
                Tambah Barang

            </a>

        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-900 text-white">

                <tr>

                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Nama Barang</th>
                    <th class="px-6 py-4 text-left">Deskripsi</th>
                    <th class="px-6 py-4 text-center">Stok</th>
                    <th class="px-6 py-4 text-center">Kondisi</th>
                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php

            $no=1;

            while($row=mysqli_fetch_assoc($data)) :

            ?>

                <tr class="border-b hover:bg-slate-50 transition">

                    <td class="px-6 py-4">
                        <?= $no++; ?>
                    </td>

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

                        if(strtolower($row['kondisi']) == "rusak")
                        {
                            $warna = "bg-red-100 text-red-700";
                        }
                        ?>

                        <span class="px-3 py-1 rounded-full <?= $warna; ?> font-semibold">
                            <?= $row['kondisi']; ?>
                        </span>

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a
                            href="edit.php?id=<?= $row['id_barang']; ?>"
                            class="px-4 py-2 rounded-lg bg-yellow-400 hover:bg-yellow-500 text-white transition">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <a
                            href="hapus.php?id=<?= $row['id_barang']; ?>"
                            onclick="return confirm('Hapus barang?')"
                            class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white transition">

                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </div>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

<script src="../../../assets/script.js"></script>

</body>
</html>