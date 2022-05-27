<?php
require '../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">
 
    <title>Test - Ale Menciones</title>
    
    <style>
      section{
        padding: 15px;
        margin: 0 15px 15px 15px;
      }
      .flex{
        justify-content: end;
        margin-top: 15px;
        display: flex;
        gap: 10px;
      }
      .spinner-border-sm {
        margin-right: 10px;
      }
    </style>

  </head>
  
<body>

    <div class="main-wrapper" id="app">
      
      <!-- Header -->
      <header class="container d-none flex">
         
        <h2 class="mb-3 mt-3" id='login_title' style="font-size:1em;"></h2> <!-- Mensaje de respuesta via AJAX -->

        <button id='logout' type="button" class="btn btn-sm btn-outline-secondary">Logout</button> <!-- boton LOGOUT AJAX -->
      </header>
      
      <!-- Login -->
      <section class="container" style="max-width: 500px;">
      
        <form id="login_form">

          <h2 class="mb-3 mt-3">Login</h2>
          
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" value="alemenciones@gmail.com">
          </div>
          
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" value="123">
          </div>
          
          <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
          </div>
        
          <!-- Mensaje de respuesta via AJAX -->
          <strong id="msg"></strong>
        
        </form> 
      </section>
     
      <section id="table_container" class="container d-none">
      
        <!-- not found records boostrap disclaimer -->
        <div id='disclaimer_not_found'></div>
      
        <!-- Bootstrap Table -->
        <table 
          id="table" 
          data-search="true"
          data-custom-search="customSearch"
          class="table table-bordered table-hover">
        </table>
      
        <!-- Trigger the modal with a button -->
        <button type="button" style="margin-top: 20px;" class="btn btn-primary csv-form d-none" data-toggle="modal" data-target="#modalUpload">Import CSV file</button>
      
      </section>
      
      <!-- Modal Upload -->
      <div id="modalUpload" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            
            <div class="modal-header">
              <h2 class="mb-3 mt-3">Import CSV file</h2>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <section class="container">
                <form id="upload_csv_form">
                  <div class="form-group">
                      <input type="file" name="file" class="form-control-file" id="file">
                  </div>
                  <div class="form-group">
                    <div id="msg"></div>
                  </div>
                </form> 
              </section>
            </div>

            <div class="modal-footer">
              <button id="upload_csv_form_button" type="button" class="btn btn-primary">Upload</button>
            </div>

          </div>

        </div>
      </div>

    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>

<script src="./assets/js/main.js"></script>
</html>