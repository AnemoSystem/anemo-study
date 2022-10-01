<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$password = $_POST['password'];
		$student = $_POST['student'];

		// Generate Vkey
		$vkey = md5(time().$name);

        $sql = "INSERT INTO user 
		(user_nickname, user_password, student_id, is_logged, id_skin, id_torso, id_legs,
		id_hair, coins, points, vkey) 
		VALUES ('$name', '$password', '$student', '0', '0', '0', '0', '0', '0', '0', '$vkey')";
        $query = mysqli_query($connection, $sql);

		// Send Email
		/*
		$sql = "SELECT student.email FROM student
		INNER JOIN user ON user.student_id = student.id
		WHERE user.user_nickname = '$name';";
        $query = mysqli_query($connection, $sql);

		$row = mysqli_fetch_row($query);
		if($row != NULL) {
			$subject = "Verificação de Email";
		}
		*/
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM user WHERE id = $id_selected";
        mysqli_query($connection, $sql);	
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Cadastrar Usuário do Jogo</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
		<a href="../index.php"><button>Voltar</button></a>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="name">Nome de Usuário:</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome"><br>
				<label for="password">Senha:</label>
                <input type="password" name="password" id="password" placeholder="Digite a senha"><br>
				<label for="student">Estudante:</label>
				<select name="student" id="student">
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
							echo '<option value="'.$id.'">'.$id.' - '.$student_name.' ('.$grade_name.' - '.$period_name.')</option>';
						}
					?>
				</select><br>
				<input type="submit" name="submit" value="Enviar"><br>
				<input type="text" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
            </div>
            <div class="list">
                <table id="list_table">
                    <tr>
                        <th>Nome de usuário</th>
                        <th>Estudante</th>
						<th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM student";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT user.user_nickname, student.id, 
								student.name, grade.name, period.name, user.id FROM user
								INNER JOIN student ON student.id = user.student_id
								INNER JOIN classroom ON classroom.id = student.classroom_id
								INNER JOIN grade ON grade.id = classroom.grade_id
								INNER JOIN period ON period.id = classroom.period_id
								ORDER BY user.id";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_row($query)) {
									$username = $row[0];
									$id_student = $row[1];
									$student_name = $row[2];
									$grade = $row[3];
									$period = $row[4];
									$id = $row[5];
									echo '<tr class="tb_search">';
									echo '<td class="tb_name">'.$username.'</td>';
									echo '<td>'.$id_student.' - '.$student_name.' ('.$grade.' - '.$period.')</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="3">Não existem usuários de jogo cadastrados ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>