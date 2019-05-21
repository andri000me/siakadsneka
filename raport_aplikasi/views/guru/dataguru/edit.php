<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Tambah Guru
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemen Guru</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Tambah Guru</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
				
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="save-data-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-graduation-cap"></i>Form Biodata Guru
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body form">
						<div class="row">
								<div class="col-md-8">
									<div class="note note-info">
								
									 <i class="fa fa-info-circle"></i> Form field dengan tanda: <strong>* (bintang)</strong>, wajib untuk diisi.
								
							</div>
										
									</div>
							</div>
							
						
						  <div class="row">
                
			                <div class="col-md-8">
			                <div id="data-error-notif">
			              </div>
			              </div>
			              </div>

							 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-guru" id="form-guru"  >


						<div class="row">
							<div class="col-md-8">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_2_1" data-toggle="tab">
									Personal Info </a>
								</li>
								
								<li>
									<a href="#tab_2_2" data-toggle="tab">
									Photo Avatar </a>
								</li>
								

							</ul>
							</div>
								</div>
						</div>
							<div class="row">
							<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_2_1">
									<hr>

             <div class="row">
							
									<div class="col-md-8">
										<div class="form-group">
															<label class="control-label">Nama Lengkap Guru*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input name="guru_nama" class="form-control" placeholder="Nama Guru" type="text">
											</div>
														</div>
									</div>
									
									
									
									
									
								</div>
								<div class="row">
								<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">KODE : Username*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-lock  "></i>
												</span>
												<input name="guru_kode" class="form-control" placeholder="Username" type="text" id="mask_kodeguru">
											</div>
														</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">NIP</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-book-open"></i>
												</span>
												<input name="guru_nip" class="form-control" placeholder="NIP" type="text" id="mask_nipguru">
											</div>
														</div>
									</div>
									
								</div>
								<div class="row">
								<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Email Guru</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-envelope-o"></i>
												</span>
												<input name="guru_email" class="form-control" placeholder="Email" type="text">
											</div>
														</div>
									</div>
								<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Agama</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-lightbulb-o"></i>
												</span>
												<select name="guru_agama" class="form-control select2me" data-placeholder="Pilih Agama" id="guru-agama">
												<option value=""></option>
												<option value="Islam">Islam</option>
								                <option value="Kristen">Kristen</option>
								                <option value="Khatolik">Khatolik</option>
								                <option value="Hindu">Hindu</option>
								                <option value="Budha">Budha</option>
								                
												</select>
												
											</div>
														</div>
									</div>
								
									
								</div>
								<div class="row">
									

									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">No Handphone</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-phone-square"></i>
												</span>
												<input name="guru_notelp" class="form-control" placeholder="No Handphone" type="text" id="mask_notelpguru">
											</div>
														</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Jenis Kelamin*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-male"></i>
												</span>
												<select name="guru_jeniskelamin" class="form-control select2me" data-placeholder="Jenis Kelamin" id="guru-jeniskelamin">
												<option value=""></option>
												<option value="L">LAKI-LAKI</option>
								                <option value="P">PEREMPUAN</option>
								                
												</select>
												
											</div>
														</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Tempat Lahir</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-building-o "></i>
												</span>
												<input name="guru_tempatlahir" class="form-control" placeholder="Tempat Lahir" type="text">
											</div>
														</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Tanggal Lahir</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar "></i>
												</span>
												<input name="guru_tanggallahir" class="form-control date-picker" placeholder="yyyy-mm-dd" type="text" id="guru-tanggal" readonly>
                        
											</div>
														</div>
									</div>
								</div>
								<div class="row">
										<div class="col-md-8">
										<div class="form-group">
															<label class="control-label">Asal Universitas</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-institution"></i>
												</span>
												<input name="guru_asaluniv" class="form-control" placeholder="Asal Universitas" type="text">
											</div>
														</div>
									</div>

									
								</div>

								<div class="row">
										<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Jurusan</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-stethoscope "></i>
												</span>
												<input name="guru_jurusan" class="form-control" placeholder="Jurusan" type="text">
											</div>
														</div>
									</div>
										<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Jenjang Akhir</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-mortar-board"></i>
												</span>
												<select name="guru_jenjang" class="form-control select2me" data-placeholder="Pendidikan" id="guru-pendidikan">
												<option value=""></option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="D1">D1</option>
											<option value="D2">D2</option>
											<option value="D3">D3</option>
											<option value="D4">D4</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
											
								            
																				</select>
											</div>
														</div>
									</div>
									
								</div>

								
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
															<label class="control-label">Alamat Rumah</label>
															
											<textarea name="guru_alamat" class="form-control" rows="2"></textarea>
										
														</div>
									</div>
								</div>


			<h4 class="form-section">Data Options</h4>

					 <div class="row">
              
                 <div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Kelompok Guru*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-group"></i>
												</span>
												<select name="guru_kelompok" class="form-control select2me" data-placeholder="Pilih Kelompok" id="guru-kelompok">
												<option value=""></option>
											<option value="1">Guru P</option>
											<option value="2">Guru N-A</option>
											<option value="4">Guru BP</option>
											<option value="3">Kayawan</option>
											<option value="6">PPL</option>
											
											
								            
																				</select>
											</div>
														</div>
									</div>
                 <div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Group Guru</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-sitemap"></i>
												</span>
												<select name="guru_group" class="form-control select2me" data-placeholder="Pilih Group" id="guru-group">
												<option value=""></option>
											<option value="A">Adaptip</option>
											<option value="N">Normatip</option>
											<option value="B">Bangunan</option>
											<option value="E">Elektronika</option>
											<option value="L">Listrik</option>
											<option value="M">Mesin</option>
											<option value="O">Otomotif</option>
											<option value="K">Karyawan</option>
											<option value="BP">BP</option>
											
											
								            
																				</select>
											</div>
														</div>
									</div>
                  
                  
                  
                  
                  
                  
                </div>

               	<div class="row">
										
										<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Tugas Jabatan</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-tasks "></i>
												</span>
												<input name="guru_tugas" class="form-control" placeholder="Tugas Jabatan" type="text">
											</div>
														</div>
									</div>



										<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Mengajar</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-book "></i>
												</span>
												<input name="guru_mengajar" class="form-control" placeholder="Ex: Bahasa Indonesia" type="text">
											</div>
														</div>
									</div>
									
								</div>


									<div class="row">
										
										<div class="col-md-8">
										<div class="form-group">
															<label class="control-label">Status Guru*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-check-circle"></i>
												</span>
												<select name="guru_status" class="form-control select2me" data-placeholder="Status Guru" id="guru-status">
												<option value=""></option>
											<option value="1">Aktif</option>
											<option value="2">Mutasi</option>
											<option value="3">Pensiun</option>
											<option value="4">Meninggal</option>
											
											
											
								            
																				</select>
											</div>
														</div>
									</div>
									
								</div>

								
								

								

							<h4 class="form-section">Password Setting</h4>
							<div class="row">
							<div class="col-md-8">
								<div class="note note-info">
								<i class="fa fa-info-circle "></i>
								 Gunakan password generator untuk membuat <b>password</b> secara <b>acak/random</b>.
							</div>
							</div>
							
								
							</div>
							

							<div class="row">
							<div class="col-md-8">
								<div class="form-group  password-strength">
											<input name="user_password" placeholder="Masukkan Password" type="password" class="form-control" name="password" id="password_strength">
											
										</div>
									</div>
							</div>

							<div class="row">
							<div class="col-md-8">
								<div class="form-group  password-strength">
											<input name="user_password_confirm" placeholder="Confirm Password" type="password" class="form-control" name="password">
											
										</div>
									</div>
							</div>

							<div class="row">
							<div class="col-md-8">
								<div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                            </span>

                                         <input onclick="select_all(this)" name="user_passwordgenerator" class="form-control" placeholder="Generator Data" type="text" readonly>
                                        </div>
                                <span class="help-block"></span>
									</div>
							</div>


								
								<hr>
							


								
								
								</div>


								

								


								


								<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_2_2">
											<hr>
											<div class="row">
							
									<div class="col-md-8">
												 <div class="note note-info">
                
                         						<i class="fa fa-info-circle"></i> Pastikan ekstensi data foto : <strong> .png|.jpg|.gif</strong> dan Max ukuran file : <strong> 2 MB</strong> .
                
                       							 </div>
												</div>
												</div>

												<div class="row">
							
									<div class="col-md-8">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="image[]">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
													Remove </a>
												</div>
											</div>
														<div class="clearfix margin-top-10">
															<span class="label label-danger">NOTE! </span>
															<span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
														</div>
													</div>
													</div>
													</div>
													<hr>
											</div>
											<!-- END CHANGE AVATAR TAB -->
								<div class="form-actions noborder">

									<button id="btnSave" onclick="save()" type="button" class="btn grey-cascade"><i class="fa fa-plus-circle"></i> Tambah Data Guru</button>
									<button type="button" id="btngenerator" onclick="generator()" class="btn default blue-stripe">Generate Password</button>
									<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset</button>
								</div>
								

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