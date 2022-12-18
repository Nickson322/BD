<?php
    include 'connect.php';

    if(isset($_POST['id_driver'])){
        $id_driver= $_POST['id_driver'];
        $transport_name = $_POST['transport_name'];
        $seats_num = $_POST['seats_num'];
        $has_conditioner = $_POST['has_conditioner'];
        $max_passengers = $_POST['max_passengers'];

        if(!empty($id_driver) && !empty($transport_name) && !empty($seats_num) && !empty($has_conditioner) && !empty($max_passengers)){
            $sql_add = "INSERT INTO transport(id_driver, transport_name, seats_num, has_conditioner, max_passengers) 
            VALUES ('$id_driver','$transport_name', '$seats_num', '$has_conditioner', '$max_passengers')";
        }

        $result = mysqli_query($link, $sql_add);

        if($result) echo "Добавление прошло успешно";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление транспорта</title>
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
                <td>ФИО водителя</td>
                <td> 
                    <select name="id_driver">
                        <?php

                        include 'connect.php';


                        $sql_select = "SELECT * FROM transport
                        INNER JOIN drivers ON transport.id_driver = drivers.id_driver";
                        $result_select = mysqli_query($link, $sql_select);

                        while ($row = mysqli_fetch_array($result_select))
                        {
                            echo "<option value = ' ".$row['id_transport']."'>".$row['FIO']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Название транспорта</td>
                <td><input type="text" name="transport_name"></td>
            </tr>
            <tr>
                <td>Количество сидений</td>
                <td><input type="text" name="seats_num"></td>
            </tr>
            <tr>
                <td>Имеет ли кондиционер</td>
                <td><input type="text" name="has_conditioner"></td>
            </tr>
            <tr>
                <td>Максимальное число пассажиров</td>
                <td><input type="text" name="max_passengers"></td>
            </tr>

            <tr>
                <td colspan="2"><input class = "save" type="submit" value="Добавить"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>