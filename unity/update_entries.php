<?php
	include '../connection.php';

	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		
		$sql = "SELECT number_visits FROM user WHERE user_nickname = '$username';";
		$query = mysqli_query($connection, $sql);

		$row = mysqli_fetch_row($query);
		$result = intval($row[0]) + 1;
		
		$sql = "UPDATE user SET number_visits = '$result' WHERE user_nickname = '$username';";
		$query = mysqli_query($connection, $sql);
		echo $result;

		$connection->close();
	}
?>