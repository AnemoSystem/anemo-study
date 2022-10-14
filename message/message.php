<?php
    include '../connection.php';
	$student_id = $_GET['id'];
    session_start();

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $msg = $_POST['msg'];
        
        $default_timezone = 'America/Sao_Paulo';
        date_default_timezone_set($default_timezone);

        $send_date = date("Y-m-d");

        $sql_user = "SELECT id FROM user WHERE student_id = '$student_id';";
        $query_user = mysqli_query($connection, $sql_user);
        $result = mysqli_fetch_row($query_user);

        $sql = "INSERT INTO notifications (title, message, type, status, from_user, to_user, send_date)
        VALUES ('$title', '$msg', 'P', 'N', '0', '$result[0]', '$send_date');";
        $query = mysqli_query($connection, $sql);
    }
    $connection->close();
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Enviar mensagem</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Enviar Mensagem</h1>
        <form method="POST">
            <label for="title">Título da mensagem: </label>
            <input type="text" id="title" name="title" placeholder="Digite um título"><br>
            <textarea id="msg" name="msg" rows="4" cols="50">Digite aqui sua mensagem</textarea><br>
            <input type="submit" name="submit" id="submit" value="Enviar Mensagem"/>
        </form>
    </body>
</html>