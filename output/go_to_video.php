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
    <link rel="stylesheet" href="/css\gotovideo.css">
    <title>Видео <?=$video['name_video']?></title>
</head>
<body>
<header>
            <div class="menu-burger__header">
                <span></span>
            </div>
            <nav class="header__nav">
                <ul class="menu header__menu">
                    <li><a href="/output\index.php" class="menu__item">Главная</a></li>
                    <li><a href="" class="menu__item">В разработке</a></li>
                    <li><a href="" class="menu__item">В разработке</a></li>
                    <li><a href="" class="menu__item">В разработке</a></li>
                    <li><a href="" class="menu__item">В разработке</a></li>
                    <li><a href="" class="menu__item">В разработке</a></li>
                    <li><a href="../functions/logout.php" class="menu__item">Выход</a></li>
                </ul>
            </nav>   
            <a class="logo1" href="index.php"><img src="/pictures/лого.png" class="logo" alt=""></a>   
            <form method="POST" action="search.php">
                <input class="input" type="text" name="search" required placeholder="Искать здесь...">
                <button class="button" type="submit" name="search_btn"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"/></button>
            </form>
               <a href="../output/myprofile.php" class="log_in">
                <img src="<?= "../" . $_SESSION['user']['avatar']?>" class="prof">
               </a> 
               </a> 
    </header>
    <section class="b"></section>
    <section class="video">
        <video controls src="
            <?php 
                if($video['ban']==1){
                    $_SESSION['message'] = 'Видео забанено и скоро будет удалено!';
                }
                else{
                    echo '../' . $video['video'];
                }
            ?>
            " 
            poster="
            <?php
                if($video['ban']==1){
                    echo '../prewiew/deleted_video.png';
                }
                else{
                    echo '../' . $video['prewiew'];
                }
            ?>">
    </video>
    </section>
    <!--Какое то говно-->
    <?php 
        if ($_SESSION['message']){
            echo '<p class="message">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
    ?>
    <!--Конец какого то говна и начало нормального кода-->
    <section class="info_under_video">
        <a href="../output/check_user.php?id=<?php echo $video['id_user']?>"><img src="<?='../'. $video['avatar_user']?>" alt=""></a>          
        <h1><?=$video['name_video']?></h1>
        <h2><?=$video['name_user']?></h2>
        <p>Дата публикации видео:<?=' ', $video['date']?></p>
        <form class="form_like">
        <textarea id="like" name="like_plus" id="" cols="3" rows="1"></textarea>
        <button id="qu" onclick="likeplus(); event.preventDefault(); document.getElementById('qu').style.zIndex = '0';document.getElementById('qu1').style.zIndex = '3'; document.getElementById('close1').style.zIndex = '0'; document.getElementById('close').style.zIndex = '3'; document.getElementById('qu').style.opacity = '0';document.getElementById('qu1').style.opacity = '1'; document.getElementById('close1').style.opacity = '0'; document.getElementById('close').style.opacity = '1'">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="36" height="36"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ba45f0"><path d="M86,162.71469l-2.20375,-1.8275c-4.17906,-3.49375 -9.83625,-7.28312 -16.39375,-11.66375c-25.54469,-17.10594 -60.5225,-40.51406 -60.5225,-80.42344c0,-24.65781 20.06219,-44.72 44.72,-44.72c13.39719,0 25.94781,5.96625 34.4,16.16531c8.45219,-10.19906 21.00281,-16.16531 34.4,-16.16531c24.65781,0 44.72,20.06219 44.72,44.72c0,39.90938 -34.97781,63.3175 -60.5225,80.42344c-6.5575,4.38063 -12.21469,8.17 -16.39375,11.66375z"></path></g></g></svg></button>
        <button id="qu1" onclick="likeminus(); event.preventDefault();document.getElementById('qu1').style.zIndex = '0';document.getElementById('qu').style.zIndex = '3'; document.getElementById('close1').style.zIndex = '0'; document.getElementById('close').style.zIndex = '3';   ;document.getElementById('qu1').style.opacity = '0';document.getElementById('qu').style.opacity = '1'; document.getElementById('close1').style.opacity = '0'; document.getElementById('close').style.opacity = '1'">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="36" height="36"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff0000"><path d="M86,162.71469l-2.20375,-1.8275c-4.17906,-3.49375 -9.83625,-7.28312 -16.39375,-11.66375c-25.54469,-17.10594 -60.5225,-40.51406 -60.5225,-80.42344c0,-24.65781 20.06219,-44.72 44.72,-44.72c13.39719,0 25.94781,5.96625 34.4,16.16531c8.45219,-10.19906 21.00281,-16.16531 34.4,-16.16531c24.65781,0 44.72,20.06219 44.72,44.72c0,39.90938 -34.97781,63.3175 -60.5225,80.42344c-6.5575,4.38063 -12.21469,8.17 -16.39375,11.66375z"></path></g></g></svg></button>
        <textarea id="dislike" name="" id="" cols="3" rows="1"></textarea>
        <button id="close" onclick="dislikeplus(); event.preventDefault(); document.getElementById('qu1').style.zIndex = '0'; document.getElementById('qu').style.zIndex = '3'; document.getElementById('close').style.zIndex = '0'; document.getElementById('close1').style.zIndex = '3';  document.getElementById('qu1').style.opacity = '0'; document.getElementById('qu').style.opacity = '1'; document.getElementById('close').style.opacity = '0'; document.getElementById('close1').style.opacity = '1'">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="36" height="36"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ba45f0"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></svg>
        </button>
        <button id="close1" onclick="dislikeminus(); event.preventDefault(); document.getElementById('qu1').style.zIndex = '0'; document.getElementById('qu').style.zIndex = '3'; document.getElementById('close1').style.zIndex = '0'; document.getElementById('close').style.zIndex = '3';  document.getElementById('qu1').style.opacity = '0'; document.getElementById('qu').style.opacity = '1'; document.getElementById('close1').style.opacity = '0'; document.getElementById('close').style.opacity = '1'">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="36" height="36"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="red"><path d="M120.4,24.08c-6.59781,0 -12.85969,1.42438 -18.705,4.07156l-5.375,23.44844h12.72531l-12.37594,30.96h8.93594l-28.20531,45.40531l8.6,-38.52531h-11.35469l10.66937,-30.96h-14.44531l5.17344,-27.06312c-7.05469,-4.78375 -15.45313,-7.33688 -24.44281,-7.33688c-24.65781,0 -44.72,20.06219 -44.72,44.72c0,39.90938 34.97781,63.3175 60.5225,80.42344c6.5575,4.38063 12.21469,8.17 16.39375,11.66375c0.645,0.52406 1.42438,0.79281 2.20375,0.79281c0.77938,0 1.55875,-0.26875 2.20375,-0.79281c4.1925,-3.49375 9.83625,-7.26969 16.39375,-11.66375c25.54469,-17.10594 60.5225,-40.51406 60.5225,-80.42344c0,-24.65781 -20.06219,-44.72 -44.72,-44.72z"></path></g></g></svg>
        </button>
    </form>
    </section>
    <div class="line"></div>
    <section class="description">
        <h2>Описание</h2>
        <p><?=$video['discription']?></p>
    </section>
    <img class="under_video" src="/pictures/pictureonfooter.png" alt="">
    <section class="comments">
        <form action="../functions/comments_functions.php" method="GET">
            <h1>Оставьте комментарий к видео:)</h1>
            <textarea name="comment" id="" cols="30" rows="5" placeholder="Напишите комментарий..."></textarea>
            <input type="hidden" name="id_video" value="<?php echo $video['id'] ?>">
            <input type="submit" value="Отправить">
        </form>
    </section>
    <img class="under_comment" src="/pictures/pictureonfooter.png" alt="">
    <section class="other_commets">
        <?php 
            require_once('../functions/connect.php');
            $id_video = $video['id'];
            $output_comm = $connect->query("SELECT * FROM `comments` WHERE `id_video` = '$id_video'");
            while($comm = $output_comm->fetch(PDO::FETCH_ASSOC)){
                ?>                
        <div class="comment">
        <a href="../output/check_user.php?id=<?php echo $comm['id_user']?>"><img src="<?='../' . $comm['avatar_user']?>" alt=""></a>
                <div>
                    <p><?=$comm['name_user']?></p>
                    <?=$comm['comment']?>
                </div>
        </div>
        <?php
            }
        ?>
    </section>
    <img class="on_footer" src="/pictures/pictureonfooter.png" alt="">
    <footer>
        <ul>
            <li>GWPU Corporation</li>
            <li>ⓒ 2022 Company, Corp-<a href="">Privacy</a></li>
        </ul>
        <ul class="next_ul_footer">
            <li>Есть вопросы?</li>
            <li>Звони по номеру 8-927-662-5598</li>
        </ul>
        <div>
        <a href="https://vk.com/happytishka">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="100" height="100"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ba45f0"><path d="M30.96,13.76c-9.45834,0 -17.2,7.74166 -17.2,17.2v110.08c0,9.45834 7.74166,17.2 17.2,17.2h110.08c9.45834,0 17.2,-7.74166 17.2,-17.2v-110.08c0,-9.45834 -7.74166,-17.2 -17.2,-17.2zM30.96,20.64h110.08c5.73958,0 10.32,4.58042 10.32,10.32v110.08c0,5.73958 -4.58042,10.32 -10.32,10.32h-110.08c-5.73958,0 -10.32,-4.58042 -10.32,-10.32v-110.08c0,-5.73958 4.58042,-10.32 10.32,-10.32zM80.4839,55.01313c-3.63777,-0.00835 -6.88148,0.19494 -9.7825,1.61922c-0.00224,0.00224 -0.00448,0.00448 -0.00672,0.00672c-1.4143,0.69681 -2.41113,1.58188 -3.20484,2.63375c-0.39686,0.52593 -0.80344,0.99805 -1.02125,2.19703c-0.10891,0.59949 -0.17007,1.57096 0.45687,2.62031c0.62696,1.04935 1.88763,1.64605 2.69422,1.7536c0.56032,0.07458 1.82506,0.61291 1.94172,0.77265c0.00223,0.00448 0.00447,0.00896 0.00672,0.01344c0.00084,0.00115 0.49046,1.27969 0.63156,2.41875c0.14111,1.13906 0.13438,2.06265 0.13438,2.06265c-0.00144,0.09188 0.0008,0.18377 0.00672,0.27547c0,0 0.19928,2.9844 0.06719,6.06703c-0.05263,1.22861 -0.21153,2.32163 -0.37625,3.2989c-1.22502,-1.35247 -3.03009,-3.80171 -5.63703,-8.31781c-2.89197,-5.01275 -5.19359,-9.50703 -5.19359,-9.50703c-0.12087,-0.39155 -0.54836,-1.60973 -2.21719,-2.83531c-1.82433,-1.3446 -3.58781,-1.54531 -3.58781,-1.54531c-0.22121,-0.04437 -0.44626,-0.06688 -0.67188,-0.06719l-13.55844,0.00672c0,0 -0.81293,-0.04702 -1.78719,0.08735c-0.97426,0.13437 -2.44129,0.24372 -3.85656,1.92156c-0.00224,0.00224 -0.00448,0.00448 -0.00672,0.00672c-1.26484,1.51132 -1.18834,3.18175 -1.03469,4.12531c0.15363,0.94356 0.49719,1.65953 0.49719,1.65953c0.00663,0.01348 0.01335,0.02692 0.02015,0.04031c0,0 11.09018,23.31717 23.62313,37.04719c9.10115,9.96918 18.44261,10.1386 26.14937,10.1386h5.75125c1.46828,0 2.79643,-0.05738 4.26641,-0.91375c1.46997,-0.85638 2.45906,-2.94121 2.45906,-4.38735c0,-1.5154 0.22625,-2.70667 0.50391,-3.31906c0.19526,-0.43068 0.34984,-0.58578 0.59125,-0.71219c0.05104,0.03237 0.01808,0.01355 0.16125,0.11422c0.57265,0.4027 1.51826,1.32072 2.5464,2.46578c2.05628,2.29013 4.39034,5.43137 7.525,7.58547c2.24568,1.54454 4.36695,2.23041 5.97969,2.47922c1.01041,0.15589 1.79516,0.12586 2.35156,0.08062l12.84625,0.05375c0.0762,0.00029 0.15239,-0.00195 0.22844,-0.00672c0,0 2.2135,0.0258 4.515,-1.35047c1.15076,-0.68822 2.50798,-1.99301 2.94953,-3.89688c0.44155,-1.90387 -0.11338,-3.87659 -1.19594,-5.67734c0,-0.00224 0,-0.00448 0,-0.00672c0.188,0.31166 -0.17021,-0.32876 -0.5375,-0.92719c-0.3673,-0.59843 -0.9006,-1.40484 -1.66625,-2.40531c-1.5313,-2.00094 -3.98392,-4.80104 -7.94828,-8.4925c-0.00224,0 -0.00448,0 -0.00672,0c-2.01352,-1.87338 -3.37319,-3.19976 -3.93047,-3.93719c-0.55728,-0.73743 -0.3745,-0.35005 -0.33594,-0.5375c0.07716,-0.37489 2.49373,-3.86098 7.41078,-10.4275c2.98898,-3.99691 5.08666,-6.99768 6.47016,-9.49359c1.38349,-2.49592 2.38108,-4.6575 1.6864,-7.30328c-0.00223,-0.00448 -0.00447,-0.00896 -0.00672,-0.01344c-0.30839,-1.16141 -1.15066,-2.23193 -2.01563,-2.81515c-0.86496,-0.58322 -1.68502,-0.81132 -2.41875,-0.95406c-1.46747,-0.28548 -2.74803,-0.23515 -3.93719,-0.23515c-2.49318,0 -13.55502,0.08735 -14.46547,0.08735c-1.07579,0 -2.85467,0.48932 -3.64156,0.96078c-1.97837,1.19053 -2.5464,2.75469 -2.5464,2.75469c-0.03579,0.06607 -0.0694,0.13329 -0.10078,0.20156c0,0 -2.28184,5.05999 -5.22047,10.05797c-2.97689,5.06962 -5.17611,7.48756 -6.50375,8.60672c-0.03653,-0.19904 -0.03025,-0.03742 -0.05375,-0.31578c-0.11899,-1.41571 0.01344,-3.37197 0.01344,-5.28094c0,-5.14113 0.43578,-8.7393 0.20156,-11.91906c-0.1171,-1.58988 -0.41161,-3.22935 -1.45797,-4.73672c-1.04636,-1.50737 -2.78745,-2.48666 -4.50828,-2.9025c-1.03252,-0.24906 -2.20947,-0.89685 -6.47015,-0.94063c-0.00224,0 -0.00448,0 -0.00672,0c-1.30297,-0.01302 -2.55663,-0.03753 -3.76922,-0.04031zM84.18594,61.93344c3.77013,0.03873 2.831,0.24627 4.92485,0.7525c0.64933,0.1569 0.49203,0.15601 0.47703,0.13438c-0.01514,-0.02167 0.17563,0.33303 0.24859,1.32359c0.14592,1.9811 -0.22172,5.91997 -0.22172,11.40844c0,1.49663 -0.18059,3.63236 0.00672,5.85875c0.18714,2.22639 0.73934,5.08359 3.39969,6.80609c1.26106,0.81743 2.72531,0.86896 3.9775,0.55766c1.25219,-0.31132 2.3882,-0.9597 3.58109,-1.91485c2.38578,-1.91029 5.04684,-5.13433 8.39172,-10.83063c3.12632,-5.31721 5.40032,-10.38052 5.47578,-10.54844c0.01477,-0.01184 0.02971,-0.01997 0.04703,-0.03359c0.04296,0.00047 -0.00154,0 0.05375,0c1.28428,0 12.14265,-0.08735 14.46547,-0.08735c0.54224,0 0.73962,0.03269 1.16906,0.04703c-0.11672,0.38963 0.01307,0.14111 -0.49719,1.06156c-1.07009,1.9305 -3.04203,4.79945 -5.95953,8.70078c-4.79407,6.40229 -7.76545,8.91099 -8.64031,13.16203c-0.43743,2.12552 0.38238,4.48155 1.58563,6.07375c1.20325,1.59221 2.722,2.95629 4.73672,4.83078c3.73091,3.47407 5.91967,5.99807 7.17562,7.63922c0.62798,0.82058 1.02386,1.41328 1.26985,1.81406c0.24599,0.40078 0.18521,0.3585 0.5039,0.88688c0.20981,0.35162 0.1325,0.13702 0.16797,0.24187c-0.41246,0.11627 -0.91216,0.25625 -0.94062,0.26203l-12.6514,-0.05375c-0.22787,-0.00013 -0.45518,0.02237 -0.6786,0.06719c0,0 0.03165,0.03722 -0.645,-0.06719c-0.67676,-0.1044 -1.75308,-0.39726 -3.13766,-1.35047c-1.67102,-1.14831 -4.0103,-3.95794 -6.30219,-6.51047c-1.14594,-1.27626 -2.28878,-2.50191 -3.70875,-3.50047c-1.41997,-0.99856 -3.54473,-1.93753 -5.83859,-1.2161c-2.38125,0.74772 -4.23478,2.60608 -5.13985,4.60235c-0.6737,1.48596 -0.72827,3.03812 -0.83313,4.58219c-0.11417,0.0086 0.0172,0 -0.12765,0h-5.75125c-7.81452,0 -13.36331,0.54045 -21.07,-7.90125c-10.36641,-11.35655 -19.86414,-30.25191 -21.41265,-33.36531l11.9325,-0.00672c0.20974,0.0805 0.65861,0.24904 0.68531,0.26875c0.00447,0.00449 0.00895,0.00897 0.01344,0.01344c-0.43617,-0.31882 0.02015,0.12766 0.02015,0.12766c0.04211,0.103 0.0892,0.2039 0.1411,0.30234c0,0 2.36442,4.61925 5.35484,9.80266c2.93334,5.08153 5.07088,8.25592 7.13531,10.35359c1.03222,1.04884 2.07419,1.89001 3.46688,2.365c1.39268,0.47499 3.19099,0.30076 4.40078,-0.36281c2.47139,-1.35285 2.80344,-3.34828 3.20484,-5.09281c0.40197,-1.74699 0.56199,-3.608 0.63828,-5.38844c0.14806,-3.45584 -0.06135,-6.44671 -0.0739,-6.6314c0.00076,-0.06478 0.01649,-1.31199 -0.18141,-2.90922c-0.20262,-1.63554 -0.42859,-3.63527 -1.90812,-5.65047l-0.00672,-0.00672c-0.01032,-0.0141 -0.02328,-0.01312 -0.0336,-0.02688c1.9565,-0.2806 3.63059,-0.626 7.10844,-0.59125zM114.53453,65.30625l-0.04703,0.1075c-0.00728,0.00417 -0.00495,-0.00496 -0.01344,0c0.01454,-0.02773 0.06047,-0.1075 0.06047,-0.1075z"></path></g></g></svg>
        </a>
        <a href="https://www.instagram.com/me.tishka/">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="100" height="100"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ba45f0"><path d="M55.04,10.32c-24.65626,0 -44.72,20.06374 -44.72,44.72v61.92c0,24.65626 20.06374,44.72 44.72,44.72h61.92c24.65626,0 44.72,-20.06374 44.72,-44.72v-61.92c0,-24.65626 -20.06374,-44.72 -44.72,-44.72zM55.04,17.2h61.92c20.9375,0 37.84,16.9025 37.84,37.84v61.92c0,20.9375 -16.9025,37.84 -37.84,37.84h-61.92c-20.9375,0 -37.84,-16.9025 -37.84,-37.84v-61.92c0,-20.9375 16.9025,-37.84 37.84,-37.84zM127.28,37.84c-3.79972,0 -6.88,3.08028 -6.88,6.88c0,3.79972 3.08028,6.88 6.88,6.88c3.79972,0 6.88,-3.08028 6.88,-6.88c0,-3.79972 -3.08028,-6.88 -6.88,-6.88zM86,48.16c-20.85771,0 -37.84,16.98229 -37.84,37.84c0,20.85771 16.98229,37.84 37.84,37.84c20.85771,0 37.84,-16.98229 37.84,-37.84c0,-20.85771 -16.98229,-37.84 -37.84,-37.84zM86,55.04c17.13948,0 30.96,13.82052 30.96,30.96c0,17.13948 -13.82052,30.96 -30.96,30.96c-17.13948,0 -30.96,-13.82052 -30.96,-30.96c0,-17.13948 13.82052,-30.96 30.96,-30.96z"></path></g></g></svg>
        </a>   
        <a href="https://mail.google.com/mail/u/0/#inbox?compose=new"> 
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="100" height="100"
                viewBox="0 0 172 172"
                style="fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ba45f0"><path d="M143.78125,99.4375v-13.4375c0,-15.85625 -6.58437,-31.175 -18.275,-42.05937c-11.69063,-11.01875 -27.14375,-16.52813 -43.26875,-15.5875c-29.025,1.74687 -52.1375,24.99375 -54.01875,54.01875c-0.94063,16.125 4.56875,31.44375 15.5875,43.26875c11.01875,11.55625 26.3375,18.14063 42.19375,18.14063c2.28437,0 4.03125,-1.74687 4.03125,-4.03125c0,-2.28438 -1.74688,-4.03125 -4.03125,-4.03125c-13.84063,0 -26.74062,-5.50938 -36.28125,-15.72187c-9.40625,-10.07812 -14.24375,-23.24688 -13.30313,-37.22187c1.6125,-24.99375 21.5,-44.88125 46.49375,-46.49375c13.84063,-0.80625 27.00938,4.03125 37.0875,13.4375c10.07812,9.54062 15.72187,22.30625 15.72187,36.28125v13.4375c0,5.24063 -4.16563,9.40625 -9.40625,9.40625c-5.24063,0 -9.40625,-4.16562 -9.40625,-9.40625v-13.4375c0,-17.06562 -13.84063,-30.90625 -30.90625,-30.90625c-17.06562,0 -30.90625,13.84063 -30.90625,30.90625c0,17.06562 13.84063,30.90625 30.90625,30.90625c9.675,0 18.275,-4.43438 23.91875,-11.42187c2.55312,6.71875 8.86875,11.42188 16.39375,11.42188c9.675,0 17.46875,-7.79375 17.46875,-17.46875zM86,108.84375c-12.63125,0 -22.84375,-10.2125 -22.84375,-22.84375c0,-12.63125 10.2125,-22.84375 22.84375,-22.84375c12.63125,0 22.84375,10.2125 22.84375,22.84375c0,12.63125 -10.2125,22.84375 -22.84375,22.84375z"></path></g></g></svg>
        </a>
        </div>
        <img src="/pictures/qr.jpg" alt="">
        </footer>
        <script src="/js\like.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/script.js"></script> 
        <script src="/js/slider.js"></script> 
        <script src="/js/question.js"></script>
</body>
</html>