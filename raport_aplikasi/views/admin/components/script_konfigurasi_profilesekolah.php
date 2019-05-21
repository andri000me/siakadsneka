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

<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo site_url('')?>raport_themes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/table-otomatis.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-profile.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/portfolio.js"></script>

<script type="text/javascript">


var save_method; //for save method string
var table;
//var dt = $('#datawali' ).DataTable();
 //var tableInitialized = false;
jQuery(document).ready(function() {
    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  
   
   $('#form-profile')[0].reset();
   $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_profile')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="sekolah_nama"]').val(data.sekolah_nama);
            $('[name="sekolah_kepala"]').val(data.sekolah_kepala);
            $('[name="sekolah_nss"]').val(data.sekolah_nss);
            $('[name="sekolah_npsn"]').val(data.sekolah_npsn);
            $('[name="sekolah_telp"]').val(data.sekolah_telp);
            $('[name="sekolah_fax"]').val(data.sekolah_fax);
            $('[name="sekolah_email"]').val(data.sekolah_email);
            $('[name="sekolah_alamatweb"]').val(data.sekolah_alamatweb);
            $('[name="sekolah_provinsi"]').val(data.sekolah_provinsi);
            $('[name="sekolah_kabupaten"]').val(data.sekolah_kabupaten);
            $('[name="sekolah_kecamatan"]').val(data.sekolah_kecamatan);
            $('[name="sekolah_kelurahan"]').val(data.sekolah_kelurahan);
            $('[name="sekolah_kodepost"]').val(data.sekolah_kodepost);
            $('[name="sekolah_alamat"]').val(data.sekolah_alamat);
            $("#thum-gambar").attr({
            "src" : "<?php echo site_url('')?>raport_files/foto/profile_sekolah/thumbnail/"+data.sekolah_foto,
            });
            $("#link-gambar").attr({
            "href" : data.sekolah_alamatweb,
            });
            $("#full-gambar").attr({
            "href" : "<?php echo site_url('')?>raport_files/foto/profile_sekolah/full/"+data.sekolah_foto,
            "title" : data.sekolah_nama
            });
            $('#alamat-gambar').text(data.sekolah_alamat);
            $('#nama-gambar').text(data.sekolah_nama);
 
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
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_profile')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="sekolah_nama"]').val(data.sekolah_nama);
            $('[name="sekolah_kepala"]').val(data.sekolah_kepala);
            $('[name="sekolah_nss"]').val(data.sekolah_nss);
            $('[name="sekolah_npsn"]').val(data.sekolah_npsn);
            $('[name="sekolah_telp"]').val(data.sekolah_telp);
            $('[name="sekolah_fax"]').val(data.sekolah_fax);
            $('[name="sekolah_email"]').val(data.sekolah_email);
            $('[name="sekolah_alamatweb"]').val(data.sekolah_alamatweb);
            $('[name="sekolah_provinsi"]').val(data.sekolah_provinsi);
            $('[name="sekolah_kabupaten"]').val(data.sekolah_kabupaten);
            $('[name="sekolah_kecamatan"]').val(data.sekolah_kecamatan);
            $('[name="sekolah_kelurahan"]').val(data.sekolah_kelurahan);
            $('[name="sekolah_kodepost"]').val(data.sekolah_kodepost);
            $('[name="sekolah_alamat"]').val(data.sekolah_alamat);
            $("#thum-gambar").attr({
            "src" : "<?php echo site_url('')?>raport_files/foto/profile_sekolah/thumbnail/"+data.sekolah_foto,
            });
            $("#link-gambar").attr({
            "href" : data.sekolah_alamatweb,
            });
            $("#full-gambar").attr({
            "href" : "<?php echo site_url('')?>raport_files/foto/profile_sekolah/full/"+data.sekolah_foto,
            "title" : data.sekolah_nama
            });
            $('#alamat-gambar').text(data.sekolah_alamat);
            $('#nama-gambar').text(data.sekolah_nama);
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
 
 
 function update_form() {
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_profile')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="sekolah_nama"]').val(data.sekolah_nama);
            $('[name="sekolah_kepala"]').val(data.sekolah_kepala);
            $('[name="sekolah_nss"]').val(data.sekolah_nss);
            $('[name="sekolah_npsn"]').val(data.sekolah_npsn);
            $('[name="sekolah_telp"]').val(data.sekolah_telp);
            $('[name="sekolah_fax"]').val(data.sekolah_fax);
            $('[name="sekolah_email"]').val(data.sekolah_email);
            $('[name="sekolah_alamatweb"]').val(data.sekolah_alamatweb);
            $('[name="sekolah_provinsi"]').val(data.sekolah_provinsi);
            $('[name="sekolah_kabupaten"]').val(data.sekolah_kabupaten);
            $('[name="sekolah_kecamatan"]').val(data.sekolah_kecamatan);
            $('[name="sekolah_kelurahan"]').val(data.sekolah_kelurahan);
            $('[name="sekolah_kodepost"]').val(data.sekolah_kodepost);
            $('[name="sekolah_alamat"]').val(data.sekolah_alamat);
            $("#thum-gambar").attr({
            "src" : "<?php echo site_url('')?>raport_files/foto/profile_sekolah/thumbnail/"+data.sekolah_foto,
            });
            $("#link-gambar").attr({
            "href" : data.sekolah_alamatweb,
            });
            $("#full-gambar").attr({
            "href" : "<?php echo site_url('')?>raport_files/foto/profile_sekolah/full/"+data.sekolah_foto,
            "title" : data.sekolah_nama
            });
            $('#alamat-gambar').text(data.sekolah_alamat);
            $('#nama-gambar').text(data.sekolah_nama);

 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });
 }
 
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
     var formData = new FormData( $("#form-profile")[0] );
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/ajax_update')?>",
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
                 .attr('id','data-profile-sekolah'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else if (ofani == 'sukses') {
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-sekolah'+[i])  // adds the id
                 .addClass('alert alert-warning alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Data foto berhasil terupload .');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-sekolah'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    }

                     
                }
                }

                $(".fileinput").fileinput("clear");
                update_form();
            	Metronic.unblockUI('#edit-data-process');
                
                DataPesan();
                window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
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
Portfolio.init();
ComponentsFormTools.init();
//ComponentsPickers.init();
//ComponentsFormTools.init();   
});
</script>
<!-- SCRIPTS KONFIGURASI PROFILE SEKOLAH -->