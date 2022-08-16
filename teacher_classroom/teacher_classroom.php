<?php
    include '../connection.php';

    if(isset($_POST['submit'])) {
		$subject_teacher = $_POST['subject_teacher'];
		$classroom = $_POST['classroom'];
        $sql = "INSERT INTO teacher_classroom (subject_teacher_id, classroom_id) 
		VALUES ($subject_teacher, $classroom)";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM teacher_classroom WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Cadastrar Professores nas Salas</title>
    </head>
    <body>
		<a href="../index.php"><button>Voltar</button></a>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="subject_teacher">Professor:</label>
				<select name="subject_teacher" id="subject_teacher">
					<?php
						$sql = "SELECT subject_teacher.id, subject.name, teacher.name 
						FROM subject_teacher
						INNER JOIN subject ON subject.id = subject_teacher.subject_id
						INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id;";
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_row($query)) {
							$id = $row[0];
							$subject = $row[1];
							$teacher = $row[2];
							echo '<option value="'.$id.'">'.$subject.' - '.$teacher.'</option>';
						}
					?>
				</select><br>
				<label for="classroom">Sala: </label>
				<select name="classroom" id="classroom">
					<?php
						$sql = "SELECT classroom.id, grade.name, period.name from classroom
						INNER JOIN period ON period.id = classroom.period_id
						INNER JOIN grade ON grade.id = classroom.grade_id;";
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_row($query)) {
							$id = $row[0];
							$grade = $row[1];
							$period = $row[2];
							echo '<option value="'.$id.'">'.$grade.' - '.$period.'</option>';
						}
					?>
				</select><br>				
                <input type="submit" name="submit" value="Enviar"><br>
				<input type="text" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
            </div>
            <div class="list">
                <table id="list_table">
					<tr>
						<th>Professor</th>
						<th>Situação</th>
					</tr>
					<?php
						$check = "";
						$can_close = False;
						$sql = "SELECT COUNT(*) FROM teacher_classroom";
						$query = mysqli_query($connection, $sql);
						$row = mysqli_fetch_row($query);
						if($row[0] != 0) {
							$sql = "SELECT subject.name, teacher.name, grade.name, period.name, teacher.id,
							teacher_classroom.id FROM teacher_classroom
							INNER JOIN subject_teacher ON subject_teacher.id = teacher_classroom.subject_teacher_id
							INNER JOIN classroom ON classroom.id = teacher_classroom.classroom_id
							INNER JOIN subject ON subject_teacher.subject_id = subject.id
							INNER JOIN teacher ON subject_teacher.teacher_id = teacher.id
							INNER JOIN grade ON grade.id = classroom.grade_id
							INNER JOIN period ON period.id = classroom.period_id
							ORDER BY teacher_classroom.subject_teacher_id;";
							$query = mysqli_query($connection, $sql);
							while($column = mysqli_fetch_row($query)) {
								$subject = $column[0];
								$teacher = $column[1];
								$grade = $column[2];
								$period = $column[3];
								$id = $column[5];

								if($check != strval($column[4])) {
									if($can_close) echo '</ul></td></tr>';
									$check = $column[4];
									echo '<tr class="tb_search">';
									echo '<td class="tb_name">'.$teacher.'</td>';
									echo '<td><b>'.$subject.'<b>';
								}
								echo '<ul><li>'.$grade.' - '.$period;
								echo '<button name="delete" value="'.$id.'">Deletar</button></li>';
								$can_close = True;
							}
						}
						else {
							echo '<tr><td colspan="2">Não existem professores vinculados ainda!</td></tr>';
						}
						mysqli_close($connection);
					?>
                </table>
            </div>
        </form>
    </body>
</html>