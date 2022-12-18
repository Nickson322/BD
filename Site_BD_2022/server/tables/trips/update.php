<?php
include 'connect.php';
//Если переменная Name передана
if (isset($_POST['id_trip'])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id'])) {

        $sql_update = "UPDATE trips SET id_trip =
        '{$_POST['id_trip']}', destination = '{$_POST['destination']}', depart_point
        = '{$_POST['depart_point']}', trip_data = '{$_POST['trip_data']}',
        duration = '{$_POST['duration']}' WHERE id_trip =
        {$_GET['red_id']}";
        $result_update = mysqli_query($link,$sql_update);
    }

    if ($result_update) {
    echo '<p>Успешно!</p>';
    } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($link). '</p>';
    }
}

if (isset($_GET['red_id'])) {
$sql_select = "SELECT id_trip, transport.transport_name, drivers.FIO, destination, depart_point, trip_data, duration
FROM trips INNER JOIN drivers ON trips.id_trip = drivers.id_driver
INNER JOIN transport ON trips.id_trip = transport.id_transport WHERE
id_trip = {$_GET['red_id']}";

$result_select = mysqli_query($link, $sql_select);
$row = mysqli_fetch_array($result_select);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Редактирование </title>
    <style>
        body{
            background: url("/css/authorization/img/bg.png");
            background-size: cover;
        }
        table{
            font-family: sans-serif;
            border-collapse: separate;
            border-spacing: 5px;
            background: #8fb9d3;
            border: 2px solid black;
            padding: 10px;
            border-radius: 20px;
        }
        td{
            border-radius: 10px;
            background: #ece9e0;;
            padding: 10px;
        }
        a{
            text-decoration: none;
        }
        a:hover{
            color: orange;
        }
        .save{
            margin-left: 135px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>Код поездки</td>
            <td><input type="text" name="id_trip" value="<?=
            isset($_GET['red_id']) ? $row['id_trip'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Имя транспорта</td>
            <td><input type="text" name="transport_name" value="<?=
            isset($_GET['red_id']) ? $row['transport_name'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>ФИО водителя</td>
            <td><input type="text" name="FIO" value="<?=
            isset($_GET['red_id']) ? $row['FIO'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Пункт прибытия</td>
            <td><input type="text" name="destination" value="<?=
            isset($_GET['red_id']) ? $row['destination'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Пункт отбытия</td>
            <td><input type="text" name="depart_point" value="<?=
            isset($_GET['red_id']) ? $row['depart_point'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Дата поездки</td>
            <td><input type="date" name="trip_data" value="<?=
            isset($_GET['red_id']) ? $row['trip_data'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Длительность поездки</td>
            <td><input type="text" name="duration" value="
            <?= isset($_GET['red_id']) ? $row['duration'] : ''; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input class="save" type="submit" value="Сохранить"></td>
        </tr>
    </table>

    <form action="index.php" method="post">
        <br>
    <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>