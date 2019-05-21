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
   


   

   $('#form-aktivasi')[0].reset();
    $("#data-select2-tahunajaran").val('').trigger("change");
    $("#data-select2-tahunajaran-client").val('').trigger("change");
   $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_aktivasi')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="aktivasi_tahun_ajaran_admin"]').val(data.aktivasi_tahun_ajaran_admin);
            $('[name="aktivasi_semester_admin"]').val(data.aktivasi_semester_admin);

              $('[name="aktivasi_tahun_ajaran_client"]').val(data.aktivasi_tahun_ajaran_client);
            $('[name="aktivasi_semester_client"]').val(data.aktivasi_semester_client);
            //$('[name="aktivasi_login_siswa"]').val(data.aktivasi_login_siswa);
             $("#data-select2-tahunajaran").val(data.aktivasi_tahun_ajaran_admin).trigger("change");
             $("#data-select2-tahunajaran-client").val(data.aktivasi_tahun_ajaran_client).trigger("change");

 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });

  $('[name="aktivasi_login_siswa"]').on('switchChange.bootstrapSwitch', function(event, state) {
  //console.log(this); // DOM element
  //console.log(event); // jQuery event
  //console.log(state); // true | false
  if ($('[name="aktivasi_login_siswa"]').val()=='1'){
							 $('[name="aktivasi_login_siswa"]').val('2');

						} else {

							$('[name="aktivasi_login_siswa"]').val('1');
						}


});

    $('[name="aktivasi_login_guru"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_login_guru"]').val()=='1'){
							 $('[name="aktivasi_login_guru"]').val('2');

						} else {

							$('[name="aktivasi_login_guru"]').val('1');
						}


});

 $('[name="aktivasi_edit_biodata_siswa"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_edit_biodata_siswa"]').val()=='1'){
							 $('[name="aktivasi_edit_biodata_siswa"]').val('2');

						} else {

							$('[name="aktivasi_edit_biodata_siswa"]').val('1');
						}


});

  $('[name="aktivasi_edit_biodata_guru"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_edit_biodata_guru"]').val()=='1'){
							 $('[name="aktivasi_edit_biodata_guru"]').val('2');

						} else {

							$('[name="aktivasi_edit_biodata_guru"]').val('1');
						}


});

   $('[name="aktivasi_indikatornilai_siswa"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_indikatornilai_siswa"]').val()=='1'){
               $('[name="aktivasi_indikatornilai_siswa"]').val('2');

            } else {

              $('[name="aktivasi_indikatornilai_siswa"]').val('1');
            }


});

   $('[name="aktivasi_cetakraport_siswa"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_cetakraport_siswa"]').val()=='1'){
               $('[name="aktivasi_cetakraport_siswa"]').val('2');

            } else {

              $('[name="aktivasi_cetakraport_siswa"]').val('1');
            }


});

   $('[name="aktivasi_rangkingkelas_siswa"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_rangkingkelas_siswa"]').val()=='1'){
               $('[name="aktivasi_rangkingkelas_siswa"]').val('2');

            } else {

              $('[name="aktivasi_rangkingkelas_siswa"]').val('1');
            }


});

   $('[name="aktivasi_kirimnilaimapel_guru"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_kirimnilaimapel_guru"]').val()=='1'){
               $('[name="aktivasi_kirimnilaimapel_guru"]').val('2');

            } else {

              $('[name="aktivasi_kirimnilaimapel_guru"]').val('1');
            }


});

   $('[name="aktivasi_editnilaimapel_guru"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_editnilaimapel_guru"]').val()=='1'){
               $('[name="aktivasi_editnilaimapel_guru"]').val('2');

            } else {

              $('[name="aktivasi_editnilaimapel_guru"]').val('1');
            }


});

   $('[name="aktivasi_kirimabsensi_gurubp"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_kirimabsensi_gurubp"]').val()=='1'){
               $('[name="aktivasi_kirimabsensi_gurubp"]').val('2');

            } else {

              $('[name="aktivasi_kirimabsensi_gurubp"]').val('1');
            }


});

   $('[name="aktivasi_kirimnilaieskulwajib_gurubp"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_kirimnilaieskulwajib_gurubp"]').val()=='1'){
               $('[name="aktivasi_kirimnilaieskulwajib_gurubp"]').val('2');

            } else {

              $('[name="aktivasi_kirimnilaieskulwajib_gurubp"]').val('1');
            }


});

    $('[name="aktivasi_editnilaieskulwajib_gurubp"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_editnilaieskulwajib_gurubp"]').val()=='1'){
               $('[name="aktivasi_editnilaieskulwajib_gurubp"]').val('2');

            } else {

              $('[name="aktivasi_editnilaieskulwajib_gurubp"]').val('1');
            }


});

    $('[name="aktivasi_kirimnilaieskulnonwajib_gurubp"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_kirimnilaieskulnonwajib_gurubp"]').val()=='1'){
               $('[name="aktivasi_kirimnilaieskulnonwajib_gurubp"]').val('2');

            } else {

              $('[name="aktivasi_kirimnilaieskulnonwajib_gurubp"]').val('1');
            }


});

    $('[name="aktivasi_editnilaieskulnonwajib_gurubp"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_editnilaieskulnonwajib_gurubp"]').val()=='1'){
               $('[name="aktivasi_editnilaieskulnonwajib_gurubp"]').val('2');

            } else {

              $('[name="aktivasi_editnilaieskulnonwajib_gurubp"]').val('1');
            }


});

    $('[name="aktivasi_kirimnilaisikap_walikelas"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_kirimnilaisikap_walikelas"]').val()=='1'){
               $('[name="aktivasi_kirimnilaisikap_walikelas"]').val('2');

            } else {

              $('[name="aktivasi_kirimnilaisikap_walikelas"]').val('1');
            }


});

    $('[name="aktivasi_editnilaisikap_walikelas"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_editnilaisikap_walikelas"]').val()=='1'){
               $('[name="aktivasi_editnilaisikap_walikelas"]').val('2');

            } else {

              $('[name="aktivasi_editnilaisikap_walikelas"]').val('1');
            }


});

    $('[name="aktivasi_monitornilai_walikelas"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_monitornilai_walikelas"]').val()=='1'){
               $('[name="aktivasi_monitornilai_walikelas"]').val('2');

            } else {

              $('[name="aktivasi_monitornilai_walikelas"]').val('1');
            }


});

    $('[name="aktivasi_cetakraport_walikelas"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_cetakraport_walikelas"]').val()=='1'){
               $('[name="aktivasi_cetakraport_walikelas"]').val('2');

            } else {

              $('[name="aktivasi_cetakraport_walikelas"]').val('1');
            }


});

     $('[name="aktivasi_rangkingkelas_walikelas"]').on('switchChange.bootstrapSwitch', function(event, state) {
  if ($('[name="aktivasi_rangkingkelas_walikelas"]').val()=='1'){
               $('[name="aktivasi_rangkingkelas_walikelas"]').val('2');

            } else {

              $('[name="aktivasi_rangkingkelas_walikelas"]').val('1');
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
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/get_aktivasi')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 			 $('[name="aktivasi_tahun_ajaran_admin"]').val(data.aktivasi_tahun_ajaran_admin);
       $('[name="aktivasi_tahun_ajaran_client"]').val(data.aktivasi_tahun_ajaran_client);
            $('[name="aktivasi_semester_admin"]').val(data.aktivasi_semester_admin);
            $('[name="aktivasi_semester_client"]').val(data.aktivasi_semester_client);
            //$('[name="aktivasi_login_siswa"]').val(data.aktivasi_login_siswa);
             $("#data-select2-tahunajaran").val(data.aktivasi_tahun_ajaran_admin).trigger("change");
             $("#data-select2-tahunajaran-client").val(data.aktivasi_tahun_ajaran_client).trigger("change");
          

          	
			
			if (data.aktivasi_login_siswa == '1' ) {
          		$('[name="aktivasi_login_siswa"]').bootstrapSwitch('state',true);
          		
          	} else {
          		$('[name="aktivasi_login_siswa"]').bootstrapSwitch('state',false);
          	};


          	if (data.aktivasi_login_guru == '1' ) {
          		$('[name="aktivasi_login_guru"]').bootstrapSwitch('state',true);
          		
          	} else {
          		$('[name="aktivasi_login_guru"]').bootstrapSwitch('state',false);
          	};

          	if (data.aktivasi_edit_biodata_siswa == '1' ) {
          		$('[name="aktivasi_edit_biodata_siswa"]').bootstrapSwitch('state',true);
          		
          	} else {
          		$('[name="aktivasi_edit_biodata_siswa"]').bootstrapSwitch('state',false);
          	};
           

           if (data.aktivasi_edit_biodata_guru == '1' ) {
          		$('[name="aktivasi_edit_biodata_guru"]').bootstrapSwitch('state',true);
          		
          	} else {
          		$('[name="aktivasi_edit_biodata_guru"]').bootstrapSwitch('state',false);
          	};


            if (data.aktivasi_indikatornilai_siswa == '1' ) {
              $('[name="aktivasi_indikatornilai_siswa"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_indikatornilai_siswa"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_cetakraport_siswa == '1' ) {
              $('[name="aktivasi_cetakraport_siswa"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_cetakraport_siswa"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_rangkingkelas_siswa == '1' ) {
              $('[name="aktivasi_rangkingkelas_siswa"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_rangkingkelas_siswa"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_kirimnilaimapel_guru == '1' ) {
              $('[name="aktivasi_kirimnilaimapel_guru"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_kirimnilaimapel_guru"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_editnilaimapel_guru == '1' ) {
              $('[name="aktivasi_editnilaimapel_guru"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_editnilaimapel_guru"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_kirimabsensi_gurubp == '1' ) {
              $('[name="aktivasi_kirimabsensi_gurubp"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_kirimabsensi_gurubp"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_kirimnilaieskulwajib_gurubp == '1' ) {
              $('[name="aktivasi_kirimnilaieskulwajib_gurubp"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_kirimnilaieskulwajib_gurubp"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_editnilaieskulwajib_gurubp == '1' ) {
              $('[name="aktivasi_editnilaieskulwajib_gurubp"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_editnilaieskulwajib_gurubp"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_kirimnilaieskulnonwajib_gurubp == '1' ) {
              $('[name="aktivasi_kirimnilaieskulnonwajib_gurubp"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_kirimnilaieskulnonwajib_gurubp"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_editnilaieskulnonwajib_gurubp == '1' ) {
              $('[name="aktivasi_editnilaieskulnonwajib_gurubp"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_editnilaieskulnonwajib_gurubp"]').bootstrapSwitch('state',false);
            };

             if (data.aktivasi_kirimnilaisikap_walikelas == '1' ) {
              $('[name="aktivasi_kirimnilaisikap_walikelas"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_kirimnilaisikap_walikelas"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_editnilaisikap_walikelas == '1' ) {
              $('[name="aktivasi_editnilaisikap_walikelas"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_editnilaisikap_walikelas"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_monitornilai_walikelas == '1' ) {
              $('[name="aktivasi_monitornilai_walikelas"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_monitornilai_walikelas"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_cetakraport_walikelas == '1' ) {
              $('[name="aktivasi_cetakraport_walikelas"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_cetakraport_walikelas"]').bootstrapSwitch('state',false);
            };

            if (data.aktivasi_rangkingkelas_walikelas == '1' ) {
              $('[name="aktivasi_rangkingkelas_walikelas"]').bootstrapSwitch('state',true);
              
            } else {
              $('[name="aktivasi_rangkingkelas_walikelas"]').bootstrapSwitch('state',false);
            };
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
 
 
 

function get_jumlah() {
   
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/count/hitung')?>",
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            $('#raport-semester').empty();
            $('#raport-semester').append('TH : <b>'+data.tahun_admin+'</b> | <b>'+data.semester_admin+'</b>' );

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
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/ajax_update_aktivasi')?>",
        type: "POST",
        data: $('#form-aktivasi').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {	
            	Metronic.unblockUI('#edit-data-process');
                get_jumlah();
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