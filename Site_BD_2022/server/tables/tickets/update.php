<?php
include 'connect.php';
//Если переменная id_ticket передана
if (isset($_POST['id_ticket'])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id'])) {

        // $sql_update = 
        // "UPDATE tickets
        // INNER JOIN trips 
        //     ON tickets.id_trip = trips.id_trip
        // INNER JOIN clients 
        //     ON tickets.id_ticket = clients.id_client
        // SET id_ticket = '{$_POST['id_ticket']}', trips.destination = '{$_POST['destination']}',
        //     trips.depart_point = '{$_POST['depart_point']}',
        //     clients.FIO_client = '{$_POST['FIO_client']}',
        //     tickets.passport_num = '{$_POST['passport_num']}', tickets.trip_data = '{$_POST['trip_data']}'
        // WHERE id_ticket = {$_GET['red_id']}";

    $sql_update = "UPDATE `tickets` SET `id_ticket`= '{$_POST['id_ticket']}',
    `id_trip` = '{$_POST['id_trip']}',
    `id_trip2`='{$_POST['id_trip2']}',
    `id_client`='{$_POST['id_client']}',
    `passport_num`='{$_POST['passport_num']}',
    `trip_data`= '{$_POST['trip_data']}' WHERE id_ticket = '{$_GET['red_id']}'";
        
        $result_update = mysqli_query($link,$sql_update);
    }

    if ($result_update) {
    echo '<p>Успешно!</p>';
    } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($link). '</p>';
    }
}

if (isset($_GET['red_id'])) {
// $sql_select = "SELECT id_ticket, FIO, starting_date, salary FROM tickets 
// WHERE id_ticket = {$_GET['red_id']}";

    $sql_sel = "SELECT id_ticket, trips.depart_point, trips.destination, clients.FIO_client, tickets.passport_num, tickets.trip_data 
    FROM tickets 
    INNER JOIN trips ON tickets.id_trip = trips.id_trip
    INNER JOIN clients ON tickets.id_client = clients.id_client WHERE id_ticket = '{$_GET['red_id']}'";

$result_select = mysqli_query($link, $sql_sel);
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
            margin-left: 125px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
                <tr>
                    <td>Код билета</td>
                    <td><input type="text" name="id_ticket" value="<?=
                    isset($_GET['red_id']) ? $row['id_ticket'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Пункт отправления</td>
                    <td>
                        <select name="id_trip">
                            <?php
                                $sql_select = "SELECT `id_trip`, `depart_point` FROM `trips`";
                                $result_select = mysqli_query($link, $sql_select);

                                while ($row = mysqli_fetch_array($result_select))
                                {
                                    echo "<option value ='".$row['id_trip']."'>".$row['depart_point']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Пункт прибытия</td>
                    <td>
                        <select name="id_trip2">
                            <?php
                                $sql_select = "SELECT `id_trip`, `destination` FROM `trips`";
                                $result_select = mysqli_query($link, $sql_select);

                                while ($row = mysqli_fetch_array($result_select))
                                {
                                    echo "<option value ='".$row['id_trip']."'>".$row['destination']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ФИО клиента</td>
                    <td>
                        <select name="id_client">
                            <?php
                                $sql_select = "SELECT `id_client`, `FIO_client` FROM `clients`";
                                $result_select = mysqli_query($link, $sql_select);

                                while ($row = mysqli_fetch_array($result_select))
                                {
                                    echo "<option value ='".$row['id_client']."'>".$row['FIO_client']."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Номер паспорта</td>
                    <td><input type="text" name="passport_num" value="<?=
                    isset($_GET['red_id']) ? $row['passport_num'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Дата поездки</td>
                    <td><input type="date" name="trip_data" value="<?=
                    isset($_GET['red_id']) ? $row['trip_data'] : ''; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2"><input class="save" type="submit" value="Сохранить"></td>
                </tr>
        </table>
    </form>

    <form action="index.php" method="post">
        <br>
        <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>