<?php
    include '../../connection.php';
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "SELECT notifications.title, notifications.message, user.user_nickname,
        notifications.send_date, notifications.type FROM notifications
        INNER JOIN user ON user.id = notifications.from_user
        WHERE notifications.id = '$id';";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);

        echo $result['title']."=".$result['message']."=".$result['user_nickname']."=".$result['send_date']."=".$result['type'];
    
        $sql = "UPDATE notifications SET status = 'R' WHERE id = '$id';";
        $query = mysqli_query($connection, $sql);    
    }
    $connection->close();
?>