
    
        <!-- Bootstrap modal -->
<div class="modal fade" id="baca-keterangan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Keterangan Data Ranking :</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
                <form action="#" id="form" class="form-horizontal">
                    
                    <div class="form-body">
                    <ol>
                    <li><strong>JK</strong> &nbsp;&nbsp;&nbsp;: Jumlah Nilai Keterampilan</li>
                    <li><strong>RK </strong> &nbsp;&nbsp;&nbsp;&nbsp;: Rata-rata Nilai Keterampilan</li>
                    <li><strong>Rank K</strong> &nbsp;&nbsp;: Ranking Nilai Keterampilan</li>
                    <li><strong>JP</strong> &nbsp;: Jumlah Nilai Pengetahuan</li>
                    <li><strong>RP</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Rata-rata Nilai Pengetahuan</li>
                    <li><strong>Rank P</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Ranking Nilai Pengetahuan</li>
                    <li><strong>JPK</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Jumlah Nilai Pengetahuan dan Keterampilan</li>
                    <li><strong>RPK</strong> &nbsp;&nbsp;&nbsp;: Rata-rata Pengetahuan dan Sikap</li>
                    <li><strong>Rank PK</strong> &nbsp;&nbsp;&nbsp;&nbsp;: Ranking Nilai Pengetahuan dan Sikap</li>
                   
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
//var dt = $('#rankingsiswakelas' ).DataTable();
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


    $('#rankingsiswakelas')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#rankingsiswakelas').DataTable({
        //dom: '<lf<tr>ip>',
    
        dom : 'B<"row"<"col-md-6 col-sm-12"><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"><"col-md-7 col-sm-12">>',

        buttons: [
           {
               extend: 'print',
               title: 'Data Ranking Siswa - SMK N 1 Magelang',
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
                title: 'Data Ranking Siswa - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>',
               exportOptions: {
                    
                    columns: ':visible'
                },
                title: 'Data Ranking Siswa - SMK N 1 Magelang'
               
                            
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
            "url": "<?php echo site_url('siswa/rangking/ajax_list_rank')?>",
            "type": "POST",
              "data" : {
                      tahun_cari ( d ) {
                    return $("#tahun-cari").val();
                        },
                        kelas_cari ( d ) {
                    return $("#kelas-cari").val();
                        },
                        semester_cari ( d ) {
                    return $("#semester-cari").val();
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
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            },{
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
            }],
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
          $('td:eq(1),td:eq(3),td:eq(4),td:eq(5),td:eq(6),td:eq(7),td:eq(8),td:eq(9),td:eq(10),td:eq(11),td:eq(12),td:eq(13)', nRow).addClass( "raport-mapel" );


          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();
                       
                       
                         $("#data-info-pencarian").empty();
                        var info = table.page.info();
                   
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
               title: 'Data Ranking Siswa - SMK N 1 Magelang',
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
                title: 'Data Ranking Siswa - SMK N 1 Magelang'
               
                            
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
                title: 'Data Ranking Siswa - SMK N 1 Magelang'
               
                            
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
     


$('#semester-cari').prop('disabled', false);
$("#semester-cari").val('').trigger("change");

  $("#reset-pencarian").click(function() {
     table
        .columns( 5 )
        .search( this.value )
        .draw();
    
    $("#semester-cari").val('').trigger("change");
    $('#semester-cari').prop('disabled', false);
     $("#data-info-pencarian").empty();
  });


$.post("<?php echo site_url('siswa/indikatornilai/cari_semester_siswa')?>/", {} ,function(obj){
    $('#semester-cari').html(obj);
    });


$('#semester-cari').on( 'change', function () {   // for select box
        
    table
        .columns( 5 )
        .search( this.value )
        .draw();

    
} );



            
 $('.group-checkable').change(function() {
                var set = $("#rankingsiswakelas tbody tr td div span input:checkbox");
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
 
 
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax

 
}

function reload_table2()
{
    table.ajax.reload(null,false); //reload datatable ajax
    
 
}

function bacaketerangan() {
    $("#baca-keterangan").modal('show');
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
<!-- SCRIPT DATA RANGKING : SISWA -->