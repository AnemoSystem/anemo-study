<?php
    include '../connection.php';
    
    $user_1 = $_POST['user_1'];
    $user_2 = $_POST['user_2'];

    $sql = "SELECT id FROM friends 
    WHERE user_1 = '$user_1' AND user_2 = '$user_2'";
    $query = mysqli_query($connection, $sql);

    if(mysqli_num_rows($query) > 0)
        echo "exists";
    else {
        $sql = "SELECT id FROM friends 
        WHERE user_2 = '$user_1' AND user_1 = '$user_2'";
        $query = mysqli_query($connection, $sql);
        if(mysqli_num_rows($query) > 0)
            echo "exists";
        else
            echo "no exists";            
    }
    $connection->close();
?>