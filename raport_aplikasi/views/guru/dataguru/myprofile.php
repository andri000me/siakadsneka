<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Profile Guru
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">My Profile</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img id="thum-gambar2" src="
								 <?php 
					if (file_exists('raport_files/foto/guru/thumbnail/'.$profileguru->guru_foto)) {
						echo site_url().'raport_files/foto/guru/thumbnail/'.$this->session->userdata('user_photo');
					} else {
						
						echo site_url().'raport_files/foto/guru/thumbnail/default.png';

					}
					
					?>
								" class="img-responsive" alt="">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
							
								<div id="nama-guru" class="profile-usertitle-name">
									 <?php echo $profileguru->guru_nama ?>
								</div>
								<div id="nip-guru" class="profile-usertitle-job">
									 <?php echo $profileguru->guru_nip ?>
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<button type="button" class="btn btn-circle green-haze btn-sm" id="guru-kode"><?php echo $profileguru->guru_kode ?></button>
								<button type="button" class="btn btn-circle btn-danger btn-sm" id="guru-handphone"><?php echo $profileguru->guru_notelp ?></button>
							</div>
							<!-- END SIDEBAR BUTTONS -->
							
						</div>
						<!-- END PORTLET MAIN -->
						
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content" id="edit-data-process">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Biodata Guru</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
											</li>

											<li >
												<a href="#tab_1_2" data-toggle="tab">Data Options</a>
											</li>
											
											
											<li>
												<a href="#tab_1_3" data-toggle="tab">Ganti Foto</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">

										<div class="row">
											<div class="col-md-12">
											<div id="data-error-notif">
												
											</div>
											</div>
										</div>
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane fade active in" id="tab_1_1">
									
									 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-update-guru" id="form-update-guru"  >

            						 <div class="row">
							
									<div class="col-md-12">
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
								<div class="col-md-6">
										<div class="form-group">
															<label class="control-label">KODE : Username*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-lock  "></i>
												</span>
												<input name="guru_kode" class="form-control" placeholder="Username" type="text" id="mask_kodeguru" disabled>
											</div>
														</div>
									</div>
									<div class="col-md-6">
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
								<div class="col-md-6">
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
								<div class="col-md-6">
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
									

									<div class="col-md-6">
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
									
									<div class="col-md-6">
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
									<div class="col-md-6">
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

									<div class="col-md-6">
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
										<div class="col-md-12">
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
										<div class="col-md-6">
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
										<div class="col-md-6">
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
									<div class="col-md-12">
										<div class="form-group">
															<label class="control-label">Alamat Rumah</label>
															
											<textarea name="guru_alamat" class="form-control" rows="2"></textarea>
										
														</div>
									</div>
								</div>
								<hr>
								</div>
											<!-- END PERSONAL INFO TAB -->
											
								
								<div class="tab-pane" id="tab_1_2">
								<div class="row">
              
                 <div class="col-md-6">
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
                 <div class="col-md-6">
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
										
										<div class="col-md-12">
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



										
									
								</div>

								<div class="row">
								<div class="col-md-12">
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
								<hr>
								</div> <!-- CHANGE AVATAR TAB -->
                      <div class="tab-pane" id="tab_1_3">
                      
                      <div class="row">
              
                        <div class="col-md-8">
                        <div class="note note-info">
                
                         <i class="fa fa-info-circle"></i> Pastikan ekstensi data foto : <strong> .png|.jpg|.gif</strong> dan Max ukuran file : <strong> 2 MB</strong> .
                
                        </div>
                        
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
                          <input type="file" name="image[]" id="uploadgambar">
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

                          
                          <div class="mix-grid thumbnails">
                            <div class="col-md-4 col-sm-6 mix category_1">
                      <div class="mix-inner">
                        <img id="thum-gambar" class="img-responsive" src="
                        <?php 
					if (file_exists('raport_files/foto/guru/thumbnail/'.$profileguru->guru_foto)) {
						echo site_url().'raport_files/foto/guru/thumbnail/'.$this->session->userdata('user_photo');
					} else {
						
						echo site_url().'raport_files/foto/guru/thumbnail/default.png';

					}
					
					?>
                        

                        " alt="">
                        <div class="mix-details">
                          <h3 id="nama-gambar"><?php echo $profileguru->guru_nama ?></h3>
                           <p id="alamat-gambar">
                             <?php echo $profileguru->guru_nip ?>                     </p>
                          <a id="link-gambar"  target="_blank" class="mix-link">
                          <i class="fa fa-link"> </i>
                          </a>
                          <a id="full-gambar" class="mix-preview fancybox-button" href="<?php 
					if (file_exists('raport_files/foto/guru/full/'.$profileguru->guru_foto)) {
						echo site_url().'raport_files/foto/guru/full/'.$this->session->userdata('user_photo');
					} else {
						
						echo site_url().'raport_files/foto/guru/thumbnail/default.png';

					}
					
					?>" title="<?php echo $profileguru->guru_kode.' - '.$profileguru->guru_nama ?>" data-rel="fancybox-button">
                          <i class="fa fa-arrows-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    </div>
                        </div>
                         
                        <hr>

                      </div>
                      <!-- END CHANGE AVATAR TAB -->
											<div class="margiv-top-10">
														<a onclick="update()" class="btn green-haze">
														Simpan Data </a>
														<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset Default Data</button>
														
													</div>
													</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->