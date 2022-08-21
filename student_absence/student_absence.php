<?php
    include '../connection.php';
	$student_id = $_GET['id'];
	session_start();
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Controle de Faltas e Presenças</title>
    </head>
    <body>
		<button onclick="history.go(-1);">Voltar</button>
        <form method="POST">
            <div class="list">
				<table>		
					<tr>
						<th>Professor</th>
						<?php
							$lines = array();
							$sql = "SELECT day FROM student_absence
							WHERE student_id = '$student_id' ORDER BY subject_teacher_id, id;";
							$query = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_row($query)) {
								$d = '<th>'.$row[0].'</th>';
								array_push($lines, $d);
								echo $d;
							}
						?>
					</tr>
					<?php
						$not_found = "Sem aula";
						$teacher = "";
						$can = False;
						$i = 0;
						if($_SESSION['type'] == "admin") {
							$sql = "SELECT student_absence.subject_teacher_id, student_absence.state, 
							teacher.name, subject.name, student_absence.day FROM student_absence
							INNER JOIN subject_teacher ON student_absence.subject_teacher_id = subject_teacher.id
							INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
							INNER JOIN subject ON subject.id = subject_teacher.subject_id
							WHERE student_absence.student_id = '$student_id' 
							ORDER BY student_absence.subject_teacher_id, student_absence.id;";
						} else {
							$e = $_SESSION['email'];
							$sql = "SELECT student_absence.subject_teacher_id, student_absence.state, 
							teacher.name, subject.name, student_absence.day FROM student_absence
							INNER JOIN subject_teacher ON student_absence.subject_teacher_id = subject_teacher.id
							INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
							INNER JOIN subject ON subject.id = subject_teacher.subject_id
							WHERE student_absence.student_id = '$student_id' AND
							teacher.email = '$e'
							ORDER BY student_absence.subject_teacher_id, student_absence.id;";							
						}
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_row($query)) {
							if($teacher != $row[2]) {
								if($can) {
									if($i < count($lines)) {
										for($j = $i; $j < count($lines); $j++)
											echo '<td>'.$not_found.'</td>';
									}
									echo '</tr>';
								}
								echo '<tr class="tb_search">';
								if($_SESSION['type'] == "admin")
									echo '<td class="tb_name">'.$row[2].' - '.$row[3].'</td>';
								else
									echo '<td class="tb_name">'.$row[3].'</td>';
								$teacher = $row[2];
								$i = 0;
							}
							preg_match('/<th>(.*?)<\/th>/s', $lines[$i], $match);
							$i++;
							while($match[1] != strval($row[4])) {
								echo '<td>'.$not_found.'</td>';
								preg_match('/<th>(.*?)<\/th>/s', $lines[$i], $match);
								$i++;
							}
							
							if($match[1] == strval($row[4])) {
								if($row[1] == "P")
									echo '<td style="background-color: #5fda57;" class="present">Presente</td>';
								else if($row[1] == "A")
									echo '<td style="background-color: #da5757;" class="absent">Ausente</td>';
							}

							$can = True;
						}
					?>
				</table>
            </div>
        </form>
    </body>
</html>