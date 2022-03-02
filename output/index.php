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
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>GameHUB</title>
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
            <a href="../output/myprofile.php" class="log_in">
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
                $result = $connect->prepare("SELECT * FROM `output_videos`");
                $result->execute();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <h2><?=$row['name_video']?></h2> 
                    <a href="../output/go_to_video.php?id=<?echo $row['id']?>"><video class="my" src="<?php 
                                if($row['ban']==1){
                                    $_SESSION['message'] = 'Видео забанено и скоро будет удалено!';
                                }
                                else{
                                    echo '../' . $row['video'];
                                }
                            ?>" poster="<?php
                            if($row['ban']==1){
                                echo '../prewiew/deleted_video.png';
                            }
                            else{
                                echo '../' . $row['prewiew'];
                            }
                        ?>">
                    </video></a>
                    <?php 
                        if ($_SESSION['message']){
                            echo '<p class="message">' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                    ?>
                    <a href="../output/check_user.php?id=<?php echo $row['id_user']?>"><h2><?=$row['name_user']?></h2></a> 
                    <p><?=$row['date']?></p>
                    <h2><?=$row['discription']?></h2>
                    <a href="../output/check_user.php?id=<?php echo $row['id_user']?>"><img src="<?='../' . $row['avatar_user']?>" height="60" width="60" style="border-radius: 50px;" alt=""></a>
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