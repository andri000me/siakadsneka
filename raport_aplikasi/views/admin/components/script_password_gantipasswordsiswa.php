<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Data Password</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
                <form action="#" id="form" class="form-horizontal">
                    
                    <div class="form-body">
                    <input type="hidden" value="" name="user_id"/> 

                    	<div class="form-group">
                            <label class="control-label col-md-3">Siswa Login*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                            </span>

                                         <input name="siswa_nis" class="form-control" placeholder="Siswa Login" type="text" disabled>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Siswa*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                            </span>

                                         <input name="siswa_nama" class="form-control" placeholder="Nama Siswa" type="text" disabled>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Password*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                            </span>

                                            <input name="user_password" class="form-control" placeholder="Masukkan Password" type="password">
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Generator*</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                            </span>

                                         <input onclick="select_all(this)" name="user_passwordgenerator" class="form-control" placeholder="Generator Data" type="text" readonly>
                                        </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                       
                       
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="button" id="btngenerator" onclick="generator()" class="btn default blue-stripe">Generate Password</button>
                <button type="button" id="btnUpdate" onclick="update()" class="btn btn-primary">Edit Password</button>
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
//var dt = $('#password' ).DataTable();
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


    $('#password')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#password').DataTable({
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
            "url": "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_list_siswa')?>",
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
          $('td:eq(2),td:eq(4),td:eq(5),td:eq(6)', nRow).addClass( "raport-mapel" );
          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();

                         $("#data-info-pencarian").empty();
                        var info = table.page.info();
    				//var info = table.page.info();
  					var $DataDitemukan = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-users"></i> <strong>Hasil pencarian data: </strong> Ditemukan data dengan jumlah <b>'+ info.recordsDisplay +'</b> user siswa');

                 var $DataTidakDitemukan = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-users"></i> <strong>Hasil pencarian data: </strong> Maaf sistem tidak menemukan data yang sesuai pada record data<b> user siswa </b>');
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
       
   
   

     $("#data-select2-raport").val('').trigger("change");
    $("#data-select2-raport2").val('').trigger("change");
    




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
        .columns(5 )
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
      	$.post("<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/cari_kelas')?>/" + res, {} ,function(obj){
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
                //$("#password tbody tr td div span input:checkbox").attr("checked", checked);
                //$("#password tbody tr td div span").attr("checked", checked);
            //});
            
 $('.group-checkable').change(function() {
                var set = $("#password tbody tr td div span input:checkbox");
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
 

 
function kirim_email_selected()
{

     if(confirm('Apakah anda yakin akan mengirim data password melalui email dari data terseleksi ?'))
    {

    //e.preventDefault();
    var checkValues = $('.checkbox1:checked').map(function()
    {
        return $(this).val();
    }).get();

    console.log(checkValues);
    $.each( checkValues, function( i, val ) {
        //$("#"+val).remove();
        });
    // return  false;
    
    dataemail = checkValues;
    var diyanahhardy;
    

    if (dataemail.length == 0 ) { 

        $("#respose").append('<div id="remove-notif-kosong" class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data <b>user siswa</b> yang akan dikirim.</div>');
        window.setTimeout(function() {
                    $("#remove-notif-kosong").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 5000);
        //Metronic.unblockUI('#process-selected-password');
        
    } else {

         for (diyanahhardy = 0; diyanahhardy < dataemail.length; diyanahhardy++) {
       
         $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_email_selected_siswa')?>/" + dataemail[diyanahhardy],
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   

            if(data.status) //if success close modal and reload ajax table
            {   
                
                $("#respose").fadeIn("slow").append(data.email_selected);
                
            }
            else
            {
                for (var ofani = 0; ofani < data.email_cek.length; ofani++)
                {
                    
                    $("#respose").fadeIn("slow").append(data.email_cek[ofani]);
                    
                }
                
        

            }

             window.setTimeout(function() {
                    $(".remove-notif").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 10000);
             //Metronic.unblockUI('#process-selected-password');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
             Metronic.unblockUI('#process-selected-password');
            DataPesanErrorEmail();


        }
    });


    }
        
    }

  
 }

    
}

function clear_notif() {
    $(".remove-notif-clear").remove();

}

function kirim_sms_selected()
{

     if(confirm('Apakah anda yakin akan mengirim data password melalui SMS dari data terseleksi ?'))
    {

    //e.preventDefault();
    var checkValues = $('.checkbox1:checked').map(function()
    {
        return $(this).val();
    }).get();

    console.log(checkValues);
    $.each( checkValues, function( i, val ) {
        //$("#"+val).remove();
        });
    // return  false;
    
    datasms = checkValues;
    var diyanahhardy;
    Metronic.blockUI({
                target: '#process-selected-password',
                animate: true
            });
    if (datasms.length == 0 ) { 

        $("#respose").append('<div id="remove-notif-kosong" class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data <b>user siswa</b> yang akan dikirim.</div>');
        window.setTimeout(function() {
                    $("#remove-notif-kosong").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 5000);
        Metronic.unblockUI('#process-selected-password');
        
    } else {
         
         for (diyanahhardy = 0; diyanahhardy < datasms.length; diyanahhardy++) {
        
         $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_sms_selected_siswa')?>/" + datasms[diyanahhardy],
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   

            if(data.status) //if success close modal and reload ajax table
            {   
                
                $("#respose").fadeIn("slow").append(data.sms_selected);
                
            }
            else
            {
                for (var ofani = 0; ofani < data.sms_cek.length; ofani++)
                {
                    
                    $("#respose").fadeIn("slow").append(data.sms_cek[ofani]);
                    
                }
                
        

            }

             window.setTimeout(function() {
                    $(".remove-notif").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                  
                    }, 10000);
Metronic.unblockUI('#process-selected-password');
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
             Metronic.unblockUI('#process-selected-password');
            DataPesanErrorsms();


        }
    });

    
    }
    
    }

  
 }

    
}

 
function edit_password(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_edit_siswa')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
          	$('[name="user_id"]').val(data.user_id);
          	$('[name="siswa_nama"]').val(data.siswa_nama);
          	$('[name="siswa_nis"]').val(data.siswa_nis);
 
            

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Password Siswa'); // Set title to Bootstrap modal title
 
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

 function select_all(obj) {
            var text_val=eval(obj);
            text_val.focus();
            text_val.select();
            if (!document.all) return; // IE only
            r = text_val.createTextRange();
            r.execCommand('copy');
        }
 
function update()
{   
    Metronic.blockUI({
                target: '#edit-data-process',
                animate: true
            });
    $('#btnUpdate').text('Update Data...'); //change button text
    $('#btnUpdate').attr('disabled',true); //set button disable
   
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_update_siswa')?>",
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
            
            $('#btnUpdate').text('Update Password'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
        	Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnUpdate').text('Update Password'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable

 
        }
    });
}

