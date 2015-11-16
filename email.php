<?php 
//require 'registro.php';
    require 'vendor/autoload.php';
    use Mailgun\Mailgun;
    session_start();
    $email = $_SESSION['email'];
    require 'conexion.php';
	$conexion = new Conexion();
	$conexion-> conexion();

$sql = mysql_query("SELECT codigo FROM usuarios WHERE usuario = '".$_SESSION['user']."'");
$row = mysql_fetch_array($sql);
$codigo = $row[0];
echo $codigo;

# Instantiate the client.
$mgClient = new Mailgun('key-895d8c83afc89fdfe4dbbc0f77914001');
$domain = "sandbox8ce7f0bf5daa434f80e058f59c7e5798.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'SunBand - No Reply <sunband-noreply@sunband.com>',
    'to'      => 'Baz <'.$email.'>',
    'subject' => 'Registro',
    'text'    => "https://email-anthonyprz.c9.io/confirm.php?activation=$codigo&user=".$_SESSION['user'].""
));
?>