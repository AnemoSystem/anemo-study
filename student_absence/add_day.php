<?php
    $classroom_id = $_GET['id'];
    include "../connection.php";
    include "../test_session.php";

    $day = $_POST['day'];
    $subject_teacher = $_POST['subject_teacher'];

    echo $day;
    echo $subject_teacher;
    
    if(isset($_POST['submit'])) {
        $i = 0;
        $state = $_POST['state'];
        $sql = "SELECT id FROM student WHERE classroom_id = '$classroom_id';";
        $query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_row($query)) {
            $states = explode(":", $state[$i]);
            $sql = "INSERT INTO student_absence (student_id, day, state, subject_teacher_id)
            VALUES ('$states[1]', '$day', '$states[0]', '$subject_teacher');";
            $i++;
        }
    }
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Controlar Dia</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Controlar Presença e Ausência</h1>
        <form method="POST">
            <input type="submit" value="Enviar Chamada"/>
            <table id="list_table">
                <tr>
                    <th>Aluno</th>
                    <th>Situação</th>
                </tr>
                <?php
                    $sql = "SELECT id, name FROM student
                    WHERE classroom_id = '$classroom_id';";
                    $query = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_row($query)) {
                        echo "<tr><td>".$row[0]." - ".$row[1]."</td>";
                        echo "<td><select name='state[]'>";
                        echo "<option value='P:".$row[0]."'>Presente</option>";
                        echo "<option value='A:".$row[0]."'>Ausente</option>";
                        echo "</select></td></tr>";
                    }
                    mysqli_close($connection);
                ?>
            </table>
        </form>
    </body>
</html>