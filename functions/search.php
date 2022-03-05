<?php
    session_start();
    if(!$_SESSION['user']){
        unset($_SESSION['user']);
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

    require_once('./connect.php');

    $search = $_GET['search'];

    $sql = $connect->query("SELECT * FROM `output_videos` WHERE `name_video` = '$search'");
    $res = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск <?=$search?></title>
</head>
<body>
    <a href="../output/index.php">На Главную</a>
    <h1>Результаты по запросу "<?=$search?>"</h1>

    <?php
        if($res == 0){
            echo "По вашему запросу $search ничего не найдено!";
        } else{
            ?>
                 <a href="../output/go_to_video.php?id=<?echo $res['id']?>"><video src="
        <?php
            if($res['ban'] == 1){
                $_SESSION['message'] = "Видео забанено и скоро будет удалено!";
            } else{
                echo '../' . $res['video'];
            }
        ?>
    "
    poster="
        <?php
            if($res['ban'] == 1){
                echo '../prewiew/deleted_video.png';
            } else{
                echo '../' . $res['prewiew'];
            }
        ?>
    "></video></a>
    <h2><?=$res['name_video']?></h2>
    <a href="../output/check_user.php?id=<?php echo $res['id_user']?>"><img src="<?='../' . $res['avatar_user']?>" width="60" height="60" style="border-radius: 50px;" alt=""></a>
    <h2><?=$res['name_user']?></h2>

            <?
        }
    ?>

   
</body>
</html>