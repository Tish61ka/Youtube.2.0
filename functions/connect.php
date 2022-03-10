<?php
    $host = 'localhost';
    $dbname = 'videohost';
    $username = 'root';
    $password = '';

    try{
        $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }
    catch(PDOException $pe)
    {
        die("Не удалось подключиться к базе данных $dbname :" . $pe->getMessage());
    }