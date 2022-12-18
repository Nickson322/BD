<?php

include 'connect.php';

if (isset($_GET['del_id'])){
    $sql_delete = "DELETE FROM trips WHERE id_trip = {$_GET['del_id']}";

    $result_delete = mysqli_query ($link,$sql_delete);

    if ($result_delete) {
    header('Location: index.php');
    } else {
    echo '<p> Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
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
    $res = mysqli_query($link, "SELECT COUNT(*) FROM trips");
    $row = mysqli_fetch_row($res);
    $total = $row[0]; // всего записей
    // Количество страниц для пагинации
    $str_pag = ceil($total / $kol);
    // формируем пагинацию
    echo "<br>";
?>

<?php
    //Сортировки
    $sorting = $_GET['sort'];

    switch ($sorting) {
        case "fio-asc":
        $sorting_sql = 'ORDER BY FIO ASC';
        break;
        case "fio-desc":
        $sorting_sql = 'ORDER BY FIO DESC';
        break;
        case "default":
        $sorting_sql = '';
        break;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Таблица "Поездки" </title>
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
            /* border: 16px solid #87CEFA; */
            border: 2px solid black;
            padding: 10px;
            /* #ece9e0; */
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
    <ul>
        <li> <a href="index.php?sort=fio-asc"> ФИО от А до Я</a> </li>
        <li> <a href="index.php?sort=fio-desc"> ФИО от Я до А</a> </li>
        <li> <a href="index.php?sort=default"> ФИО по умолчанию</a> </li>
    </ul>

    <h2> Таблица "Поездки" </h2>
    <table>
    <tr>
        <td> Код поездки </td>
        <td> Имя транспорта </td>
        <td> ФИО водителя </td>
        <td> Пункт прибытия </td>
        <td> Пункт отбытия</td>
        <td> Дата поездки</td>
        <td> Длительность поездки </td>
    </tr>

    <?php
        // Запрос и вывод записей
        $result = mysqli_query($link, "SELECT * FROM trips 
        INNER JOIN transport ON trips.id_transport = transport.id_transport
        INNER JOIN drivers ON trips.id_driver = drivers.id_driver $sorting_sql LIMIT $art, $kol");
        
        while ($row_trips = mysqli_fetch_array($result)) {
            echo '<tr>' .
            "<td> {$row_trips['id_trip']} </td>" .
            "<td> {$row_trips['transport_name']}</td>".
            "<td> {$row_trips['FIO']}</td>".
            "<td> {$row_trips['destination']}</td>".
            "<td> {$row_trips['depart_point']}</td>".
            "<td> {$row_trips['trip_data']}</td>".
            "<td> {$row_trips['duration']}</td>".
            "<td><a href='?del_id={$row_trips['id_trip']}'>Удалить</a></td>" .
            "<td><a href='update.php?red_id={$row_trips['id_trip']}'>Изменить</a></td>" .
            '</tr>';
        }
    ?>
    </table>

    <?php 
    for ($i = 1; $i <= $str_pag; $i++){
        echo "<a href=index.php?page=".$i."> Страница " .$i."</a>";
    }
    ?>



</body>
</html>

