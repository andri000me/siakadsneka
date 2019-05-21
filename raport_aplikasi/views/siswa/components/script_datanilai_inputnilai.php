

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

     $.fn.dataTable.ext.errMode = 'throw';
    

    function handleAjaxError( xhr, textStatus, error ) {
    if ( textStatus === 'timeout' ) {
        //alert( 'The server took too long to send the data.' );
        WaktuLama();
    }
    else {
       // alert( 'An error occurred on the server. Please try again in a minute.' );
       DataPesanError5();
    }
    myDataTable.fnProcessingIndicator( false );
}

    jQuery.fn.dataTableExt.oApi.fnProcessingIndicator = function ( oSettings, onoff ) {
        if ( typeof( onoff ) == 'undefined' ) {
            onoff = true;
        }
        this.oApi._fnProcessingDisplay( oSettings, onoff );
    };




    $('#datanilaisiswa')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );


   

    table = $('#datanilaisiswa').DataTable({
        //dom: '<lf<tr>ip>',
        dom : '<"row"<"col-md-6 col-sm-12"><"col-md-6 col-sm-12">> <"table-scrollable"t><"row"<"col-md-5 col-sm-12"><"col-md-7 col-sm-12">>',
        buttons: [],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        
        "ajax": {
            "url": "<?php echo site_url('siswa/datanilai/input_nilaisiswa')?>",
            "type": "POST",
             "data" : {
                      nilai_cari_angkatan ( d ) {
                    return $("#nilai-tahun").val();
                        },
                        nilai_cari_kelas ( d ) {
                    return $("#nilai-kelas").val();
                        },
                        nilai_cari_semester ( d ) {
                    return $("#nilai-semester").val();
                        },
                        nilai_cari_mapel ( d ) {
                    return $("#nilai-mapel").val();
                        },
                        nilai_cari_category ( d ) {
                    return $("#nilai-category").val();
                        },
                        nilai_cari_aspek ( d ) {
                    return $("#nilai-aspek").val();
                        },
             },
             "timeout": 15000,
            "error": handleAjaxError // this sets up jQuery to give me errors
           
           
        },
            

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

            
            "columns": [{
                "orderable": false
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": false
            }, {
                "orderable": false
            }, {
                "orderable": true
            }, {
                "orderable": false
            }],
             "pageLength": 100,     
                    
            "pagingType": "bootstrap_full_number",
            "language": {
                "search": "Cari Data: ",
                "emptyTable": "Form Data Nilai Siswa Tidak Tersedia (Silahkan mengisi form diatas, sebelum menginput data nilai)",
               "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri ",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "search": "Search:",
                "processing":   "Sedang memproses...",
                "zeroRecords": "Form Data Nilai Siswa Tidak Tersedia (Silahkan mengisi form diatas, sebelum menginput data nilai)",

                "lengthMenu": "  _MENU_ records",
                "paginate": {
                    "first":    "Pertama",
                    "previous": "Sebelumnya",
                    "next":     "Selanjutnya",
                    "last":     "Terakhir"
                }
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0],
                
            }, {
                "searchable": false,
                "targets": [0]
            },
            { "type": "enum", "targets": [0] }
            ],

            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
          $('td:eq(1),td:eq(3),td:eq(4),td:eq(5)', nRow).addClass( "raport-mapel" );
          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();
                         $(".data-nilai-siswa").inputmask({
                            "mask": "9",
                            "repeat": 3,
                            "greedy": false
                        });

                         
                                        

                       
                       
                    }
         
          
 
    });



	$("#nilai-tahun").val('').trigger("change");
	$("#nilai-kelas").val('').trigger("change");
	$("#nilai-semester").val('').trigger("change");
	$("#nilai-mapel").val('').trigger("change");
	$("#nilai-category").val('').trigger("change");
	$("#nilai-aspek").val('').trigger("change");

	$('#nilai-kelas').prop('disabled', true);
	$('#nilai-semester').prop('disabled', true);
	$('#nilai-mapel').prop('disabled', true);
	$('#nilai-category').prop('disabled', true);
	$('#nilai-aspek').prop('disabled', true);


	$('#nilai-tahun').click(function() {   // for select box
      
   
     var str = $('#nilai-tahun').val();
    var res = str.replace("/", "-"); 
    if($(this).val() == "")
      {
        $("#nilai-kelas").val('').trigger("change");
		$("#nilai-semester").val('').trigger("change");
		$("#nilai-mapel").val('').trigger("change");
		$("#nilai-category").val('').trigger("change");
		$("#nilai-aspek").val('').trigger("change");

		$('#nilai-kelas').prop('disabled', true);
		$('#nilai-semester').prop('disabled', true);
		$('#nilai-mapel').prop('disabled', true);
		$('#nilai-category').prop('disabled', true);
		$('#nilai-aspek').prop('disabled', true);

        $('#file-download-nilai').remove();
        $('#form-upload-excel').remove();
        $('#generate-datanilai').remove();

       table.columns(4).search('').draw();
    
        //alert($('#kelas-cari').val());
      }
      else
      {
        $.post("<?php echo site_url('siswa/datanilai/cari_kelas_modal')?>/" + res, {} ,function(obj){
    $('#nilai-kelas').html(obj);
    });
    
     $("#nilai-kelas").val('').trigger("change");
     //$('#btnSave').closest('form').find('.select2-offscreen').trigger('change');$("#status-siswa-cari").val('').trigger("change");
     $('#nilai-kelas').prop('disabled', false);
     $("#nilai-semester").val('').trigger("change");
     $('#nilai-semester').prop('disabled', true);
     $("#nilai-mapel").val('').trigger("change");
     $('#nilai-mapel').prop('disabled', true);
     $("#nilai-category").val('').trigger("change");
     $('#nilai-category').prop('disabled', true);
     $("#nilai-aspek").val('').trigger("change");
     $('#nilai-aspek').prop('disabled', true);
     table.columns(4).search('').draw();
     $('#file-download-nilai').remove();
     $('#form-upload-excel').remove();
     $('#generate-datanilai').remove();



      //alert($('#kelas-cari').val());
      }
      
         

      
} );

