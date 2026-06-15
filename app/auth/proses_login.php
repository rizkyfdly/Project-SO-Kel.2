<?php

session_start();

require_once '../config/database.php';

$username = mysqli_real_escape_string(
    $conn,
    $_POST['username']
);

$password = md5($_POST['password']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM admin
     WHERE username='$username'
     AND password='$password'"
);

if(mysqli_num_rows($query) > 0)
{
    $data = mysqli_fetch_assoc($query);

    $_SESSION['admin'] = $data['id_admin'];
    $_SESSION['nama_admin'] = $data['nama_admin'];

    header("Location: ../admin/dashboard.php");
    exit;
}
else
{
    echo "Username atau password salah!";
}