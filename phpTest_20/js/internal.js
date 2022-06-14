$(document).ready(function() {


    $("#sub_log").click(function() {
        var userEm = $("#userEmail").val();
        var passUs = $("#userPass").val();
        var param = {
            'user': userEm,
            'pass': passUs
        };
        if (userEm == "" || passUs == "") {
            $("#msnResp").html("<div class='alert alert-danger' role='alert'><button type = 'button' class = 'btn-close float-end' data-bs-dismiss = 'alert' aria-label = 'Close'></button><div>You have to complete all the fields</div></div>");
        } else {
            $.ajax({
                data: param,
                url: 'app/login.php',
                type: 'post',
                success: function(response) {
                    const re = eval(response);
                },
                error: function(xhr, status) {
                    alert('Oops something happened');
                }
            });
        }
    });

    $("#bye").click(function() {
        $.ajax({
            data: { by: 1 },
            url: '../app/logout.php',
            type: 'post',
            success: function(response) {
                const re = eval(response);
            }
        });
    });

    $("#bntSumt").click(function() {
        var file_data = $('#fileToUpload').prop('files')[0];
        $("#infoUp").html("");
        if (file_data != undefined) {
            $("#infoUp").html('<div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow text-success" style="width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>');
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                type: 'POST',
                url: '../app/controllerLoad.php',
                contentType: false,
                processData: false,
                data: form_data,
                success: function(response) {
                    $("#infoUp").html(response);
                    $.ajax({
                        data: { body: response },
                        url: '../app/controllerMail.php',
                        type: 'post'
                    });
                },
                error: function(xhr, status) {
                    alert('Something went wrong. Please try again.');
                }
            });
        } else {
            $("#infoUp").html("");
            $("#msnModal").html("<div class='alert alert-danger' role='alert'><button type = 'button' class = 'btn-close float-end' data-bs-dismiss = 'alert' aria-label = 'Close'></button><div>You have to upload a file.</div></div>");
        }
        return false;



    });

    $("#bntClos").click(function() {
        $('#fileToUpload').val('');
        $("#infoUp").text('');
        location.reload();
    });

    list();

    function list() {

        var table = $('#tableCsv').DataTable({

            "ajax": {
                method: 'post',
                url: '../app/controllerList.php'
            },
            "columns": [
                { "data": "code" },
                { "data": "description" }
            ]

        });

    }


});