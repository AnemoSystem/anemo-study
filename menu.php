<?php
    session_start();

    if(isset($_POST['logout']) || $_SESSION["type"] == "none"){
        header("location: index.php");
        $_SESSION["type"] = "none";
    }
?>
<html lang="pt">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Escolar</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="logo-title">
            <img src="img/logo.png">
            <h3>Olá, <?php echo $_SESSION['type']; ?>!</h3>
            <h3>Bem-vindo ao sistema escolar integrado <b><i>AnemoStudy</i></b></h3>
            <button style="margin: 20px;" onclick="openNav();">Iniciar Sistema</button>
            <form method="POST">
                <input type="submit" value="Sair" name="logout">
            </form>
            <h5 class="logo-title" style="margin-top: 20px;">2022© Anemo System. All rights reserved</h5>
        </div>
        <div class="sidenav" id="mySidenav">
            <h4 class="sidenav-title">ESCOLA</h4>
            <?php if($_SESSION['type'] == "admin"): ?>
            <a href="grade/grade.php">Ano Escolar</a>
            <a href="subject_teacher/choose.php">Aulas</a>
            <a href="function/function.php">Função</a>
            <a href="employee/employee.php">Funcionário</a>
            <a href="subject/subject.php">Matéria</a>
            <a href="period/period.php">Período</a>
            <a href="teacher/teacher.php">Professor</a>
            <a href="teacher_classroom/teacher_classroom.php">Professor por Sala</a>
            <a href="classroom/classroom.php">Sala</a>
            <?php endif; ?>
            <a href="student/choose.php">Estudante</a>
            <a href="grades_attendance/grades_attendance.php">Notas</a>
            <a href="grades_attendance/grades_attendance.php">Faltas e Presenças</a>
            <?php if($_SESSION['type'] == "admin"): ?>
            <h4 class="sidenav-title">JOGO</h4>
            <a href="user/user.php">Usuário de jogo</a>
            <?php endif; ?>
        </div>
    </body>
    <script type="text/javascript">
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }     
    </script>
</html>