<?php
session_start();

if(isset($_SESSION['admin']))
{
    header("Location: ../admin/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Admin UKKI</title>
</head>
<body>

<h2>Login Admin UKKI</h2>

<form action="proses_login.php" method="POST">

    <p>Username</p>
    <input type="text" name="username" required>

    <p>Password</p>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">
        Login
    </button>

</form>

</body>
</html>