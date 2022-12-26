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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/server/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/server/style.css">
    <title>Страница администратора</title>
</head>
<body>
    <div class="tables">
        <ul>
            <li class="ref"><a href="tables/clients/index.php">Клиенты</a></li>
            <li class="ref"><a href="tables/tickets/index.php">Билеты</a></li>
            <li class="ref"><a href="tables/trips/index.php">Поездки</a></li>
            <li class="ref"><a href="tables/transport/index.php">Транспорт</a></li>
            <li class="ref"><a href="tables/drivers/index.php">Водители</a></li>
        </ul>
    </div>

    <form method="post">
        <input type="submit" value="Выйти" name="exit">
    </form>
</body>

</html>