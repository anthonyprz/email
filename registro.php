<?php 
    require 'conexion.php';
    session_start();
	$conexion = new Conexion();
	$conexion-> conexion();

	
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
   	
   	$_SESSION["email"] = $_POST['email'];
   	$_SESSION["user"] = $_POST['user'];
   	
   	$email = $_SESSION["email"];
   	 if($pass == $pass2){
   	
   	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
    $numerodeletras=20; //numero de letras para generar el texto
    $cadena = ""; //variable para almacenar la cadena generada
    for($i=0;$i<$numerodeletras;$i++){
        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
    entre el rango 0 a Numero de letras que tiene la cadena */
    }
   // echo $cadena;
   	
	mysql_query("INSERT INTO usuarios (usuario, password, email, codigo) VALUES('".$user."','".$pass."','".$email."','".$cadena."')");
	header('Location: email.php');
   	 }
   	 else {echo "las contraserñas deben coincidir";
   	     //	header('Location: index.html');
   	 }
   	 
?>