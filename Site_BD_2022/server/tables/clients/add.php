<?php
    include 'connect.php';

    if(isset($_POST['FIO_client'])){
        $FIO_client = $_POST['FIO_client'];
        $passport_num = $_POST['passport_num'];
        $birth_date = $_POST['birth_date'];

        if(!empty($FIO_client) && !empty($passport_num) && !empty($birth_date)){
            $sql_add = "INSERT INTO clients(FIO_client, passport_num, birth_date) 
            VALUES ('$FIO_client', '$passport_num', '$birth_date')";
        }

        $result = mysqli_query($link, $sql_add);

        if($result) {
            echo "Добавлене прошло успешно";
        }
        else {
            echo "Произошла ошибка: " . mysqli_error($link);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление клиента</title>
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
                <td>ФИО клиента</td>
                <td><input type="text" name="FIO_client"></td>
            </tr>
            <tr>
                <td>Номер паспорта</td>
                <td><input type="text" name="passport_num"></td>
            </tr>
            <tr>
                <td>Дата рождения</td>
                <td><input type="date" name="birth_date"></td>
            </tr>
            
            <tr>
                <td colspan="2"><input class = "save" type="submit" value="Добавить"></td>
            </tr>
        </table>
    </form>

    
</body>
</html>