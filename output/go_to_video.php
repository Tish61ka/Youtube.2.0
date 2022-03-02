<?php
session_start();
if(!$_SESSION['user']){
    session_unset($_SESSION['user']);
    header('Location: singin.php');
}
require '../functions/connect.php';
$sql = "SELECT * FROM `users`";
$request = $connect->query($sql);
$response = $request->fetchAll(PDO::FETCH_ASSOC);
if($response){
    for($i=0;$i<count($response);$i++){
        if($response[$i]['id'] == $_SESSION['user']['id'] && $response[$i]['ban'] == 1){
            session_unset();
            $_SESSION['message'] = "Ваш аккаунт забанен!!";
            header("Location: singin.php");
        }
    }
}

        require_once('../functions/connect.php');
        $id = $_GET['id'];
        $give_video = $connect->query("SELECT * FROM `output_videos` WHERE `id` = '$id'");
        $video = $give_video->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видео <?=$video['name_video']?></title>
</head>
<body>
    <a href="../output/index.php">На главную</a> <br>
            <video class="my" controls src="<?php 
                                if($video['ban']==1){
                                    $_SESSION['message'] = 'Видео забанено и скоро будет удалено!';
                                }
                                else{
                                    echo '../' . $video['video'];
                                }
                            ?>" poster="<?php
                            if($video['ban']==1){
                                echo '../prewiew/deleted_video.png';
                            }
                            else{
                                echo '../' . $video['prewiew'];
                            }
                            ?>">
    </video>
    <?php 
                        if ($_SESSION['message']){
                            echo '<p class="message">' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                    ?> <br>                    
    <h1><?=$video['name_video']?></h1>
    <p><?=$video['date']?></p>
    <img src="<?=$video['avatar_user']?>" width="60" height="60" style="border-radius: 30px;" alt="">
    <h2><?=$video['name_user']?></h2>
    <h2><?=$video['discription']?></h2>
</body>
</html>