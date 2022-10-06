<?php
    include '../../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $sql = "SELECT notifications.id,
        notifications.title, notifications.type, 
        notifications.from_user, notifications.send_date
        FROM notifications 
        INNER JOIN user ON user.id = notifications.to_user
        WHERE user.user_nickname = '$username'";
        $query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_assoc($query)) {
            echo $row['id']."@".$row['title']."@".$row['type']."@".$row['from_user']."@".$row['send_date'];
            echo "%";
        }
    }
    $connection->close();
?>