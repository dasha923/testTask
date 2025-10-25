<?php
session_start();
if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>

<body>
    <img src="/img/img.png" alt="" width="300px">
    <div>
        <?=$_SESSION['user']['name']?>
        <?=$_SESSION['user']['phone']?>
        <?=$_SESSION['user']['email']?>
        <a class=logout href="vendor/logout.php">Выход</a>

    </div>
</body>

</html>