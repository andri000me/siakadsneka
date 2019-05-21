<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker-ofani.min.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo site_url('')?>raport_themes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-guru.js"></script>


<script type="text/javascript">


jQuery(document).ready(function() {
    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  
    


	$("#guru-agama").val('').trigger("change");
	$("#guru-jeniskelamin").val('').trigger("change");
	$("#guru-pendidikan").val('').trigger("change");
	$("#guru-kelompok").val('').trigger("change");
	$("#guru-group").val('').trigger("change");
	$("#guru-status").val('').trigger("change");
   
       $('#form-guru')[0].reset();
    $(':reset').live('click', function(){
    var $r = $(this);
    setTimeout(function(){ 
        $r.closest('form').find('.select2-offscreen').trigger('change'); 
    }, 10);
});

    $('.date-picker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
    });



});
 
 
  

  
function select_all(obj) {
            var text_val=eval(obj);
            text_val.focus();
            text_val.select();
            if (!document.all) return; // IE only
            r = text_val.createTextRange();
            r.execCommand('copy');
        }


 function generator()
{   
    Metronic.blockUI({
                target: '#save-data-process',
                boxed: true,
                message: 'Proses Generate Password...',
                cenrerY: true,
                animate: false
            });
    
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_generator')?>",
        type: "POST",
        data: $('#form-guru').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 			
           	
            	Metronic.unblockUI('#save-data-process');
                $('[name="user_passwordgenerator"]').val(data.password_generator);
                $('[name="user_password"]').val(data.password_generator);
                $('[name="user_password_confirm"]').val(data.password_generator);
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
        	Metronic.unblockUI('#save-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            
 
        }
    });
}
 
function save()
{   
    Metronic.blockUI({
                target: '#save-data-process',
                boxed: true,
                message: 'Proses Menyimpan Data...',
                cenrerY: true,
                animate: false
            });
    $('#btnSave').text('Tambah Data Guru...'); //change button text
     var formData = new FormData( $("#form-guru")[0] );
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/ajax_save_guru')?>",
        type: "POST",
        data : formData,
        contentType : false,
        processData : false,
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            { 
                $("#data-error-notif").empty();
                if (data.inputerror.length == 0 ) {
                    '';
                } else {
                    for (var i = 0; i < data.inputerror.length; i++)
                {
                    var ofani = data.error_string[i];
                    if (ofani == '') {
                        data.error_string[i] = '<i class=\"fa fa-warning\"><\/i> <strong> Upload Gagal:<\/strong>  Anda belum memilih file untuk di upload.';
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-tambah-guru'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-guru fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else if (ofani == 'sukses') {
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-tambah-guru'+[i])  // adds the id
                 .addClass('alert alert-warning alert-dismissable error-guru fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Data foto berhasil terupload .');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-tambah-guru'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-guru fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    }

                     
                }
                }


              Metronic.unblockUI('#save-data-process');
              $('#form-guru')[0].reset();
              $('#btnSave').closest('form').find('.select2-offscreen').trigger('change'); 
                DataPesanAddGuru();
                window.setTimeout(function() {
                    $(".error-guru").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);


                
                
            }
            else
            {
               $("#data-error-notif").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    var ofani = data.error_string[i];
                    if (ofani == '') {
                        data.error_string[i] = '<i class=\"fa fa-warning\"><\/i> <strong> Upload Gagal:<\/strong>  Anda belum memilih file untuk di upload.';
                    } else {
                        data.error_string[i];
                    }

                     var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-tambah-guru'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-guru fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                }

                Metronic.unblockUI('#save-data-process');
            }
            $('#btnSave').text(' Tambah Data Guru').prepend(' <i class="fa fa-plus-circle"></i>');
            //$('#btnSave').text('Update Wali'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#save-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnSave').text(' Tambah Data Guru').prepend(' <i class="fa fa-plus-circle"></i>');
            $('#btnSave').attr('disabled',false); //set button enable

 
        }
    });
}
 



 
</script>

<script>
jQuery(document).ready(function() {       
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
ComponentsPickers.init();
ComponentsFormTools.init();
ComponentsDropdowns.init();

});
</script>

<!-- SCRIPTS DATA GURU TAMBAH GURU -->