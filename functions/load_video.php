<?php
    session_start();

    require_once('./connect.php');

    $name_video = $_POST['name_video'];
    $discription = $_POST['discription'];

    $video = 'videos/' . time() . $_FILES['video']['name'];
    move_uploaded_file($_FILES['video']['tmp_name'], '../' . $video);

    $add_video = $connect->prepare("INSERT INTO `videos`(`id`, `video`, `name_video`, `discription`) VALUES (NULL,'$video','$name_video','$discription')");
    $add_video->execute();
    header('Location: ../output/profile.php');

    $_SESSION['message'] = "Видео успешно загружено!";