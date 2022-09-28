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
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
<h1>Авторизация пользователя</h1>
<form action="include/login.php" method="post">
    <label for="">Телефон или email:</label><br>
    <input type="text" name="login" placeholder="Введите телефон или email"><br><br>
    <label for="">Пароль:</label><br>
    <input type="password" name="password" placeholder="Введите пароль"><br><br>
    <div class="g-recaptcha" data-sitekey="6LefhCwiAAAAADnMG_7yjOv-Jr0koUD406vTkPRn"></div>
    <button type="submit">Войти</button>
    <p>
        <a href="registration.php">Регистрация</a>
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

























