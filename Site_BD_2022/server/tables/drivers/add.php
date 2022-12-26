<?php
    include 'connect.php';
    
    if(isset($_POST['FIO'])){
        $FIO = $_POST['FIO'];
        $starting_date = $_POST['starting_date'];
        $salary = $_POST['salary'];

        if(!empty($FIO) && !empty($starting_date) && !empty($salary)){
            $sql_add = "INSERT INTO drivers(FIO, starting_date, salary) 
            VALUES ('$FIO', '$starting_date', '$salary')";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Добавление водителя</title>
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
                <td><input type="text" name="FIO"></td>
            </tr>
            <tr>
                <td>Дата выхода на работу</td>
                <td><input type="date" name="starting_date"></td>
            </tr>
            <tr>
                <td>Зарплата</td>
                <td><input type="text" name="salary"></td>
            </tr>
            
            <tr>
                <td colspan="2"><input class = "save" type="submit" value="Добавить"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>