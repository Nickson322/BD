<?php

include 'connect.php';

if (isset($_GET['del_id'])){
    $sql_delete = "DELETE FROM tickets WHERE id_ticket = {$_GET['del_id']}";

    $result_delete = mysqli_query ($link,$sql_delete);

    if ($result_delete) {
    header('Location: index.php');
    } else {
    echo '<p> Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}
?>

<?php
    //Сортировки
    $sorting = $_GET['sort'];

    switch ($sorting) {
        case "fio-asc":
        $sorting_sql = 'ORDER BY FIO_client ASC';
        break;
        case "fio-desc":
        $sorting_sql = 'ORDER BY FIO_client DESC';
        break;
        case "default":
        $sorting_sql = '';
        break;
    }
?>

<?php
    // Пагинация
    // Определение текущей страницы
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else $page = 1;
    $kol = 2; //количество записей для вывода
    $art = ($page * $kol) - $kol;
    // Определяем все количество записей в таблице
    $res = mysqli_query($link, "SELECT COUNT(*) FROM tickets");
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
    <title> Таблица "Билеты" </title>
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
    </style>
</head>
<body>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Сортировать
        </button>
        <ul class="dropdown-menu">
            <li> <a class="dropdown-item" href="index.php?sort=fio-asc"> ФИО от А до Я</a> </li>
            <li> <a class="dropdown-item" href="index.php?sort=fio-desc"> ФИО от Я до А</a> </li>
            <li> <a class="dropdown-item" href="index.php?sort=default"> ФИО по умолчанию</a> </li>
        </ul>
    </div>  

    <h2> Таблица "Билеты" </h2>
    <table >
        <tr>
            <td> Код билета </td>
            <td> Пункт отправления </td>
            <td> Пункт прибытия </td>
            <td> ФИО клиента </td>
            <td> Номер паспорта</td>
            <td> Дата поездки</td>
        </tr>

    <?php
        // Запрос и вывод записей
        $result = mysqli_query($link, "SELECT id_ticket, trips.depart_point, trips.destination, clients.FIO_client, tickets.passport_num, tickets.trip_data 
        FROM tickets 
        INNER JOIN trips ON tickets.id_trip = trips.id_trip
        INNER JOIN clients ON tickets.id_client = clients.id_client $sorting_sql LIMIT $art, $kol");
        
        while ($row_tickets = mysqli_fetch_array($result)) {
            echo '<tr>' .
            "<td> {$row_tickets['id_ticket']} </td>" .
            "<td> {$row_tickets['depart_point']} </td>" .
            "<td> {$row_tickets['destination']}</td>".
            "<td> {$row_tickets['FIO_client']}</td>".
            "<td> {$row_tickets['passport_num']}</td>".
            "<td> {$row_tickets['trip_data']}</td>".
            "<td> <a href='?del_id={$row_tickets['id_ticket']}'>Удалить</a></td>" .
            "<td><a href='update.php?red_id={$row_tickets['id_ticket']}'>Изменить</a></td>" .
            '</tr>';
        }
    ?>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php 
            for ($i = 1; $i <= $str_pag; $i++){
                echo "<li class='page-item'><a class='page-link' href=index.php?page=".$i.">" .$i."</a></li>";
            }
            ?>
      </ul>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