function generator()
{   
    Metronic.blockUI({
                target: '#edit-data-process',
                animate: true
            });
    
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/ajax_generator')?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 			
           	
            	Metronic.unblockUI('#edit-data-process');
                $('[name="user_passwordgenerator"]').val(data.password_generator);
                $('[name="user_password"]').val(data.password_generator);
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
        	Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            
 
        }
    });
}




function kirim_email(id)
{
    if(confirm('Apakah anda yakin akan mengirim data password pada email user ini ?'))
    {	
    	Metronic.blockUI({
                target: '#process-tabel',
                animate: true
            });
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url() ?>4dm1n-D33H4RdY-n1c3dR34M/password/ajax_email_siswa/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                
 			if(data.status) //if success close modal and reload ajax table
            {	
            	$('#respose').html(data.email_cek); //select span help-block class set text error string
                	   window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                    $(".tutup-mapel-hr").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                    }, 10000);
            	Metronic.unblockUI('#process-tabel');

                DataPesanEmail();
                
            }
            else
            {
                for (var i = 0; i < data.email_cek.length; i++)
                {
                    $('#respose').html(data.email_cek[i]); //select span help-block class set text error string
                	   window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                    $(".tutup-mapel-hr").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                    }, 5000);
                }
                Metronic.unblockUI('#process-tabel');
            }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {   
                Metronic.unblockUI('#process-tabel');
                DataPesanErrorEmail();
                //alert('Gagal untuk Delete Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            }
        });
 
    }
}




function kirim_sms(id)
{
    if(confirm('Apakah anda yakin akan mengirim data password melalui SMS pada user ini ?'))
    {	
    	Metronic.blockUI({
                target: '#process-tabel',
                animate: true
            });
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url() ?>4dm1n-D33H4RdY-n1c3dR34M/password/ajax_sms_siswa/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                 //if success reload ajax table
                
                if(data.status) //if success close modal and reload ajax table
                {   
                $('#respose').html(data.sms_cek); //select span help-block class set text error string
                       window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                    $(".tutup-mapel-hr").fadeTo(1500, 0).slideUp(1000, function(){
                        $(this).remove(); 
                    });
                    }, 10000);
                Metronic.unblockUI('#process-tabel');

                DataPesanSms();
                
            }
            else
            {
                for (var i = 0; i < data.sms_cek.length; i++)
                {
                    $('#respose').html(data.sms_cek[i]); //select span help-block class set text error string
                       window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    $(".tutup-mapel-hr").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 5000);
                }
                Metronic.unblockUI('#process-tabel');
            }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {   
                Metronic.unblockUI('#process-tabel');
                DataPesanErrorSms();
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
<!-- SCRIPT Data Password -->