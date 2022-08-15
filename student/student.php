<?php
    include '../connection.php';
	$classroom_id = $_GET['id'];

    if(isset($_POST['submit'])) {
		$t = 0;
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$phone = $_POST['phone'];
		$password = strval(rand(1000, 9999));
        $sql = "INSERT INTO student (email, password, name, cpf, rg, phone, classroom_id) 
		VALUES ('$email', '$password', '$name', '$cpf', '$rg', '$phone', '$classroom_id')";
        $query = mysqli_query($connection, $sql);

		$sql = "SELECT id FROM student WHERE cpf = '$cpf';";
		$query = mysqli_query($connection, $sql);
		$id = mysqli_fetch_row($query);

        $sql = "SELECT subject_teacher_id FROM teacher_classroom WHERE classroom_id = '$classroom_id';";
		$query = mysqli_query($connection, $sql);
		while($column = mysqli_fetch_row($query)) {
			if($t != $column[0]) {
				for($i = 1; $i <= 4; $i++) {
					$sql = "INSERT INTO grades_attendance (subject_teacher_id, student_id, grade_value, school_month)
					VALUES ('".$column[0]."', '".$id[0]."', '-1', '".$i."');";
					mysqli_query($connection, $sql);
				}
				$t = $column[0];
			}
		}
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM student WHERE id = $id_selected";
        mysqli_query($connection, $sql);

		$sql = "DELETE FROM grades_attendance WHERE student_id = $id_selected";
		mysqli_query($connection, $sql);
		
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Cadastrar Aluno</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
		<a href="../index.php"><button>Voltar</button></a>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome">
				<label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="Digite o e-mail"><br>
				<label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF">
				<label for="rg">RG:</label>
                <input type="text" name="rg" id="rg" placeholder="Digite o RG"><br>
				<label for="phone">Telefone:</label>
                <input type="text" name="phone" id="phone" placeholder="Digite o telefone"><br>
				<input type="submit" name="submit" value="Enviar"><br>
				<input type="text" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
			</div>
            <div class="list">
                <table id="list_table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Telefone</th>
						<th>Sala</th>
						<th>Ações</th>
                    </tr>
					<?php
						$sql = "SELECT COUNT(*) FROM student";
						$query = mysqli_query($connection, $sql);
						$row = mysqli_fetch_row($query);
						if($row[0] != 0) {
							$sql = "SELECT student.id, student.name, student.email, 
							student.rg, student.cpf, student.phone, 
							grade.name, period.name FROM student
							INNER JOIN classroom ON student.classroom_id = classroom.id
							INNER JOIN grade ON grade.id = classroom.grade_id
							INNER JOIN period ON period.id = classroom.period_id
							WHERE classroom.id = $classroom_id";
							$query = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_row($query)) {
								$id = $row[0];
								$name = $row[1];
								$email = $row[2];
								$rg = $row[3];
								$cpf = $row[4];
								$phone = $row[5];
								$grade = $row[6];
								$period = $row[7];
								echo '<tr class="tb_search">';
								echo '<td>'.$id.'</td>';
								echo '<td class="tb_name">'.$name.'</td>';
								echo '<td>'.$email.'</td>';
								echo '<td>'.$cpf.'</td>';
								echo '<td>'.$rg.'</td>';
								echo '<td>'.$phone.'</td>';
								echo '<td>'.$grade.' - '.$period.'</td>';
								echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
								echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
								echo '</tr>';
							}
						}
						else {
							echo '<tr><td colspan="9">Não existem funcionários cadastrados ainda!</td></tr>';
						}
						mysqli_close($connection);
                    ?>
                </table>
            </div>
        </form>
    </body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>