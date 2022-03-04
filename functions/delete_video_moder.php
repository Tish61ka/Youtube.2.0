<?php
    session_start();

    require_once('./connect.php');
    $id = $_GET['id'];

    $delete_user = $connect->prepare("DELETE FROM `videos` WHERE `id` = '$id'");
    $select_path = $connect->query("SELECT * FROM `videos` WHERE `id` = '$id'");
    $path = $select_path->fetch(PDO::FETCH_ASSOC);
    $file_path = $path['video'];
    $prewiew_path = $path['prewiew'];
    unlink('../' . $file_path);
    unlink('../' . $prewiew_path);
    
    $delete_user->execute();
    header('Location: ../output/adminvideos.php');