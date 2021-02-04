<?php
    session_start();
    unset($_SESSION["email"]); 
    session_destroy();
    require_once "../Models/Conexion.php";
    $db = Conexion::Conectar();	
    unset($db);
    header("Location: ../index.php");
?>