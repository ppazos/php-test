<?php 
error_reporting(0);
require 'conf.php';

$dbd = "mysql:host=$dbhost;dbname=$dbname;charset=UTF8";

try {
	$pdo = new PDO($dbd, $dbuser, $dbpass);
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>

