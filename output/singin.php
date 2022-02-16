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
        <form action="../functions/singin_function.php" method="post" enctype="multipart/form-data">
            <label for="">Никнейм:</label>
            <input type="text" name="nick_name" placeholder="Введите никнейм"> <br>

            <label for="">Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль"><br>

            <input type="submit" value="Войти">
            <a href="../output/registration.php">Зарегистрироваться</a>
            
          <?php 
            if ($_SESSION['message']){
                echo '<p>' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
          ?> 
        </form>
    </section>
</body>
</html>