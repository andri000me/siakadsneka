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
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-siswa.js"></script>


<script type="text/javascript">


jQuery(document).ready(function() {
    $.getScript('<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-toastr-mapel.js');  
    
$('#kelas-cari-modal').prop('disabled', true);

$('#tahun-cari-modal').click(function() {   // for select box
      
   
     var str = $('#tahun-cari-modal').val();
    var res = str.replace("/", "-"); 
    if($(this).val() == "")
      {
         $("#kelas-cari-modal").val('').trigger("change");
          $('#kelas-cari-modal').prop('disabled', true);
    
        //alert($('#kelas-cari').val());
      }
      else
      {
        $.post("<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/cari_kelas_modal')?>/" + res, {} ,function(obj){
    $('#kelas-cari-modal').html(obj);
    });
    
     $("#kelas-cari-modal").val('').trigger("change");
     //$('#btnSave').closest('form').find('.select2-offscreen').trigger('change');$("#status-siswa-cari").val('').trigger("change");
     $('#kelas-cari-modal').prop('disabled', false);

      //alert($('#kelas-cari').val());
      }
      
         

      
} );


	
    $("#tahun-cari-modal").val('').trigger("change");
    $("#kelas-cari-modal").val('').trigger("change");
    $("#generate_nis").val('');
 
       $('#form-siswa')[0].reset();
    $(':reset').live('click', function(){
    $('#form-siswa')[0].reset();
    var $r = $(this);
    setTimeout(function(){ 
       $("#tambah-siswa-kelas tbody tr td input").val('');
        $("#tambah-siswa-kelas tbody tr td:nth-child(6) select").val('L').trigger('change');
        $r.closest('form').find('.select2-offscreen').trigger('change'); 
    }, 10);




   
    
});

  
 
});

$(document).live('click', '.datanis-siswa-tambah2 .dataabsen-siswa-tambah' ,function() {
    $(".datanis-siswa-tambah2").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        });

    $(".dataabsen-siswa-tambah").inputmask({
            "mask": "9",
            "repeat": 2,
            "greedy": false
        });
});
 

function set_form() {
	$("#data-error-notif-top").empty();
     	   Metronic.blockUI({
                target: '#set-form-process',
                animate: true
            });

     	    
  		if ($("#tahun-cari-modal").val() == '') {
  			var error;
  			error = '<i class=\"fa fa-warning\"><\/i> <strong> Set form failed :<\/strong>  Anda belum memilih <b>tahun angkatan</b> siswa.';
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ error);
                  $('#data-error-notif-top').append($newDiv);
               Metronic.unblockUI('#set-form-process');
  		} else if ($("#kelas-cari-modal").val() == '') {
  				var error2;
  				error2 = '<i class=\"fa fa-warning\"><\/i> <strong> Set form failed :<\/strong>  Anda belum memilih <b>nama kelas</b> siswa.';
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ error2);
                 $('#data-error-notif-top').append($newDiv);
                Metronic.unblockUI('#set-form-process');
  		} else {
  			var datakelas = $('#kelas-cari-modal').val();
  			$.post("<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/cari_kelas_nama')?>/" + datakelas, {} ,function(obj){
    		$('.setkelas').val(obj);
   			 });

  			//alert($('#tambah-siswa-kelas tbody tr').length);
  			var barisabsen = $('#tambah-siswa-kelas tbody tr td:first-child').map(function()
   			 {
       		 return parseInt($(this).text());
    		}).get();

    		var datanis = parseInt($("#generate_nis").val());
    		var datanis2 = $("#generate_nis").val();

  			var tabelsiswa = $('#tambah-siswa-kelas tbody tr').length;
  			for (var i = 1; i <= tabelsiswa; i++)
                {	
                    $("#siswa-absen"+barisabsen[i-1]).val([i]);
                    $("#tambah-siswa-kelas tbody tr td:nth-child(2) input").val('');
                }

                if (datanis2 == '') {

                	$("#siswa_nis").val('');
                } else {
                	for (var i = 1, nis = datanis; i <= tabelsiswa; i++)
                {
                    $("#siswa-nis"+barisabsen[i-1]).val(nis);
                    nis += 1;
                }
                }

               

  			$(".setidkelas").val($("#kelas-cari-modal").val());
  			$(".setangkatan").val($("#tahun-cari-modal").val());
  			 Metronic.unblockUI('#set-form-process');
  		}
}
 function tambahbaris() {
 	var dataabsen2;
 	var datanis2;

 	var barisnomor = parseInt($('#tambah-siswa-kelas tbody tr:last-child td:first-child').text()) + 1 ;

 	var datakelas = $('#tambah-siswa-kelas tbody tr:last-child td:eq(3) input').val();
 	var dataidkelas = $('#tambah-siswa-kelas tbody tr:last-child td:eq(3) input:eq(1)').val();
 	var dataabsen = $('#tambah-siswa-kelas tbody tr:last-child td:eq(4) input').val();
 	var dataangkatan = $('#tambah-siswa-kelas tbody tr:last-child td:eq(6) input').val();
 	var datanis = $('#tambah-siswa-kelas tbody tr:last-child td:eq(1) input').val();
 	



	if (dataabsen == '') {
		dataabsen2 = '';
	} else{
		dataabsen2 = parseInt($('#tambah-siswa-kelas tbody tr:last-child td:eq(4) input').val()) + 1;
	}

	if (datanis == '') {
		datanis2 = '';
	} else{
		datanis2 = parseInt($('#tambah-siswa-kelas tbody tr:last-child td:eq(1) input').val()) + 1;
	}

 	var databaris = '<tr class="odd gradeX"><td>'+ barisnomor +'</td><td style="text-align:center;"><div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span><input value="'+ datanis2 +'" id="siswa-nis'+barisnomor+'" name="siswa_nis['+barisnomor+']" type="text" placeholder="NIS" class="form-control input-nis-siswa datanis-siswa-tambah2" ></div></td><td><div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input name="siswa_nama['+barisnomor+']" type="text" placeholder="Nama Siswa" class="form-control input-nama-siswa" ></div></td><td style="text-align:center;"><input value="'+datakelas+'" style="text-align:center;" type="text"  size="2" disabled="" class="form-control setkelas  input-kelas-siswa" ><input value="'+dataidkelas+'" type="hidden"  size="2" name="siswa_kelas['+barisnomor+']"  class="form-control setidkelas" ></td><td style="text-align:center;"><input value="'+ dataabsen2 +'" name="siswa_absen['+barisnomor+']" type="text" placeholder="No" class="form-control dataabsen-siswa-tambah" id="siswa-absen'+barisnomor+'" ></td><td style="text-align:center;"><select name="siswa_jeniskelamin['+barisnomor+']" class="form-control bs-select input-jk-siswa" ><option value="L">Laki-Laki</option><option value="P">Perempuan</option></select></td><td><input value="'+dataangkatan+'" style="text-align:center;" type="text"  size="2" name="siswa_angkatan['+barisnomor+']" disabled="" class="form-control setangkatan siswa-tahun input-tahun-siswa" ></td><td style="text-align:center"><a  id="baris-hapus'+ barisnomor +'" onclick="hapusbaris2('+ barisnomor +')" class="btn btn-icon-only default"><i class="fa fa-trash-o"></i></a></td></tr>';


		$('#tambah-siswa-kelas tbody').append(databaris);
	

		
		
		

 }



 function hapusbaris() {
 	$("#data-error-notif-remove").empty();
 	if ($('#tambah-siswa-kelas tbody tr').length == 1 ) {

 		var error2;
  				error2 = '<i class=\"fa fa-warning\"><\/i> <strong> Remove Row failed :<\/strong>  Batasan <b>minimum</b> untuk menghapus row hanya diperbolehkan min <b>1 baris<b>.';
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-remove-row fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ error2);
                 $('#data-error-notif-remove').append($newDiv);

                window.setTimeout(function() {
                    $(".error-remove-row").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);
 	} else{
 		$('#tambah-siswa-kelas tbody tr:last-child').remove();
 	};
		

 }

 function hapusbaris2(id) {
 	$("#data-error-notif-remove").empty();
 	if ($('#tambah-siswa-kelas tbody tr').length == 1 ) {

 		var error2;
  				error2 = '<i class=\"fa fa-warning\"><\/i> <strong> Remove Row failed :<\/strong>  Batasan <b>minimum</b> untuk menghapus row hanya diperbolehkan min <b>1 baris<b>.';
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-remove-row fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ error2);
                 $('#data-error-notif-remove').append($newDiv);

                window.setTimeout(function() {
                    $(".error-remove-row").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);
 	} else{

 		
           $('#baris-hapus'+ id).parent().parent().remove();
        
 		
 	}
		

}

