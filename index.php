<?php
    session_start();

    include "connection.php";

    if($_SESSION["type"] != "none") 
        header("location: menu.php");
    else
        $_SESSION["type"] = "none";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type_user'];
        $error = "";

        if(empty(trim($email))) $error = "Entre com um e-mail.";
        else if(empty(trim($password))) $error = "Entre com uma senha.";

        if($error == "") {
            if($type == "Professor") {
                $sql = "SELECT email, name FROM teacher 
                WHERE email = '$email' AND password = '$password';";
                $query = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($query);
                if(mysqli_num_rows($query) > 0)
                    $_SESSION["type"] = $row['name'];
                else 
                    $error = "Usuário não encontrado ou senha incorreta.";
            }
            else if($type == "Administrador") {
                if($email == "root@root" && $password == "root")
                    $_SESSION["type"] = "admin";
                else 
                    $error = "Usuário não encontrado.";
            }
        }

        if($error == "")
            header("location: menu.php");
        else
            echo "<script>alert('".$error."')</script>";
    }
?>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form method="POST">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="Digite o e-mail"><br>
            <label for="password">Senha: </label>
            <input type="password" name="password" id="password" placeholder="Digite a senha">
            <h3>Tipo de usuário</h3>
            <label for="teacher">Professor</label>
            <input type="radio" id="teacher" value="Professor" name="type_user" checked><br>
            <label for="admin">Administrador</label>
            <input type="radio" id="admin" value="Administrador" name="type_user"><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>