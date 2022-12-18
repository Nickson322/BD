<?php
    include 'connect.php';

    if(isset($_POST['FIO_client']) && isset($_POST['passport_num']) && isset($_POST['trip_data'])){
        $FIO_client = $_POST['FIO_client'];
        $passport_num = $_POST['passport_num'];
        $trip_data = $_POST['trip_data'];

        $sql_add = "INSERT INTO tickets(FIO_client, passport_num, trip_data) 
            VALUES ('$FIO_client', '$passport_num', '$birth_date')";

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ticket_buy/style.css">
    <title>Покупка билета</title>
</head>
<body>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form method="post">
                    <div class="row">
                        <div class="col-50">

                            <h3>Покупка билета</h3>

                            <label for="fname"> ФИО клиента</label>
                            <input type="text" id="fname" name="FIO_client">

                            <label for="email"> Пункт прибытия</label>
                            <input type="text" id="email" name="destination">

                            <label for="adr"> Номер паспорта</label>
                            <input type="text" id="adr" name="passport_num">

                            <label for="adr"> Дата поездки</label>
                            <select name="trip_data">
                                <?php
                                    $sql_select = "SELECT id_trip, trip_data FROM trips";
                                    $result_select = mysqli_query($link, $sql_select);

                                    while ($row = mysqli_fetch_array($result_select))
                                    {
                                        echo "<option value = ' ".$row['id_trip']."'>".$row['trip_data']."</option>";
                                    }
                                ?>
                            </select>

                            <label for="adr"  style="margin-top: 10px;"> Цена билета</label>
                            <input type="text" id="adr" name="cost">
                        </div>
                    </div>
                    
                    <input type="submit" value="Купить" class="btn">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>