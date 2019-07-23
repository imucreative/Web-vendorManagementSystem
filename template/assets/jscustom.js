
$(document).ready(function() {
    
    //$('.summernote').summernote();
    $("#compose-textarea").wysihtml5();

    $('.myTable').dataTable({
        responsive: true,
        //"dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        }
    });
    
});

function composeEmail(id){
    
    //save_method = 'update';
    //$('#form')[0].reset(); // reset form on modals
    //$('.form-group').removeClass('has-error'); // clear error class
    //$('.help-block').empty(); // clear error string
    
    //Ajax Load data from ajax
    $.ajax({
        url : "mailbox/ajaxCompose/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            alert(data);
            //alert(data.email);
            //var to        = $(".to");
            //to.val(data.email);
            //window.open("mailbox/compose/"+data.email, '_self');
            


            

            //window.open("mailbox/compose", 'asd', '_self');
            //if (window.focus) { 
                //popupwindow.focus(); 
            //}
         

            
            //alert(data.email);
            //$('[name="categoryId"]').val(data.categoryId);
            //$('[name="name"]').val(data.name);
            //$('#modal-form-category').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Category'); // Set title to Bootstrap modal title
        }, error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function draft(tombol){
    
    if (confirm('Want to save your change?')) {

        //alert(vendorId);
    
        var from            = $(".from");
        var to              = $(".to");
        var cc              = $(".cc");
        var subject         = $(".subject");
        var message         = $(".message");
        
        var tombolSend      = $(".send");
        var tombolDiscard   = $(".discard");
        var tombolDraft     = $(".draft");

        tombolSend.attr('disabled',true);
        tombolDiscard.attr('disabled',true);
        tombolDraft.attr('disabled',true);

        var formData = {
            'from'      : from.val(),
            'to'        : to.val(),
            'cc'        : cc.val(),
            'subject'   : subject.val(),
            'message'   : message.html(),
            'status'    : tombol
        };
        
        
        // ajax adding data to database
        $.ajax({
            url : "save/1",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(data){
                console.log(data);

                if(data.status){

                    alert(data.message);
                    window.open("sendmail", '_self');

                }else{
                    
                    if (data.errors.from) {
                        $('.form-group-from').addClass('has-error');
                        alert(data.errors.from);
                        from.focus();
                    }else if (data.errors.to) {
                        $('.form-group-to').addClass('has-error');
                        alert(data.errors.to);
                        to.focus();
                    }else if (data.errors.subject) {
                        $('.form-group-subject').addClass('has-error');
                        alert(data.errors.subject);
                        subject.focus();
                    }else if (data.errors.message) {
                        alert(data.errors.message);
                    }

                }

                tombolSend.attr('disabled',false);
                tombolDiscard.attr('disabled',false);
                tombolDraft.attr('disabled',false);

            }, error: function (jqXHR, textStatus, errorThrown){
                alert("error");
                console.log(errorThrown);
                tombolSend.attr('disabled',false);
                tombolDiscard.attr('disabled',false);
                tombolDraft.attr('disabled',false);
                
            }
        });
    }
}
