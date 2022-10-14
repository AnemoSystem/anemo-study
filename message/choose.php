<?php
    include "../connection.php";
    include "../test_session.php";
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Selecionar Opção</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;">Selecione uma opção</h1>
        <input type="text" style="margin: 30px;" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
        <a href="choose_classroom.php" style="margin: 40px;"><button>Enviar uma mensagem para aluno</button></a>
        <a href="list_notifications.php" style="margin: 40px;"><button>Ver mensagens recebidas</button></a>
    </body>
</html>