<?php
    require 'conexion.php';
	$conexion = new Conexion();
	$conexion-> conexion();
    $confirmacion = $_GET['activation'];
    $usuario = $_GET['user'];

    mysql_query("UPDATE usuarios SET confirmacion = 1 WHERE usuario = '".$usuario."'  AND codigo = '".$confirmacion."'");
    echo "tu cuenta ha sido creada correctamente :D"

?>