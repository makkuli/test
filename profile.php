<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница профиля</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <h2>
        <?php
        echo 'Добро пожаловать, ' . $_SESSION['user']['login'] . '!';
        ?>
    </h2>
        <?php
        echo 'Ваш логин: ' . $_SESSION['user']['login'];
        echo '<br> Ваш телефон: ' . $_SESSION['user']['telephone'];
        echo '<br> Ваш email: ' . $_SESSION['user']['email'];
        ?>
    <p>
        <a href="edit_profile.php">Изменить данные профиля</a>
    </p>
    <p>
        <a href="edit_password.php">Изменить пароль</a>
    </p>
    <p>
        <a href="include/logout.php">Выход</a>
    </p>
</div>
</body>
</html>













