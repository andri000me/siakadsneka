var TambahSiswaKelas = function () {
if ($('#inputdatasiswa').val()=='1'){
		$("#siswa_aktif").show();
		$("#siswa_alumni").hide();
	
		} else if ($('#inputdatasiswa').val()=='2') {
			$("#siswa_aktif").hide();
		$("#siswa_alumni").show();
		
		} else {
			$("#siswa_aktif").hide();
		$("#siswa_alumni").hide();
		}


$(document).ready(function()
            {
            $("#inputdatasiswa").change(function()
  {
      if($(this).val() == "2")
  {
      $("#siswa_aktif").hide();
      $("#siswa_alumni").show();
      
  }
  else if ($(this).val() == "1") {
  	  $("#siswa_aktif").show();
      $("#siswa_alumni").hide();
      
  } else {
      $("#siswa_aktif").hide();
      $("#siswa_alumni").hide();
      
  }
      });
                
}
	);
}();