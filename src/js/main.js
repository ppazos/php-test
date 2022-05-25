$(document).ready(function() {

  //Me subscribo al evento submit del form upload file
  $('#upload_csv_form').on("submit", function(e){  
    e.preventDefault();
    $.ajax({  
         url:"../src/assets/ajax/process.php",  
         method:"POST",  
         data:new FormData(this),  
         contentType:false,          
         cache:false,                 
         processData:false,          
         beforeSend: function () {
          $('#upload_csv_form').find('input[type=submit]').prop('disabled', true);
          $('#msg').html('Subiendo archivo...');
         },
         success: function(resp){  
            $('#upload_csv_form').find('input[type=submit]').prop('disabled', false);
            $('#msg').html('');

            if(resp=='Error1'){ 
                  alert("Invalid File");  
            }else if(resp == "Error2"){ 
                  alert("Please Select File");  
            }else{  
              //CSV file data has been imported;  
              $('#upload_csv_form')[0].reset();

              var resp = $.parseJSON(resp);

              $('#msg').html(`Se agregaron ${resp.inserted} de ${resp.duplicated + resp.inserted} registros (${resp.duplicated} duplicados)`);

              //Si obtengo respuesta llamo a la carga de datos
              LoadData();
            }  
         }  
    })  
    
  });  

  LoadData();
  
});

function LoadData(){
  $.ajax({  
    url:"../src/assets/ajax/process.php",  
    method:"POST",  
    data:{ LoadData: true },  
    cache:false,
    success: function(resp){  
      if(resp !== 'Error'){  
            console.log(resp);
            RefreshTable($.parseJSON(resp))
      } else {
        console.log('No hay registros');
      }
    }  
  }) 
}

function RefreshTable(data){
  $('#table').bootstrapTable('destroy').bootstrapTable({
    columns: [{
      field: 'code',
      title: 'Code'
    }, {
      field: 'description',
      title: 'Description'
    }],
    data: data,
    pagination: true,
    search: true,
  });
}
