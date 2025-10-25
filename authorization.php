<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="/css/main.css">
    <title>Document</title>
</head>

<body>
    <form action="/vendor/signin.php" method="POST">
        <h2> Авторизация</h2>
        <label for="login"> Телефон или Email</label>
        <input type="text" name="login" placeholder="+7(999)-999-99-99 или  example@mail.ru" required>
        <label for="password"> Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <script src="https://smartcaptcha.yandexcloud.net/captcha.js" async defer></script>
        <div id="captcha-container" class="smart-captcha"
            data-sitekey="ysc1_dwpHOdMzgRLNGhenU6PBvTtUABgeeAJdlJyc4P55c6074c91">
        </div>
        <button> Войти </button>
        <p>У вас нет аккаунта?- <a href="registrastion.php">зарегистрируйтесь</a></p>
        <?php
        if(isset($_SESSION['message'])){
        echo '<p class = msg>'.$_SESSION['message']. '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</body>

</html>