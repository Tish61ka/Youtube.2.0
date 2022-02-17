<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/singin.css">
    <title>Вход в аккаунт</title>
</head>
<body>
    <section>

    <ul class="bodu_ul">
            <li class="top">
                <div class="logo">GameHub</div>
                <ul class="two_button">
                    <li class="two_button_first_li">
                        <a href="singin.php">Вход</a>
                    </li>
                    <li class="two_button_second_li">
                        <a href="registration.php">Регестрация</a>
                    </li>
                </ul>
            </li>
            <li class="bottom">
            <form action="../functions/singin_function.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="">Никнейм:</label>
                        <input type="text" name="nick_name" placeholder="Введите никнейм"> <br>
                    </div>
                    
                    <div>
                        <label for="">Пароль</label>
                        <input type="password" name="password" placeholder="Введите пароль"><br>
                    </div>
                    <?php 
                        if ($_SESSION['message']){
                            echo '<p>' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                            ?> 
                    <input contenteditable spellcheck="false" type="submit" value="Войти" class="enter">
                </form>
                <a href="index.html"><button class="go_back">На главную</button></a>
            </li>
        </ul>
    </section>
</body>
</html>