
                        
        <!-- Bootstrap modal -->
<div class="modal fade" id="baca-panduan" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Panduan Indikator Rekap Nilai</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
                 <form action="#" id="form" class="form-horizontal">
                    
                    <div class="form-body">
                    <ol style="list-style-type: upper-alpha;">
                        <li><strong>Ketentuan Penggunaan Rekap Indikator Nilai :<br /><br /></strong> 1. Rekap Indikator Nilai dibuat untuk mengetahui seberapa jauh guru/penginput nilai melakukan penginputan data nilai.<br /><br />2. Proses penginputan nilai diketahui telah lengkap dan sesuai dengan syarat minimal pengolahan data nilai jika, tabel rekap nilai pada kolom terakhir (RAPORT) memberikan hasil indikasi : OKE.<strong><br /><br /></strong></li>
                        <li><strong>Syarat Minimal Pengolahan Data Nilai Raport :<br /></strong>1. Sistem Pengolahan Nilai Berdasarkan : <strong>Kategori Aspek Nilai PK(Pengetahuan,Keterampilan)</strong><br /><br />
                        <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A) Nilai Pengetahuan :<br /></strong></p>
                        <ol>
                        <li>Guru/Penginput Nilai minimal memiliki nilai UH (Ulangan Harian) sebanyak 3 nilai, untuk setiap mata pelajaran dalam 1 semester.</li>
                        <li>Guru/Penginput Nilai minimal memiliki nilai TG (Nilai Tugas/PR) sebanyak 1 nilai, untuk setiap mata pelajaran dalam 1 semester.</li>
                        <li>Guru/Penginput Nilai telah memiliki nilai UTS (Ujian Tengah Semester) untuk setiap mata pelajaran dalam 1 semester.</li>
                        <li>Guru/Penginput Nilai telah memiliki nilai UAS (Ujian Akhir Sekolah) untuk setiap mata pelajaran dalam 1 semester.</li>
                        </ol>
                        <p><strong><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C) <strong>Nilai Keterampilan :<br /></strong></strong></p>
                        <ol>
                        <li>Nilai keterampilan terdiri dari aspek nilai : Proses, Produk, dan Proyek.</li>
                        <li>Untuk melengkapi nilai keterampilan, Guru/Penginput Nilai minimal memiliki nilai Keterampilan sebanyak 1 nilai, pilih satu/semua dari ketiga aspek yang ada.</li>
                        </ol> <br><br>
                      
                        <p>2. Sistem Pengolahan Nilai Berdasarkan : <strong>Nilai Akhir Raport<br /></strong></p>
                        <p>Untuk melengkapi nilai akhir raport menggunakan metode ini, Guru/Penginput nilai minimal sudah memiliki nilai akhir dari kedua aspek nilai yang ada yaitu : PENGETAHUAN, KETERAMPILAN.</p>
                        <p><strong>&nbsp;</strong></p>
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


            
        <!-- Bootstrap modal -->
<div class="modal fade" id="baca-keterangan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Keterangan Indikator Rekap Nilai</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
                <form action="#" id="form" class="form-horizontal">
                    
                    <div class="form-body">
                    <ol>
                    <li><strong>UH</strong> &nbsp;&nbsp;&nbsp;: Ulangan Harian</li>
                    <li><strong>TG </strong> &nbsp;&nbsp;&nbsp;&nbsp;: Tugas</li>
                    <li><strong>UTS</strong> &nbsp;&nbsp;: Ujian Tengah Semester</li>
                    <li><strong>UAS</strong> &nbsp;: UJian Akhir Semester</li>
                    <li><strong>PS</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Proses</li>
                    <li><strong>PR</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Produk</li>
                    <li><strong>PO</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Proyek</li>
                    <li><strong>P</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Pengetahuan</li>
                    <li><strong>K</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Keterampilan</li>
                   
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
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-raport.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-blockui.js"></script>

<script type="text/javascript">


