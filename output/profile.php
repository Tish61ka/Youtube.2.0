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
    <link rel="stylesheet" href="../css/profile.css">
    <title>Профиль</title>
</head>
<header>
    <a href="index.php"><img src="../pictures/лого.png" class="logo" alt=""></a>
</header>
<div class="line-right">
<div class="icon">
    <div class="crop">
                <a href="#" >
                    <img src="<?= "../" . $_SESSION['user']['avatar'] ?>">  
                </a>
            </div>
          <p><?=$_SESSION['user']['nick_name']?></p>
    </div>
    <ul class="ul_profile">
        <a href="myprofile.php">
            <li>
                Профиль
            </li>
        </a>
        <a href="">
            <li class="between_li">
                Загрузить видео
            </li>
        </a>
        <a href="myvideos.php">
            <li class="last_li">
                Мои видео
            </li>
        </a>
    </ul>
</div>
        <section>
            <form action="../functions/load_video.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="">Название</label>
                    <input type="text" name="name_video" placeholder="Введите название видео">
                </div>
                <div>
                    <label class="label_area" for="">Описание</label> 
                    <textarea name="discription" id="" cols="30" rows="10" placeholder="Введите описание видео"></textarea>
                </div> 
                    <div>
                    <input type="file" name="video" class="button_file" id="a"> 
                    <button class="button_file_2">Загрузите видео</button>
                </div>
                <input type="file" name="prewiew" class="prewiew">
                <div class="download_prewiew">
                <svg class="svg_download" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="60" height="60"
                    viewBox="0 0 172 172"
                    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="2" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="5" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M75.25,14.33333c-5.85562,0 -10.75,4.89438 -10.75,10.75v46.58333h-31.63411l53.13411,53.13411l53.13411,-53.13411h-31.63411v-46.58333c0,-5.85562 -4.89438,-10.75 -10.75,-10.75zM78.83333,28.66667h14.33333v57.33333h11.36589l-18.53256,18.53256l-18.53255,-18.53256h11.36589zM14.33333,143.33333v14.33333h143.33333v-14.33333z"></path></g></g></svg>
                </div>
                <button type="submit" class="enter">Опубликовать</button>
                <?php 
                    if ($_SESSION['message']){
                        echo '<p class="message">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                ?> 
            </form>
        </section>
        <a class="logout" href="../functions/logout.php">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="54" height="54"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ba45f0"><path d="M164.83333,21.66797l-57.33333,7.11068v21.38802h14.33333v-8.72038l28.66667,-3.56934v96.2461l-28.66667,-3.56934v-8.72038h-14.33333v21.38802l57.33333,7.11067zM73.45833,28.66667c-6.92657,0 -12.54167,5.6151 -12.54167,12.54167c0,6.92657 5.6151,12.54167 12.54167,12.54167c6.92657,0 12.54167,-5.6151 12.54167,-12.54167c0,-6.92657 -5.6151,-12.54167 -12.54167,-12.54167zM35.58138,50.16667c-2.8547,0.01075 -5.70892,0.59996 -8.38444,1.74967l-0.09798,0.028l-13.08757,6.04688l6.01888,13.01758l12.82161,-5.9349h0.02799c0.88579,-0.37659 1.82295,-0.57037 2.75749,-0.57389c0.95439,-0.00359 1.9023,0.18308 2.79948,0.5599l3.35938,1.51172l-11.68782,21.54199c-0.96033,1.97083 -1.45607,4.16215 -1.44173,6.34082c0.0215,3.79833 1.51172,7.36262 4.19922,10.05012l17.28678,14.09538l-8.39844,24.7334h15.13118l6.83073,-20.10026c0.59483,-1.70566 0.85552,-3.47885 0.78385,-5.24902c-0.1505,-3.81983 -1.77308,-7.35658 -4.95508,-10.30208l-8.5944,-8.46843l10.66602,-19.66634l2.49154,3.83529c3.96191,6.09854 10.76322,9.78418 18.02865,9.78418h11.02994v-14.33333h-11.02994c-2.43825,0 -4.69179,-1.21861 -6.01888,-3.26139l-5.10905,-7.85254v-0.014c-2.2502,-3.45034 -5.43828,-6.20108 -9.22428,-7.89453l-17.7207,-7.93652l-0.08398,-0.02799c-2.68615,-1.12818 -5.54016,-1.69043 -8.39844,-1.67969zM121.83333,64.5v14.33333h-14.33333v14.33333h14.33333v14.33333l21.5,-21.5zM27.07096,108.67578l-3.05143,3.62533c-1.3545,1.505 -3.28368,2.36556 -5.31901,2.36556h-11.53385v14.33333h11.53385c6.09167,0 11.911,-2.59131 16.125,-7.29264l3.19141,-3.7793l-10.2181,-8.35645c-0.27233,-0.27233 -0.46986,-0.60916 -0.72786,-0.89583z"></path></g></g></svg>    
        </a>
</body>
</html>