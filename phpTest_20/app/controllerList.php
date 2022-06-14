<?php 
require_once "../dataBase/connec.php";

$sqlHome = "SELECT * FROM cpt";
$queryHome = $pdo -> prepare($sqlHome);
$queryHome -> execute();
$resultsHome = $queryHome -> fetchAll(PDO::FETCH_OBJ);

if($queryHome -> rowCount() > 0) { 
    foreach($resultsHome as $resultHome) {
        $reg['data'][]=$resultHome; 
    }
    
}
echo  json_encode($reg);


?>