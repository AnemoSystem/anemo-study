<?php
    include '../../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $sql = "SELECT COUNT(*) FROM notifications 
        INNER JOIN user ON user.id = notifications.to_user
        WHERE user.user_nickname = '$username'";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_row($query);
        
        echo $result[0];
    }
    $connection->close();
?>