<?php
    include '../connection.php';
    
    $user_1 = $_POST['user_1'];
    $user_2 = $_POST['user_2'];

    $sql1 = "SELECT id FROM user WHERE user_nickname = '$user_1'";
    $query1 = mysqli_query($connection, $sql1);
    $r1 = mysqli_fetch_row($query1);

    $sql2 = "SELECT id FROM user WHERE user_nickname = '$user_2'";
    $query2 = mysqli_query($connection, $sql2);
    $r2 = mysqli_fetch_row($query2);

    $sql = "SELECT id FROM friends 
    WHERE user_1 = '$r1[0]' AND user_2 = '$r2[0]'";
    $query = mysqli_query($connection, $sql);

    if(mysqli_num_rows($query) > 0)
        echo "exists";
    else {
        $sql = "SELECT id FROM friends 
        WHERE user_2 = '$r1[0]' AND user_1 = '$r2[0]'";
        $query = mysqli_query($connection, $sql);
        if(mysqli_num_rows($query) > 0)
            echo "exists";
        else
            echo "no exists";            
    }
    $connection->close();
?>