

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
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/jquery.dataTables2.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>/raport_themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker-ofani2.min.js"></script>

<script src="<?php echo site_url('')?>/raport_themes/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo site_url('')?>/raport_themes/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>/raport_themes/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>



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

<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/buttons.print.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/buttons.colVis.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/media/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-siswa.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-blockui.js"></script>
<script src="<?php echo site_url('')?>/raport_themes/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo site_url('')?>/raport_themes/assets/admin/pages/scripts/portfolio.js"></script>




<script type="text/javascript">


jQuery(document).ready(function() {




    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  


	$("#siswa-tahun").val('').trigger("change");
	$("#siswa-kelas").val('').trigger("change");
	
	$('#siswa-kelas').prop('disabled', true);
	$('#form-siswa-cari')[0].reset();



	$('#siswa-tahun').click(function() {   // for select box
      
   
     var str = $('#siswa-tahun').val();
    var res = str.replace("/", "-"); 
    if($(this).val() == "")
      {
        $("#siswa-kelas").val('').trigger("change");
		

		$('#siswa-kelas').prop('disabled', true);
		

        $('#file-download-datasiswa').remove();
        $('#form-upload-excel').remove();
        $('#generate-datasiswa').remove();

      
        //alert($('#kelas-cari').val());
      }
      else
      {
        $.post("<?php echo site_url('siswa/datanilai/cari_kelas_modal')?>/" + res, {} ,function(obj){
    $('#siswa-kelas').html(obj);
    });
    
     $("#siswa-kelas").val('').trigger("change");
     $('#siswa-kelas').prop('disabled', false);
    
    
     $('#file-download-datasiswa').remove();
     $('#form-upload-excel').remove();
     $('#generate-datasiswa').remove();



      //alert($('#kelas-cari').val());
      }
      
         

      
} );

$('#siswa-kelas').click(function() {   // for select box
      
   var str = $('#siswa-kelas').val();
     
    if($(this).val() == "")
      {
        
         $('#file-download-datasiswa').remove();
         $('#form-upload-excel').remove();
         $('#generate-datasiswa').remove();
        
        //alert($('#kelas-cari').val());
      }
      else
      {

       
     $('#file-download-datasiswa').remove();
     $('#form-upload-excel').remove();
     $('#generate-datasiswa').remove();
     

      //alert($('#kelas-cari').val());
      }
      
         

      
} );





       //$('#form-siswa')[0].reset();
    $(':reset').live('click', function(){
    $('#form-siswa-data')[0].reset();
    });




    $('.date-picker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
    });



});
 
 
 function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax


 
}

function clear_notif() {
    $(".remove-notif-clear").remove();

}


  

function cekformsiswa() {

    Metronic.blockUI({
                target: '#cek-siswa-process',
                animate: true
            });
  
    $.ajax({
        url : "<?php echo site_url('siswa/datasiswa/validasiformsiswa')?>",
        type: "POST",
        data: $('#form-siswa-cari').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {   
                 Metronic.unblockUI('#cek-siswa-process');
                  $('#form-upload-excel').remove();
                  $('#file-download-datasiswa').remove();
                   $("#data-sukses-tambahhsiswa").empty();
                  
                //$('#form-siswa-cari')[0].reset();
                //$('#data-select2-raport').select2('val',0);
                $('#data-download').append('<div class="form-group" id="file-download-datasiswa"><div class="form-actions noborder"><button type="submit" class="btn green-meadow"><i class="fa fa-download"></i> Download Format Excel</button></div></div>');


                $('#data-sukses-tambahhsiswa').append('<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.suksespesan+'</div>');
                tambah_upload();
                 
                 window.setTimeout(function() {
                    $(".data-nilai").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);

                //reload_table();
                //LoadFormNilai();
                
            }
            else
            {   
                $("#data-error-tambahsiswa").empty();
                
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('data-nilai alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                $('#data-error-tambahsiswa').append($newDiv);
                }


                 $('#form-upload-excel').remove();
                  $('#file-download-datasiswa').remove();
                 
               
                 Metronic.unblockUI('#cek-siswa-process');
                

            }
            

            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            Metronic.unblockUI('#cek-siswa-process');
            DataPesanErrorValidasiNilai();
          
 
        }
    });

}


function tambah_upload() {
    $('#tambah-upload').append('<div class="portlet  light bg-inverse" id="form-upload-excel"><div class="portlet-title"><div class="caption"><i class="fa fa-upload"></i>Import Data Siswa</div><div class="tools"><a href="javascript:;" class="reload"></a><a href="javascript:;" class="collapse"></a></div><div class="actions"><div class="btn-group"><a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown"><i class="fa fa-bug"></i> Bulk Action <i class="fa fa-angle-down"></i></a><ul id="action-data" class="dropdown-menu pull-right"><li><a onclick="clear_notif()"><i class="glyphicon glyphicon-trash"></i> Clear Semua Notification </a></li></ul></div></div></div><div class="portlet-body"><div class="row"><div class="col-md-12"><div id="data-error-notif"></div></div></div><form enctype="multipart/form-data" accept-charset="utf-8" name="form-import-siswa" id="form-import-siswa"  ><div class="row"><div style="width:36.6667%" class="col-md-5" ><div class="form-group"><div class="fileinput fileinput-new" data-provides="fileinput"><div class="input-group input-large"><div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput"><i class="fa fa-file-excel-o fileinput-exists"></i>&nbsp; <span class="fileinput-filename"></span></div><span class="input-group-addon btn default btn-file"><span class="fileinput-new">Upload File </span><span class="fileinput-exists">Ganti </span><input type="file" name="file_datasiswa_excel"></span><a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Hapus </a></div></div></div></div><div class="col-md-2" style="width:13.6667%"><div class="form-group"><div class="form-actions noborder"><button onclick="upload_data_siswa()" type="button" class="btn grey-cascade"><i class="fa fa-upload"></i> Import Data</button></div></div></div><div class="col-md-5"><div class="form-group"><div class="form-actions noborder"></div></div></div></div></form></div></div>');
        
        }

function clear_notif() {
    $("#data-error-notif").empty();
}

function upload_data_siswa()
{   
    Metronic.blockUI({
                target: '#form-upload-excel',
                animate: true
            });
     var formData = new FormData( $("#form-import-siswa")[0] );
     formData.append("siswa_cari_angkatan", $('#siswa-tahun').val());
     formData.append("siswa_cari_kelas", $('#siswa-kelas').val());
     formData.append("siswa_nis", $('#data-nis-siswa').val());
     formData.append("jumlah_siswa", $('#mask_jumlahsiswa').val());
     
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('siswa/datasiswa/upload_siswa_excel')?>",
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
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                $('#data-error-notif').append($newDiv);
                    } else if (ofani == 'sukses') {
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Import siswa berhasil dilakukan, data berhasil ditambahkan sebanyak <b>'+ data.jumlah_data +' siswa</b>.');
               
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
    
                $('#data-error-notif').append($newDiv);
                    }


                     
                     
                }

                
                }

               //table.columns(4).search($('#siswa-kelas').val()).draw();
            
              Metronic.unblockUI('#form-upload-excel');
             
                //UploadFormNilai();
                window.setTimeout(function() {
                    $(".error-siswa").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);

                DataPesanImportSukses();

                 $('.fileinput').fileinput('clear');

                
                
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
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
               
                  $('#data-error-notif').append($newDiv);
                }

                Metronic.unblockUI('#form-upload-excel');
            }
           
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#form-upload-excel');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
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
Portfolio.init();
ComponentsFormTools.init();
    
});
</script>
<!-- SCRIPT DATA SISWA IMPORT DATA SISWA -->