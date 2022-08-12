<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM classroom";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $grade_id = $row['grade_id'];
		$period_id = $row['period_id'];
	}
	
	if(isset($_POST['submit'])) {
		$grade_id = $_POST['grade'];
		$period_id = $_POST['period'];
		$sql = "UPDATE classroom SET grade_id = '$grade_id', period_id = '$period_id' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: classroom.php");
	}
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Editar Sala</title>
    </head>
    <body>
		<div class="main">
			<table>
				<form method="POST">
					<tr class="table-header">
						<th>Editar cadastro</th>
					</tr>
					<tr>
						<th><h3>ID: <?php echo $id; ?></h3></th>
					</tr>
					<tr>
					<th>
						<label for="grade">Ano Escolar: </label>
						<select name="grade" id="grade">
							<?php
								$sql = "SELECT * FROM grade ORDER BY id";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									if($id == $grade_id)
										echo '<option value="'.$id.'" selected>'.$name.'</option>';
									else
										echo '<option value="'.$id.'">'.$name.'</option>';
								}
							?>
						</select><br>
					</th>
					</tr>
					<tr>
					<th>
					<label for="period">Período Escolar: </label>
					<select name="period" id="period">
						<?php
							$sql = "SELECT * FROM period ORDER BY id";
							$query = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_assoc($query)) {
								$id = $row['id'];
								$name = $row['name'];
								if($id == $period_id)
									echo '<option value="'.$id.'" selected>'.$name.'</option>';
								else
									echo '<option value="'.$id.'">'.$name.'</option>';
							}
							mysqli_close($connection);
						?>
					</select><br>
					</th>
					</tr>
					<tr>
					<th>
					<input class="myBtn" type="submit" name="submit" value="Editar">
					</th>
					</tr>
				</form>
			<table>
		</div>
	</body>
	<a href="classroom.php"><button class="myBtn">Voltar</button></a>
</html>