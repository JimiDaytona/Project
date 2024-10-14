<?php

function connect()
{
    $host = 'localhost'; // имя хоста
    $user = 'root';      // имя пользователя
    $pass = 'root';          // пароль
    $name = 'bulletinboard';      // имя базы данных
    return mysqli_connect($host, $user, $pass, $name);
}
