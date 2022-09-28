<?php
session_start();
require_once 'include/connect.php';
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
    <title>Изменение пароля</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="include/update_password.php" method="post">
    <label for="">Введите текущий пароль:</label><br>
    <input type="password" name="password" placeholder="Введите пароль"><br><br>
    <label for="">Введите новый пароль:</label><br>
    <input type="password" name="new_password" placeholder="Подтвердите пароль"><br><br>
    <label for="">Подтвердите новый пароль:</label><br>
    <input type="password" name="new_password_confirm" placeholder="Подтвердите пароль"><br><br>
    <button type="submit">Изменить</button>
    <p>
        <a href="profile.php">Вернуться на страницу профиля</a>
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