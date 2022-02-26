<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>YouTube 2.0</title>
</head>
<body>
<header>
        <div class="f">
            <div class="container_2">
                <div class="menu-burger__header">
                    <span></span>
                </div>
                <nav class="header__nav">
                    <ul class="menu header__menu">
                        <li><a href="" class="menu__item">Главная</a></li>
                        <li><a href="" class="menu__item">Товары</a></li>
                        <li><a href="" class="menu__item">Акции</a></li>
                        <li><a href="" class="menu__item">Новинки</a></li>
                        <li><a href="" class="menu__item">Доставка</a></li>
                        <li><a href="../functions/logout.php" class="menu__item">Выход</a></li>
                    </ul>
                </nav>   
                <a href="index.php"><img src="/pictures/лого.png" class="logo" alt=""></a>  
                <form method="GET" action="../functions/search.php">
                    <input class="input" type="text" name="search" required placeholder="Искать здесь...">
                    <button class="button" type="submit" name="search_btn"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"/></button>
            </form>
            <a href="../output/profile.php" class="log_in">
                <img src="<?= "../" . $_SESSION['user']['avatar']?>" class="prof">
               </a> 
             </div>
    </header>
    <!---->
    <!-- OPEN MAIN -->
    <div class="a">
        <div id="carousel">
            <h1>Лучшие ролики недели</h1>
          <figure id="spinner">
            <img src="/pictures/Превью1.png" alt>
            <img src="/pictures/Превью2.png" alt>
            <img src="/pictures/Превью3.png" alt>
            <img src="/pictures/Превью4.png" alt>
            <img src="/pictures/Превью5.png" alt>
            <img src="/pictures/Превью6.png" alt>
            <img src="/pictures/Превью7.png" alt>
            <img src="/pictures/Превью8.png" alt>
          </figure>
        </div>
        <span style="float:left; margin-right: 100px;" class="ss-icon" onclick="galleryspin('-')">&lt;</span>
        <span style="margin-left: 1150px;" class="ss-icon" onclick="galleryspin('')">&gt;</span>
    </div>
    <div class="b">
    <?php 
                require_once('../functions/connect.php');
                $result = $connect->prepare("SELECT * FROM `videos`");
                $result->execute();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <h2>Название видео:<?=$row['name_video']?></h2> 
                    <video class="my" controls="controls">
                        <source src="<?='../' . $row['video']?>" type="video/mp4">
                    </video>
                    <h2>Кто выложил видео:<?=$row['name_user']?></h2> 
                    <h2>Описание:<?=$row['discription']?></h2> 
                    <img src="<?='../' . $row['avatar_user']?>" width="60" height="60" style="border-radius: 50px;" alt="">
                    <?php
                }
            ?>
    </div>
    <!-- <div class="container">
        <div class="c"></div>
        <div class="d">element</div>
        <div class="e">element</div>
        <div class="e">element</div>
    </div> -->
    <!-- CLOSE MAIN -->
    <!-- <footer>
        <div class="e">footer</div>
    </footer> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/script.js"></script> 
    <script src="../js/slider.js"></script>

</body>
</html>