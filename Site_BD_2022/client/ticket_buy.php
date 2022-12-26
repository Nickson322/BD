<?php
    include 'connect.php';
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

    // // Запрос и вывод записей
    // $result = mysqli_query($link, "SELECT * FROM trips LIMIT $art, $kol");


    $depart = $_POST['depart'];
    $dest = $_POST['dest'];
    $dat = $_POST['dat'];
    $reset = $_POST['reset'];

        $sqllike = "SELECT FIO, depart_point, destination, trip_data, duration, cost FROM trips 
        INNER JOIN transport ON trips.id_transport = transport.id_transport
        INNER JOIN drivers ON trips.id_driver = drivers.id_driver
        WHERE depart_point LIKE '%$depart%' AND destination LIKE '%$dest%' AND trip_data LIKE '%$dat%' LIMIT $art, $kol";

        $res = mysqli_query($link, $sqllike);

        echo '<table class="tripss">'.
        '<tr>'.
        '<td>ФИО водителя</td>'.    
        '<td>Пункт прибытия</td>'.
        '<td>Пункт отправления</td>'.
        '<td>Дата поездки</td>'.
        '<td>Длительность поездки</td>'.
        '<td>Цена</td>'.
        '</tr>';

        while ($row1 = mysqli_fetch_array($res)) {
            echo
                '<tr>' .
                "<td> {$row1['FIO']}</td>".
                "<td> {$row1['destination']}</td>".
                "<td> {$row1['depart_point']}</td>".
                "<td> {$row1['trip_data']}</td>".
                "<td> {$row1['duration']}</td>".
                "<td> {$row1['cost']}</td>".
                '</tr>';
        }

        echo '</table>';

?>


<?php
    include 'connect.php';

    if(isset($_POST['FIO_client'])
    && isset($_POST['passport_num'])
    && isset($_POST['trip_data'])
    && isset($_POST['id_trip']) 
    && isset($_POST['id_trip2'])  
    ){

        // $id_trip = htmlentities(trim($_POST['id_trip']));
        // $id_trip2 = htmlentities(trim($_POST['id_trip2']));
        // $id_client = htmlentities(trim($_POST['id_client']));
        // $passport_num = $_POST['passport_num'];
        // $trip_data = $_POST['trip_data']; 

        // $trip = "SELECT `id_trip` FROM `trips` WHERE `depart_point` = `$depart_point` AND `destination` = `$destination`";
        // // $dest_id = "SELECT id_trip FROM trips WHERE depart_point = '$depart_point' AND destination = '$destination'";
        // $cl_id = "SELECT `id_client` FROM `clients` WHERE `FIO_client` = `$FIO_client`";

        $FIO_client = $_POST['FIO_client'];

        $sql_selec = "SELECT id_client, FIO_client FROM clients WHERE FIO_client = '$FIO_client'";
        $result_select = mysqli_query($link, $sql_selec);
        $roww = mysqli_fetch_array($result_select);

        $id_client = $roww['id_client'];
        $passport_num = $_POST['passport_num'];
        $birth_date = $_POST['birth_date'];
        $id_trip = htmlentities(trim($_POST['id_trip']));
        $id_trip2 = htmlentities(trim($_POST['id_trip2']));
        $trip_data = $_POST['trip_data'];
        // $sql_sel1 = "SELECT id_client, FIO_client FROM clients WHERE FIO_client = `$FIO_client`";

        // $sql_add = "INSERT INTO `tickets` (`id_trip`, `id_trip2`, `id_client`, `passport_num`, `trip_data`)
        //             VALUES ('$id_trip', '$id_trip2', '$id_client', '$passport_num', '$trip_data')";



        $sql_add = "INSERT INTO `tickets` (`id_trip`, `id_trip2`, `id_client`, `passport_num`, `trip_data`)
                    VALUES ('$id_trip', '$id_trip2', '$id_client', '$passport_num', '$trip_data')";
        // $sql_add = "INSERT INTO `clients` (`FIO_client`, `passport_num`, `birth_date`) VALUES ('$FIO_client','$passport_num','$birth_date')";
        $result1 = mysqli_query($link, $sql_add);

        if($result1) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ticket_buy/style.css">
    <style>
        li{
            list-style-type: none;
            display: inline;
            margin-left: 5px;
        }

        a{
            text-decoration: none;
        }
        a:hover{
            color: orange;
        }
        nav{
            
            margin-left: 450px;
        }
        form{
            background-color: white;
            margin: 0 600px;
            margin-bottom: 100px;
            padding: 5px 60px;
        }
        .form-control{
            width: 100%;
            padding: 0 0;
        }
        input[type=text]{
            padding: 0 0;
        }
        
    </style>
    <title>Покупка билета</title>
</head>
<body>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php 
            for ($i = 1; $i <= $str_pag; $i++){
                echo "<li class='page-item'><a class='page-link' href=index.php?page=".$i.">" .$i."</a></li>";
            }
            ?>
        </ul>
    </nav>

    <!-- Форма -->
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">ФИО клиента</label>
            <?php
                $sql_select = "SELECT id_client, FIO_client FROM clients WHERE FIO_client = '$FIO_client'";
                $result_select = mysqli_query($link, $sql_select);
                $row = mysqli_fetch_array($result_select);
            ?>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="FIO_client">
        </div>

        <div class="mb-3">
            <label class="form-label">Номер паспорта</label>
            <input type="text" class="form-control" name="passport_num">
        </div>

        <!-- <div class="mb-3">
            <label class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="birth_date">
        </div> -->

        <div class="mb-3">
            <label class="form-label">Пункт отправления</label>
            <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
            <select name="id_trip">
                <?php
                    $sql_select = "SELECT id_trip, depart_point FROM trips";
                    $result_select = mysqli_query($link, $sql_select);

                    while ($row = mysqli_fetch_array($result_select))
                    {
                        echo "<option value ='".$row['id_trip']."'>".$row['depart_point']."</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Пункт прибытия</label>
            <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
            <select name="id_trip2">
                <?php
                    $sql_select = "SELECT id_trip, destination FROM trips";
                    $result_select = mysqli_query($link, $sql_select);

                    while ($row = mysqli_fetch_array($result_select))
                    {
                        echo "<option value ='".$row['id_trip']."'>".$row['destination']."</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Дата поездки</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="trip_data">
        </div>

        <button type="submit" class="btn btn-primary">Купить</button>
    </form>

    
    
</body>
</html>

