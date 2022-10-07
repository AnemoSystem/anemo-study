<?php
    include '../../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        
        $sql = "SELECT id FROM user WHERE user_nickname = '$username';";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($query);
        $id = $row[0];

        $sql = "SELECT notifications.id,
        notifications.title, notifications.type, 
        notifications.send_date, user.user_nickname
        FROM notifications
        INNER JOIN user ON user.id = notifications.from_user
        WHERE notifications.to_user = '$id';";
        $query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_assoc($query)) {
            echo $row['id']."@".$row['title']."@".$row['type']."@".$row['user_nickname']."@".$row['send_date'];
            echo "%";
        }
    }
    $connection->close();
?>