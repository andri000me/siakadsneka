

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


var save_method; //for save method string
var table;
//var dt = $('#raportsiswacetak' ).DataTable();
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


    $('#raportsiswacetak')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#raportsiswacetak').DataTable({
 		//dom: '<lf<tr>ip>',
    
        dom : 'B<"row"<"col-md-6 col-sm-12"l><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"i><"col-md-7 col-sm-12"p>>',
        buttons: [],

        select: {
            style: 'multi',
            selector: 'td:not(:last-child)'
            
        }, 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        
        "ajax": {
            "url": "<?php echo site_url('guru/cetaknilai/ajax_list_cetakraport')?>",
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
                "orderable": false
            }],
                    
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
          $('td:eq(1),td:eq(3),td:eq(4),td:eq(5)', nRow).addClass( "raport-mapel" );


          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();
                       
                         $(".dropdownMenu").on("show.bs.dropdown", function () {
                        // For difference between offset and position: http://stackoverflow.com/a/3202038/44852
                        var dropdownButtonPosition = $(this).position();
                        var dropdownButtonOffset = $(this).offset();
                        var dropdownButtonHeight = $(this).height();
                        var dropdownMenu = $(this).find(".dropdown-menu:first");
                        var dropdownMenuHeight = dropdownMenu.height();
                        var scrollToTop = $(document).scrollTop();

                        // It seems there are some numbers that don't get included so I am using some tolerance for
                        // more accurate result.
                        var heightTolerance = 17;

                        // I figured that window.innerHeight works more accurate on Chrome
                        // but it is not available on Internet Explorer. So I am using $(window).height() 
                        // method where window.innerHeight is not available.
                        var visibleWindowHeight = window.innerHeight || $(window).height();

                        var totalHeightDropdownOccupies = dropdownMenuHeight +
                            dropdownButtonOffset.top + dropdownButtonHeight + heightTolerance - scrollToTop;

                        // If there is enough height for dropdown to fully appear, then show it under the dropdown button,
                        // otherwise show it above dropdown button.
                        var dropdownMenuTopLocation = totalHeightDropdownOccupies < visibleWindowHeight
                            ? dropdownButtonPosition.top + dropdownButtonHeight
                            : dropdownButtonPosition.top - dropdownMenuHeight - dropdownButtonHeight + heightTolerance;

                        dropdownMenu.css("left", dropdownButtonPosition.left)
                            .css("top", dropdownMenuTopLocation);
                    });
                         $("#data-info-pencarian").empty();
                        var info = table.page.info();
    				//var info = table.page.info();
  					var $DataDitemukan = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-users"></i> <strong>Hasil pencarian data: </strong> Ditemukan data dengan jumlah <b>'+ info.recordsDisplay +'</b> siswa ');

                 var $DataTidakDitemukan = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-users"></i> <strong>Hasil pencarian data: </strong> Maaf sistem tidak menemukan data yang sesuai pada record data</b> siswa <b>Aktif</b>');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                
                if (info.recordsDisplay ==  0) {
    				$('#data-info-pencarian').append($DataTidakDitemukan);
				} else {
    				$('#data-info-pencarian').append($DataDitemukan);
				}
                
                        //countSelectedRecords(); // reset selected records indicator
                    }
         
           // "order": [
            //    [1, "asc"]
           // ] // set first column as a default sort by asc
 
    });
     

$('#kelas-cari').prop('disabled', true);
$("#tahun-cari").val('').trigger("change");
$("#kelas-cari").val('').trigger("change");

  $("#reset-pencarian").click(function() {
  	$("#tahun-cari").val('').trigger("change");
	$("#kelas-cari").val('').trigger("change");
 	$('#kelas-cari').prop('disabled', true);
  });

$('#tahun-cari').on( 'change', function () {   // for select box
    	
    table
        .columns( 5 )
        .search( this.value )
        .draw();

        var str = $('#tahun-cari').val();
		var res = str.replace("/", "-"); 
		if($(this).val() == "")
  		{
      	 $("#kelas-cari").val('').trigger("change");
      	  $('#kelas-cari').prop('disabled', true);
		
      	//alert($('#kelas-cari').val());
  		}
  		else
  		{
      	$.post("<?php echo site_url('guru/datasiswa/cari_kelas_modal')?>/" + res, {} ,function(obj){
		$('#kelas-cari').html(obj);
		});
		
		 $("#kelas-cari").val('').trigger("change");
		 //$('#btnSave').closest('form').find('.select2-offscreen').trigger('change');$("#status-siswa-cari").val('').trigger("change");
		 $('#kelas-cari').prop('disabled', false);

			//alert($('#kelas-cari').val());
  		}
  		
         

      
} );



$('#kelas-cari').on( 'change', function () {   // for select box
    table
        .columns( 4 )
        .search( this.value )
        .draw();
} );






    //$("input[name='checkAll']").click(function() {
                //var checked = $(this).is(":checked");
                //$("#raportsiswacetak tbody tr td div span input:checkbox").attr("checked", checked);
                //$("#raportsiswacetak tbody tr td div span").attr("checked", checked);
            //});
            
 $('.group-checkable').change(function() {
                var set = $("#raportsiswacetak tbody tr td div span input:checkbox");
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

<!-- SCRIPTS DATA CETAK RAPORT SISWA OLEH GURU WALI  -->