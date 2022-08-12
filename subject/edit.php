<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM subject";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
	}
	
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$sql = "UPDATE subject SET name = '$name' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: subject.php");
	}
	mysqli_close($connection);
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Editar Matéria</title>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Digite um nome"><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<a href="function.php"><button>Voltar</button></a>
</html>