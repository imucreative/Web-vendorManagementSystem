
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

function rateVendor(id, name, rating){
    
    $('#modalRating').modal('show');
    $('.font-bold').text(name); // Set title to Bootstrap modal title

    $('.idAwal').attr("id", id);
    $('.rating').value(rating);

    
}

function highlightStar(obj,id) {
    removeHighlight(id);		
    $('#rate-'+id+' li').each(function(index) {
        $(this).addClass('highlight');
        if(index == $('#rate-'+id+' li').index(obj)) {
            return false;	
        }
    });
}

// saat mengarahkan kursor ke bintang maka bintang akan transparant
function removeHighlight(id) {
    $('#rate-'+id+' li').removeClass('selected');
    $('#rate-'+id+' li').removeClass('highlight');
}

// Aksi untuk proses rating ke database di saat bintang diklik
function addRating(obj,id) {
    $('#rate-'+id+' li').each(function(index) {
        $(this).addClass('selected');
        $('#rate-'+id+' #rating').val((index+1));
        if(index == $('#rate-'+id+' li').index(obj)) {
            return false;	
        }
    });
    $.ajax({
    url: "<?php echo base_url('berita/tambah_rating'); ?>",
    data:'id='+id+'&rating='+$('#rate-'+id+' #rating').val(),
    type: "POST"
    });
}

// Ketika Kursor meninggalkan bintang maka kembali kepada keaadan awal
function resetRating(id) {
    if($('#rate-'+id+' #rating').val() != 0) {
        $('#rate-'+id+' li').each(function(index) {
            $(this).addClass('selected');
            if((index+1) == $('#rate-'+id+' #rating').val()) {
                return false;	
            }
        });
    }
} 






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
