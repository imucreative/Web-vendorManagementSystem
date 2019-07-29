var save_method; //for save method string
var table;

$(document).ready(function() {
    //datatables
    table = $('.usersTable').DataTable({
        //responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "users/ajax_list",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    
    /*
    $(".nameCategory").on('keyup', function(e){
        if(e.keyCode === 13){
            //alert(e.keyCode);
            save();
        }
    });
    */
});



function addUsers(){
    save_method = 'add';
    $('.dispStatusUser').hide();
    $('.statusUser').show();
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal-form-users').modal('show'); // show bootstrap modal
    $('.modal-title').text('Input User'); // Set Title to Bootstrap modal title
}

function editUsers(id){
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "users/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="userId"]').val(data.dataUser.userId);
            $('[name="name"]').val(data.dataUser.name);
            $('[name="username"]').val(data.dataUser.username);
            $('.status').val(data.statusUser);
            $('.dispStatusUser').show();
            $('.statusUser').hide();
            $('#modal-form-users').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
        }, error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}



function save(){
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "users/ajax_add";
    } else {
        url = "users/ajax_update";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){ //if success close modal and reload ajax table
                $('#modal-form-users').modal('hide');
                //reload_table();
                window.open("users", '_self');
            }else{
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').html("<i class='fa fa-plus'></i> Save"); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }, error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').html("<i class='fa fa-plus'></i> Save"); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }
    });
}

function deleteUsers(id){
    if(confirm('Are you sure delete this data?')){
        // ajax delete data to database
        $.ajax({
            url : "users/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                //if success reload ajax table
                $('#modal_form').modal('hide');
                //reload_table();
                window.open("users", '_self');
            }, error: function (jqXHR, textStatus, errorThrown){
                alert('Error deleting data');
            }
        });
    }
}

function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax 
}