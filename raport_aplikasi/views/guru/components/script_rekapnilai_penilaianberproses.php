  
        <!-- Bootstrap modal -->
<div class="modal fade" id="baca-keterangan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Keterangan Rekap Penilaian Akhir</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
                <form action="#" id="form" class="form-horizontal">
                    
                    <div class="form-body">
                  

                     <ol style="list-style-type: upper-alpha;">
                        <li><strong>Keterangan Singkatan :<br /><br /></strong>

                        <h4> ASPEK PENGETAHUAN </h4>
                         <strong>UH</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Ulangan Harian.<br>
                         <strong>RUH</strong> &nbsp;&nbsp;: Rerata Ulangan Harian.<br>
                         <strong>BUH</strong> &nbsp;&nbsp;: Bobot Ulangan Harian.<hr>

                         <strong>TG</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Tugas/PR.<br>
                         <strong>RTG</strong> &nbsp;&nbsp;: Rerata Tugas/PR.<br>
                         <strong>BTG</strong> &nbsp;&nbsp;: Bobot Tugas/PR.<hr>

                         <strong>TNH</strong> &nbsp;&nbsp;: Total Nilai Harian.<br>
                         <strong>BNH</strong> &nbsp;&nbsp;: Bobot Nilai Harian.<hr>

                         <strong>UTS</strong> &nbsp;&nbsp;&nbsp;: Ujian Tengah Semester.<br>
                         <strong>BUTS</strong> &nbsp;: Bobot Ujian Tengah Semester.<hr>

                         <strong>UAS</strong> &nbsp;&nbsp;&nbsp;: Ujian Akhir Semester.<br>
                         <strong>BUAS</strong> &nbsp;: Bobot Ujian Akhir Semester.<hr>


                          <h4> ASPEK KETERAMPILAN </h4>
                         <strong>PS</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Proses.<br>
                         <strong>RPS</strong> &nbsp;&nbsp;: Rerata Proses.<br>
                         <strong>BPS</strong> &nbsp;&nbsp;: Bobot Proses.<hr>

                         <strong>PR</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Produk.<br>
                         <strong>RPR</strong> &nbsp;&nbsp;: Rerata Produk.<br>
                         <strong>BPR</strong> &nbsp;&nbsp;: Bobot Produk.<hr>

                          <strong>PO</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Proyek.<br>
                         <strong>RPO</strong> &nbsp;&nbsp;: Rerata Proyek.<br>
                         <strong>BPO</strong> &nbsp;&nbsp;: Bobot Proyek.<hr>

                          <h4> NILAI AKHIR </h4>
                         
                         <strong>NRP</strong> &nbsp;&nbsp;: Nilai Rapor Pengetahuan.<br>
                         <strong>NRK</strong> &nbsp;&nbsp;: Nilai Rapor Keterampilan.<hr>

                         <strong>Hasil Akhir P</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Hasil Akhir Pengetahuan.<br>
                         <strong>Hasil Akhir K</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Hasil Akhir Keterampilan.<br>
                         




                         

                        </li>
                        <br>


                         <li><strong>Keterangan Simbol :<br /><br /></strong>

                         
                          <strong><i class="fa fa-smile-o"></i></strong> &nbsp;&nbsp;&nbsp;: <b>Nilai telah masuk</b> dan <b>telah sesuai </b> dengan standar KKM yang telah ditentukan.
                          <strong><i class="fa fa-warning"></i></strong> &nbsp;&nbsp;&nbsp;: <b>Nilai telah masuk</b> dan <b>belum sesuai</b> dengan standar KKM yang telah ditentukan.
                          <strong>&nbsp;--&nbsp;&nbsp;</strong> &nbsp;&nbsp;&nbsp;: Nilai kosong <b>(belum diinput)</b>.
                         

                        </li>
                        </ol>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


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


<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/extensions/FixedColumns/js/dataTables.fixedColumns2.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>

<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/jquery.mockjax.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
<script src="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>



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


