<?php 
$dbhost="localhost";
$dbname="db_phptest";
$dbuser="root";
$dbpass="";
$dbd = "mysql:host=$dbhost;dbname=$dbname;charset=UTF8";

$pdo = new PDO($dbd, $dbuser, $dbpass);

if ($argc == 1) {die("Debe ingrear un correo y una contraseña");}

$sql = "INSERT INTO users (id, email, password) VALUES (NULL, '".$argv[1]."', '".$argv[2]."')";
$query = $pdo -> prepare($sql);
$query -> execute();
echo "Usuario registrado con exito!";
?>