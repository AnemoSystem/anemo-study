<?php
    include '../connection.php';
    include '../utility.php';
    $notification_id = $_GET['id'];
    session_start();

    $sql = "SELECT notifications.title, notifications.message,
    notifications.send_date, student.name as student, period.name as period, grade.name as grade
    FROM notifications
    INNER JOIN user ON user.id = notifications.to_user
    INNER JOIN student ON user.student_id = student.id
    INNER JOIN classroom ON student.classroom_id = classroom_id
    INNER JOIN period ON period.id = classroom.period_id
    INNER JOIN grade ON grade.id = classroom.grade_id
    WHERE notifications.id = '$notification_id';";
    $query = mysqli_query($connection, $sql);
    $message = mysqli_fetch_assoc($query);
    $connection->close();
?>
<html lang="pt">
    <head>
		<?php include ('../head.html'); ?>
        <title>Mensagem</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <a href="../index.php"><button>Voltar</button></a>
        <h1 style="margin: 40px;"><?php echo $message['title']; ?></h1>
        <p style="margin: 40px;"><?php echo $message['message']; ?></p>
        <h2 style="margin: 20px;">Emissor: <?php echo $message['student']." (".$message['grade']." - ".$message['period'].")"; ?></h2>
        <h2>Data de envio: <?php echo formatDate($message['send_date']); ?></h2>
    </body>
</html>