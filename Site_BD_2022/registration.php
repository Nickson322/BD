<?php
    session_start();
    include 'connect.php';


    $login = stripslashes(htmlspecialchars(trim($_POST['login'])));
    $pass = trim($_POST['pass']);

    if (!empty($login) && !empty($pass)){
        $sql = "INSERT INTO users(log, pass) VALUES ('$login', '$pass')";
    }

    $result = mysqli_query($link, $sql);

    if($result) {
        echo "Регистрация прошла успешно";
    }
    else {
        echo "Произошла ошибка: " . mysqli_error($link);
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
    <title>Регистрация</title>
</head>
<body>

    <div class = "login">
        <form method="post" name="myForm">
            <p class="field">Логин: <input type="text" name="login"> </p>
            <p class= "field">Пароль: <input type="password" name="pass"> </p>
            <div class= "submit">
                <form method="post">
                    <input class="btn" type="submit" value="Зарегистрироваться" name="reg">
                </form>
                <form action="header.php" method="post">
                    <input class="btn" type="submit" value="Выход">
                </form>
            </div>
        </form>
    </div>
    
</body>
</html>