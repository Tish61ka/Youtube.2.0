<?php
session_start();
if (!$_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Профиль</title>
</head>
<body>
          <p><?=$_SESSION['user']['nick_name']?></p>
          <img src="<?= "../" . $_SESSION['user']['avatar'] ?>" width="40" height="40" style="border-radius: 50px;">

          <a href="../functions/logout.php">Выход</a>
    <a href="index.php">На главную</a>
</body>
</html>