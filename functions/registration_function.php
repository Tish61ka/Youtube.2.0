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
        $check_nick_name = $connect->prepare("SELECT * FROM `users` WHERE `nick_name` = '$nick_name'");
        $check_nick_name->execute();
        $response = $check_nick_name->fetch(PDO::FETCH_ASSOC);
        if($response['nick_name']){
            $_SESSION['message'] = "Такой никнейм занят!!!";
            header('Location: ../output/registration.php'); 
        } 
        else{
            $check_email = $connect->prepare("SELECT * FROM `users` WHERE `email` = '$email'");
            $check_email->execute();
            $response1 = $check_email->fetch(PDO::FETCH_ASSOC);
            if($response1['email']){
                $_SESSION['message'] = "Такая почта уже используется!!!";
                header('Location: ../output/registration.php'); 
            }
            else{
                $add_user = $connect->prepare("INSERT INTO `users`(`id`, `nick_name`, `email`, `avatar`, `password`) VALUES (NULL,'$nick_name','$email','$avatar','$password')");
                $add_user->execute();
                $_SESSION['message'] = "Регистрация прошла успешно!";
                header('Location: ../output/singin.php');
            }            
        }     
    }
    else{
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../output/registration.php'); 
    }   