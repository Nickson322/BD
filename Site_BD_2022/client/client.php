<?php
$exit = $_POST['exit'];
if (!empty($exit)) {
    unset($_SESSION['login']);
    unset($_SESSION['pass']);
    exit("<html><head><title>Загрузка...</title><meta http-equiv='Refresh'
    content='0; URL=../index.php'></head></html>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/server/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Добавление в таблицу данных</title>
</head>
<body>
    <p>Вы пользователь</p>
    <form method="post">
        <input type="submit" value="Выйти" name="exit">
    </form>
</body>

</html>