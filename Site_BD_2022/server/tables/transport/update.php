<?php
include 'connect.php';
//Если переменная id_transport передана
if (isset($_POST['id_transport'])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id'])) {
        $sql_update = "UPDATE transport 
        INNER JOIN drivers 
        ON transport.id_driver = drivers.id_driver
        SET 
        id_transport = '{$_POST['id_transport']}', drivers.FIO = '{$_POST['FIO']}', transport_name = '{$_POST['transport_name']}',
        seats_num = '{$_POST['seats_num']}', has_conditioner = '{$_POST['has_conditioner']}',
        max_passengers = '{$_POST['max_passengers']}'
        WHERE 
        id_transport = {$_GET['red_id']}";
        $result_update = mysqli_query($link,$sql_update);
    }

    if ($result_update) {
    echo '<p>Успешно!</p>';
    } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($link). '</p>';
    }
}

if (isset($_GET['red_id'])) {
$sql_select = "SELECT id_transport, drivers.FIO, transport_name, seats_num, has_conditioner, max_passengers FROM transport, drivers
WHERE id_transport = {$_GET['red_id']}";

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
            margin-left: 178px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
                <tr>
                    <td>Код транспорта</td>
                    <td><input type="text" name="id_transport" value="<?=
                    isset($_GET['red_id']) ? $row['id_transport'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>ФИО водителя</td>
                    <td><input type="text" name="FIO" value="<?=
                    isset($_GET['red_id']) ? $row['FIO'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Название транспорта</td>
                    <td><input type="text" name="transport_name" value="<?=
                    isset($_GET['red_id']) ? $row['transport_name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Количество сидений</td>
                    <td><input type="text" name="seats_num" value="<?=
                    isset($_GET['red_id']) ? $row['seats_num'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Имеет ли кондиционер</td>
                    <td><input type="text" name="has_conditioner" value="<?=
                    isset($_GET['red_id']) ? $row['has_conditioner'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Максимальное число пассажиров</td>
                    <td><input type="text" name="max_passengers" value="<?=
                    isset($_GET['red_id']) ? $row['max_passengers'] : ''; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2"><input class = "save" type="submit" value="Сохранить"></td>
                </tr>
        </table>
    </form>

    <form action="index.php" method="post">
        <br>
        <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>