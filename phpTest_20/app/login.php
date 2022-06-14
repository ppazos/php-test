<?php 
require_once "../dataBase/connec.php";
session_start();
$email=$_POST['user'];
$pass=$_POST['pass']; 
$res="";
$sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'";
$query = $pdo -> prepare($sql);
$query -> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0) { 

    foreach($results as $result) {
        $users=$result -> email; 
     }
     $_SESSION['userLog']=$users;
     $res="window.location.replace('app/load.php');";
    
 }else{
    $res='$("#msnResp").html("<div class='."'alert alert-danger'". "role='alert'><button type = 'button' class = 'btn-close float-end' data-bs-dismiss = 'alert' aria-label = 'Close'></button><div>Invalid username or password</div>".'</div>"'.");";
}

echo $res;

?>