<?php
    session_start();

    require_once('connect.php');
    
    $nick_name = $_POST['nick_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    
    if ($password === $password_confirm){
        $avatar = 'img/' . time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $avatar);
        header('Location: ../output/singin.php'); 
        // $password = md5($password);
        $check_nick_name = $connect->prepare("SELECT * FROM `users` WHERE `nick_name` == '$nick_name'");
        $check_nick_name->execute();
        if($check_nick_name == 1){
            $_SESSION['message'] = "Такой никнейм или почта уже используется!!!";
            header('Location: ../output/registration.php'); 
        }
        $check_email = $connect->prepare("SELECT * FROM `users` WHERE `email` == '$email'");
        $check_email->execute();
        if($check_email == 1){
            $_SESSION['message'] = "Такой никнейм или почта уже используется!!!";
            header('Location: ../output/registration.php'); 
        }
        
            $add_user = $connect->prepare("INSERT INTO `users`(`id`, `nick_name`, `email`, `avatar`, `password`) VALUES (NULL,'$nick_name','$email','$avatar','$password')");
            $add_user->execute();
            $_SESSION['message'] = "Регистрация прошла успешно!";
            header('Location: ../output/singin.php');
        
    }  
    else{
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../output/registration.php'); 
    }   