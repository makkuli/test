<?php
session_start();
require_once 'connect.php';
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

$login = $_POST['login'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$user_id = $_SESSION['user']['id'];

//Изменяем данные в бд
mysqli_query($connect, "UPDATE `users` SET `login` = '$login', `telephone` = '$telephone', `email` = '$email' WHERE `users`.`id` = '$user_id'");

//Перезаписываем данные в сессию
$_SESSION['user']['login'] = $login;
$_SESSION['user']['telephone'] = $telephone;
$_SESSION['user']['email'] = $email;
$_SESSION['user']['password'] = $password;
$_SESSION['user']['password_confirm'] = $password_confirm;

header('Location: ../profile.php');
