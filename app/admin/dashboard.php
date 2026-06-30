<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-slate-900 text-white flex flex-col">

        <div class="p-8 border-b border-slate-800">

            <h1 class="text-2xl font-bold">
                UKKI Admin
            </h1>

            <p class="text-slate-400 text-sm mt-1">
                Dashboard Administrator
            </p>

        </div>

        <nav class="flex-1 px-5 py-6 space-y-2">

            <a href="dashboard.php"
            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-600">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>

            <a href="barang/index.php"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

                <i class="fa-solid fa-box"></i>

                Daftar Barang

            </a>

            <a href="peminjaman/index.php"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

                <i class="fa-solid fa-book"></i>

                Peminjaman

            </a>

        </nav>

        <div class="p-5 border-t border-slate-800">

            <a href="../auth/logout.php"
            class="flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 py-3 rounded-xl transition">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </a>

        </div>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-10">

        <!-- Top -->
        <div class="flex justify-between items-center mb-10">

            <div>

                <h2 class="text-3xl font-bold text-slate-800">
                    Dashboard
                </h2>

                <p class="text-slate-500 mt-1">
                    Selamat datang kembali,
                    <span class="font-semibold">
                        <?= $_SESSION['nama_admin']; ?>
                    </span>
                </p>

            </div>

            <div class="w-12 h-12 rounded-full bg-indigo-600 flex items-center justify-center text-white text-xl">

                <i class="fa-solid fa-user"></i>

            </div>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <a href="barang/index.php"
            class="bg-white rounded-3xl shadow-md p-8 hover:shadow-xl transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-slate-500">
                            Kelola
                        </p>

                        <h3 class="text-2xl font-bold mt-1">
                            Barang
                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">

                        <i class="fa-solid fa-box text-blue-600 text-2xl"></i>

                    </div>

                </div>

            </a>

            <a href="peminjaman/index.php"
            class="bg-white rounded-3xl shadow-md p-8 hover:shadow-xl transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-slate-500">
                            Kelola
                        </p>

                        <h3 class="text-2xl font-bold mt-1">
                            Peminjaman
                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center">

                        <i class="fa-solid fa-book text-green-600 text-2xl"></i>

                    </div>

                </div>

            </a>

        </div>

        <!-- Welcome -->
        <div class="mt-8 bg-white rounded-3xl shadow-md p-8">

            <h3 class="text-xl font-bold text-slate-800 mb-2">
                Selamat Datang 👋
            </h3>

            <p class="text-slate-600 leading-relaxed">
                Gunakan menu di sebelah kiri untuk mengelola data barang,
                memproses peminjaman, serta memantau aktivitas sistem UKKI.
            </p>

        </div>

    </main>

</div>

<script src="../../assets/script.js"></script>

</body>
</html>