<?php
	include "../connection.php";
	session_start();
	$id = $_GET['id'];
	$sql = "SELECT * FROM teacher WHERE id = '$id'";
	$query = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_assoc($query)) {
		$id = $row['id'];
		$name = $row['name'];
		$email = $row['email'];
		$rg = $row['rg'];
		$cpf = $row['cpf'];
		$phone = $row['phone'];
		$salary = $row['salary'];
	}
	
	if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$sql = "UPDATE teacher SET name = '$name', email = '$email', rg = '$rg',
		cpf = '$cpf', phone = '$phone', salary = '$salary' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		if($_SESSION['type'] == "admin")	
			header("location: teacher.php");
		else
			header("location: ../menu.php");
	}
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Editar Professor</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="Digite o nome" value='<?php echo $name; ?>'><br>
			<label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF" value='<?php echo $cpf; ?>'><br>
			<label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" placeholder="Digite o RG" value='<?php echo $rg; ?>'><br>
			<label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" placeholder="Digite o Telefone" value='<?php echo $phone; ?>'><br>
			<?php
				if($_SESSION['type'] == "admin") {
					echo '<label for="salary">Salário:</label>';
					echo '<input type="number" name="salary" id="salary" placeholder="Digite o salário" value='.$salary.'><br>';
					echo '<label for="email">E-mail:</label>';
					echo '<input type="email" name="email" id="email" placeholder="Digite o e-mail" value='.$email.'><br>';
				} else {
					echo '<label for="salary" style="display: none;" >Salário:</label>';
					echo '<input type="number" style="display: none;" name="salary" id="salary" placeholder="Digite o salário" value='.$salary.'><br>';
					echo '<label for="email" style="display: none;">E-mail:</label>';
					echo '<input type="email" style="display: none;" name="email" id="email" placeholder="Digite o e-mail" value='.$email.'><br>';
				}
			?>
			<input type="submit" name="submit" value="Editar">
		</form>
		<button onclick="history.go(-1);">Voltar</button>
	</body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>