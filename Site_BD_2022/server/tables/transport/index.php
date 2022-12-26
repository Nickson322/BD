<?php

include 'connect.php';

if (isset($_GET['del_id'])){
    $sql_delete = "DELETE FROM transport WHERE id_transport = {$_GET['del_id']}";

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
    $res = mysqli_query($link, "SELECT COUNT(*) FROM transport");
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
    <title> Таблица "Транспорт" </title>
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

    <h2> Таблица "Транспорт" </h2>
    <table>
        <tr>
            <td> Код транспорта </td>
            <td> ФИО водителя </td>
            <td> Название транспорта </td>
            <td> Количество сидений </td>
            <td> Имеет ли кондиционер</td>
            <td> Макс. число пассажиров </td>
        </tr>

    <?php
        // Запрос и вывод записей
        $result = mysqli_query($link, "SELECT * FROM transport
        INNER JOIN drivers ON transport.id_driver = drivers.id_driver $sorting_sql LIMIT $art, $kol");

        while ($row_transport = mysqli_fetch_array($result)) {
            echo '<tr>' .
            "<td> {$row_transport['id_transport']} </td>" .
            "<td> {$row_transport['FIO']}</td>".
            "<td> {$row_transport['transport_name']}</td>".
            "<td> {$row_transport['seats_num']}</td>".
            "<td> {$row_transport['has_conditioner']}</td>".
            "<td> {$row_transport['max_passengers']}</td>".
            "<td> <a href='?del_id={$row_transport['id_transport']}'>Удалить</a></td>" .
            "<td><a href='update.php?red_id={$row_transport['id_transport']}'>Изменить</a></td>" .
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


<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

