<?php
    include '../connection.php';
	$student_id = $_GET['id'];
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Controle de Faltas e Presenças</title>
    </head>
    <body>
		<a href="../index.php"><button>Voltar</button></a>
		<input type="text" style="margin-top: 20px;" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
        <form method="POST">
            <div class="list">
				<table id="list_table">		
					<tr>
						<th>Professor</th>
						<?php
							$sql = "SELECT day FROM student_absence 
							WHERE student_id = '$student_id' ORDER BY subject_teacher_id, id;";
							$query = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_row($query)) {
								echo '<th>'.$row[0].'</th>';
							}
						?>
					</tr>
					<?php
						$teacher = "";
						$can = False;
						$sql = "SELECT student_absence.subject_teacher_id, student_absence.state, teacher.name, subject.name FROM student_absence
						INNER JOIN subject_teacher ON student_absence.subject_teacher_id = subject_teacher.id
						INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
						INNER JOIN subject ON subject.id = subject_teacher.subject_id
						WHERE student_absence.student_id = '$student_id' 
						ORDER BY student_absence.subject_teacher_id, student_absence.id;";
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_row($query)) {
							if($teacher != $row[2]) {
								if($can) echo '</tr>';
								echo '<tr class="tb_search">';
								echo '<td class="tb_name">'.$row[2].' - '.$row[3].'</td>';
								$teacher = $row[2];
							}
							if($row[1] == "P")
								echo '<td>Presente</td>';
							else
								echo '<td>Ausente</td>';
							$can = True;
						}
					?>
				</table>
            </div>
        </form>
    </body>
</html>