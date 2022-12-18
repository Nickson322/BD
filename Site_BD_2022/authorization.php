<?php
    session_start();
    include('connect.php');

    $login = stripslashes(htmlspecialchars(trim($_POST['login'])));
    $pass = trim($_POST['pass']);
    if (!empty($login) && !empty($pass)){
        $sql = "SELECT id_user, logg, pass FROM users
        WHERE logg = '$login' AND pass = '$pass'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_num_rows($result);
        if ($row == 0) {
            echo '<br>';
            echo("Неверный логин или пароль!");
            exit();
        } else{
            $row1 = mysqli_fetch_array($result);
            if ($row1['logg'] == $login)
                header('Location: client/index.php');
        }
    }
    mysqli_close($link);
    session_destroy();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authorization/style.css">
    <title>Транспортная компания</title>
</head>
<body>
    <form action="server/admin.php">
        <button type = "submit">Админ</button>
    </form>
    <!-- Окно авторизации -->
    <div class = "login">
        <form method="post" name="myForm">
            <p class="field">Логин: <input type="text" name="login"> </p>
            <p class= "field">Пароль: <input type="password" name="pass"> </p>
            <div class= "submit">
                <input class="btn" type="submit" value="Войти" name="enter">
                <form action="header.php" method="post">
                    <input class="btn" type="submit" value="Выход">
                </form>
                <form action="registration.php">
                    <input class="btn" type="submit" value="Регистрация" name="register">
                </form>
            </div>
        </form>

    </div>

</body>
</html>