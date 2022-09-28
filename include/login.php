<?php
session_start();
require_once 'connect.php';

$telephone = $_POST['login'];
$email = $_POST['login'];
$password = md5($_POST['password']);
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE (`telephone` = '$telephone' OR `email` = '$email') AND `password` = '$password'");

//Проверка на наличие пользователя в бд, авторизация, записываем данные в сессию
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "telephone" => $user['telephone'],
        "email" => $user['email'],
        "password" => $user['password'],
    ];
    header('Location: /profile.php');
} else {
    $_SESSION['error'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}
