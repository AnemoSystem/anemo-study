<?php
	include "../connection.php";

	include '../test_session.php';
	
	$id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = $id;";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $username = $row['user_nickname'];
		$password = $row['user_password'];
		$student_id = $row['student_id'];
		$coins = $row['coins'];
	}
	
	if(isset($_POST['submit'])) {
		$username = $_POST['grade'];
		$password = $_POST['period'];
		$student = $_POST['student'];
		$coins = $_POST['coins'];
		$sql = "UPDATE user SET user_nickname = '$username', 
		user_password = '$password', student_id = '$student_id',
		coins = '$coins' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: user.php");
	}
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Editar Usuário</title>
    </head>
    <body>
		<form method="POST">
			<!--<h3>ID: <?php //echo $id; ?></h3> -->
			<label for="username">Nome de usuário:</label>
			<input type="text" name="name" id="name" value="<?php echo $username; ?>" placeholder="Digite o nome">
			<label for="password">Senha:</label>
			<input type="text" name="password" id="password" value="<?php echo $password; ?>" placeholder="Digite a senha">
			<br><label for="student">Estudante:</label>
			<select name="student" id="student" style="margin-right: 30px;">
				<?php
					$sql = "SELECT student.id, student.name, grade.name, period.name FROM student
					INNER JOIN classroom ON classroom.id = student.classroom_id
					INNER JOIN grade ON grade.id = classroom.grade_id
					INNER JOIN period ON period.id = classroom.period_id";
					$query = mysqli_query($connection, $sql);
					while($column = mysqli_fetch_row($query)) {
						$id = $column[0];
						$student_name = $column[1];
						$grade_name = $column[2];
						$period_name = $column[3];
						if($id == $student_id)
							echo '<option value="'.$id.'" selected>'.$id.' - '.$student_name.' ('.$grade_name.' - '.$period_name.')</option>';
						else
							echo '<option value="'.$id.'">'.$id.' - '.$student_name.' ('.$grade_name.' - '.$period_name.')</option>';
					}
				?>
			</select>
			<label for="coins">Moedas:</label>
			<input type="number" name="coins" id="coins" value="<?php echo $coins; ?>" placeholder="Digite a quantidade de moedas"><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<a href="user.php"><button>Voltar</button></a>
</html>