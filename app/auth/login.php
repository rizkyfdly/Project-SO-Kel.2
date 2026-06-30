<?php
session_start();

if(isset($_SESSION['admin']))
{
    header("Location: ../admin/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin UKKI</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md mx-4">

        <div class="bg-white rounded-3xl shadow-2xl p-8">

            <div class="text-center mb-8">

                <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-user-shield text-3xl text-indigo-600"></i>
                </div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Admin UKKI
                </h1>

                <p class="text-gray-500 mt-2">
                    Silakan login untuk melanjutkan
                </p>

            </div>

            <form action="proses_login.php" method="POST" class="space-y-5">

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Username
                    </label>

                    <div class="relative">

                        <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="text"
                            name="username"
                            required
                            placeholder="Masukkan username"
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">

                    </div>

                </div>

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <div class="relative">

                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Masukkan password"
                            class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">

                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600">

                            <i class="fa-solid fa-eye"></i>

                        </button>

                    </div>

                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition duration-300 shadow-lg hover:shadow-xl">

                    Login

                </button>

            </form>

        </div>

    </div>
<script src="../../assets/script.js"></script>
</body>
</html>