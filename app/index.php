<?php
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Peminjaman UKKI</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 min-h-screen">

<div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Navbar -->

    <nav class="flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">
            UKKI
        </h1>

        <a
        href="auth/login.php"
        class="bg-white text-indigo-600 font-semibold px-5 py-3 rounded-xl hover:bg-slate-100 transition">

            <i class="fa-solid fa-user-shield mr-2"></i>

            Login Admin

        </a>

    </nav>

    <!-- Hero -->

    <div class="grid md:grid-cols-2 gap-12 items-center min-h-[80vh]">

        <div>

            <span class="bg-white/20 text-white px-4 py-2 rounded-full text-sm">
                Sistem Inventaris UKKI
            </span>

            <h2 class="text-5xl font-bold text-white leading-tight mt-6">

                Sistem
                <br>
                Peminjaman
                <br>
                Barang

            </h2>

            <p class="text-blue-100 text-lg mt-6 leading-relaxed">

                Memudahkan proses peminjaman barang UKKI secara cepat,
                praktis, dan terorganisir.

            </p>

            <div class="flex gap-4 mt-10">

                <a
                href="barang.php"
                class="bg-white text-indigo-600 px-7 py-4 rounded-2xl font-semibold hover:scale-105 transition">

                    <i class="fa-solid fa-box-open mr-2"></i>

                    Lihat Barang

                </a>

                <a
                href="auth/login.php"
                class="border border-white text-white px-7 py-4 rounded-2xl hover:bg-white hover:text-indigo-600 transition">

                    <i class="fa-solid fa-right-to-bracket mr-2"></i>

                    Login

                </a>

            </div>

        </div>

        <!-- Ilustrasi -->

        <div class="flex justify-center">

            <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-12">

                <i class="fa-solid fa-boxes-stacked text-white text-9xl"></i>

            </div>

        </div>

    </div>

</div>

<script src="../assets/script.js"></script>

</body>
</html>