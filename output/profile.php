<?php
session_start();
if (!$_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Профиль</title>
</head>
<header>
    <a href="index.php"><img src="../pictures/лого.png" class="logo" alt=""></a>
    <div>
        <p><?=$_SESSION['user']['nick_name']?></p>
          <img src="<?= "../" . $_SESSION['user']['avatar'] ?>">
    </div>
</header>
<body>
        <section>
            <form action="../functions/load_video.php" method="post" enctype="multipart/form-data">
                <label for="">Загрузите видео</label> <br>
                <input type="file" name="video" id=""> <br>

                <label for="">Введите название видео</label> <br>
                <input type="text" name="name_video" placeholder="Название видео"> <br>

                <label for="">Описание</label> <br>
                <textarea name="discription" id="" cols="30" rows="10" placeholder="Введите описание видео"></textarea> <br>

                <input type="submit" value="Загрузить">
                <?php 
                        if ($_SESSION['message']){
                            echo '<p class="message">' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                ?> 
            </form>
        </section>
        <a href="../functions/logout.php">Выход</a>
</body>
</html>