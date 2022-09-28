<?php
session_start();
require_once 'connect.php';
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

$user_id = $_SESSION['user']['id'];
$update = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$user_id'"); //Выбор пользователя по id
$update = mysqli_fetch_assoc($update);
$hash = $update['password'];
$password = $_POST['password'];
$new_password = $_POST['new_password'];
$new_password_confirm = $_POST['new_password_confirm'];
$password = md5($password);

if ($password === $hash) {
    if ($new_password === $new_password_confirm) {
        $new_password = md5($new_password);
        mysqli_query($connect, "UPDATE `users` SET `password`='$new_password' WHERE `id`='$user_id'");
        $_SESSION['error'] = 'Пароль успешно изменен!';
        header('Location: ../edit_password.php');
    } else {
        $_SESSION['error'] = 'Пароли не совпадают';
        header('Location: ../edit_password.php');
    }
} else {
    $_SESSION['error'] = 'Не верно указан текущий пароль!';
    header('Location: ../edit_password.php');
}