$('#nilai-kelas').click(function() {   // for select box
      
   var str = $('#nilai-kelas').val();
    var tahun = $('#nilai-tahun').val();
    var datatahun = tahun.replace("/", "-"); 
     
    if($(this).val() == "")
      {
        
		$("#nilai-semester").val('').trigger("change");
		$("#nilai-mapel").val('').trigger("change");
		$("#nilai-category").val('').trigger("change");
		$("#nilai-aspek").val('').trigger("change");

		$('#nilai-semester').prop('disabled', true);
		$('#nilai-mapel').prop('disabled', true);
		$('#nilai-category').prop('disabled', true);
		$('#nilai-aspek').prop('disabled', true);

         $('#file-download-nilai').remove();
         $('#form-upload-excel').remove();
         $('#generate-datanilai').remove();
        table.columns(4).search('').draw();
        //alert($('#kelas-cari').val());
      }
      else
      {

        $.post("<?php echo site_url('siswa/datanilai/cari_semester_guru')?>/" + str + "/" + datatahun, {} ,function(obj){
    $('#nilai-semester').html(obj);
    });
      
     $("#nilai-semester").val('').trigger("change");
     //$('#btnSave').closest('form').find('.select2-offscreen').trigger('change');$("#status-siswa-cari").val('').trigger("change");
     $('#nilai-semester').prop('disabled', false);

     $("#nilai-mapel").val('').trigger("change");
     $('#nilai-mapel').prop('disabled', true);
     $("#nilai-category").val('').trigger("change");
     $('#nilai-category').prop('disabled', true);
     $("#nilai-aspek").val('').trigger("change");
     $('#nilai-aspek').prop('disabled', true);
     $('#file-download-nilai').remove();
     $('#form-upload-excel').remove();
     $('#generate-datanilai').remove();
     table.columns(4).search('').draw();


      //alert($('#kelas-cari').val());
      }
      
         

      
} );


