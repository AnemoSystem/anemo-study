<?php
    include '../../connection.php';
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM notifications WHERE id = '$id';";
        $query = mysqli_query($connection, $sql);
    }
    $connection->close();
?>