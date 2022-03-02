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
        $id_user = $_GET['id'];
        $give_user = $connect->query("SELECT * FROM `output_videos` WHERE `id_user` = '$id_user'");
        $user = $give_user->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль <?=$user['name_user']?></title>
</head>
<body>
    <a href="../output/index.php">На главную</a> <br>

    <img src="<?=$user['avatar_user']?>" width="60" height="60" style="border-radius: 30px;" alt="">
    <h2><?=$user['name_user']?></h2>

    <?php
        require_once('../functions/connect.php');
        $id_user = $_GET['id'];
        $give_video_user = $connect->query("SELECT * FROM `output_videos` WHERE `id_user` = '$id_user'");
        while($videos = $give_video_user->fetch(PDO::FETCH_ASSOC)){
            ?>
            <h1><?=$videos['name_video']?></h1>
            <a href="../output/go_to_video.php?id=<?php echo $videos['id'] ?>"><video class="my" src="<?php 
                                if($videos['ban']==1){
                                    $_SESSION['message'] = 'Видео забанено и скоро будет удалено!';
                                }
                                else{
                                    echo '../' . $videos['video'];
                                }
                            ?>" poster="<?php
                            if($videos['ban']==1){
                                echo '../prewiew/deleted_video.png';
                            }
                            else{
                                echo '../' . $videos['prewiew'];
                            }
                        ?>" ></video></a>
                        <h2><?=$videos['discription']?></h2>
                        <p><?=$videos['date']?></p>
    <?php
        }
    ?>

</body>
</html>