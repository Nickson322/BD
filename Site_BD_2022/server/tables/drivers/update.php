<?php
include 'connect.php';
//Если переменная id_driver передана
if (isset($_POST['id_driver'])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id'])) {

        $sql_update = "UPDATE drivers SET id_driver =
        '{$_POST['id_driver']}', FIO = '{$_POST['FIO']}', starting_date = '{$_POST['starting_date']}',
        salary = '{$_POST['salary']}' WHERE id_driver =
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
$sql_select = "SELECT id_driver, FIO, starting_date, salary FROM drivers 
WHERE id_driver = {$_GET['red_id']}";

$result_select = mysqli_query($link, $sql_select);
$row = mysqli_fetch_array($result_select);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Редактирование </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
            margin-left: 140px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
                <tr>
                    <td>Код водителя</td>
                    <td><input type="text" name="id_driver" value="<?=
                    isset($_GET['red_id']) ? $row['id_driver'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>ФИО водителя</td>
                    <td><input type="text" name="FIO" value="<?=
                    isset($_GET['red_id']) ? $row['FIO'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Дата выхода на работу</td>
                    <td><input type="text" name="starting_date" value="<?=
                    isset($_GET['red_id']) ? $row['starting_date'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Зарплата</td>
                    <td><input type="text" name="salary" value="<?=
                    isset($_GET['red_id']) ? $row['salary'] : ''; ?>"></td>
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