function clear_notif() {
    $(".remove-notif-clear").remove();

}

function save()
{   
    Metronic.blockUI({
                target: '#save-data-process',
                boxed: true,
                message: 'Proses Menyimpan...',
                cenrerY: true,
                animate: false
            });
    $('#btnSave').text('Tambah Data Siswa...'); //change button text
    
     var barisdata = $('#tambah-siswa-kelas tbody tr td:first-child').map(function()
   			 {
       		 return parseInt($(this).text());
    		}).get();

     $("#data-masuk").val(barisdata);
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/ajax_multiple_save')?>",
        type: "POST",
        data : $('#form-siswa').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 			if(data.status) //if success close modal and reload ajax table
            {
            		DataPesanAddSiswa();

		 		$('#form-siswa')[0].reset();

		 		 var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','siswa-data-ofani'+[i])  // adds the id
                 .addClass('sukses-notif-clear alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.sukses_string);
                  $('#data-sukses-siswa').append($newDiv);
                

		   
		   		 setTimeout(function(){ 
		       $("#tambah-siswa-kelas tbody tr td input").val('');
		        $("#tambah-siswa-kelas tbody tr td:nth-child(6) select").val('L').trigger('change');
		        $('#btnSave').closest('form').find('.select2-offscreen').trigger('change'); 
		    }, 10);



            window.setTimeout(function() {
                    $(".remove-notif-clear").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 10000);

             window.setTimeout(function() {
                    $(".sukses-notif-clear").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 15000);

             $('#btnSave').text(' Tambah Data Siswa').prepend(' <i class="fa fa-plus-circle"></i>');
            $('#btnSave').attr('disabled',false); //set button enable
            Metronic.unblockUI('#save-data-process');
            } else {

					 $("#data-error-siswa").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','siswa-data-ofani'+[i])  // adds the id
                 .addClass('remove-notif-clear alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                     $('#data-error-siswa').append($newDiv);
                


                //$('#data-error-mapel').remove()
                }

            Metronic.unblockUI('#save-data-process');

             $('#btnSave').text(' Tambah Data Siswa').prepend(' <i class="fa fa-plus-circle"></i>');
            $('#btnSave').attr('disabled',false); //set button enable
            } 
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#save-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnSave').text(' Tambah Data Siswa').prepend(' <i class="fa fa-plus-circle"></i>');
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

<!-- SCRIPTS DATA SISWA TAMBAH SISWA -->