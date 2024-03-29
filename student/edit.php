<?php
	include "../connection.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM student";
	$query = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
		$email = $row['email'];
		$rg = $row['rg'];
		$cpf = $row['cpf'];
		$phone = $row['phone'];
		$classroom = $row['classroom_id'];
	}
	
	if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$classroom = $_POST['classroom'];
		$phone = $_POST['phone'];
		$sql = "UPDATE student SET name = '$name', email = '$email', rg = '$rg',
		cpf = '$cpf', classroom_id = '$classroom', phone = '$phone' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: student.php");
	}
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Editar Aluno</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="Digite o nome" value="<?php echo $name; ?>">
			<label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Digite o e-mail" value="<?php echo $email; ?>"><br>
			<label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF" value="<?php echo $cpf; ?>">
			<label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" placeholder="Digite o RG" value="<?php echo $rg; ?>"><br>
			<label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" placeholder="Digite o telefone" value="<?php echo $phone; ?>">
			<label for="classroom">Sala:</label>
			<select name="classroom" id="classroom">
				<?php
					$sql = "SELECT classroom.id, grade.name, period.name FROM classroom
							INNER JOIN grade ON grade.id = classroom.grade_id
							INNER JOIN period ON period.id = classroom.period_id";
					$query = mysqli_query($connection, $sql);
					while($column = mysqli_fetch_row($query)) {
						$id = $column[0];
						$grade_name = $column[1];
						$period_name = $column[2];
						if($id == $classroom)
							echo '<option value="'.$id.'" selected>'.$grade_name.' - '.$period_name.'</option>';
						else
							echo '<option value="'.$id.'">'.$grade_name.' - '.$period_name.'</option>';
					}
				?>
			</select><br>
			<input type="submit" name="submit" value="Editar">
		</form>
		<a href="student.php"><button>Voltar</button></a>
	</body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>