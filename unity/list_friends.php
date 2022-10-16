<?php
    include '../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $order = $_POST['order'];

        $sql_user = "SELECT id FROM user WHERE user_nickname = '$username';";
        $query_user = mysqli_query($connection, $sql_user);
        $id_user = mysqli_fetch_row($query_user);

        if($order == '1') {
            $sql = "SELECT user.id, user.user_nickname, user.is_logged FROM user
            INNER JOIN friends ON user.id = friends.user_1
            WHERE friends.user_2 = '$id_user[0]'
            ORDER BY user.id;";
            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_row($query))
                echo $result[0]."=".$result[1]."=".$result[2]."*";
        } else {
            $sql = "SELECT user.id, user.user_nickname, user.is_logged FROM user
            INNER JOIN friends ON user.id = friends.user_2
            WHERE friends.user_1 = '$id_user[0]'
            ORDER BY user.id;";
            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_row($query))
                echo $result[0]."=".$result[1]."=".$result[2]."*";
        }
    }
    $connection->close();
?>