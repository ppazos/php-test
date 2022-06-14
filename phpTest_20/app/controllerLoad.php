<?php 
require_once "../dataBase/connec.php";

if (!file_exists('csvFile')) {
  $i=0;
  mkdir('csvFile', 0777);
}
$path='csvFile/'.$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $path);

if ($_FILES['file']['tmp_name']){
    $counOrg=0;
    $counSave=0;
    $fileCsv = array_map("str_getcsv", file($path)); 
    foreach ($fileCsv as $row2) {$counOrg++;}
    $head = array_shift($fileCsv);
    $filter = array_filter($fileCsv, 'strlen'); 
    $fileCsv = array_map('array_filter', $fileCsv);
    $fileCsv = array_filter($fileCsv);
  
    foreach ($fileCsv as $row) {
        $code = $row[0];
        $des = $row[1];
        $sqlExis = "SELECT * FROM cpt WHERE code='".$code."'";
        $queryExis = $pdo -> prepare($sqlExis);
        $queryExis -> execute();
        $exis = $queryExis -> fetchAll(PDO::FETCH_OBJ);

        if($queryExis -> rowCount() == 0) { 
            $sql = "INSERT INTO cpt (id, code, description) VALUES (NULL, '".$code."', '".$des."')";
            $query = $pdo -> prepare($sql);
            $query -> execute();
            $counSave = $query->rowCount();
            $counSave2+=$counSave;
        }
    }
    
    echo "Quantity of Items original file: ".$counOrg. "<br>". "Number of Registered Items: ".$counSave2;
}


?>