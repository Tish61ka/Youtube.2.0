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
            <a href="index.html"><div class="logo">GameHub</div></a>
                <ul class="two_button">
                    <li class="two_button_first_li">
                        <a href="singin.php">Вход</a>
                    </li>
                    <li class="two_button_second_li">
                        <a href="registration.php">Регистрация</a>
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
                    <input contenteditable spellcheck="false" type="submit" value="Войти" class="enter">
                    <?php 
                        if ($_SESSION['message']){
                            echo '<p class="message">' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                            ?> 
                </form>
            </li>
        </ul>
    </section>
</body>
</html>