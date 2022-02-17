<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registration.css">
    <title>Регистрация</title>
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
                <form action="../functions/registration_function.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="">Никнейм:</label>
                        <input type="text" name="nick_name" placeholder="Введите ваш никнейм"> <br>
                    </div>
                    
                    <div>
                        <label for="">Email:</label>
                        <input type="email" name="email" placeholder="Введите ваш Email"><br>
                    </div>
                    
                    <div>
                        <label for="a">Выберите аватар:</label>
                        <input type="file" name="avatar" class="button_file" id="a"> <br>
                        <button class="button_file_2">Выберете файл</button>
                    </div>
                    
                    <div>
                        <label for="">Пароль:</label>
                        <input type="password" name="password" placeholder="Введите пароль" ><br>
                    </div>
        
                    <div>
                        <label for="">Повтор пароля:</label>
                        <input type="password" name="password_confirm" placeholder="Введите пароль еще раз"><br>
                    </div>
                    <?php 
                      if ($_SESSION['message']){
                          echo '<p>' . $_SESSION['message'] . '</p>';
                      }
                      unset($_SESSION['message']);
                    ?> 
                    <input type="submit" class="enter" value="Зарегистрироваться">
                    
                </form>
                <a href="index.html"><button class="go_back">На главную</button></a>
            </li>
        </ul>
        
    </section>
</body>
</html>