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
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Peminjaman</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">

<div class="max-w-7xl mx-auto p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Data Peminjaman
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh data peminjaman barang.
            </p>

        </div>

        <a
        href="../dashboard.php"
        class="bg-slate-700 hover:bg-slate-800 text-white px-5 py-3 rounded-xl transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>

            Dashboard

        </a>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-900 text-white">

                <tr>

                    <th class="px-6 py-4 text-left">Peminjam</th>
                    <th class="px-6 py-4 text-left">Barang</th>
                    <th class="px-6 py-4 text-center">Jumlah</th>
                    <th class="px-6 py-4 text-center">Tanggal Pinjam</th>
                    <th class="px-6 py-4 text-center">Tanggal Kembali</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($query)) : ?>

                <tr class="border-b hover:bg-slate-50 transition">

                    <td class="px-6 py-4 font-medium">
                        <?= $row['nama_peminjam']; ?>
                    </td>

                    <td class="px-6 py-4">
                        <?= $row['nama_barang']; ?>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full font-semibold">
                            <?= $row['jumlah']; ?>
                        </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <?= $row['tanggal_pinjam']; ?>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <?= $row['tanggal_kembali']; ?>
                    </td>

                    <td class="px-6 py-4 text-center">

                        <?php

                        $badge = "bg-yellow-100 text-yellow-700";

                        if($row['status']=="Disetujui")
                            $badge="bg-green-100 text-green-700";

                        if($row['status']=="Ditolak")
                            $badge="bg-red-100 text-red-700";

                        if($row['status']=="Dikembalikan")
                            $badge="bg-blue-100 text-blue-700";

                        ?>

                        <span class="px-3 py-1 rounded-full font-semibold <?= $badge; ?>">
                            <?= $row['status']; ?>
                        </span>

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                        <?php if($row['status'] == 'Pending') : ?>

                            <a
                            href="setujui.php?id=<?= $row['id_peminjaman']; ?>"
                            class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition">

                                <i class="fa-solid fa-check"></i>

                            </a>

                            <a
                            href="tolak.php?id=<?= $row['id_peminjaman']; ?>"
                            class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">

                                <i class="fa-solid fa-xmark"></i>

                            </a>

                        <?php elseif($row['status'] == 'Disetujui') : ?>

                            <a
                            href="kembalikan.php?id=<?= $row['id_peminjaman']; ?>"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">

                                <i class="fa-solid fa-rotate-left"></i>

                            </a>

                        <?php elseif($row['status'] == 'Ditolak') : ?>

                            <span class="text-red-500 font-semibold">
                                Ditolak
                            </span>

                        <?php elseif($row['status'] == 'Dikembalikan') : ?>

                            <span class="text-green-600 font-semibold">
                                Selesai
                            </span>

                        <?php endif; ?>

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