var save_method; //for save method string
var table;
//var dt = $('#rekapnilaiberproses' ).DataTable();
 //var tableInitialized = false;
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


    $('#rekapnilaiberproses')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );

      var ofani;
          
       

       
   


   
    

    var generate_tabel_nilaiberproses = function(){

     
        $.ajax({
                url : "<?php echo site_url('guru/rekapnilai/jumlah_kolom')?>",
                type: "POST",
                data: $('#form-rekap-nilai').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                
                   ofani = data.ambilkolom;
                   
                }
            });


       $('#export-data').empty();
      $('#export-data').append('<li class="divider"></li>');
      $('#export-data-selected').empty();
      $('#export-data-selected').append('<li class="divider"></li>');
      $('#action-data').empty();
      $('#action-data').append('<li><a id="reload_tabel_baru"><i class="fa fa-refresh"></i> Reload Data</a></li>');
      
  $.ajax({
                url : "<?php echo site_url('guru/rekapnilai/ambil_tabel')?>",
                data: $('#form-rekap-nilai').serialize(),
                type: "POST",
                dataType: "JSON",
                "success": function(json) {
                    
                    $("#TabelRekapNilaiBerproses").empty();
                    $("#TabelRekapNilaiBerproses").append('<table class="table table-striped table-bordered table-hover" id="rekapnilaiberproses"><thead id="Rekap_nilai_berproses">'+ json.datatabel +'</thead><tbody></tbody></table>');
                    //$("#TabelRekapNilaiBerproses").find("table thead tr").append(tableHeaders);  
                     
                  table = $('#rekapnilaiberproses').DataTable({
    //dom: '<lf<tr>ip>',
    
        dom : 'B<"row"<"col-md-6 col-sm-12"><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"><"col-md-7 col-sm-12">>',
        buttons: [{
               extend: 'print',
               title: 'Data Rekap Penilaian Berproses - SMK N 1 Magelang',
               text: '<li><i class="glyphicon glyphicon-print"></i> Print Preview</a></li>',
               autoPrint: false,
               exportOptions: {
                     modifier: {
                        selected: false
                    },
                    columns: ':visible'
                },
               

               customize: function ( win ) {
                    $(win.document.body)
                        .css( 'background-color', '#ffffff' )
                        //.prepend(
                          //  '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        //);
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }               
           },
           
            {
               extend: 'pdf',
                download: 'open',
               text: '<li><i class="fa fa-file-pdf-o"></i> Save as PDF </a></li>',
               exportOptions: {
                
                    columns: ':visible'
                },
                title: 'Data Rekap Penilaian Berproses - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>',
               exportOptions: {
                    
                    columns: ':visible'
                },
                title: 'Data Rekap Penilaian Berproses - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'copy',
               text: '<li><i class="fa fa-copy"></i> Copy to Clipboard </a></li>',

               exportOptions: {
                
                    columns: ':visible'
                },
               
                            
           }],
          /*
        select: {
            style: 'multi',
            selector: 'td:not(:last-child)'
            
        }, */
        "scrollX" : true,
        "scrollCollapse": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        //"fixedColumns":   true
        "scrollY": 300,
        "paging": false,
        "order": [], //Initial no order.

        //"columns": [],
        // Load data for the table's content from an Ajax source
        
        "ajax": {
            "url": "<?php echo site_url('guru/rekapnilai/ajax_list_berproses')?>",
            "type": "POST",
             "data" : {
                      rekap_tahun ( d ) {
                  return $("#rekap_tahun").val();
                      },
                      rekap_kelas ( d ) {
                  return $("#rekap_kelas").val();
                      },
                      rekap_semester ( d ) {
                  return $("#rekap_semester").val();
                      },
                      rekap_mapel ( d ) {
                  return $("#rekap_mapel").val();
                      },
           },
             "timeout": 30000,
            "error": handleAjaxError // this sets up jQuery to give me errors
           
           
        },

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

            "pageLength": 100,
                    
            "pagingType": "bootstrap_full_number",
            "language": {
                "search": "Cari Data: ",
                "emptyTable": "Data Tidak Tersedia",
               "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri ",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "search": "Search:",
                "processing":   "Sedang memproses...",
                "zeroRecords": "Tidak ditemukan data yang sesuai",
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
          

                 $(ofani, nRow).addClass( "raport-mapel" );

                //alert(ofani);



          
          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       

                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on 
                        //global settings 
                       
                        //editables element samples 
                       //$.fn.editable.defaults.mode = 'inline';
                       $('.nilaidata-nis').click(function() {   // for select box
                            //var ofanidariyan = $(this).closest("tr").find("td:eq(1) .siswa_nis").val();
                            $("#rekap_nis").val($(this).closest("tr").find("td:eq(1) .siswa_nis").val());

                            
                        } );


                          $('.nilaidata').on('save', function(e, params) {
                              $("#rekap_nis").val($(this).closest("tr").find("td:eq(1) .siswa_nis").val());
                          });


                         $('.nilaidata').editable({

                           
                            container: 'body',
                            emptytext: 'Nilai Kosong',
                              ajaxOptions: {
                                 dataType: 'json' //assuming json response
                             },
                            inputclass: 'form-control',
                            url: '<?php echo site_url() ?>guru/rekapnilai/simpan_nilai',
                            type: 'text',
                            params: {
                                rekap_tahun: $("#rekap_tahun").val(),
                                rekap_kelas: $("#rekap_kelas").val(),
                                rekap_semester: $("#rekap_semester").val(),
                                rekap_mapel: $("#rekap_mapel").val(),
                            },
                            
                            validate: function(value) {
                                      if($.trim(value) == '') 
                                        return 'Anda belum menginput data nilai.';

                                     
                                      if($("#rekap_tahun").val() == '') 
                                        return 'Anda belum memilih data Tahun Angkatan.';

                                       if($("#rekap_kelas").val() == '') 
                                        return 'Anda belum memilih data Kelas Siswa.';

                                       if($("#rekap_semester").val() == '') 
                                        return 'Anda belum memilih data Semester.';

                                       if($("#rekap_mapel").val() == '') 
                                        return 'Anda belum memilih data Mapel.';
                                     
                                     

                                    },  



                             success: function(response) {
                                          if(response.status == 'error') {
                                            return response.error_string[0]; //response.error_string[0]; //msg will be shown in editable form
                                          }

                                          DataPesanRekap(response.jenis, response.nis, response.nama, response.mapel, response.semester); 
                                      },
                                  
                            error: function(response, newValue) {
                                      if(response.status !== 200) {
                                          return 'Gagal untuk terkoneksi ke server !!!';
                                      } 
                                  },

                            
                            title: 'Masukkan Nilai'
                        });


                       
                       
                       //each table reload
                        $('.tooltips').tooltip({ container: 'body'});
                        $('.popovers').popover();

                        
                    }
         
          
    });

  new $.fn.dataTable.FixedColumns( table, {
        leftColumns: 8
    } );

  table.buttons(0,null).container().prependTo( '#export-data' );
  new $.fn.dataTable.Buttons( table, {
      buttons: [
            {
               extend: 'colvis',
               text: '<li><i class="fa fa-th-large"></i> Atur Column</a></li>',
               postfixButtons: [ 'colvisRestore' ]
              
                            
           },             
        ],     
       
    } );
 
     table.buttons(1,null).container().prependTo( '#action-data' );

    

                },

            });
    }

   
  //Panggil Tabel Defaults
  generate_tabel_nilaiberproses();



