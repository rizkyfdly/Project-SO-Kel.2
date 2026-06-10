<?php

require_once 'config/database.php';

echo "<h1>Sistem Peminjaman Barang UKKI</h1>";

if ($conn) {
    echo "<p style='color:green'>Berhasil terhubung ke database MySQL!</p>";
}