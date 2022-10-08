<?php
    include '../../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $from_id = $_POST['from_id'];

        $sql = "SELECT id FROM user WHERE user_nickname = '$username';";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($query);
        $id = $row[0];
        
        $from_id = intval($from_id);
        if($from_id == 0) {
            $sql = "SELECT notifications.id,
            notifications.title, notifications.type, 
            notifications.send_date, user.user_nickname,
            notifications.status
            FROM notifications
            INNER JOIN user ON user.id = notifications.from_user
            WHERE notifications.to_user = '$id'
            ORDER BY notifications.id DESC
            LIMIT 4;";
        } else {
            $sql = "SELECT notifications.id,
            notifications.title, notifications.type, 
            notifications.send_date, user.user_nickname,
            notifications.status
            FROM notifications
            INNER JOIN user ON user.id = notifications.from_user
            WHERE notifications.to_user = '$id' AND
            notifications.id < '$from_id'
            ORDER BY notifications.id DESC
            LIMIT 4;";            
        }
        $query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_assoc($query)) {
            echo $row['id']."@".$row['title']."@".$row['type']."@".$row['user_nickname']."@".$row['send_date']."@".$row['status'];
            echo "%";
        }
    }
    $connection->close();
?>