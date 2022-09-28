<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Регистрация пользователя</h1>
<form action="/include/save_user.php" method="post">
    <label for="">Логин:</label><br>
    <input type="text" name="login" placeholder="Введите логин"><br><br>
    <label for="">Телефон:</label><br>
    <input type="tel" name="telephone" placeholder="Введите телефон"><br><br>
    <label for="">Email:</label><br>
    <input type="email" name="email" placeholder="Введите Email"><br><br>
    <label for="">Пароль:</label><br>
    <input type="password" name="password" placeholder="Введите пароль"><br><br>
    <label for="">Подтвердите пароль:</label><br>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль"><br><br>
    <button type="submit">Отправить</button>
    <p>
        <a href="index.php">Авторизация</a>
    </p>
    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error">' . $_SESSION['error'] . '</p>';
    }
    unset ($_SESSION['error']);
    ?>
</form>
</body>
</html>

























