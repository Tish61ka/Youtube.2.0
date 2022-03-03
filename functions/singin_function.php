<?php
    session_start();

    require_once('../functions/connect.php');

    $nick_name = $_POST['nick_name'];
    // $password = md5($_POST['password']);
    $password = $_POST['password'];

    $check_user = $connect->prepare("SELECT * FROM `users` WHERE `nick_name` = '$nick_name' AND `password` = '$password'");
    $check_user->execute();    
    $user = $check_user->fetch(PDO::FETCH_ASSOC);

    if($user['ban']==1){
        $_SESSION['message'] = "Ваш аккаунт забанен, обратитесь к администратору!";
        header("Location: ../output/singin.php");
    }
    else{
        if ($user>0){
            if($user['role']==1){
                $_SESSION['admin'] = [
                    "id" => $user['id'],
                    "nick_name" => $user['nick_name'],
                    "avatar" => $user['avatar'],
                    "email" => $user['email'],
                    "role" => $user['role']
                ];
                header('Location: ../output/adminprofile.php');
            }
            else{
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "nick_name" => $user['nick_name'],
                    "avatar" => $user['avatar'],
                    "email" => $user['email'],
                    "ban" => $user['ban']
                ];
                header('Location: ../output/myprofile.php');
            }        
        }
        else{
            $_SESSION['message'] = 'Неверный логин или пароль!!!';
            header('Location: ../output/singin.php');
        }
    }
         