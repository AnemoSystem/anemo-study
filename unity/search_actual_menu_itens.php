<?php
    include '../connection.php';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];

        $sql = "SELECT id_skin, id_torso, id_legs, id_hair FROM user
        WHERE user_nickname = '$username';";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);

        echo $result['id_skin']."-".$result['id_torso']."-".$result['id_legs']."-".$result['id_hair'];
    }
    $connection->close();
?>