$('#rekap_kelas').prop('disabled', true);
$('#rekap_semester').prop('disabled', true);
$('#rekap_mapel').prop('disabled', true);


$("#rekap_tahun").val('').trigger("change");


  $("#reset-pencarian").click(function() {
    	$('#rekap_kelas').prop('disabled', true);
      $('#rekap_semester').prop('disabled', true);
      $('#rekap_mapel').prop('disabled', true);
      $("#rekap_tahun").val('').trigger("change");
      $("#rekap_kelas").val('').trigger("change");
      $("#rekap_semester").val('').trigger("change");
      $("#rekap_mapel").val('').trigger("change");

       $("#data-sukses-indikator").empty();
        $("#indikator-info").empty();
        $("#data-sukses-notif").empty();
        $("#data-error-indikator").empty();
        $("#data-download").empty();

      table.columns(4).search('').draw();
  });




$('#rekap_tahun').click(function() {   // for select box
      
   
     var str = $('#rekap_tahun').val();
    var res = str.replace("/", "-"); 
    if($(this).val() == "")
      {

        $("#rekap_kelas").val('').trigger("change");
        $("#rekap_semester").val('').trigger("change");
        $("#rekap_mapel").val('').trigger("change");
        
        $('#rekap_kelas').prop('disabled', true);
        $('#rekap_semester').prop('disabled', true);
        $('#rekap_mapel').prop('disabled', true);

       table.columns(4).search('').draw();
        $("#data-sukses-indikator").empty();
        $("#indikator-info").empty();
        $("#data-sukses-notif").empty();
        $("#data-error-indikator").empty();
        $("#data-download").empty();

      }
      else
      {
        $.post("<?php echo site_url('guru/rekapnilai/cari_kelas_modal')?>/" + res, {} ,function(obj){
    $('#rekap_kelas').html(obj);
    });
    
     $("#rekap_kelas").val('').trigger("change");
     $('#rekap_kelas').prop('disabled', false);

     $("#rekap_semester").val('').trigger("change");
     $('#rekap_semester').prop('disabled', true);
     $("#rekap_mapel").val('').trigger("change");
     $('#rekap_mapel').prop('disabled', true);
     
     table.columns(4).search('').draw();
    
     $("#data-sukses-indikator").empty();
     $("#indikator-info").empty();
     $("#data-sukses-notif").empty();
     $("#data-error-indikator").empty();
     $("#data-download").empty();


      
      }
      
         

      
} );



