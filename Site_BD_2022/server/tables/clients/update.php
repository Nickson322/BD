<?php
include 'connect.php';
//Если переменная id_client передана
if (isset($_POST['id_client'])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id'])) {

        $sql_update = "UPDATE clients SET id_client =
        '{$_POST['id_client']}', FIO_client = '{$_POST['FIO_client']}', passport_num
        = '{$_POST['passport_num']}', birth_date = '{$_POST['birth_date']}' WHERE id_client =
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
$sql_select = "SELECT id_client, FIO_client, passport_num, birth_date FROM clients 
WHERE id_client = {$_GET['red_id']}";

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
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
                <tr>
                    <td>Код клиента</td>
                    <td><input type="text" name="id_client" value="<?=
                    isset($_GET['red_id']) ? $row['id_client'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>ФИО клиента</td>
                    <td><input type="text" name="FIO_client" value="<?=
                    isset($_GET['red_id']) ? $row['FIO_client'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Номер паспорта</td>
                    <td><input type="text" name="passport_num" value="<?=
                    isset($_GET['red_id']) ? $row['passport_num'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Дата рождения</td>
                    <td><input type="text" name="birth_date" value="<?=
                    isset($_GET['red_id']) ? $row['birth_date'] : ''; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2"><input class ="save" type="submit" value="Сохранить"></td>
                </tr>
        </table>
    </form>

    <br>
    <form action="index.php" method="post">
        <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>