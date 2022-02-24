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

        </section>
        <a href="../functions/logout.php">Выход</a>
</body>
</html>