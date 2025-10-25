<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>

<body>
    <form  action="/vendor/signup.php" method="POST">
        <h2>Регистрация</h2>

        <label for="">Имя пользователя</label>
        <input type="text" name="name" placeholder="Введите имя пользователя" required>
        <label for="tel">Телефон</label>
        <input type="tel" name="phone" placeholder="+7" maxlength="12" required>
        <label for="email">Электронная почта</label>
        <input type="text" name="email" placeholder="Введите адрес электронной почты" required>
        <label for="password">Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" minlength="8" maxlength="30"
            pattern="^.{8,}$" title="Пароль должен быть не меньше 8 символов" required>
        <input type="password" name="password_con" placeholder="Подтвердите пароль" required>
        <button>Зарегистрироваться</button>
    <?php
        if(isset($_SESSION['message'])){
        echo '<p class="msg">'.$_SESSION['message']. '</p>';
        }
        unset($_SESSION['message']);
        ?>

    </form>
</body>

</html>