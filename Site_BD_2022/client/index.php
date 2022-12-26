<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/client/style.css">
    <title>Главная</title>
</head>
<body>

    <ul class="main-menu">
        <li><a href="travel_nav.php">Направления поездок</a></li>
        <li><a href="ticket_buy.php">Купить билет</a></li>
        <li><a href="../index.php">Выйти из аккаунта</a></li>       
    </ul>

    <form method="post">
        <div class="ramka">
        <!-- <div class="find"> -->
            <div class="dep">
                <p>Пункт отправления: </p><input type="text" name="depart"
                value="<?=$_POST['depart']; ?>">
            </div>
            <div>
                <p>Пункт прибытия: </p><input type="text" name="dest"
                value="<?=$_POST['dest']; ?>">
            </div>
            <div class="data">
                <input type="date" name="dat"
                value="<?=$_POST['dat']; ?>">
            </div>
        <!-- </div> -->

            <div class="col-md-3 col-xs-12 big-search">
                <button class="btn btn-primary" type="submit" name="submit" value="Найти"> Найти</button>
            </div>
        </div>







        <!-- <div class="find">
            <p>Пункт отправления: </p><input type="text" name="depart"
            value="<?=$_POST['depart']; ?>">
    
            <p>Пункт прибытия: </p><input type="text" name="dest"
            value="<?=$_POST['dest']; ?>">

            <div class="data">
                <input type="date" name="dat"
                value="<?=$_POST['dat']; ?>">

                <input class="btn" type="submit" name="submit" value="Найти">
            </div>
        </div> -->
    </form>

</body>
</html>

<?php
    include 'connect.php';

    $depart = $_POST['depart'];
    $dest = $_POST['dest'];
    $dat = $_POST['dat'];
    $reset = $_POST['reset'];

    if(isset($depart) && isset($dest) && isset($dat)){
        $sqllike = "SELECT FIO, depart_point, destination, trip_data, duration, cost FROM trips 
        INNER JOIN transport ON trips.id_transport = transport.id_transport
        INNER JOIN drivers ON trips.id_driver = drivers.id_driver
        WHERE depart_point LIKE '%$depart%' AND destination LIKE '%$dest%' AND trip_data LIKE '%$dat%'";

        $res = mysqli_query($link, $sqllike);

        echo '<table>'.
        '<tr>'.
        '<td>ФИО водителя</td>'.    
        '<td>Пункт прибытия</td>'.
        '<td>Пункт отправления</td>'.
        '<td>Дата поездки</td>'.
        '<td>Длительность поездки</td>'.
        '<td>Цена билета</td>'.
        '</tr>';

        while ($row1 = mysqli_fetch_array($res)) {
            echo
                '<tr>' .
                "<td> {$row1['FIO']}</td>".
                "<td> {$row1['destination']}</td>".
                "<td> {$row1['depart_point']}</td>".
                "<td> {$row1['trip_data']}</td>".
                "<td> {$row1['duration']}</td>".
                "<td> {$row1['cost']}</td>".
                '</tr>';
        }
        echo '</table>';

    }
?>