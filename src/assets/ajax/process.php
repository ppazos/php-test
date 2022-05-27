<?php

//CONFIGURACION DE CONEXION
$servername='localhost';
$username='root';
$password='';
$dbname = "php-test";
$mysqli=mysqli_connect($servername,$username,$password,"$dbname");
if(!$mysqli) die('Could not Connect MySql Server:' .mysql_error());
    
//LOGIN
if(isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_query = "SELECT id, email FROM user WHERE email = '".$email."'";
    $email_result = $mysqli->query($email_query);
    
    //Si obtuve el usuario consulto el password
    if($email_result->num_rows > 0){

        $email_row = $email_result->fetch_assoc();
        $password_query = "SELECT password FROM user WHERE password = '".$password."'";
        $password_result = $mysqli->query($password_query);
        
        //Si tambien tengo el password inicializo una session php
        if($password_result->num_rows > 0){
            $password_row = $password_result->fetch_assoc();

            //Configuracion de la session
            session_start();
            $_SESSION['user'] = $email_row['id'];

            //Devuelvo datos de inicio de sesion del usuario
            echo json_encode(array(
                'error' => false,    
                "id" => $email_row['id'],
                "email" => $email_row['email'],
                "password" => $password_row['password'],
                "message" => 'Wellcome ID: '.$email_row['id'].' | '.$email_row['email'],
                ));
        }else{
            echo json_encode(array(
                'error' => true,    
                "message" => 'Invalid password',
                ));
        }
    }else{
        echo json_encode(array(
            'error' => true,    
            "message" => 'User not found',
            ));
    }

//LOGOUT
} else if(isset($_POST['logOut'])) {

    //Configuracion de la session (logout/test)
    if (isset($_SESSION['user'])){
        unset($_SESSION['user']);
        session_destroy();
    }
    
    //Envio respuesta de logout positivo
    echo 'logout';

//LOAD
} else if(isset($_POST['loadData'])) {
    
    //CONSULTA MYSQL
    $data = [];
    $query = "SELECT * FROM cpt";
    $result = $mysqli->query($query);
    if($result->num_rows > 0){

        // Genero un objeto con los datos
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                "code" => $row['code'],
                "description" => $row['description']
            );
        }

        //Envio respuesta json
        echo json_encode($data);
        $result->free();

    } else {
        echo 'Error';
    }

//UPLOAD FILE
}else if(!empty($_FILES["file"]["name"])){
    
    // Allowed mime types
    $fileMimes = array(
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
    );

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            //Variables para devolverle a la vista los resultados de la consulta
            $duplicated = 0;
            $inserted = 0;
            $linebreak = 0;
            $lines = 0;

            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile)) !== FALSE){
                
                $lines++;
                
                if(!empty($getData[0]) && !empty($getData[1])){
                    
                    $code = mysqli_real_escape_string($mysqli, $getData[0]);  
                    $description = mysqli_real_escape_string($mysqli, $getData[1]);  

                    //CONSULTA SQL PARA VERIFICAR QUE NO SE DUPLIQUEN CODIGOS EN LA BD
                    $query = "SELECT id FROM cpt WHERE code = '" . $code . "'";
                    $check = mysqli_query($mysqli, $query);
    
                    // Si hay registros le aviso al usuario
                    if ($check->num_rows > 0){
                        $duplicated++;
                    }else{

                        //INSERTO UN NUEVO REGISTRO
                        mysqli_query($mysqli, "INSERT INTO cpt (code, description) VALUES ('" . $code . "', '" . $description . "')");
                        $inserted++;
                    }
                }else{
                    $linebreak++;
                }
            }

            // Close opened CSV file
            fclose($csvFile);

            //Devuelvo al ajax un objeto json con los datos de la consulta 
            echo json_encode(array(
                "duplicated" => $duplicated,
                "inserted" => $inserted,
                "linebreak" =>  $linebreak,
                "lines" =>  $lines
            ));
        
    } else {
        echo "Error1";
    }
}else{
    echo "Error2";  
}

/* close connection */
$mysqli->close();

?>