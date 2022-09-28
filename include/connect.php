<?php

$connect = mysqli_connect('localhost', 'root', '', 'users');
if (!$connect) {
    die('Что-то пошло не так...');
}