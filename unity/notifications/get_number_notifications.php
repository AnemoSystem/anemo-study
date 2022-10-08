<?php
    include '../../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $from_id = $_POST['from_id'];

        $from_id = intval($from_id);

        if($from_id != 0) {
            $sql = "SELECT COUNT(*) FROM notifications 
            INNER JOIN user ON user.id = notifications.to_user
            WHERE user.user_nickname = '$username' AND
            notifications.id < '$from_id'";
        } else {
            $sql = "SELECT COUNT(*) FROM notifications 
            INNER JOIN user ON user.id = notifications.to_user
            WHERE user.user_nickname = '$username'";            
        }
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_row($query);
        
        echo $result[0];
    }
    $connection->close();
?>