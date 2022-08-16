<?php
    include '../connection.php';
	$classroom_id = $_GET['id'];
	session_start();
	$_SESSION['classroom'] = $classroom_id;
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Controle de Notas</title>
    </head>
    <body>
		<a href="../index.php"><button>Voltar</button></a>
		<input type="text" style="margin-top: 20px;" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
        <form method="POST">
            <div class="list">
				<table id="list_table">		
					<?php
						$check = "";
						$check_t = "";
						$can_close = False;
						$sql = "SELECT COUNT(*) FROM grades_attendance";
						$query = mysqli_query($connection, $sql);
						$row = mysqli_fetch_row($query);
						if($row[0] != 0) {
							$sql = "SELECT grades_attendance.id, teacher.id, grades_attendance.student_id, 
							grades_attendance.grade_value, teacher.name, subject.name, student.name,
							grade.name, period.name, grades_attendance.school_month FROM grades_attendance
							INNER JOIN subject_teacher ON grades_attendance.subject_teacher_id = subject_teacher.id
							INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
							INNER JOIN subject ON subject.id = subject_teacher.subject_id
							INNER JOIN student ON student.id = grades_attendance.student_id
							INNER JOIN classroom ON student.classroom_id = classroom.id
							INNER JOIN grade ON grade.id = classroom.grade_id
							INNER JOIN period ON period.id = classroom.period_id
							WHERE student.classroom_id = '$classroom_id'
							ORDER BY student.id, grades_attendance.subject_teacher_id, 
							grades_attendance.school_month;";
							$query = mysqli_query($connection, $sql);
							while($column = mysqli_fetch_row($query)) {
								$id = $column[0];
								$teacher_id = $column[1];
								$student_id = $column[2];
								$grade_value = $column[3];
								$teacher_name = $column[4];
								$subject_name = $column[5];
								$student_name = $column[6];
								$grade_name = $column[7];
								$period_name = $column[8];
								$month = $column[9];
								if($check != strval($student_id)) {
									if($can_close) echo '</ul></td></tr>';
									$check = strval($student_id);
									echo '<tr class="tb_search">';
									echo '<td class="tb_name">'.$student_id.' - '.$student_name.'</td>';
									echo '<td>';
								}

								if($check_t != strval($teacher_id)) {
									$check_t = strval($teacher_id);
									echo '<ul><li>'.$subject_name.' - '.$teacher_name.'</li><br><ul>';
								}
								
								if($grade_value == "-1")
									echo '<li>'.$month.'º Bimestre: ainda não definido</li><br>';
								else {
									echo '<li>'.$month.'º Bimestre: '.$grade_value.'';
									echo ' <a href="edit.php?id='.$id.'">(Editar)</a></li><br>';
								}
								//echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
								//echo '<input type="button" value="Editar"></a>';
								if($month == '4') echo '<br>';
								$can_close = True;
							}
						}
						mysqli_close($connection);
					?>
				</table>
            </div>
        </form>
    </body>
</html>