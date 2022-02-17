<?php
    session_start();

    require_once('../functions/connect.php');

    $nick_name = $_POST['nick_name'];
    // $password = md5($_POST['password']);
    $password = $_POST['password'];

    $check_user = $connect->prepare("SELECT * FROM `users` WHERE `nick_name` = '$nick_name' AND `password` = '$password'");
    $check_user->execute();
    
     $user = $check_user->fetch(PDO::FETCH_ASSOC);
    if ($user>0){
        $_SESSION['user'] = [
            "id" => $user['id'],
            "nick_name" => $user['nick_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email']
        ];
        
        header('Location: ../output/profile.php');
    }
    else{
        $_SESSION['message'] = 'Неверный логин или пароль!!!';
        header('Location: ../output/singin.php');  
    } 