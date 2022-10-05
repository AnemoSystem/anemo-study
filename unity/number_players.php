<?php
    include '../connection.php';

    $which_room = $_POST['room'];

    $sql = "SELECT $which_room FROM number_players";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);

    $value = intval($result[$which_room]);

    if($_POST['type'] == '0') {
        $value++;
        $sql = "UPDATE number_players SET $which_room = '$value'";
        $query = mysqli_query($connection, $sql);

        $sql = "SELECT $which_room FROM number_players";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);     
    } else if($_POST['type'] == '1') {
        $value--;
        $sql = "UPDATE number_players SET $which_room = '$value'";
        $query = mysqli_query($connection, $sql);

        $sql = "SELECT $which_room FROM number_players";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);       
    }
    echo $result[$which_room];
    $connection->close();
?>