var save_method; //for save method string
var table;
//var dt = $('#dataindikatornilai' ).DataTable();
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


    $('#dataindikatornilai')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#dataindikatornilai').DataTable({
 		//dom: '<lf<tr>ip>',
        dom : 'B<"row"<"col-md-6 col-sm-12"l><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"i><"col-md-7 col-sm-12"p>>',
        buttons: [
           {
               extend: 'print',
               title: 'Indikator Rekap Nilai - SMK N 1 Magelang',
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
                title: 'Indikator Rekap Nilai - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>',
               exportOptions: {
                    
                    columns: ':visible'
                },
                title: 'Indikator Rekap Nilai - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'copy',
               text: '<li><i class="fa fa-copy"></i> Copy to Clipboard </a></li>',

               exportOptions: {
                
                    columns: ':visible'
                },
               
                            
           }               
        ],

        select: {
            style: 'multi',
            selector: 'td:not(:last-child)'
            
        }, 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        
        "ajax": {
            "url": "<?php echo site_url('siswa/indikatornilai/ajax_list_indikator_nilai')?>",
            "type": "POST",
             "data" : {
                         indikator_tahun ( d ) {
                    return $("#tahun-cari-modal").val();
                        },

                        indikator_kelas ( d ) {
                    return $("#kelas-cari-modal").val();
                        },

                         indikator_semester ( d ) {
                    return $("#semester-cari-modal").val();
                        },
                       
             },
             "timeout": 15000,
            "error": handleAjaxError // this sets up jQuery to give me errors
           
           
        },
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            //"language": {
                //"aria": {
                    //"sortAscending": ": activate to sort column ascending",
                    //"sortDescending": ": activate to sort column descending"
               // },
               // "emptyTable": "Data Tidak Tersedia",
                //"info": "Showing _START_ to _END_ of _TOTAL_ entries",
               // "infoEmpty": "No entries found",
                //"infoFiltered": "(filtered1 from _MAX_ total entries)",
              //  "lengthMenu": "Show _MENU_ entries",
               // "search": "Search:",
               // "zeroRecords": "Tidak Ada Data Ditemukan",

           // },


        
            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

            
            "columns": [{
                "orderable": false
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            },  {
                "orderable": false
            }],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,            
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
          $('td:eq(2), td:eq(3),td:eq(4),td:eq(5), td:eq(6), td:eq(7), td:eq(8), td:eq(9), td:eq(10), td:eq(11), td:eq(12), td:eq(13), td:eq(14), td:eq(15), td:eq(16), td:eq(17), td:eq(18), td:eq(19)', nRow).addClass( "raport-mapel" );

          $('td:eq(16), td:eq(17), td:eq(18)', nRow).addClass("success");
          //$('td:eq(19)', nRow).addClass("active");
          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();
                        $('.popovers').popover();
                        //countSelectedRecords(); // reset selected records indicator
                    }
         
           // "order": [
            //    [1, "asc"]
           // ] // set first column as a default sort by asc
 
    });
       
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

     new $.fn.dataTable.Buttons( table, {
      buttons: [
           {
               extend: 'print',
               text: '<li><i class="glyphicon glyphicon-print"></i> Print Preview (selected)</a></li>',
               autoPrint: false,
               title: 'Indikator Rekap Nilai - SMK N 1 Magelang',
               exportOptions: {
                     modifier: {
                        selected: true
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
               text: '<li><i class="fa fa-file-pdf-o"></i> Save as PDF (selected)</a></li>',
               exportOptions: {
                     modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
                title: 'Indikator Rekap Nilai - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel (selected) </a></li>',
               exportOptions: {
                     modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
                title: 'Indikator Rekap Nilai - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'copy',
               text: '<li><i class="fa fa-copy"></i> Copy to Clipboard (selected) </a></li>',

               exportOptions: {
                    modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
               
                            
           }               
        ],

        select: true,      
       
    } );
 
     table.buttons(2,null).container().prependTo( '#export-data-selected' );

   
    $("#semester-cari-modal").val('').trigger("change");

    $('#semester-cari-modal').prop('disabled', false);

$.post("<?php echo site_url('siswa/indikatornilai/cari_semester_siswa')?>/", {} ,function(obj){
    $('#semester-cari-modal').html(obj);
    });



$('#semester-cari-modal').click(function() {   // for select box
    
    if($(this).val() == "")
      {

        
         cekformindikator();

        //alert($('#kelas-cari').val());
      } else {
        
         cekformindikator();
      }
     
} );


 $('.group-checkable').change(function() {
                var set = $("#dataindikatornilai tbody tr td div span input:checkbox");
                var checked = $(this).is(":checked");
                $(set).each(function() {
                    $(this).attr("checked", checked);
                });
                $.uniform.update(set);
                //countSelectedRecords();
            });

   
 
  
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().parent().removeClass('has-error');
        $(this).parent().next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().parent().removeClass('has-error');
        $(this).parent().next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().parent().removeClass('has-error');
        $(this).parent().next().empty();
    });
 
});
 
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax

 
}

function resetform()
{
    
    $("#semester-cari-modal").val('').trigger("change");

    
    $('#semester-cari-modal').prop('disabled', false);
    $("#data-sukses-indikator").empty();
    $("#data-error-indikator").empty();
    $("#indikator-info").empty();
    table.ajax.reload(null,false);
 
}

function bacapanduan() {
    $("#baca-panduan").modal('show');
}

function bacaketerangan() {
    $("#baca-keterangan").modal('show');
}



function cekformindikator() {

    Metronic.blockUI({
                target: '#cek-indikator-process',
                animate: true
            });
  
    $.ajax({
        url : "<?php echo site_url() ?>siswa/indikatornilai/cari_indikator",
        type: "POST",
        data: $('#form-indikator-cari').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {   
                 Metronic.unblockUI('#cek-indikator-process');
                  $("#data-sukses-indikator").empty();
                  $("#indikator-info").empty();
                $('#data-sukses-indikator').append(data.suksespesan);
               
                 window.setTimeout(function() {
                    $(".data-indikator").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);

                    if(data.infotahun == '') {
                         $("#indikator-info").empty();
                    } else {
                        $('#indikator-info').append(' <div class="note note-info"><i class="fa fa-info-circle"></i> <b>Info</b> : Sistem menampilkan informasi data <b>Rekap Data Nilai</b>, pada tahun ajaran : <b> '+ data.infotahun + '</b>, semester : <b>'+ data.infosemester +'</b></div>');
                    }
                  

                table.ajax.reload(null,false); 
                
            }
            else
            {   
                $("#data-error-indikator").empty();
                
                for (var i = 0; i < data.inputerror.length; i++)
                {              
                var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('data-indikator alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                $('#data-error-indikator').append($newDiv);
                }
               
                $("#indikator-info").empty();

                 Metronic.unblockUI('#cek-indikator-process');
                

            }
            

            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            Metronic.unblockUI('#cek-indikator-process');
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
   //TableOfaniOtomatis.init();
  //UIBlockUI.init();
});
</script>
<!-- SCRIPT INDIKATOR NILAI : SISWA -->