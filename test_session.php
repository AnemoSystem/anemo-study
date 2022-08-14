<?php
    session_start();
    if($_SESSION["type"] == "none") 
        header("location: ../index.php");
?>