$('#rekap_kelas').click(function() {   // for select box
      
   var str = $('#rekap_kelas').val();
      var tahun = $('#rekap_tahun').val();
    var datatahun = tahun.replace("/", "-"); 


     
    if($(this).val() == "")
      {
        
        $("#rekap_semester").val('').trigger("change");
        $("#rekap_mapel").val('').trigger("change");
        
        $('#rekap_semester').prop('disabled', true);
        $('#rekap_mapel').prop('disabled', true);
        
        table.columns(4).search('').draw();
         $("#data-sukses-indikator").empty();
         $("#indikator-info").empty();
         $("#data-sukses-notif").empty();
         $("#data-error-indikator").empty();
         $("#data-download").empty();
        //alert($('#kelas-cari').val());
      }
      else
      {

        $.post("<?php echo site_url('guru/rekapnilai/cari_semester')?>/" + str + "/" + datatahun, {} ,function(obj){
    $('#rekap_semester').html(obj);
    });
      
     $("#rekap_semester").val('').trigger("change");
     $('#rekap_semester').prop('disabled', false);

     $("#rekap_mapel").val('').trigger("change");
     $('#rekap_mapel').prop('disabled', true);
 
     table.columns(4).search('').draw();


     $("#data-sukses-indikator").empty();
     $("#indikator-info").empty();
     $("#data-sukses-notif").empty();
     $("#data-error-indikator").empty();
     $("#data-download").empty();



      //alert($('#kelas-cari').val());
      }
      
         

      
} );


