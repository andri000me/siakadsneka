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

<script type="text/javascript" src="<?php echo site_url() ?>/raport_themes/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo site_url() ?>/raport_themes/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>



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
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-siswa.js"></script>
<script src="<?php echo site_url() ?>/raport_themes/assets/admin/pages/scripts/portfolio.js"></script>


<script type="text/javascript">


jQuery(document).ready(function() {
    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  
    

      $.ajax({
        url : "<?php echo site_url() ?>siswa/myprofile/dataku",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            

            //$('[name="siswa_"]').val(data.siswa_);

            //Personal Info
            $('[name="siswa_nama"]').val(data.siswa_nama);
            $('[name="siswa_nis"]').val(data.siswa_nis);
            $('[name="siswa_nisn"]').val(data.siswa_nisn);
            $('[name="siswa_nomorijazah"]').val(data.siswa_nomorijazah);
            $('[name="siswa_tahunijazah"]').val(data.siswa_tahunijazah);
            $('[name="siswa_email"]').val(data.siswa_email);
            $('[name="siswa_agama"]').val(data.siswa_agama);
            $('[name="siswa_handphone"]').val(data.siswa_handphone);
            $('[name="siswa_jeniskelamin"]').val(data.siswa_jeniskelamin);
            $('[name="siswa_statuskeluarga"]').val(data.siswa_statuskeluarga);
            $('[name="siswa_urutansaudara"]').val(data.siswa_urutansaudara);
            $('[name="siswa_tempatlahir"]').val(data.siswa_tempatlahir);
            $('[name="siswa_tanggallahir"]').val(data.siswa_tanggallahir);
            $('[name="siswa_telprumah"]').val(data.siswa_telprumah);
            $('[name="siswa_hobi"]').val(data.siswa_hobi);
            $('[name="siswa_asalsekolah"]').val(data.siswa_asalsekolah);
            $('[name="siswa_alamat"]').val(data.siswa_alamat);

            $("#siswa-agama").val(data.siswa_agama).trigger("change");
            $("#siswa-jeniskelamin").val(data.siswa_jeniskelamin).trigger("change");


            //Ayah Info
            $('[name="siswa_namaayah"]').val(data.siswa_namaayah);
            $('[name="siswa_pekerjaanayah"]').val(data.siswa_pekerjaanayah);
            $('[name="siswa_pendidikanayah"]').val(data.siswa_pendidikanayah);
            $('[name="siswa_penghasilanayah"]').val(data.siswa_penghasilanayah);
            $('[name="siswa_notelpayah"]').val(data.siswa_notelpayah);
            $('[name="siswa_alamatayah"]').val(data.siswa_alamatayah);

            $("#siswa-pendidikanayah").val(data.siswa_pendidikanayah).trigger("change");
            $("#siswa-penghasilanayah").val(data.siswa_penghasilanayah).trigger("change");


            //ibu Info
            $('[name="siswa_namaibu"]').val(data.siswa_namaibu);
            $('[name="siswa_pekerjaanibu"]').val(data.siswa_pekerjaanibu);
            $('[name="siswa_pendidikanibu"]').val(data.siswa_pendidikanibu);
            $('[name="siswa_penghasilanibu"]').val(data.siswa_penghasilanibu);
            $('[name="siswa_notelpibu"]').val(data.siswa_notelpibu);
            $('[name="siswa_alamatibu"]').val(data.siswa_alamatibu);

             $("#siswa-pendidikanibu").val(data.siswa_pendidikanibu).trigger("change");
            $("#siswa-penghasilanibu").val(data.siswa_penghasilanibu).trigger("change");


            //wali Info
            $('[name="siswa_namawali"]').val(data.siswa_namawali);
            $('[name="siswa_pekerjaanwali"]').val(data.siswa_pekerjaanwali);
            $('[name="siswa_pendidikanwali"]').val(data.siswa_pendidikanwali);
            $('[name="siswa_penghasilanwali"]').val(data.siswa_penghasilanwali);
            $('[name="siswa_notelpwali"]').val(data.siswa_notelpwali);
            $('[name="siswa_alamatwali"]').val(data.siswa_alamatwali);

             $("#siswa-pendidikanwali").val(data.siswa_pendidikanwali).trigger("change");
            $("#siswa-penghasilanwali").val(data.siswa_penghasilanwali).trigger("change");



             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

          
             //$("#thum-gambar").attr({
            //"src" : "<?php echo site_url() ?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
            //});
              //$("#link-gambar").attr({
            //"href" : data.sekolah_alamatweb,
            //});
            
            
            $('#nama-siswa').append().text(data.siswa_nama);
            $('#jurusan-siswa').append().text(data.kelas_kk);

             $('#siswa-nis').append().text(data.siswa_nis);
            $('#siswa-kelas').append().text(data.kelas_nama);


             
            
           
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });


    $('#form-update-siswa')[0].reset();
    $(':reset').live('click', function(){
    var $r = $(this);
    setTimeout(function(){ 
        $r.closest('form').find('.select2-offscreen').trigger('change'); 
    }, 10);
});

$('#siswa-tanggal').click(function() {   // for select box
      
       $(this).datepicker('setDate', $(this).val());
         
} );



    $('.date-picker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
    });



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
        url : "<?php echo site_url() ?>siswa/myprofile/dataku",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
           
            //$('[name="siswa_"]').val(data.siswa_);

            //Personal Info
            $('[name="siswa_nama"]').val(data.siswa_nama);
            $('[name="siswa_nis"]').val(data.siswa_nis);
            $('[name="siswa_nisn"]').val(data.siswa_nisn);
            $('[name="siswa_nomorijazah"]').val(data.siswa_nomorijazah);
            $('[name="siswa_tahunijazah"]').val(data.siswa_tahunijazah);
            $('[name="siswa_email"]').val(data.siswa_email);
            $('[name="siswa_agama"]').val(data.siswa_agama);
            $('[name="siswa_handphone"]').val(data.siswa_handphone);
            $('[name="siswa_jeniskelamin"]').val(data.siswa_jeniskelamin);
            $('[name="siswa_statuskeluarga"]').val(data.siswa_statuskeluarga);
            $('[name="siswa_urutansaudara"]').val(data.siswa_urutansaudara);
            $('[name="siswa_tempatlahir"]').val(data.siswa_tempatlahir);
            $('[name="siswa_tanggallahir"]').val(data.siswa_tanggallahir);
            $('[name="siswa_telprumah"]').val(data.siswa_telprumah);
            $('[name="siswa_hobi"]').val(data.siswa_hobi);
            $('[name="siswa_asalsekolah"]').val(data.siswa_asalsekolah);
            $('[name="siswa_alamat"]').val(data.siswa_alamat);

            $("#siswa-agama").val(data.siswa_agama).trigger("change");
            $("#siswa-jeniskelamin").val(data.siswa_jeniskelamin).trigger("change");


            //Ayah Info
            $('[name="siswa_namaayah"]').val(data.siswa_namaayah);
            $('[name="siswa_pekerjaanayah"]').val(data.siswa_pekerjaanayah);
            $('[name="siswa_pendidikanayah"]').val(data.siswa_pendidikanayah);
            $('[name="siswa_penghasilanayah"]').val(data.siswa_penghasilanayah);
            $('[name="siswa_notelpayah"]').val(data.siswa_notelpayah);
            $('[name="siswa_alamatayah"]').val(data.siswa_alamatayah);

            $("#siswa-pendidikanayah").val(data.siswa_pendidikanayah).trigger("change");
            $("#siswa-penghasilanayah").val(data.siswa_penghasilanayah).trigger("change");


            //ibu Info
            $('[name="siswa_namaibu"]').val(data.siswa_namaibu);
            $('[name="siswa_pekerjaanibu"]').val(data.siswa_pekerjaanibu);
            $('[name="siswa_pendidikanibu"]').val(data.siswa_pendidikanibu);
            $('[name="siswa_penghasilanibu"]').val(data.siswa_penghasilanibu);
            $('[name="siswa_notelpibu"]').val(data.siswa_notelpibu);
            $('[name="siswa_alamatibu"]').val(data.siswa_alamatibu);

             $("#siswa-pendidikanibu").val(data.siswa_pendidikanibu).trigger("change");
            $("#siswa-penghasilanibu").val(data.siswa_penghasilanibu).trigger("change");


            //wali Info
            $('[name="siswa_namawali"]').val(data.siswa_namawali);
            $('[name="siswa_pekerjaanwali"]').val(data.siswa_pekerjaanwali);
            $('[name="siswa_pendidikanwali"]').val(data.siswa_pendidikanwali);
            $('[name="siswa_penghasilanwali"]').val(data.siswa_penghasilanwali);
            $('[name="siswa_notelpwali"]').val(data.siswa_notelpwali);
            $('[name="siswa_alamatwali"]').val(data.siswa_alamatwali);

             $("#siswa-pendidikanwali").val(data.siswa_pendidikanwali).trigger("change");
            $("#siswa-penghasilanwali").val(data.siswa_penghasilanwali).trigger("change");



             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

          
             //$("#thum-gambar").attr({
            //"src" : "<?php echo site_url() ?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
            //});
              //$("#link-gambar").attr({
            //"href" : data.sekolah_alamatweb,
            //});
            
            
            $('#nama-siswa').append().text(data.siswa_nama);
            $('#jurusan-siswa').append().text(data.kelas_kk);

             $('#siswa-nis').append().text(data.siswa_nis);
            $('#siswa-kelas').append().text(data.kelas_nama);
            

          





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

function update_form() {
   $.ajax({
        url : "<?php echo site_url() ?>siswa/myprofile/dataku",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //$('[name="siswa_"]').val(data.siswa_);

            //Personal Info
            $('[name="siswa_nama"]').val(data.siswa_nama);
            $('[name="siswa_nis"]').val(data.siswa_nis);
            $('[name="siswa_nisn"]').val(data.siswa_nisn);
            $('[name="siswa_nomorijazah"]').val(data.siswa_nomorijazah);
            $('[name="siswa_tahunijazah"]').val(data.siswa_tahunijazah);
            $('[name="siswa_email"]').val(data.siswa_email);
            $('[name="siswa_agama"]').val(data.siswa_agama);
            $('[name="siswa_handphone"]').val(data.siswa_handphone);
            $('[name="siswa_jeniskelamin"]').val(data.siswa_jeniskelamin);
            $('[name="siswa_statuskeluarga"]').val(data.siswa_statuskeluarga);
            $('[name="siswa_urutansaudara"]').val(data.siswa_urutansaudara);
            $('[name="siswa_tempatlahir"]').val(data.siswa_tempatlahir);
            $('[name="siswa_tanggallahir"]').val(data.siswa_tanggallahir);
            $('[name="siswa_telprumah"]').val(data.siswa_telprumah);
            $('[name="siswa_hobi"]').val(data.siswa_hobi);
            $('[name="siswa_asalsekolah"]').val(data.siswa_asalsekolah);
            $('[name="siswa_alamat"]').val(data.siswa_alamat);

            $("#siswa-agama").val(data.siswa_agama).trigger("change");
            $("#siswa-jeniskelamin").val(data.siswa_jeniskelamin).trigger("change");


            //Ayah Info
            $('[name="siswa_namaayah"]').val(data.siswa_namaayah);
            $('[name="siswa_pekerjaanayah"]').val(data.siswa_pekerjaanayah);
            $('[name="siswa_pendidikanayah"]').val(data.siswa_pendidikanayah);
            $('[name="siswa_penghasilanayah"]').val(data.siswa_penghasilanayah);
            $('[name="siswa_notelpayah"]').val(data.siswa_notelpayah);
            $('[name="siswa_alamatayah"]').val(data.siswa_alamatayah);

            $("#siswa-pendidikanayah").val(data.siswa_pendidikanayah).trigger("change");
            $("#siswa-penghasilanayah").val(data.siswa_penghasilanayah).trigger("change");


            //ibu Info
            $('[name="siswa_namaibu"]').val(data.siswa_namaibu);
            $('[name="siswa_pekerjaanibu"]').val(data.siswa_pekerjaanibu);
            $('[name="siswa_pendidikanibu"]').val(data.siswa_pendidikanibu);
            $('[name="siswa_penghasilanibu"]').val(data.siswa_penghasilanibu);
            $('[name="siswa_notelpibu"]').val(data.siswa_notelpibu);
            $('[name="siswa_alamatibu"]').val(data.siswa_alamatibu);

             $("#siswa-pendidikanibu").val(data.siswa_pendidikanibu).trigger("change");
            $("#siswa-penghasilanibu").val(data.siswa_penghasilanibu).trigger("change");


            //wali Info
            $('[name="siswa_namawali"]').val(data.siswa_namawali);
            $('[name="siswa_pekerjaanwali"]').val(data.siswa_pekerjaanwali);
            $('[name="siswa_pendidikanwali"]').val(data.siswa_pendidikanwali);
            $('[name="siswa_penghasilanwali"]').val(data.siswa_penghasilanwali);
            $('[name="siswa_notelpwali"]').val(data.siswa_notelpwali);
            $('[name="siswa_alamatwali"]').val(data.siswa_alamatwali);

             $("#siswa-pendidikanwali").val(data.siswa_pendidikanwali).trigger("change");
            $("#siswa-penghasilanwali").val(data.siswa_penghasilanwali).trigger("change");



             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

          
             //$("#thum-gambar").attr({
            //"src" : "<?php echo site_url() ?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
            //});
              //$("#link-gambar").attr({
            //"href" : data.sekolah_alamatweb,
            //});
            
            
            $('#nama-siswa').append().text(data.siswa_nama);
            $('#jurusan-siswa').append().text(data.kelas_kk);

             $('#siswa-nis').append().text(data.siswa_nis);
            $('#siswa-kelas').append().text(data.kelas_nama);
            

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            
    

            $("#thum-gambar").attr({
            "src" : "<?php echo site_url() ?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
            });
              $("#thum-gambar2").attr({
            "src" : "<?php echo site_url() ?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
            });

               $("#profile-siswa").attr({
            "src" : "<?php echo site_url() ?>raport_files/foto/chat/"+data.siswa_foto,
            });
              //$("#link-gambar").attr({
            //"href" : data.sekolah_alamatweb,
            //});
            $("#full-gambar").attr({
            "href" : "<?php echo site_url() ?>raport_files/foto/siswa/full/"+data.siswa_foto,
            "title" : data.siswa_nis +"-"+ data.siswa_nama
            });
                $('#alamat-gambar').text(data.siswa_nis);
                $('#nama-gambar').text(data.siswa_nama);
                $('#nama-siswa').append().text(data.siswa_nama);
                $('#jurusan-siswa').append().text(data.kelas_kk);
                $('#siswa-kelas').append().text(data.kelas_nama);
                $('#siswa-nis').append().text(data.siswa_nis);
                $('#nama-siswa2').append().text(data.siswa_nama);

         

             

 
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
       var formData = new FormData( $("#form-update-siswa")[0] );
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url() ?>siswa/myprofile/ajax_update_siswa",
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
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else if (ofani == 'sukses') {
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-warning alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Data foto berhasil terupload .');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-danger alert-dismissable fade in')   // add a class
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
                    $(".error-data-guru").fadeTo(1500, 0).slideUp(500, function(){
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
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                }

                Metronic.unblockUI('#edit-data-process');
            }
            //$('#btnUpdate').text(' Simpan Data').prepend(' <i class="fa fa-plus-circle"></i>');
            //$('#btnUpdate').text('Update Wali'); //change button text
            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            //$('#btnUpdate').text(' Simpan Data').prepend(' <i class="fa fa-plus-circle"></i>');
            
 
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
Portfolio.init();
ComponentsDropdowns.init();

});
</script>

<!-- SCRIPTS MY PROFILE SISWA-->