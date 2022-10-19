<?php
    include '../../connection.php';

    $default_timezone = 'America/Sao_Paulo';

    $title = $_POST['title'];
    $message = $_POST['message'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    $from = $_POST['from'];
    $to = $_POST['to'];

    $sql_from = "SELECT id FROM user WHERE user_nickname = '$from';";
    $query_from = mysqli_query($connection, $sql_from);
    $result_from = mysqli_fetch_row($query_from);

    date_default_timezone_set($default_timezone);

    $send_date = date("Y-m-d");

    $sql = "INSERT INTO notifications (title, message, type, status, from_user, to_user, send_date)
    VALUES ('$title', '$message', '$type', '$status', 
    '$result_from[0]', '$to', '$send_date');";
    $query = mysqli_query($connection, $sql);

    $connection->close();
?>