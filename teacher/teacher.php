<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$password = strval(rand(1000, 9999));
        $sql = "INSERT INTO teacher (email, password, name, cpf, rg, phone, salary) 
		VALUES ('$email', '$password', '$name', '$cpf', '$rg', '$phone', '$salary')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM teacher WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Cadastrar Professor</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
		<a href="../index.php"><button>Voltar</button></a>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome">
				<label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="Digite o e-mail"><br>
				<label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF">
				<label for="rg">RG:</label>
                <input type="text" name="rg" id="rg" placeholder="Digite o RG"><br>
				<label for="phone">Telefone:</label>
                <input type="text" name="phone" id="phone" placeholder="Digite o telefone">
				<label for="salary">Salário:</label>
                <input type="number" name="salary" id="salary" placeholder="Digite o salário"><br>
				<input type="submit" name="submit" value="Enviar"><br>
				<input type="text" placeholder="Pesquisar por nome" id="searchbar" onkeyup="filter();">
            </div>
            <div class="list">
                <table id="list_table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Telefone</th>
						<th>Salário</th>
						<th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM teacher";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT * FROM teacher";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									$email = $row['email'];
									$rg = $row['rg'];
									$cpf = $row['cpf'];
									$phone = $row['phone'];
									$salary = $row['salary'];
									echo '<tr class="tb_search">';
									echo '<td>'.$id.'</td>';
									echo '<td class="tb_name">'.$name.'</td>';
									echo '<td>'.$email.'</td>';
									echo '<td>'.$cpf.'</td>';
									echo '<td>'.$rg.'</td>';
									echo '<td>'.$phone.'</td>';
									echo '<td>'.$salary.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="8">Não existem professores cadastrados ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
    </body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>