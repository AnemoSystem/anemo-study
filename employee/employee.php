<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$function_id = $_POST['function'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$password = strval(rand(1000, 9999));
		$e_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO employee (email, password, name, cpf, rg, function_id, phone, salary) 
		VALUES ('$email', '$e_password', '$name', '$cpf', '$rg', '$function_id', '$phone', '$salary')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM employee WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Cadastrar Funcionário</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <div class="main">
		<form method="POST">
			<table>
				<tr class="table-header">
					<th>Cadastrar</th>
				</tr>
				<div class="form" id="insert-form">
					<tr><th>
					<label for="name">Nome:</label>
					<input type="text" name="name" id="name" placeholder="Digite o nome">
					</th></tr>
					<tr><th>
					<label for="email">E-mail:</label>
					<input type="email" name="email" id="email" placeholder="Digite o e-mail">
					</th></tr>
					<tr><th>
					<label for="cpf">CPF:</label>
					<input type="text" name="cpf" id="cpf" placeholder="Digite o CPF">
					</th></tr>
					<tr><th>
					<label for="rg">RG:</label>
					<input type="text" name="rg" id="rg" placeholder="Digite o RG"><br>
					</th></tr>
					<tr><th>
					<label for="phone">Telefone:</label>
					<input type="text" name="phone" id="phone" placeholder="Digite o telefone"><br>
					</th></tr>
					<tr><th>
					<label for="salary">Salário:</label>
					<input type="number" name="salary" id="salary" placeholder="Digite o salário"><br>
					</th></tr>
					<tr><th>
					<label for="function">Função:</label>
					<select name="function" id="function">
						<?php
							$sql = "SELECT * FROM function ORDER BY id";
							$query = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_assoc($query)) {
								$id = $row['id'];
								$name = $row['name'];	
								echo '<option value="'.$id.'">'.$id.' - '.$name.'</option>';
							}
						?>
					</select>
					<input class="myBtn" type="submit" name="submit" value="Enviar">
					</th></tr>
				</div>
            <div class="list">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Telefone</th>
						<th>Salário</th>
						<th>Função</th>
						<th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM employee";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT employee.id, employee.name, employee.email, 
								employee.rg, employee.cpf, employee.phone, employee.salary, 
								employee.function_id, function.name FROM employee
								INNER JOIN function ON employee.function_id = function.id";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_row($query)) {
									$id = $row[0];
									$name = $row[1];
									$email = $row[2];
									$rg = $row[3];
									$cpf = $row[4];
									$phone = $row[5];
									$salary = $row[6];
									$function_id = $row[7];
									$function_name = $row[8];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$name.'</td>';
									echo '<td>'.$email.'</td>';
									echo '<td>'.$cpf.'</td>';
									echo '<td>'.$rg.'</td>';
									echo '<td>'.$phone.'</td>';
									echo '<td>'.$salary.'</td>';
									echo '<td>'.$function_id.' - '.$function_name.'</td>';
									echo '<td><button name="delete" class="myBtn" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input class="myBtn" type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="9">Não existem funcionários cadastrados ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
            	</div>
			</table>
        </form>
		<tr><th>
			<a href="../index.php"><button class="myBtn">Voltar</button></a>
		</th></tr>
		</div>
    </body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>