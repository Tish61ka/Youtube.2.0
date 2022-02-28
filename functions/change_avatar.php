<?php
    session_start();

    require_once('./connect.php');

    $new_avatar = 'img/' . time() . $_FILES['avatar']['name'];

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $new_avatar)){
        $_SESSION['message'] = "Ошибка загрузки аватарки";
        header("Location: ../output/myprofile.php");
        exit();
    }
    else{
        if (isset($_SESSION['user']['avatar'])){
            unlink('../'.$_SESSION['user']['avatar']);
        }
        $userID = $_SESSION['user']['id'];
        $change_avatar = $connect->prepare("UPDATE `users` SET `avatar` = '$new_avatar' WHERE `id` = '$userID'");
        $change_avatar->execute();
        $change_avatar_video = $connect->prepare("UPDATE `videos` SET `avatar_user` = '$new_avatar' WHERE `id_user` = '$userID'");
        $change_avatar_video->execute();
        $_SESSION['user']['avatar'] = $new_avatar;
        header("Location: ../output/myprofile.php");
    }