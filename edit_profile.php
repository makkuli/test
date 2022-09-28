<?php
session_start();
require_once 'include/connect.php';
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$user_id = $_SESSION['user']['id'];
$update = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$user_id'");
$update = mysqli_fetch_assoc($update);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изменение данных пользователя</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<form action="include/update_profile.php" method="post">
    <label for="">Введите новый логин:</label><br>
    <input type="text" name="login" value="<?= $_SESSION['user']['login'] ?>"><br><br>
    <label for="">Введите новый телефон:</label><br>
    <input type="tel" name="telephone" value="<?= $_SESSION['user']['telephone'] ?>"><br><br>
    <label for="">Введите новый email:</label><br>
    <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>"><br><br>
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