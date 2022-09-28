<?php
require_once 'connect.php';
session_start();

$login = $_POST['login'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

//Проверяем нет ли уже данных в бд
$check_login = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `login` =  '$login'"));
$check_telephone = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `telephone` =  '$telephone'"));
$check_email = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `email` =  '$email'"));

if ($check_login > 0) {
    $_SESSION['error'] = 'Пользователь с таким логином уже существует';
    header('Location: /registration.php');
    exit();
} elseif ($check_telephone > 0) {
    $_SESSION['error'] = 'Пользователь с таким телефоном уже существует';
    header('Location: /registration.php');
    exit();
} elseif ($check_email > 0) {
    $_SESSION['error'] = 'Пользователь с таким email уже существует';
    header('Location: /registration.php');
    exit();
}

//Проверка пароля
if ($password) {
    if ($password === $password_confirm) {
        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `telephone`, `email`, `password`) VALUES (NULL, '$login', '$telephone', '$email', '$password')");
        $_SESSION['error'] = 'Вы успешно зарегистрированы';
        header('Location: /index.php');
    } else {
        $_SESSION['error'] = 'Пароли не совпадают';
        header('Location: /registration.php');
    }
} else {
    $_SESSION['error'] = 'Вы не указали пароль!';
    header('Location: /registration.php');
}


