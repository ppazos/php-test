$(document).ready(function() {

  //Me subscribo al evento submit del form login
  $('#login_form').on("submit", function(e){  
    
    e.preventDefault();

    var email = $('#email').val(),
    password = $('#password').val(),
    //expresion regular para validar email
    emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    //Si tengo todos los datos necesarios hago la llamada ajax
    if(email == '' || !emailRegex.test(email)) {
      $('#login_form').find('#msg').html('<div class="alert alert-danger" role="alert">Invalid email</div>');
      return;
   }else if($('#password').val() == '') {
      $('#login_form').find('#msg').html('<div class="alert alert-danger" role="alert">Invalid password</div>');
      return;
   }else{
      $.ajax({  
        url:"../src/assets/ajax/process.php",  
        method:"POST",  
        data: {
          email: email,
          password: password
        },  
        cache:false,                 
        beforeSend: function () {
          $('#login_form').find('input[type=submit]').prop('disabled', true);
          $('#login_form').find('#msg').html('');
        },
        success: function(resp){  

          resp = $.parseJSON(resp);

          $('#login_form').find('input[type=submit]').prop('disabled', false);
          
          //Si la respuesta fue positiva reseteo el form login
          if(!resp.error){

            $('#email').val('');
            $('#password').val('');
            $('#login_form').parent().hide();
            
            $('header').removeClass('d-none');
            $('#table_container').removeClass('d-none');
            $('#login_title').html(resp.message);
           
            //llamo a la carga de datos
            LoadData();
          }else{
            $('#login_form').find('#msg').html(`<div class="alert alert-danger" role="alert">${resp.message}</div>`);
          }
          
          
        }  
      });   
    }    
  });  


  $('#logout').on("click", function(e){  
    e.preventDefault();
    $.ajax({  
         url:"../src/assets/ajax/process.php",  
         method:"POST",  
         data: {logOut: true},  
         cache:false,                 
         success: function(resp){  
            
          if(resp == 'logout'){
            $('header').addClass('d-none');
            $('.csv-form').addClass('d-none');
            $('#login_form').parent().show();
            $('#table').bootstrapTable('destroy');
          }
          
         }  
    })  
    
  });  

  $('#upload_csv_form_button').on("click", function(e){  
    e.preventDefault();
    $.ajax({  
         url:"../src/assets/ajax/process.php",  
         method:"POST",  
         data:new FormData(document.querySelector('#upload_csv_form')),  
         contentType:false,          
         cache:false,                 
         processData:false,          
         beforeSend: function () {
          $(this).prop('disabled', true);
            if($("input[type=file]").val()) $('#upload_csv_form').find('#msg').html(`<div class="alert alert-info" role="alert"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Uploading, please wait.</div>`);
          },
         success: function(resp){  
            $(this).prop('disabled', false);
            $('#upload_csv_form').find('#msg').html('');

            if(resp=='Error1'){ 
              $('#upload_csv_form').find('#msg').html(`<div class="alert alert-danger" role="alert"></div>Invalid file.</div>`);  
            }else if(resp == "Error2"){ 
              $('#upload_csv_form').find('#msg').html(`<div class="alert alert-danger" role="alert">Please, select file.</div>`);  
            }else{  
              //CSV file data has been imported;  
              $('#upload_csv_form')[0].reset();

              var resp = $.parseJSON(resp),
              disclaimerClass = resp.inserted == 0 ? "alert-danger" : resp.inserted == (resp.duplicated + resp.inserted) ? "alert-success" : "alert-warning";
                     
              $('#upload_csv_form').find('#msg').html(`<div class="alert ${disclaimerClass}" role="alert">
              ${resp.inserted} of ${resp.duplicated + resp.inserted} registers added${resp.duplicated ? ' (' + resp.duplicated + ' duplicated).' : '.'}</div>`);

              //Si obtengo respuesta llamo a la carga de datos
              if(resp.inserted > 0) LoadData();
            }  
         }  
    })  
    
  });  


  $('#upload_csv_form').find('input[type=file]').on("change",function(e){
    $('#upload_csv_form').find('#msg').html('');
  });

  $('#modalUpload').on('hidden.bs.modal', function () {
    $('#upload_csv_form').find('#msg').html('');
  });
  
});

function LoadData(){
  $.ajax({  
    url:"../src/assets/ajax/process.php",  
    method:"POST",  
    data:{ loadData: true },  
    cache:false,
    success: function(resp){  
      $('.csv-form').removeClass('d-none');
      if(resp !== 'Error'){  
            $("#disclaimer_not_found").html('');
            RefreshTable($.parseJSON(resp))
          } else {
          /// No hay registros
          $("#disclaimer_not_found").html('<div class="alert alert-dark" role="alert">No records found</div>');
      }
    }  
  }) 
}

var dataTable;

function RefreshTable(data){
  
  dataTable = data;

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
    formatSearch: function () {
      return 'Search code...'
    }
  });
}

function customSearch(data, text) {
  return data.filter(function (row) {
    return row.code.indexOf(text) > -1
  })
}