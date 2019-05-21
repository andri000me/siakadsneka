<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Import Data Siswa
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemen Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Import Data Siswa</a>
					</li>
					
					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="cek-siswa-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i>Import Data Siswa
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>

							
						</div>
						<div class="portlet-body">
							

							<div class="row">
							<div class="col-md-12">
								<div id="data-sukses-tambahhsiswa">
									
								</div>
								<div id="data-error-tambahsiswa">
									
								</div>
							
							</div>
							</div>
							
							 <?php
                $attributes = array('role' => 'form','id' => 'form-siswa-cari', 'name' => 'form-siswa-cari');
                echo form_open(site_url('guru/datasiswa/download_formsiswa'),$attributes); 
            ?>
							<div class="row">
									
									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar-o "></i>
												</span>
												
												  <?php $attributes = array('name' => 'siswa_cari_angkatan', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'siswa-tahun');
                         							echo form_dropdown($attributes, $arrayName = array('' => '','Angkatan Aktif' =>$data_angkatan_aktif2 ,'Angkatan Tidak Aktif/Alumni'=>$data_angkatan_tidakaktif2)); ?>
                        
												
											</div>
														</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>
												<select name="siswa_cari_kelas" class="form-control select2me" data-placeholder="Pilih Kelas" id="siswa-kelas">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												 	<input id="data-nis-siswa" name="siswa_nis"  placeholder="Generate NIS" class="form-control datanis-siswa-tambah" type="text">
											</div>
														</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="glyphicon glyphicon-record"></i>
												</span>
												 	<input name="jumlah_siswa" id="mask_jumlahsiswa" placeholder="Jumlah Siswa" class="form-control" type="text">
											</div>
														</div>
									</div>
										
									

									
									
								
								</div>
								

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
									<button onclick="cekformsiswa()" type="button" class="btn grey-cascade"><i class="fa fa-tasks"></i> Masukkan Data Siswa/Kelas</button>
									
								</div>
									</div>


									<div id="data-download" class="col-md-2">
										
									</div>
								</div>
								</form>
								
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="tambah-upload">
						
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->


					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					



					
				</div>
			</div>
		
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->