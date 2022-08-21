<?php
    include "../connection.php";
    include "../test_session.php";
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Selecionar Sala</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Selecione uma sala</h1>
        <?php
            if($_SESSION['type'] == "admin") {
                $sql = "SELECT classroom.id, grade.name, period.name from classroom
                INNER JOIN period ON period.id = classroom.period_id
                INNER JOIN grade ON grade.id = classroom.grade_id;";
            } else {
                //echo $_SESSION['email'];
                $sql = "SELECT classroom.id, grade.name, period.name from classroom
                INNER JOIN period ON period.id = classroom.period_id
                INNER JOIN grade ON grade.id = classroom.grade_id
                INNER JOIN teacher_classroom ON teacher_classroom.classroom_id = classroom.id
                INNER JOIN subject_teacher ON subject_teacher.id = teacher_classroom.subject_teacher_id
                INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
                WHERE teacher.email = '".$_SESSION['email']."';";                
            }
            $query = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_row($query)) {
                echo "<a href='grades_attendance.php?id=".$row[0]."'>";
                echo "<input style='margin: 20px;' type='submit' value='".$row[1]." - ".$row[2]."'>";
                echo "</a>";
            }
        ?>
    </body>
</html>