$('#rekap_semester').click(function() {   // for select box
      
   
    
    if($(this).val() == "")
      {
        
    
    $("#rekap_mapel").val('').trigger("change");
    $('#rekap_mapel').prop('disabled', true);
  
       
         table.columns(4).search('').draw();
         $("#data-sukses-indikator").empty();
         $("#indikator-info").empty();
         $("#data-sukses-notif").empty();
         $("#data-error-indikator").empty();
         $("#data-download").empty();
        //alert($('#kelas-cari').val());
      }
      else
      {
       $.ajax({
        url : "<?php echo site_url('guru/rekapnilai/cari_mapel')?>",
        type: "POST",
        data: $('#form-rekap-nilai').serialize(),
        success: function(result)
        {
        
             $('#rekap_mapel').html(result);
             $("#rekap_mapel").val('').trigger("change");
             $('#rekap_mapel').prop('disabled', false);
             table.columns(4).search('').draw();

             $("#data-sukses-indikator").empty();
             $("#indikator-info").empty();
             $("#data-sukses-notif").empty();
             $("#data-error-indikator").empty();
             $("#data-download").empty();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
            DataPesanError1();
           

 
        }
    });
    
      }
      
         

      
} );




$('#rekap_mapel').click(function() {   // for select box
      
   
     
    if($(this).val() == "")
      {
          //cekformindikator()
         table.columns(4).search('').draw();
         $("#data-sukses-indikator").empty();
         $("#indikator-info").empty();
         $("#data-sukses-notif").empty();
         $("#data-error-indikator").empty();
         $("#data-download").empty();

      }
      else
      {
        $("#data-sukses-indikator").empty();
        $("#indikator-info").empty();
        $("#data-sukses-notif").empty();
        $("#data-error-indikator").empty();

       

         
        generate_tabel_nilaiberproses();
        cekformindikator();
        // table.columns(4).search('').draw();

      
      }
      
         

      
} );

$('body').on('click', '#reload_tabel_baru', function () {
//$('#reload_tabel_baru').click(function() {   // for select box
      
  generate_tabel_nilaiberproses();

       
} );




            
 $('.group-checkable').change(function() {
                var set = $("#rekapnilaiberproses tbody tr td div span input:checkbox");
                var checked = $(this).is(":checked");
                $(set).each(function() {
                    $(this).attr("checked", checked);
                });
                $.uniform.update(set);
                //countSelectedRecords();
            });

  
    //set input/textarea/select event when change value, remove class error and remove text help block
   
    $("textarea").change(function(){
        $(this).parent().parent().parent().removeClass('has-error');
        $(this).parent().next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().parent().removeClass('has-error');
        $(this).parent().next().empty();
    });
 
});
 
 

function reload_table2()
{
    table.ajax.reload(null,false); //reload datatable ajax
    
 
}



function bacaketerangan() {
    $("#baca-keterangan").modal('show');
}


function cekformindikator() {

    Metronic.blockUI({
                target: '#cek-rekap-process',
                animate: true
            });
  
    $.ajax({
        url : "<?php echo site_url() ?>guru/rekapnilai/cari_rekapnilai_berproses",
        type: "POST",
        data: $('#form-rekap-nilai').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {   
                 Metronic.unblockUI('#cek-rekap-process');
                  $("#data-sukses-indikator").empty();
                  $("#indikator-info").empty();
                  $("#data-sukses-notif").empty();
                  $("#data-download").empty();

                  $('#data-sukses-indikator').append(data.suksespesan);
                  $('#data-sukses-notif').append(data.suksesnotif);
                  
                  if (data.pesannotif == 'sukses') {
                    $('#data-download').append('<div class="form-group" id="file-download-nilai"><div class="form-actions noborder"><button type="submit" class="btn green-meadow"><i class="fa fa-file-excel-o"></i> Download Excel Nilai</button></div></div>');
                  }

                 window.setTimeout(function() {
                    $(".data-indikator").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);
                //table.ajax.reload(null,false); 
                
            }
            else
            {   
                $("#data-error-indikator").empty();
                $("#data-download").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('data-indikator alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                $('#data-error-indikator').append($newDiv);
                }
               
                $("#indikator-info").empty();

                 Metronic.unblockUI('#cek-rekap-process');
                

            }
            

            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            Metronic.unblockUI('#cek-rekap-process');
            DataPesanErrorValidasiNilai();
          
 
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
   //TableOfaniOtomatis.init();
});
</script>
<!-- SCRIPTS DATA REKAP PENILAIAN BERPROSES -->