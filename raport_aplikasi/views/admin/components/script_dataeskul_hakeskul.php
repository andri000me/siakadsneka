<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Data Hak Eskul</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
                <form action="#" id="form" class="form-horizontal">
                    
                    <div class="form-body">
                    <input type="hidden" value="" name="hakeskul_id"/> 
                     <input type="hidden" value="" name="hakeskul_kelascek" id="kelas-cek"/> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Guru Wali*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-graduation-cap"></i>
                                            </span>

                                           <?php $attributes = array('name' => 'hakeskul_kodeguru', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Guru', 'id' => 'data-select2-raport4');
												 echo form_dropdown($attributes, $data_guru); ?>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kelas*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                            </span>

                                            <?php $attributes = array('name' => 'hakeskul_kelas', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Kelas','id' => 'data-select2-raport5');
												 echo form_dropdown($attributes, $data_kelas); ?>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Eskul*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                            </span>

                                            <?php $attributes = array('name' => 'hakeskul_ideskul', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Eskul','id' => 'data-select2-raport6');
												 echo form_dropdown($attributes, $data_eskul); ?>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                            </span>

                                            <select name="hakeskul_status" class="form-control">
											<option value="1">Active</option>
											<option value="0">Not Active</option>
											
										</select>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                       
                       
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update()" class="btn btn-primary">Edit Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
//var dt = $('#datahakeskul' ).DataTable();
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


    $('#datahakeskul')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#datahakeskul').DataTable({
 		//dom: '<lf<tr>ip>',
        dom : 'B<"row"<"col-md-6 col-sm-12"l><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"i><"col-md-7 col-sm-12"p>>',
        buttons: [
           {
               extend: 'print',
               title: 'Data Hak Eskul - SMK N 1 Magelang',
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
                title: 'Data Hak Eskul - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>',
               exportOptions: {
                    
                    columns: ':visible'
                },
                title: 'Data Hak Eskul - SMK N 1 Magelang'
               
                            
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
            "url": "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul/ajax_list')?>",
            "type": "POST",
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
          $('td:eq(4),td:eq(5),td:eq(6)', nRow).addClass( "raport-mapel" );
          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();
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
               title: 'Data Hak Eskul - SMK N 1 Magelang',
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
                title: 'Data Hak Eskul - SMK N 1 Magelang'
               
                            
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
                title: 'Data Hak Eskul - SMK N 1 Magelang'
               
                            
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


	$("#data-select2-raport").val('').trigger("change");
	$("#data-select2-raport2").val('').trigger("change");
	$("#data-select2-raport3").val('').trigger("change");
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //$("input[name='checkAll']").click(function() {
                //var checked = $(this).is(":checked");
                //$("#datahakeskul tbody tr td div span input:checkbox").attr("checked", checked);
                //$("#datahakeskul tbody tr td div span").attr("checked", checked);
            //});
            
 $('.group-checkable').change(function() {
                var set = $("#datahakeskul tbody tr td div span input:checkbox");
                var checked = $(this).is(":checked");
                $(set).each(function() {
                    $(this).attr("checked", checked);
                });
                $.uniform.update(set);
                //countSelectedRecords();
            });

   



    $("#del_all").on('click', function(e) {
    e.preventDefault();
    var checkValues = $('.checkbox1:checked').map(function()
    {
        return $(this).val();
    }).get();

    console.log(checkValues);
    $.each( checkValues, function( i, val ) {
        $("#"+val).remove();
        });
    // return  false;
    $.ajax({
        url: '<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul/ajax_multiple_delete')?>',
        type: 'post',
        data: 'ids=' + checkValues
    }).done(function(data) {
        $("#respose").html(data);
        window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    $(".tutup-mapel-hr").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 5000);
        get_jumlah();
        reload_table();
        //$('#selecctall').attr('checked', false);
    });
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
                animate: true
            });
   $('#btnSave').text(' Tambah Data...').prepend(' <i class="fa fa-plus-circle"></i>'); //change button text

    $('#btnSave').attr('disabled',true); //set button disable
   $('#kelas-cek2').val($('#data-select2-raport2 option:selected').text());
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul/ajax_tambah')?>",
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
                $('#data-select2-raport').select2('val',0);
                $('#data-select2-raport2').select2('val',0);
                $('#data-select2-raport3').select2('val',0);
                 window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 1000);
               
                get_jumlah();  
                reload_table();
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
            
           
            $('#btnSave').text(' Tambah Hak').prepend(' <i class="fa fa-plus-circle"></i>'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

            
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        	Metronic.unblockUI('#tambah-data-process');
            //alert('Gagal untuk Insert Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError4();
            $('#btnSave').text(' Tambah Hak').prepend(' <i class="fa fa-plus-circle"></i>'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            //location.reload();
 
        }
    });
    
}
 
function edit_data(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('#data-select2-raport').select2('val',0);
    $('#data-select2-raport2').select2('val',0);
    $('#data-select2-raport3').select2('val',0);
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="hakeskul_id"]').val(data.hakeskul_id);
            $('[name="hakeskul_kodeguru"]').val(data.hakeskul_kodeguru);
            $('[name="hakeskul_kelas"]').val(data.hakeskul_kelas);
            $('[name="hakeskul_ideskul"]').val(data.hakeskul_ideskul);
            $('[name="hakeskul_ideskul"]').val(data.hakeskul_ideskul);
            $('[name="hakeskul_status"]').val(data.hakeskul_status);

            $("#data-select2-raport4").val(data.hakeskul_kodeguru).trigger("change");
            $("#data-select2-raport5").val(data.hakeskul_kelas).trigger("change");
             $("#data-select2-raport6").val(data.hakeskul_ideskul).trigger("change");
            
 
            $('#form2')[0].reset();

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Hak Eskul'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax

 
}

function reload_table2()
{
    table.ajax.reload(null,false); //reload datatable ajax
    
 
}
 
function update()
{   
    Metronic.blockUI({
                target: '#edit-data-process',
                animate: true
            });
    $('#btnUpdate').text('Update Data...'); //change button text
    $('#btnUpdate').attr('disabled',true); //set button disable
    $('#kelas-cek').val($('#data-select2-raport5 option:selected').text());
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul/ajax_update')?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {	
            	Metronic.unblockUI('#edit-data-process');
                $('#modal_form').modal('hide');
                reload_table();
                DataPesan();
                
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').parent().next().html(data.error_string[i]); //select span help-block class set text error string
                }
                Metronic.unblockUI('#edit-data-process');
            }
            
            $('#btnUpdate').text('Update Data'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
        	Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnUpdate').text('Update Data'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable

 
        }
    });
}
 
function delete_data(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                
                $('#modal_form').modal('hide');
                get_jumlah();
                reload_table();
                DataPesanDelete();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {   
                DataPesanError2();
                //alert('Gagal untuk Delete Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            }
        });
 
    }
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
<!-- SCRIPT Data Hak Eskul -->