<?php
    include '../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];

        $sql_user = "SELECT id FROM user WHERE user_nickname = '$username';";
        $query_user = mysqli_query($connection, $sql_user);
        $id_user = mysqli_fetch_row($query_user);

        $sql_1 = "SELECT COUNT(*) FROM user
            WHERE friends.user_1 = '$id_user[0]';";
        $query_1 = mysqli_query($connection, $sql);
        $result_1 = mysqli_fetch_row($query);

        $sql_2 = "SELECT COUNT(*) FROM user
            WHERE friends.user_2 = '$id_user[0]';";
        $query_2 = mysqli_query($connection, $sql);
        $result_2 = mysqli_fetch_row($query);

        $sum = intval($result_1[0]) + intval($result_2[0]);

        echo $sum;
    }
    $connection->close();
?>