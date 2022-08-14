<?php
    include "../connection.php";
    include "../test_session.php";
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Cadastrar Professor</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <h1 style="margin: 40px;">Selecione uma sala</h1>
        <?php
            $sql = "SELECT classroom.id, grade.name, period.name from classroom
            INNER JOIN period ON period.id = classroom.period_id
            INNER JOIN grade ON grade.id = classroom.grade_id;";
            $query = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_row($query)) {
                echo "<a href='student.php?id=".$row[0]."'>";
                echo "<input type='submit' value='".$row[1]." - ".$row[2]."'>";
                echo "</a>";
            }
        ?>
    </body>
</html>