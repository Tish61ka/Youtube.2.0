<?php
    session_start();

    require_once('./connect.php');

    $like_plus = $_POST['like_plus'];
    print_r($like_plus);
    $add_like = $connect->query("INSERT INTO `output_videos' (`like`) VALUES (+1)");