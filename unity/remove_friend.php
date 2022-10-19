<?php
    include '../connection.php';
    $id = $_POST['id'];

    $sql = "DELETE FROM friends WHERE id = '$id';";
    $query = mysqli_query($connection, $sql);

    $connection->close();
?>