var TambahSiswa = function () {
$(document).ready(function()
            {
            $("#biodata_siswa").change(function()
  {
      if($(this).val() == "1")
  {
      $("#biodata_simple").show();
      $("#biodata_lengkap").hide();
     
  }
  else if ($(this).val() == "2") {
  	$("#biodata_simple").hide();
  	$("#biodata_lengkap").show();
  	
  } else {
      $("#biodata_simple").hide();
      $("#biodata_lengkap").hide();
      
  }
      });
                
}
	);


	$(document).ready(function()
            {
            $("#status_siswa").change(function()
  {
      if($(this).val() == "1")
  {
      $("#data_siswa").show();
      $("#data_alumni").hide();
      $("#data_alumni2").hide();
  }
  else if ($(this).val() == "2") {
  	$("#data_siswa").hide();
  	$("#data_alumni").show();
  	$("#data_alumni2").show();
  } else {
      $("#data_alumni").hide();
      $("#data_alumni2").hide();
      $("#data_siswa").hide();
  }
      });
                
}
	);

	$(document).ready(function()
            {
            $("#status_siswa_simple").change(function()
  {
      if($(this).val() == "1")
  {
      $("#data_siswa_simple").show();
      $("#data_alumni_simple").hide();
      $("#data_alumni2_simple").hide();
  }
  else if ($(this).val() == "2") {
  	$("#data_siswa_simple").hide();
  	$("#data_alumni_simple").show();
  	$("#data_alumni2_simple").show();
  } else {
      $("#data_alumni_simple").hide();
      $("#data_alumni2_simple").hide();
      $("#data_siswa_simple").hide();
  }
      });
                
}
	);



$(document).ready(function()
            {
            $("#password_siswa").change(function()
  {
      if($(this).val() == "2")
  {
      $("#masukkan_password").show();
      $("#masukkan_password2").show();
      
  }
  else if ($(this).val() == "1") {
  	 $("#masukkan_password").hide();
  	 $("#masukkan_password2").hide();
  	
  } else {
      $("#masukkan_password").hide();
      $("#masukkan_password2").hide();
  }
      });
                
}
	);


$(document).ready(function()
            {
            $("#password_siswa_simple").change(function()
  {
      if($(this).val() == "2")
  {
      $("#masukkan_password_simple").show();
      $("#masukkan_password2_simple").show();
      
  }
  else if ($(this).val() == "1") {
  	 $("#masukkan_password_simple").hide();
  	 $("#masukkan_password2_simple").hide();
  	
  } else {
      $("#masukkan_password_simple").hide();
      $("#masukkan_password2_simple").hide();
  }
      });
                
}
	);




if ($('#biodata_siswa').val()=='1'){
		$("#biodata_simple").show();
		$("#biodata_lengkap").hide();
		
	
		} else if ($('#biodata_siswa').val()=='2') {
			$("#biodata_simple").hide();
		$("#biodata_lengkap").show();
		
		} else {
			$("#biodata_simple").hide();
		$("#biodata_lengkap").hide();
		}
			


			if ($('#status_siswa').val()==''){
		$("#data_siswa").hide();
		$("#data_alumni").hide();
		$("#data_alumni2").hide();
		
		} else if ($('#status_siswa').val()=='1') {
			$("#data_siswa").show();
			$("#data_alumni").hide();
			$("#data_alumni2").hide();

		} else if ($('#status_siswa').val()=='2') {
			$("#data_siswa").hide();
			$("#data_alumni").show();
			$("#data_alumni2").show();
		} else {
			$("#data_siswa").hide();
		$("#data_alumni").hide();
		$("#data_alumni2").hide();
		
		}


			if ($('#status_siswa_simple').val()==''){
		$("#data_siswa_simple").hide();
		$("#data_alumni_simple").hide();
		$("#data_alumni2_simple").hide();
		
		} else if ($('#status_siswa_simple').val()=='1') {
			$("#data_siswa_simple").show();
			$("#data_alumni_simple").hide();
			$("#data_alumni2_simple").hide();

		} else if ($('#status_siswa_simple').val()=='2') {
			$("#data_siswa_simple").hide();
			$("#data_alumni_simple").show();
			$("#data_alumni2_simple").show();
		} else {
			$("#data_siswa_simple").hide();
		$("#data_alumni_simple").hide();
		$("#data_alumni2_simple").hide();
		
		}


			if ($('#password_siswa').val()=='1'){
		$("#masukkan_password").hide();
		$("#masukkan_password2").hide();
		
	
		} else if ($('#password_siswa').val()=='2') {
			$("#masukkan_password").show();
			$("#masukkan_password2").show();
		
		} else {
			$("#masukkan_password").hide();
			$("#masukkan_password2").hide();
		}


		if ($('#password_siswa_simple').val()=='1'){
		$("#masukkan_password_simple").hide();
		$("#masukkan_password2_simple").hide();
		
	
		} else if ($('#password_siswa_simple').val()=='2') {
			$("#masukkan_password_simple").show();
			$("#masukkan_password2_simple").show();
		
		} else {
			$("#masukkan_password_simple").hide();
			$("#masukkan_password2_simple").hide();
		}


}