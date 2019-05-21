<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Tambah Siswa
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemn Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Tambah Siswa</a>
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
								<i class="fa fa-user"></i>Form Biodata Siswa
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

							 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-siswa" id="form-siswa"  >


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
									Data Ayah </a>
								</li>
								<li>
									<a href="#tab_2_3" data-toggle="tab">
									Data Ibu </a>
								</li>
								<li>
									<a href="#tab_2_4" data-toggle="tab">
									Data Wali </a>
								</li>
								<li>
									<a href="#tab_2_5" data-toggle="tab">
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
                              <label class="control-label">Nama Lengkap Siswa*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_nama" class="form-control" placeholder="Nama Siswa" type="text">

                      </div>
                            </div>

                  </div>
                  
                 
                  
                  
                  
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">NIS : Username*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-lock  "></i>
                        </span>
                        <input name="siswa_nis"  id="mask_number_nis" class="form-control" placeholder="NIS" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">NISN</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="icon-book-open "></i>
                        </span>
                        <input name="siswa_nisn" id="mask_number_nisn" class="form-control" placeholder="NISN" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Nomor Ijazah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-graduation-cap "></i>
                        </span>
                        <input name="siswa_nomorijazah"  class="form-control" placeholder="Ex : 9182171" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Tahun Ijazah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar-o "></i>
                        </span>
                        <input name="siswa_tahunijazah"  id="ijazah-tahun" class="form-control" placeholder="Ex : 2015" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Email Siswa</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-envelope-o"></i>
                        </span>
                        <input name="siswa_email" class="form-control" placeholder="Email" type="text">
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
                        <select name="siswa_agama" class="form-control select2me" data-placeholder="Pilih Agama" id="siswa-agama">
                        <option value=""></option>
                        <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholic">Katholic</option>
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
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_handphone" id="mask_handphonesiswa" class="form-control" placeholder="No Handphone" type="text">
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
                        <select name="siswa_jeniskelamin" class="form-control select2me" data-placeholder="Jenis Kelamin" id="siswa-jeniskelamin">
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
                              <label class="control-label">Status dalam Keluarga</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-child"></i>
                        </span>
                        <input name="siswa_statuskeluarga" class="form-control" placeholder="Ex: Anak Kandung" type="text">
                      </div>
                            </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Anak Ke</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-sort-numeric-asc "></i>
                        </span>
                        <input name="siswa_urutansaudara" class="form-control" placeholder="Urutan Keluarga | Ex : Pertama" type="text">
                        
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
                        <input name="siswa_tempatlahir" class="form-control" placeholder="Tempat Lahir" type="text">
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
                        <input name="siswa_tanggallahir" class="form-control date-picker" placeholder="yyyy-mm-dd" type="text" id="siswa-tanggal" readonly>
                        
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">No Telp Rumah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                        </span>
                        <input name="siswa_telprumah" id="mask_telprumah" class="form-control" placeholder="Telp Rumah" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Hobi</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-gamepad "></i>
                        </span>
                        <input name="siswa_hobi" class="form-control" placeholder="Hobi" type="text" value=""/>
                        
                      </div>
                            </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Asal Sekolah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-institution"></i>
                        </span>
                        <input name="siswa_asalsekolah" class="form-control" placeholder="Asal Sekolah" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah</label>
                              
                      <textarea name="siswa_alamat" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                </div>


			<h4 class="form-section">Data Options</h4>
          
					 <div class="row">
              
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Tahun Angkatan*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar-o"></i>
                        </span>
                      <?php $attributes = array('name' => 'kelas_tahun', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'tahun-cari-modal');
                         echo form_dropdown($attributes, $arrayName = array('' => '','Angkatan Aktif' =>$data_angkatan_aktif2 ,'Angkatan Tidak Aktif/Alumni'=>$data_angkatan_tidakaktif2)); ?>
                        

                      </div>
                            </div>
                  </div>
                   <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label" >Kelas*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-users "></i>
                        </span>
                       <select name="siswa_kelas" class="form-control select2me" data-placeholder="Pilih Kelas" id="kelas-cari-modal" disabled="true">
                         <option value=""></option>
                       
                      </select>
                      </div>
                            </div>
                  </div>

                   
                  
                  
                  
                </div>

                <div class="row">

                 <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Tanggal masuk</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar "></i>
                        </span>
                        <input name="siswa_tanggalmasuk" class="form-control date-picker" placeholder="yyyy-mm-dd" type="text" id="siswa-tanggalmasuk" readonly>
                        
                      </div>
                            </div>
                  </div>
                <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Absen Siswa*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa  fa-sort"></i>
                        </span>
                       <input name="siswa_absen" class="form-control" id="mask_absen" placeholder="Absen Siswa" type="text">
                      </div>
                            </div>
                  </div>
                  
                  
                </div>

                <div class="row">
              
                  
                   <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Status Siswa*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-check-circle"></i>
                        </span>
                       <select name="siswa_status" class="form-control select2me" data-placeholder="Status Siswa" id="siswa-status">
                         <option value=""></option>
                        
                        <option value="1">Aktif</option>
                        <option value="2">Alumni</option>
                        <option value="3">Pindah</option>
                        <option value="4">Meninggal</option>
                        <option value="5">Keluar</option>
                        
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


								<div class="tab-pane fade" id="tab_2_2">
									<hr>	
								<div class="row">
              
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Ayah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_namaayah" class="form-control" placeholder="Nama Ayah" type="text">
                      </div>
                            </div>
                  </div>
                  
                  
                  
                  
                  
                </div>

                <div class="row">
              
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Pekerjaan Ayah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                        </span>
                        <input name="siswa_pekerjaanayah" class="form-control" placeholder="Pekerjaan Ayah" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Pedidikan Terakhir Ayah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-mortar-board"></i>
                        </span>
                        <select name="siswa_pendidikanayah" class="form-control select2me" data-placeholder="Pendidikan Ayah" id="siswa-pendidikanayah">
                        <option value=""></option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                      
                            
                                        </select>
                      </div>
                            </div>
                  </div>
                  
                  
                  
                  
                </div>

                <div class="row">
                
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Penghasilan Ayah/Bulan</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                        </span>
                        <select name="siswa_penghasilanayah" class="form-control select2me" data-placeholder="Penghasilan Ayah" id="siswa-penghasilanayah">
                        <option value=""></option>
                      <option value="Tidak Sekolah">Tidak Bekerja</option>
                      <option value="Rp 100.000 - Rp 500.000">Rp 100.000 - Rp 500.000</option>
                      <option value="Rp 500.000 - Rp 1 Juta">Rp 500.000 - Rp 1 Juta</option>
                      <option value="Rp 1.5 Juta - Rp 1.5 Juta">Rp 1 Juta - Rp 1.5 Juta</option>
                      <option value="Rp 1.5 Juta - Rp 2 Juta">Rp 1 Juta - Rp 2 Juta</option>
                      <option value="Rp 2 Juta - Rp 3.5 Juta">Rp 2 Juta - Rp 3.5 Juta</option>
                      <option value="Rp 3.5 Juta - Rp 5 Juta">Rp 3.5 Juta - Rp 5 Juta</option>
                      <option value="Rp 5 Juta Keatas">Rp 5 Juta Keatas</option>
                      
                                        </select>
                      </div>
                            </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">No Handphone Ayah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_notelpayah" id="mask_handphoneayah" class="form-control" placeholder="+628*********" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Ayah Sekarang</label>
                              
                      <textarea name="siswa_alamatayah" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                  </div>
                  <hr>
								</div>


								<div class="tab-pane fade" id="tab_2_3">
									<hr>
