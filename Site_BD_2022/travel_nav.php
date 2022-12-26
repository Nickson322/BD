<?php

    include 'connect.php';

    // Пагинация
    // Определение текущей страницы
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else $page = 1;
    $kol = 3; //количество записей для вывода
    $art = ($page * $kol) - $kol;
    // Определяем все количество записей в таблице
    $res = mysqli_query($link, "SELECT COUNT(DISTINCT depart_point, destination) FROM trips");
    $row = mysqli_fetch_row($res);
    $total = $row[0]; // всего записей
    // Количество страниц для пагинации
    $str_pag = ceil($total / $kol);
    // формируем пагинацию
    echo "<br>";
?>

<!DOCTYPE html>
<html>
<head>
    <title> Направления поездок</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body{
            background: url("/css/authorization/img/bg.png");
            background-size: cover;
        }
        h2{
            margin-left: 20px;
        }

        table{
            font-family: sans-serif;
            border-collapse: separate;
            border-spacing: 5px;
            background: #8fb9d3;
            /* border: 16px solid #87CEFA; */
            border: 2px solid black;
            padding: 10px;
            /* #ece9e0; */
            border-radius: 20px;
            margin-left: 20px;
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
        .strr{
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h2> Направления поездок </h2>
    <table>
        <tr>
            <td> Пункт прибытия </td>
            <td> Пункт отбытия</td>
        </tr>

        <?php
            // Запрос и вывод записей
            $result = mysqli_query($link, "SELECT DISTINCT depart_point, destination 
            FROM trips LIMIT $art, $kol");
            
            while ($row_trips = mysqli_fetch_array($result)) {
                echo '<tr>' .
                "<td> {$row_trips['destination']}</td>".
                "<td> {$row_trips['depart_point']}</td>".
                '</tr>';
            }
        ?>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php 
            for ($i = 1; $i <= $str_pag; $i++){
                echo "<li class='page-item strr'><a class='page-link' href=index.php?page=".$i."> $i </a></li>";
            }
            ?>
        </ul>
    </nav>



</body>
</html>