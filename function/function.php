<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $sql = "INSERT INTO function (name) VALUES ('$name')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM function WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
        <?php include ('../head.html'); ?>
        <title>Cadastrar Função</title>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome"><br>
                <input type="submit" name="submit" value="Enviar">
            </div>
            <div class="list">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM function";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT * FROM function";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$name.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="3">Não existem funções cadastradas ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>