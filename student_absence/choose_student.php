<?php
    $classroom_id = $_GET['id'];
    include "../connection.php";
    include "../test_session.php";
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Selecionar Estudante</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Selecione um estudante</h1>
        <?php echo '<form method="POST" action="add_day.php?id='.$classroom_id.'">' ?>
            <input type="date" name="day" style="background-color: DodgerBlue; font-size: 25px; border-radius: 10px; padding: 10px; border: none;" />
            <select name="subject_teacher" id="subject_teacher">
                <?php
                    $sql = "SELECT subject_teacher.id, subject.name, teacher.name 
                    FROM subject_teacher
                    INNER JOIN subject ON subject.id = subject_teacher.subject_id
                    INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
                    INNER JOIN teacher_classroom ON subject_teacher.id = teacher_classroom.subject_teacher_id
                    WHERE teacher_classroom.classroom_id = '$classroom_id';";
                    $query = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_row($query)) {
                        $id = $row[0];
                        $subject = $row[1];
                        $teacher = $row[2];
                        echo '<option value="'.$id.'">'.$subject.' - '.$teacher.'</option>';
                    }
                ?>
			</select>
            <input type="submit" value="Criar Nova Aula" />
        </form>
        <input type="text" style="margin: 30px;" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
        <div id="list_table" style="display: flex; flex-direction: column;">
            <?php
                $sql = "SELECT id, name FROM student
                WHERE classroom_id = '$classroom_id';";
                $query = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_row($query)) {
                    echo "<a class='tb_search' href='student_absence.php?id=".$row[0]."'>";
                    echo "<button class='tb_name' style='margin: 20px;'>".$row[0]." - ".$row[1]."</button>";
                    echo "</a>";
                }
                mysqli_close($connection);
            ?>
        </div>
    </body>
</html>