<?php
    include '../connection.php';
    $user_1 = $_POST['user_1'];
    $user_2 = $_POST['user_2'];
    /*
    $msg_id = $_POST['msg_id'];

    $sql = "DELETE FROM notifications WHERE id = '$msg_id';";
    $query = mysqli_query($connection, $sql);
    */
    $sql_1 = "SELECT id FROM user WHERE user_nickname = '$user_1';";
    $query_1 = mysqli_query($connection, $sql_1);
    $result_1 = mysqli_fetch_row($query_1);

    $sql_2 = "SELECT id FROM user WHERE user_nickname = '$user_2';";
    $query_2 = mysqli_query($connection, $sql_2);
    $result_2 = mysqli_fetch_row($query_2);

    $sql = "INSERT INTO friends (user_1, user_2) VALUES ('$result_1[0]', '$result_2[0]');";
    $query = mysqli_query($connection, $sql);

    $connection->close();
?>