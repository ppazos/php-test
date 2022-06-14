<?php 
session_start();
unset($_SESSION['userLog']);
session_destroy();
echo "window.location.replace('../index.php');";
?>