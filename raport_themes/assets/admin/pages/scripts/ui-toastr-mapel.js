
  var i = -1,
  
                toastCount = 0,
                $toastlast,
                getMessage = function () {
                    
                    i++;
                    if (i === msgs.length) {
                        i = 0;
                    }

                    return msgs[i];
                };


  window.DataPesan = function() {
     var shortCutFunction = 'success';
                var msg = 'Successfully';
                var title = 'Data Berhasil Disimpan';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

   window.DataPesanRekap = function(jenis, nis, nama, mapel, semester) {
     var shortCutFunction = 'info';
                var msg = 'Data nilai <b>'+ jenis +'</b> NIS: <b>'+ nis + '</b>-<b>'+ nama + '</b> pada Mapel: <b>'+ mapel + '</b> SM: <b>' + semester + '</b> berhasil disimpan.';
                var title = 'Successfully';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "8000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanNilaiSukses = function() {
     var shortCutFunction = 'success';
                var msg = 'Data Nilai Berhasil Ditambahkan';
                var title = 'Saved Successfully';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "14000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }


  window.DataPesanImportSukses = function() {
     var shortCutFunction = 'success';
                var msg = 'Data Siswa Berhasil Ditambahkan !!!';
                var title = 'Import Successfully';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "14000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanNilaiSuksesEdit = function() {
     var shortCutFunction = 'success';
                var msg = 'Data Nilai Berhasil Diupdate';
                var title = 'Update Successfully';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "14000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }



  window.DataPesanAddSiswa = function() {
     var shortCutFunction = 'success';
                var msg = 'Successfully';
                var title = 'Data Siswa Berhasil Ditambah';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }


  window.DataPesanAddGuru = function() {
     var shortCutFunction = 'success';
                var msg = 'Successfully';
                var title = 'Data Guru Berhasil Ditambah';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }


   window.DataPesanKelasUpgrade = function() {
     var shortCutFunction = 'success';
                var msg = 'Successfully';
                var title = 'Upgrade Kelas Berhasil Dilakukan';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataTambah = function() {
     var shortCutFunction = 'success';
                var msg = 'Successfully';
                var title = 'Data Berhasil Ditambahkan';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }  

  window.UpdatePasswordSukses = function() {
     var shortCutFunction = 'success';
                var msg = 'Successfully';
                var title = 'Data Password Berhasil Diupdate';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }  


  window.DataPesanError1 = function() {
     var shortCutFunction = 'error';
                var title = 'Get Data Failed';
                var msg = 'Gagal Untuk Mendapatkan Data (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

   window.DataPesanError2 = function() {
     var shortCutFunction = 'error';
                var title = 'Opps Delete Failed';
                var msg = 'Gagal untuk Menghapus Data (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanError3 = function() {
     var shortCutFunction = 'error';
                var title = 'Opps Update Data Failed';
                var msg = 'Gagal untuk Update Data (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  } 
  window.DataPesanError4 = function() {
     var shortCutFunction = 'error';
                var title = 'Opps Add Data Failed';
                var msg = 'Gagal untuk Menambahkan Data (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

   window.DataPesanErrorValidasiNilai = function() {
     var shortCutFunction = 'error';
                var title = 'Opps Validasi Data Failed';
                var msg = 'Gagal untuk Memvalidasi Nilai (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }


  
   window.DataPesanDelete = function() {
     var shortCutFunction = 'success';
                var title = 'Delete Successfully';
                var msg = 'Data Berhasil Dihapus';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }  

  window.ReloadSuccess = function() {
     var shortCutFunction = 'info';
                var title = 'Reload Success';
                var msg = 'Data Berhasil Ditampilkan';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }  


  window.DataPesanError5 = function() {
     var shortCutFunction = 'error';
                var title = 'Get Data Failed';
                var msg = 'Gagal Untuk Mendapatkan Data, Please try again in a minute. (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanErrorEmail = function() {
     var shortCutFunction = 'error';
                var title = 'Email Delivery has Failed';
                var msg = 'Gagal untuk mengirimkan data password melalui email, Please try again in a minute. (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

window.DataPesanErrorSms = function() {
     var shortCutFunction = 'error';
                var title = 'SMS Delivery has Failed';
                var msg = 'Gagal untuk mengirimkan data password melalui SMS, Please try again in a minute. (Kemungkinan Server Sedang Sibuk/Koneksi Internet Tidak Stabil)';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanErrorAddNilai = function() {
     var shortCutFunction = 'error';
                var title = 'Proses Penyimpanan Data Nilai  Gagal';
                var msg = 'Mohon Perika kembali, kelengkapan form data nilai dengan cermat dan teliti.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "10000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanErrorEditNilai = function() {
     var shortCutFunction = 'error';
                var title = 'Proses Update Data Nilai  Gagal';
                var msg = 'Mohon Perika kembali, kelengkapan form data nilai dengan cermat dan teliti.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "10000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }








window.WaktuLama = function() {
     var shortCutFunction = 'info';
                var title = 'Proses Terlalu Lama';
                var msg = 'Server mengambil data terlalu lama, segera periksa jaringan internet anda.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "20000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  } 



window.LoadFormNilai = function() {
     var shortCutFunction = 'info';
                var title = 'Form Nilai Berhasil Ditampilkan';
                var msg = 'Silahkan untuk mengisi data nilai dengan cermat dan teliti.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "20000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.LoadFormNilaiEdit = function() {
     var shortCutFunction = 'info';
                var title = 'Form Nilai Berhasil Ditampilkan';
                var msg = 'Silahkan untuk mengedit data nilai dengan cermat dan teliti.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "20000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.UploadFormNilai = function() {
     var shortCutFunction = 'info';
                var title = 'Data Nilai Berhasil Diload';
                var msg = 'Teliti kembali data form nilai, sebelum melakukan penyimpanan data.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "15000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }      


  window.DataPesanError6 = function() {
     var shortCutFunction = 'error';
                var title = 'Opps Delete Failed';
                var msg = 'Data tidak bisa dihapus, karena <b>Status Nilai Sudah Terkirim</b>';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }

  window.DataPesanEmail = function() {
     var shortCutFunction = 'success';
                var title = 'Email successfully Sent';
                var msg = 'Password berhasil terkirim, silahkan untuk mengecek email.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }  

  window.DataPesanSms = function() {
     var shortCutFunction = 'success';
                var title = 'SMS successfully Sent';
                var msg = 'Password berhasil terkirim, silahkan untuk mengecek handphone.';
                var toastIndex = toastCount++;

               toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                
                $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
  }  


               

           
          

  