<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Input Nilai Eskul (Wajib)
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemen Nilai</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Nilai Eskul</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Eskul Wajib</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Input Nilai</a>
						
					</li>
					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="cek-nilai-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil-square"></i>Input Nilai Eskul (Wajib)
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
								<div id="data-sukses-nilai">
									<?php echo $infonilai ?>
								</div>
								<div id="data-error-nilai">
									
								</div>
							
							</div>
							</div>
							
							 <?php
                $attributes = array('role' => 'form','id' => 'form-nilai-cari', 'name' => 'form-nilai-cari');
                echo form_open(site_url('guru/datanilaieskul/download_formnilai'),$attributes); 
            ?>
							<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar-o "></i>
												</span>
												
												  <?php $attributes = array('name' => 'nilai_cari_angkatan', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'nilai-tahun');
                         							echo form_dropdown($attributes, $arrayName = array('' => '','Angkatan Aktif' =>$data_angkatan_aktif2 ,'Angkatan Tidak Aktif/Alumni'=>$data_angkatan_tidakaktif2)); ?>
                        
												
											</div>
														</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>
												<select name="nilai_cari_kelas" class="form-control select2me" data-placeholder="Pilih Kelas" id="nilai-kelas">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>
									</div>
									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-badge"></i>
												</span>
												<select name="nilai_cari_semester" class="form-control select2me" data-placeholder="Pilih Semester" id="nilai-semester">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-support"></i>
												</span>
												<select name="nilai_cari_eskul" class="form-control select2me" data-placeholder="Pilih Eskul" id="nilai-eskul">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>

									
								
								</div>
								

								<div class="row">
									<div class="col-md-2">
										<div class="form-group">
									<button onclick="cekformnilai()" type="button" class="btn grey-cascade"><i class="fa fa-tasks"></i> Input Nilai Siswa</button>
									
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
					

					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade" id="savenilai-data-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i>Input Nilai Siswa
							</div>

							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
										</a>
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>

							<div class="actions">
								
								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-bug"></i> Bulk Action<i class="fa fa-angle-down"></i>
									</a>
									<ul id="action-data" class="dropdown-menu pull-right">
									
										<li>
											<a onclick="clear_notif()">
											<i class="glyphicon glyphicon-trash"></i> Clear Semua Notification </a>
										</li>

		
									</ul>
								</div>
								
								
								
								
							</div>
							
						</div>
						<div class="portlet-body form" id="save-data-process">
						<div class="form-body">

							<div id="data-sukses-siswa">
								
							</div>

							<div id="data-error-nilaisiswa">
								
							</div>
						
							<div id="data-generate-formnilai">
								
							</div>

							
					
						 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-siswa-nilai" id="form-siswa-nilai"  >
							<input id="datanilaieskul-masuk" name="data_masuk" type="hidden" >
							<table id="datanilaieskulsiswa" class="table table-striped table-bordered table-hover" >
							<thead>
							<tr>
								
								<th width="5%">
								No
								</th>
								<th width="10%" style="text-align:center;">
									 NIS
								</th>
								<th width="25%">
									 Nama Siswa
								</th>
								<th width="15%" style="text-align:center;">
									 Eskul
								</th>
								<th width="8%" style="text-align:center;">
									 Kelas
								</th>
								<th  width="6%" style="text-align:center;">
									 Absen
								</th>
								<th style="text-align:center;">
									 Nilai Eskul
								</th>
								<th width="25%" style="text-align:center;">
									 Deskripsi
								</th>
								
								
								
							</tr>
							</thead>
							<tbody>
								
							</tbody>
							</table>
							
							<div class="form-actions noborder">
									

									

										<div class="col-md-2">
										<button id="btnSave" onclick="savenilai()" type="button" class="btn grey-cascade"><i class="fa fa-tasks"></i> Simpan Nilai Siswa</button>
										
										</div>
										
										
										
										<div class="col-md-2">
										<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset Form</button>
										</div>
										

									
									
									
									
									
								</div>
						</div>
						</form>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->



					
				</div>
			</div>
		
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->