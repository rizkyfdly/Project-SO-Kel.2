<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../../auth/login.php");
    exit;
}

require_once '../../config/database.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"UPDATE peminjaman
SET status='Ditolak'
WHERE id_peminjaman='$id'"
);

header("Location: index.php");
exit;