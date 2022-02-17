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
        <form action="../functions/registration_function.php" method="post" enctype="multipart/form-data">
            <label for="">Никнейм:</label>
            <input type="text" name="nick_name" placeholder="Введите ваш никнейм"> <br>

            <label for="">Email:</label>
            <input type="email" name="email" placeholder="Введите ваш Email"><br>

            <label for="">Выберите аватар:</label>
            <input type="file" name="avatar"> <br>

            <label for="">Пароль:</label>
            <input type="password" name="password" placeholder="Введите пароль"><br>

            <label for="">Повтор пароля:</label>
            <input type="password" name="password_confirm" placeholder="Введите пароль еще раз"><br>

            <input type="submit" value="Зарегистрироваться">
            <a href="../output/singin.php">Войти в существующий аккаунт</a>
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