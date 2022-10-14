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
        <a href="choose_classroom.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Selecione um estudante</h1>
        <input type="text" style="margin: 30px;" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
        <div id="list_table" style="display: flex; flex-direction: column;">
            <?php
                $sql = "SELECT id, name FROM student
                WHERE classroom_id = '$classroom_id';";
                $query = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_row($query)) {
                    echo "<a class='tb_search' href='message.php?id=".$row[0]."'>";
                    echo "<button class='tb_name' style='margin: 20px;'>".$row[0]." - ".$row[1]."</button>";
                    echo "</a>";
                }
                mysqli_close($connection);
            ?>
        </div>
    </body>
</html>