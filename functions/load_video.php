<?php
    session_start();
    if (!$_SESSION['user']){
        header('Location: profile.php');
    }

    require_once('./connect.php');

    $name_video = $_POST['name_video'];
    $discription = $_POST['discription'];
    $id_user = $_SESSION['user']['id'];
    $name_user = $_SESSION['user']['nick_name'];
    $avatar_user = "../" . $_SESSION['user']['avatar'];

    $video = 'videos/' . time() . $_FILES['video']['name'];
    move_uploaded_file($_FILES['video']['tmp_name'], '../' . $video);

    $add_video = $connect->prepare("INSERT INTO `videos`(`id`, `video`, `name_video`, `discription`, `id_user`, `name_user`,`avatar_user`) VALUES (NULL,'$video','$name_video','$discription','$id_user','$name_user','$avatar_user')");
    $add_video->execute();
    header('Location: ../output/profile.php');

    $_SESSION['message'] = "Видео успешно загружено!";