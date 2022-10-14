<?php
    include "../connection.php";
    include "../test_session.php";
    include "../utility.php";
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Lista de Mensagens</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Selecione uma mensagem</h1>
        <?php
            $sql = "SELECT notifications.id,notifications.title, 
            notifications.send_date, student.name
            FROM notifications 
            INNER JOIN user ON user.id = notifications.to_user
            INNER JOIN student ON user.student_id = student.id
            WHERE notifications.from_user = 0;";

            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo '<div class="tb_search" style="margin: 20px; text-align: left;">';
                echo '<h2>'.$result['title'].'</h2>';
                echo '<h3>De: Escola</h3>';
                echo '<h3 class="tb_name">Para: '.$result['name'].'</h3>';
                echo '<h3>Data: '.formatDate($result['send_date']).'</h3>';
                echo "<a class='tb_search' href='display_message.php?id=".$result['id']."'>";
                echo '<button>Abrir Mensagem</button>';
                echo "</a>";
                echo '</div>';
            }

            $sql = "SELECT notifications.id,notifications.title, 
            notifications.send_date, student.name
            FROM notifications 
            INNER JOIN user ON user.id = notifications.from_user
            INNER JOIN student ON user.student_id = student.id
            WHERE notifications.to_user = 0;";

            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo '<div style="margin: 20px; text-align: left;">';
                echo '<h2>'.$result['title'].'</h2>';
                echo '<h3 class="tb_name">De: '.$result['name'].'</h3>';
                echo '<h3>Para: Escola</h3>';
                echo '<h3>Data: '.formatDate($result['send_date']).'</h3>';
                echo '<button>Abrir Mensagem</button>';
                echo '</div>';
            }
            $connection->close();
        ?>
    </body>
</html>