<div class="row">
              
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Ibu</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_namaibu"  class="form-control" placeholder="Nama Ibu" type="text">
                      </div>
                            </div>
                  </div>
                  
                  
                  
                  
                  
                </div>

                <div class="row">
              
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Pekerjaan Ibu</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                        </span>
                        <input name="siswa_pekerjaanibu" class="form-control" placeholder="Pekerjaan Ibu" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Pedidikan Terakhir Ibu</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-mortar-board"></i>
                        </span>
                        <select name="siswa_pendidikanibu" class="form-control select2me" data-placeholder="Pendidikan Ibu" id="siswa-pendidikanibu">
                        <option value=""></option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                      
                            
                                        </select>
                      </div>
                            </div>
                  </div>
                  
                  
                  
                  
                </div>

                <div class="row">
                
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Penghasilan Ibu/Bulan</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                        </span>
                        <select name="siswa_penghasilanibu" class="form-control select2me" data-placeholder="Penghasilan Ibu" id="siswa-penghasilanibu">
                        <option value=""></option>
                      <option value="Tidak Sekolah">Tidak Bekerja</option>
                      <option value="Rp 100.000 - Rp 500.000">Rp 100.000 - Rp 500.000</option>
                      <option value="Rp 500.000 - Rp 1 Juta">Rp 500.000 - Rp 1 Juta</option>
                      <option value="Rp 1.5 Juta - Rp 1.5 Juta">Rp 1 Juta - Rp 1.5 Juta</option>
                      <option value="Rp 1.5 Juta - Rp 2 Juta">Rp 1 Juta - Rp 2 Juta</option>
                      <option value="Rp 2 Juta - Rp 3.5 Juta">Rp 2 Juta - Rp 3.5 Juta</option>
                      <option value="Rp 3.5 Juta - Rp 5 Juta">Rp 3.5 Juta - Rp 5 Juta</option>
                      <option value="Rp 5 Juta Keatas">Rp 5 Juta Keatas</option>
                      
                                        </select>
                      </div>
                            </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">No Handphone Ibu</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_notelpibu" id="mask_handphoneibu" class="form-control" placeholder="+628*********" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Ibu Sekarang</label>
                              
                      <textarea name="siswa_alamatibu" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                </div>
                <hr>
								</div>


								<div class="tab-pane fade" id="tab_2_4">
									<hr>
									<div class="row">
              
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Wali</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_namawali" class="form-control" placeholder="Nama Wali" type="text">
                      </div>
                            </div>
                  </div>
                  
                  
                  
                  
                  
                </div>

                <div class="row">
              
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Pekerjaan Wali</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                        </span>
                        <input name="siswa_pekerjaanwali" class="form-control" placeholder="Pekerjaan Wali" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Pedidikan Terakhir Wali</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-mortar-board"></i>
                        </span>
                        <select name="siswa_pendidikanwali" class="form-control select2me" data-placeholder="Pendidikan Wali" id="siswa-pendidikanwali">
                        <option value=""></option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                      
                            
                                        </select>
                      </div>
                            </div>
                  </div>
                  
                  
                  
                  
                </div>

                <div class="row">
                
                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Penghasilan Wali/Bulan</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-dollar"></i>
                        </span>
                        <select name="siswa_penghasilanwali" class="form-control select2me" data-placeholder="Penghasilan Wali" id="siswa-penghasilanwali">
                        <option value=""></option>
                      <option value="Tidak Sekolah">Tidak Bekerja</option>
                      <option value="Rp 100.000 - Rp 500.000">Rp 100.000 - Rp 500.000</option>
                      <option value="Rp 500.000 - Rp 1 Juta">Rp 500.000 - Rp 1 Juta</option>
                      <option value="Rp 1.5 Juta - Rp 1.5 Juta">Rp 1 Juta - Rp 1.5 Juta</option>
                      <option value="Rp 1.5 Juta - Rp 2 Juta">Rp 1 Juta - Rp 2 Juta</option>
                      <option value="Rp 2 Juta - Rp 3.5 Juta">Rp 2 Juta - Rp 3.5 Juta</option>
                      <option value="Rp 3.5 Juta - Rp 5 Juta">Rp 3.5 Juta - Rp 5 Juta</option>
                      <option value="Rp 5 Juta Keatas">Rp 5 Juta Keatas</option>
                      
                                        </select>
                      </div>
                            </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">No Handphone Wali</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_notelpwali" id="mask_handphonewali" class="form-control" placeholder="+628*********" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Wali Sekarang</label>
                              
                      <textarea name="siswa_alamatwali" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                </div>
				<hr>
								</div>


								<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_2_5">
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

									<button id="btnSave" onclick="save()" type="button" class="btn grey-cascade"><i class="fa fa-plus-circle"></i> Tambah Data Siswa</button>
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