$('#nilai-semester').click(function() {   // for select box
      
   
     
    if($(this).val() == "")
      {
        
		
		$("#nilai-mapel").val('').trigger("change");
		$("#nilai-category").val('').trigger("change");
		$("#nilai-aspek").val('').trigger("change");

		
		$('#nilai-mapel').prop('disabled', true);
		$('#nilai-category').prop('disabled', true);
		$('#nilai-aspek').prop('disabled', true);

         $('#file-download-nilai').remove();
         $('#form-upload-excel').remove();
         $('#generate-datanilai').remove();
         table.columns(4).search('').draw();
    
        //alert($('#kelas-cari').val());
      }
      else
      {
       $.ajax({
        url : "<?php echo site_url('siswa/datanilai/cari_mapel_guru')?>",
        type: "POST",
        data: $('#form-nilai-cari').serialize(),
        success: function(result)
        {
        
             $('#nilai-mapel').html(result);
             $("#nilai-mapel").val('').trigger("change");
             $('#nilai-mapel').prop('disabled', false);


             $("#nilai-category").val('').trigger("change");
             $('#nilai-category').prop('disabled', true);
             $("#nilai-aspek").val('').trigger("change");
             $('#nilai-aspek').prop('disabled', true);
             $('#file-download-nilai').remove();
             $('#form-upload-excel').remove();
             $('#generate-datanilai').remove();
             table.columns(4).search('').draw();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
            DataPesanError1();
           

 
        }
    });
    
      }
      
         

      
} );




$('#nilai-mapel').click(function() {   // for select box
      
   
     
    if($(this).val() == "")
      {
        
		
		
		$("#nilai-category").val('').trigger("change");
		$("#nilai-aspek").val('').trigger("change");

		
		
		$('#nilai-category').prop('disabled', true);
		$('#nilai-aspek').prop('disabled', true);

         $('#file-download-nilai').remove();
         $('#form-upload-excel').remove();
         $('#generate-datanilai').remove();
         table.columns(4).search('').draw();
    
        //alert($('#kelas-cari').val());
      }
      else
      {
        


     $("#nilai-category").val('').trigger("change");
     //$('#btnSave').closest('form').find('.select2-offscreen').trigger('change');$("#status-siswa-cari").val('').trigger("change");
     $('#nilai-category').prop('disabled', false);

             $("#nilai-aspek").val('').trigger("change");
             $('#nilai-aspek').prop('disabled', true);
             $('#file-download-nilai').remove();
             $('#form-upload-excel').remove();
             $('#generate-datanilai').remove();
             table.columns(4).search('').draw();

      //alert($('#kelas-cari').val());
      }
      
         

      
} );


$('#nilai-category').click(function() {   // for select box
      
   
     
    if($(this).val() == "")
      {
        
		
		
		
		$("#nilai-aspek").val('').trigger("change");

		
		
		$('#nilai-aspek').prop('disabled', true);

         $('#file-download-nilai').remove();
         $('#form-upload-excel').remove();
         $('#generate-datanilai').remove();
         table.columns(4).search('').draw();
    
        //alert($('#kelas-cari').val());
      }
      else
      {


        $.ajax({
        url : "<?php echo site_url('siswa/datanilai/cari_aspek_input')?>",
        type: "POST",
        data: $('#form-nilai-cari').serialize(),
        success: function(result)
        {
        
             $('#nilai-aspek').html(result);
             $("#nilai-aspek").val('').trigger("change");
             $('#nilai-aspek').prop('disabled', false);


             $('#file-download-nilai').remove();
             $('#form-upload-excel').remove();
            $('#generate-datanilai').remove();
            table.columns(4).search('').draw();


        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
            DataPesanError1();
           

 
        }
    });


   
      }
      
         

      
} );


