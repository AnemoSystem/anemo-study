<?php
	session_start();
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM grades_attendance WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
		$grade_value = $row['grade_value'];
	}
	
	if(isset($_POST['submit'])) {
		$grade_value = $_POST['grade-value'];
		$sql = "UPDATE grades_attendance SET grade_value = '$grade_value' 
		WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: grades_attendance.php?id=".$_SESSION['classroom']);	
	}
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Editar Nota</title>
    </head>
    <body>
		<form method="POST">
			<label for="grade-value">Nota:</label>
			<input type="number" value="<?php echo $grade_value ?>" name="grade-value" id="grade-value" min="0" max="10"><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<button onclick="history.back();">Voltar</button>
</html>