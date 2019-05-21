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

<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo site_url('')?>raport_themes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-raport.js"></script>


<script type="text/javascript">


var save_method; //for save method string
var table;
//var dt = $('#datawali' ).DataTable();
 //var tableInitialized = false;
jQuery(document).ready(function() {
    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  
    
    $("#data-kompetensi-select1").val('').trigger("change");
     $("#data-kompetensi-select2").val('').trigger("change");
      $("#data-kompetensi-select3").val('').trigger("change");
       $('#form2')[0].reset();

    $("#data-kompetensi-select1").change(function(){
    $('#nama-kompetensi').val($("#data-kompetensi-select1 option:selected").text());
    });
   
    $(':reset').live('click', function(){
    var $r = $(this);
    setTimeout(function(){ 
        $r.closest('form').find('.select2-offscreen').trigger('change'); 
    }, 10);
});
});



 
function get_jumlah() {
   
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/count/hitung')?>",
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            if (data.jumlah_mapel == '0') {
                 $("#jumlahmapel").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahmapel").attr({
                    "class" : "badge badge-warning",
                 }).text(data.jumlah_mapel);
            }

            if (data.jumlah_wali == '0') {
                 $("#jumlahwali").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahwali").attr({
                    "class" : "badge badge-warning",
                 }).text(data.jumlah_wali);
            }

            if (data.jumlah_hakmapel == '0') {
                 $("#jumlahhakmapel").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahhakmapel").attr({
                    "class" : "badge badge-warning",
                 }).text(data.jumlah_hakmapel);
            }

            if (data.jumlah_kompetensi == '0') {
                 $("#jumlahkompetensi").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahkompetensi").attr({
                    "class" : "badge badge-success",
                 }).text(data.jumlah_kompetensi);
            }

            if (data.jumlah_absensi == '0') {
                 $("#jumlahabsensi").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahabsensi").attr({
                    "class" : "badge badge-success",
                 }).text(data.jumlah_absensi);
            }

            if (data.jumlah_hakabsensi == '0') {
                 $("#jumlahhakabsensi").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahhakabsensi").attr({
                    "class" : "badge badge-warning",
                 }).text(data.jumlah_hakabsensi);
            }

            if (data.jumlah_eskul == '0') {
                 $("#jumlaheskul").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlaheskul").attr({
                    "class" : "badge badge-warning",
                 }).text(data.jumlah_eskul);
            }

            if (data.jumlah_hakeskul == '0') {
                 $("#jumlahhakeskul").attr({
                    "class" : "badge badge-danger",
                 }).text('EMPTY');
            } else {
                 $("#jumlahhakeskul").attr({
                    "class" : "badge badge-warning",
                 }).text(data.jumlah_hakeskul);
            }
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
           
            DataPesanError1();
           
 
        }
    });
 }
 
 
function save()
{

Metronic.blockUI({
                target: '#tambah-data-process',
                 boxed: true,
                message: 'Proses Menyimpan Data...',
                cenrerY: true,
                animate: false
            });
   $('#btnSave').text(' Tambah Data...').prepend(' <i class="fa fa-plus-circle"></i>'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
   
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datakompetensi/ajax_add')?>",
        type: "POST",
        data: $('#form2').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {	
            	Metronic.unblockUI('#tambah-data-process'); 
                $('#modal_form').modal('hide');
                $('#form2')[0].reset();

                 window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);
                 
                 $('#btnSave').closest('form').find('.select2-offscreen').trigger('change');
                get_jumlah(); 
                DataTambah();
            }
            else
            {   
                $("#data-error-kelas").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-kelas').append($newDiv);
               


                //$('#data-error-kelas').remove()
                }

                 Metronic.unblockUI('#tambah-data-process'); 

                 
            }
            
           
            $('#btnSave').text(' Tambah Kompetensi').prepend(' <i class="fa fa-plus-circle"></i>'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	
        	Metronic.unblockUI('#tambah-data-process'); 
            //alert('Gagal untuk Insert Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError4();
            $('#btnSave').text(' Tambah Kompetensi'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            //location.reload();
 
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
RaportFormTools.init();
});
</script>

<!-- SCRIPTS DATA KOMPETENSI EDIT -->