$('#nilai-aspek').click(function() {   // for select box
    
    if($(this).val() == "")
      {

         $('#file-download-nilai').remove();
         $('#form-upload-excel').remove();
         $('#generate-datanilai').remove();
         table.columns(4).search('').draw();
    
        //alert($('#kelas-cari').val());
      } else {
        $('#file-download-nilai').remove();
         $('#form-upload-excel').remove();
         $('#generate-datanilai').remove();
          table.columns(4).search('').draw();
      }
     
} );



       //$('#form-siswa')[0].reset();
    $(':reset').live('click', function(){
    $('#form-siswa-nilai')[0].reset();
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


  


function generate_formnilai() {
    $.ajax({
        url : "<?php echo site_url('siswa/datanilai/generate_formnilai')?>",
        type: "POST",
        data: $('#form-nilai-cari').serialize(),
        dataType: "JSON",
        success: function(data)
        {
             
          
                 $('#data-generate-formnilai').append('<div id="generate-datanilai" class="note note-info"><div class="row"><div class="col-md-3">Mata Pelajaran</div><div class="col-md-3">: <b>'+data.nilaimapel+'</b></div><div class="col-md-3">Aspek Nilai</div><div class="col-md-3">: <b>'+data.nilaijenis+'</b></div></div><div class="row"><div class="col-md-3">Kelas</div><div class="col-md-3">: <b>'+data.nilaikelas+'</b></div><div class="col-md-3">Tahun Ajaran</div><div class="col-md-3">: <b>'+data.nilaitahunajaran+'</b></div></div><div class="row"><div class="col-md-3">Angkatan</div><div class="col-md-3">: <b>'+data.nilaiangkatan+'</b></div><div class="col-md-3">Semester</div><div class="col-md-3">: <b>'+data.nilaisemester+' ('+ data.nilaisemesterajaran +')</b></div></div><div class="row"><div class="col-md-3">Jurusan</div><div class="col-md-3">: <b>'+data.nilaijurusankelas+'</b></div><div class="col-md-3">Jumlah </div><div class="col-md-3">: <b>'+data.nilaijumlahsiswa+' siswa</b></div></div></div>');

 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
            
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            
 
        }
    });
}


function cekformnilai() {

    Metronic.blockUI({
                target: '#cek-nilai-process',
                animate: true
            });
  
    $.ajax({
        url : "<?php echo site_url('siswa/datanilai/validasiformnilai')?>",
        type: "POST",
        data: $('#form-nilai-cari').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {   
                 Metronic.unblockUI('#cek-nilai-process');
                  $('#form-upload-excel').remove();
                  $('#file-download-nilai').remove();
                  $('#generate-datanilai').remove();
                  $('#sukses-form-nilai').remove();
                //$('#form-nilai-cari')[0].reset();
                //$('#data-select2-raport').select2('val',0);
                $('#data-download').append('<div class="form-group" id="file-download-nilai"><div class="form-actions noborder"><button type="submit" class="btn green-meadow"><i class="fa fa-download"></i> Download Excel</button></div></div>');


                $('#data-sukses-nilai').append('<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.suksespesan+'</div>');
                generate_formnilai();
                tambah_upload();
                 table.columns(4).search($('#nilai-kelas').val()).draw();
                 window.setTimeout(function() {
                    $(".data-nilai").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);

                //reload_table();
                LoadFormNilai();
                
            }
            else
            {   
                $("#data-error-nilai").empty();
                
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('data-nilai alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                $('#data-error-nilai').append($newDiv);
                }


                 $('#form-upload-excel').remove();
                  $('#file-download-nilai').remove();
                  $('#generate-datanilai').remove();
                  $('#sukses-form-nilai').remove();

                table.columns(4).search('').draw();
                 Metronic.unblockUI('#cek-nilai-process');
                

            }
            

            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            Metronic.unblockUI('#cek-nilai-process');
            DataPesanErrorValidasiNilai();
          
 
        }
    });

}


function tambah_upload() {
    $('#tambah-upload').append('<div class="portlet  light bg-inverse" id="form-upload-excel"><div class="portlet-title"><div class="caption"><i class="fa fa-upload"></i>Upload Nilai</div><div class="tools"><a href="javascript:;" class="reload"></a><a href="javascript:;" class="collapse"></a></div></div><div class="portlet-body"><div class="row"><div class="col-md-12"><div id="data-error-notif"></div></div></div><form enctype="multipart/form-data" accept-charset="utf-8" name="form-upload-nilai" id="form-upload-nilai"  ><div class="row"><div style="width:36.6667%" class="col-md-5" ><div class="form-group"><div class="fileinput fileinput-new" data-provides="fileinput"><div class="input-group input-large"><div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput"><i class="fa fa-file-excel-o fileinput-exists"></i>&nbsp; <span class="fileinput-filename"></span></div><span class="input-group-addon btn default btn-file"><span class="fileinput-new">Upload File </span><span class="fileinput-exists">Ganti </span><input type="file" name="file_nilai_excel"></span><a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Hapus </a></div></div></div></div><div class="col-md-2" style="width:13.6667%"><div class="form-group"><div class="form-actions noborder"><button onclick="upload_nilai()" type="button" class="btn grey-cascade"><i class="fa fa-upload"></i> Proses Nilai</button></div></div></div><div class="col-md-5"><div class="form-group"><div class="form-actions noborder"></div></div></div></div></form></div></div>');
        
        }


function upload_nilai()
{   
    Metronic.blockUI({
                target: '#form-upload-excel',
                animate: true
            });
     var formData = new FormData( $("#form-upload-nilai")[0] );
     formData.append("nilai_cari_angkatan", $('#nilai-tahun').val());
     formData.append("nilai_cari_kelas", $('#nilai-kelas').val());
     formData.append("nilai_cari_semester", $('#nilai-semester').val());
     formData.append("nilai_cari_mapel", $('#nilai-mapel').val());
     formData.append("nilai_cari_category", $('#nilai-category').val());
     formData.append("nilai_cari_aspek", $('#nilai-aspek').val());
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('siswa/datanilai/upload_nilai_excel')?>",
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
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Data excel berhasil <b>terupload</b>.');
               
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
    
                $('#data-error-notif').append($newDiv);
                    }


                     
                     
                }

                   for (var i = 0; i < data.data_nis.length; i++)
                 {
                         $('[name="siswa_nis['+data.data_nis[i]+']"]').val(data.data_nilai[i]);
                 }
                }

               //table.columns(4).search($('#nilai-kelas').val()).draw();
            
              Metronic.unblockUI('#form-upload-excel');
             
                //UploadFormNilai();
                window.setTimeout(function() {
                    $(".error-siswa").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);

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

function savenilai() {

     Metronic.blockUI({
                target: '#savenilai-data-process',
                animate: true
            });

    var barisdatanilai = $('#datanilaisiswa tbody tr td:nth-child(2) input').map(function()
             {
             return parseInt($(this).val());
            }).get();

    $('#datanilai-masuk').val(barisdatanilai);
  $('#btnSave').text(' Memproses Nilai...').prepend(' <i class="fa fa-tasks"></i>'); //change button text
    
     $.ajax({
        url : "<?php echo site_url() ?>siswa/datanilai/simpan_multi_nilai",
        type: "POST",
        data : $('#form-siswa-nilai, #form-nilai-cari').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                    //DataPesanAddSiswa();

                //$('#form-siswa')[0].reset();

                 var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','siswa-data-ofani'+[i])  // adds the id
                 .addClass('sukses-notif-clear alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.sukses_string);
                  $('#data-sukses-siswa').append($newDiv);
                


            window.setTimeout(function() {
                    $(".remove-notif-clear").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 1000);

             window.setTimeout(function() {
                    $(".sukses-notif-clear").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 15000);

             $('#btnSave').text(' Simpan Nilai Siswa').prepend(' <i class="fa fa-tasks"></i>');
              //$('#generate-datanilai').remove();
              //generate_formnilai();
              //table.columns(4).search($('#nilai-kelas').val()).draw();
              cekformnilai();
             DataPesanNilaiSukses();

             Metronic.unblockUI('#savenilai-data-process');
            } else {

                     $("#data-error-nilaisiswa").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','siswa-data-ofani'+[i])  // adds the id
                 .addClass('remove-notif-clear alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                     $('#data-error-nilaisiswa').append($newDiv);
                


                //$('#data-error-mapel').remove()
                }
             DataPesanErrorAddNilai();

            Metronic.unblockUI('#savenilai-data-process');

             $('#btnSave').text(' Simpan Nilai Siswa').prepend(' <i class="fa fa-tasks"></i>');
             } 
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#savenilai-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
             $('#btnSave').text(' Simpan Nilai Siswa').prepend(' <i class="fa fa-tasks"></i>');
           
 
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
<!-- SCRIPT DATA NILAI INPUT NILAI MAPEL -->