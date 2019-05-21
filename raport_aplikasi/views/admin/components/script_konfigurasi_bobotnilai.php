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

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo site_url('')?>raport_themes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/table-otomatis.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-dropdowns.js"></script>


<script type="text/javascript">


var save_method; //for save method string
var table;
//var dt = $('#datawali' ).DataTable();
 //var tableInitialized = false;
jQuery(document).ready(function() {
    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  
   


   

   $('#form-bobotnilai')[0].reset();
    $("#data-select2-tahunajaran").val('').trigger("change");
    $("#data-select2-tahunajaran-client").val('').trigger("change");


    $("#bobot-nilai-uh").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-uh-value").text(ui.value);
                    $("#bobot-nilai-uh-value-text").val(ui.value);

                }
            });

            $("#bobot-nilai-uh-value").text($("#bobot-nilai-uh").slider("value"));


            $("#bobot-nilai-tg").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-tg-value").text(ui.value);
                    $("#bobot-nilai-tg-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-tg-value").text($("#bobot-nilai-tg").slider("value"));

            $("#bobot-nilai-nh").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-nh-value").text(ui.value);
                    $("#bobot-nilai-nh-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-nh-value").text($("#bobot-nilai-nh").slider("value"));
            


             $("#bobot-nilai-uts").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-uts-value").text(ui.value);
                    $("#bobot-nilai-uts-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-uts-value").text($("#bobot-nilai-uts").slider("value"));


            $("#bobot-nilai-uas").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-uas-value").text(ui.value);
                    $("#bobot-nilai-uas-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-uas-value").text($("#bobot-nilai-uas").slider("value"));


            $("#bobot-nilai-ps").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-ps-value").text(ui.value);
                    $("#bobot-nilai-ps-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-ps-value").text($("#bobot-nilai-ps").slider("value"));



            $("#bobot-nilai-pr").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-pr-value").text(ui.value);
                    $("#bobot-nilai-pr-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-pr-value").text($("#bobot-nilai-pr").slider("value"));


            $("#bobot-nilai-po").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 1,
                slide: function (event, ui) {
                    $("#bobot-nilai-po-value").text(ui.value);
                    $("#bobot-nilai-po-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-po-value").text($("#bobot-nilai-po").slider("value"));



   $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_bobotnilai')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $("#bobot-nilai-uh").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_uh,
                slide: function (event, ui) {
                    $("#bobot-nilai-uh-value").text(ui.value);
                    $("#bobot-nilai-uh-value-text").val(ui.value);

                }
            });

            $("#bobot-nilai-uh-value").text($("#bobot-nilai-uh").slider("value"));
            $("#bobot-nilai-uh-value-text").val($("#bobot-nilai-uh").slider("value"));


            $("#bobot-nilai-tg").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_tg,
                slide: function (event, ui) {
                    $("#bobot-nilai-tg-value").text(ui.value);
                    $("#bobot-nilai-tg-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-tg-value").text($("#bobot-nilai-tg").slider("value"));
            $("#bobot-nilai-tg-value-text").val($("#bobot-nilai-tg").slider("value"));


            $("#bobot-nilai-nh").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_nh,
                slide: function (event, ui) {
                    $("#bobot-nilai-nh-value").text(ui.value);
                    $("#bobot-nilai-nh-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-nh-value").text($("#bobot-nilai-nh").slider("value"));
            $("#bobot-nilai-nh-value-text").val($("#bobot-nilai-nh").slider("value"));


             $("#bobot-nilai-uts").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_uts,
                slide: function (event, ui) {
                    $("#bobot-nilai-uts-value").text(ui.value);
                    $("#bobot-nilai-uts-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-uts-value").text($("#bobot-nilai-uts").slider("value"));
            $("#bobot-nilai-uts-value-text").val($("#bobot-nilai-uts").slider("value"));


            $("#bobot-nilai-uas").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_uas,
                slide: function (event, ui) {
                    $("#bobot-nilai-uas-value").text(ui.value);
                    $("#bobot-nilai-uas-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-uas-value").text($("#bobot-nilai-uas").slider("value"));
            $("#bobot-nilai-uas-value-text").val($("#bobot-nilai-uas").slider("value"));


            $("#bobot-nilai-ps").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_ps,
                slide: function (event, ui) {
                    $("#bobot-nilai-ps-value").text(ui.value);
                    $("#bobot-nilai-ps-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-ps-value").text($("#bobot-nilai-ps").slider("value"));
            $("#bobot-nilai-ps-value-text").val($("#bobot-nilai-ps").slider("value"));



            $("#bobot-nilai-pr").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_pr,
                slide: function (event, ui) {
                    $("#bobot-nilai-pr-value").text(ui.value);
                    $("#bobot-nilai-pr-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-pr-value").text($("#bobot-nilai-pr").slider("value"));
            $("#bobot-nilai-pr-value-text").val($("#bobot-nilai-pr").slider("value"));


            $("#bobot-nilai-po").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_po,
                slide: function (event, ui) {
                    $("#bobot-nilai-po-value").text(ui.value);
                    $("#bobot-nilai-po-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-po-value").text($("#bobot-nilai-po").slider("value"));
            $("#bobot-nilai-po-value-text").val($("#bobot-nilai-po").slider("value"));




 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });







 $(':reset').live('click', function(){

    Metronic.blockUI({
                target: '#edit-data-process',
                boxed: true,
                message: 'Proses Mereset Data...',
                cenrerY: true,
                animate: false
            });
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_bobotnilai')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 			 $("#bobot-nilai-uh").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_uh,
                slide: function (event, ui) {
                    $("#bobot-nilai-uh-value").text(ui.value);
                    $("#bobot-nilai-uh-value-text").val(ui.value);

                }
            });

            $("#bobot-nilai-uh-value").text($("#bobot-nilai-uh").slider("value"));
            $("#bobot-nilai-uh-value-text").val($("#bobot-nilai-uh").slider("value"));


            $("#bobot-nilai-tg").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_tg,
                slide: function (event, ui) {
                    $("#bobot-nilai-tg-value").text(ui.value);
                    $("#bobot-nilai-tg-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-tg-value").text($("#bobot-nilai-tg").slider("value"));
            $("#bobot-nilai-tg-value-text").val($("#bobot-nilai-tg").slider("value"));

            $("#bobot-nilai-nh").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_nh,
                slide: function (event, ui) {
                    $("#bobot-nilai-nh-value").text(ui.value);
                    $("#bobot-nilai-nh-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-nh-value").text($("#bobot-nilai-nh").slider("value"));
            $("#bobot-nilai-nh-value-text").val($("#bobot-nilai-nh").slider("value"))
            


             $("#bobot-nilai-uts").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_uts,
                slide: function (event, ui) {
                    $("#bobot-nilai-uts-value").text(ui.value);
                    $("#bobot-nilai-uts-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-uts-value").text($("#bobot-nilai-uts").slider("value"));
            $("#bobot-nilai-uts-value-text").val($("#bobot-nilai-uts").slider("value"));


            $("#bobot-nilai-uas").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_uas,
                slide: function (event, ui) {
                    $("#bobot-nilai-uas-value").text(ui.value);
                    $("#bobot-nilai-uas-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-uas-value").text($("#bobot-nilai-uas").slider("value"));
            $("#bobot-nilai-uas-value-text").val($("#bobot-nilai-uas").slider("value"));


            $("#bobot-nilai-ps").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_ps,
                slide: function (event, ui) {
                    $("#bobot-nilai-ps-value").text(ui.value);
                    $("#bobot-nilai-ps-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-ps-value").text($("#bobot-nilai-ps").slider("value"));
            $("#bobot-nilai-ps-value-text").val($("#bobot-nilai-ps").slider("value"));



            $("#bobot-nilai-pr").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_pr,
                slide: function (event, ui) {
                    $("#bobot-nilai-pr-value").text(ui.value);
                    $("#bobot-nilai-pr-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-pr-value").text($("#bobot-nilai-pr").slider("value"));
            $("#bobot-nilai-pr-value-text").val($("#bobot-nilai-pr").slider("value"));


            $("#bobot-nilai-po").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: data.bobot_po,
                slide: function (event, ui) {
                    $("#bobot-nilai-po-value").text(ui.value);
                    $("#bobot-nilai-po-value-text").val(ui.value);
                }
            });

            $("#bobot-nilai-po-value").text($("#bobot-nilai-po").slider("value"));
            $("#bobot-nilai-po-value-text").val($("#bobot-nilai-po").slider("value"));





			
            Metronic.unblockUI('#edit-data-process');
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            Metronic.unblockUI('#edit-data-process');
            DataPesanError1();

        }
    });

});
 	

  
  
});
 
 
 
 
function update()
{   
    Metronic.blockUI({
                target: '#edit-data-process',
                boxed: true,
                message: 'Proses Mengupdate Data...',
                cenrerY: true,
                animate: false
            });
    $('#btnUpdate').text('Update Data...'); //change button text
    
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/ajax_update_bobotnilai')?>",
        type: "POST",
        data: $('#form-bobotnilai').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {	
            	Metronic.unblockUI('#edit-data-process');
                DataPesan();
                window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);
                
            }
            else
            {
            	 $("#data-error-notif").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {
                     var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-sekolah'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                }
                Metronic.unblockUI('#edit-data-process');
            }
            $('#btnUpdate').text(' Simpan Data').prepend(' <i class="fa fa-plus-circle"></i>');
            //$('#btnUpdate').text('Update Wali'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
        	Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnUpdate').text(' Simpan Data').prepend(' <i class="fa fa-plus-circle"></i>');
            $('#btnUpdate').attr('disabled',false); //set button enable

 
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
TableOfaniOtomatis.init();
//ComponentsPickers.init();
//ComponentsFormTools.init();
//ComponentsDropdowns.init();
   
});
</script>
<!-- SCRIPTS KONFIGURASI AKTIVASI SISTEM -->