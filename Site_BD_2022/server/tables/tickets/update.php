<?php
include 'connect.php';
//Если переменная id_ticket передана
if (isset($_POST['id_ticket'])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id'])) {

        $sql_update = 
        "UPDATE tickets
        INNER JOIN trips 
            ON tickets.id_trip = trips.id_trip
        INNER JOIN clients 
            ON id_ticket = clients.id_client
        SET id_ticket = '{$_POST['id_ticket']}', trips.destination = '{$_POST['destination']}',
            clients.FIO_client = '{$_POST['FIO_client']}',
            data_bought = '{$_POST['data_bought']}', cost = '{$_POST['cost']}'
        WHERE id_ticket = {$_GET['red_id']}";
        
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

    $sql_select = "SELECT id_ticket, trips.destination, clients.FIO_client, data_bought, cost FROM tickets
    INNER JOIN trips ON tickets.id_trip = trips.id_trip
    INNER JOIN clients ON id_ticket = clients.id_client WHERE id_ticket = {$_GET['red_id']}";

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
                    <td>Пункт прибытия</td>
                    <td><input type="text" name="destination" value="<?=
                    isset($_GET['red_id']) ? $row['destination'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>ФИО клиента</td>
                    <td><input type="text" name="FIO_client" value="<?=
                    isset($_GET['red_id']) ? $row['FIO_client'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Дата покупки билета</td>
                    <td><input type="text" name="data_bought" value="<?=
                    isset($_GET['red_id']) ? $row['data_bought'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Цена билета</td>
                    <td><input type="text" name="cost" value="<?=
                    isset($_GET['red_id']) ? $row['cost'] : ''; ?>"></td>
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