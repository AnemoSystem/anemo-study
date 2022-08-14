<?php
    include "../connection.php";
    include "../test_session.php";
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Selecionar Matéria</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Selecione uma matéria</h1>
        <?php
            $sql = "SELECT id, name FROM subject;";
            $query = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_row($query)) {
                echo "<a href='subject_teacher.php?id=".$row[0]."'>";
                echo "<input style='margin: 20px;' type='submit' value='".$row[1]."'>";
                echo "</a>";
            }
        ?>
    </body>
</html>