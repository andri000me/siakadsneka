<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Informasi Data Siswa</h3>
            </div>
            <div class="modal-body form">
                
	<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div id="siswa-profil" class="profile-userpic">
								
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div id="nama-lengkap-utama" class="profile-usertitle-name">
									 Ofani Dariyan
								</div>
								<div id="jurusan-utama" class="profile-usertitle-job">
									 Teknik Komputer dan Jaringan
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<span id="nis-utama" class="btn btn-circle green-haze btn-sm">NIS : 192829</span>
								<span id="kelas-utama"  class="btn btn-circle btn-danger btn-sm">KELAS : XIIEB</span>
							</div>
							<!-- END SIDEBAR BUTTONS -->
							
						</div>
						<!-- END PORTLET MAIN -->
						
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Biodata Siswa</span>
										</div>
										
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active">
												

													<table class="table table-hover table-striped table-bordered">
							<tbody>
							<tr>
								<td width="25%">
									Nama Lengkap
								</td>
								<td id="siswa-info-nama">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 NISN
								</td>
								<td id="siswa-info-nisn">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
								Jenis Kelamin
								</td>
								<td id="siswa-info-jeniskelamin">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Email 
								</td>
								<td id="siswa-info-email">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 No HP
								</td>
								<td id="siswa-info-handphone">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 TTL
								</td>
								<td id="siswa-info-ttl">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Asal Sekolah
								</td>
								<td id="siswa-info-asalsekolah">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Hobi
								</td>
								<td id="siswa-info-hobi">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Agama
								</td >
								<td id="siswa-info-agama">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Alamat Rumah
								</td >
								<td id="siswa-info-alamat">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Status
								</td>
								<td id="siswa-info-status">
									
								</td>
							</tr>
							</tbody></table>


											</div>
									
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
                
            </div>
           <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_editsiswa" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Informasi Data Siswa</h3>
            </div>
            <div class="modal-body form" id="edit-data-process">
               
                    <div class="portlet light">
                    <div class="portlet-body form">
                      <div class="row">
                <div class="col-md-12">
                  <div class="note note-info">
                
                   <i class="fa fa-info-circle"></i> Form field dengan tanda: <strong>* (bintang)</strong>, wajib untuk diisi.
                
              </div>
                    
                  </div>
                <div class="col-md-12">
                <div id="data-error-notif">
              </div>
              </div>
              </div>

               <form enctype="multipart/form-data" accept-charset="utf-8" name="form-siswa" id="form-siswa"  >
        
              <input name="siswa_id" type="hidden">
               <input name="siswa_nis2" type="hidden">
              <div class="row">
              <div class="col-md-12">
              <div class="tabbable-line">
                <ul class="nav nav-tabs">
                <li id="active-tab1" class="active">
                  <a href="#tab_2_1" data-toggle="tab">
                  Personal Info </a>
                </li>
                <li  id="active-tab2">
                  <a href="#tab_2_2" data-toggle="tab">
                  Data Ayah </a>
                </li>
                <li id="active-tab3">
                  <a href="#tab_2_3" data-toggle="tab">
                  Data Ibu </a>
                </li>
                <li id="active-tab4">
                  <a href="#tab_2_4" data-toggle="tab">
                  Data Wali </a>
                </li>
               
                <li id="active-tab6">
                  <a href="#tab_2_6" data-toggle="tab">
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
              
                  <div class="col-md-12">
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
                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">NIS : Username*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-lock  "></i>
                        </span>
                        <input name="siswa_nistampil"  id="mask_number_nis" class="form-control" placeholder="NIS" type="text" disabled>
                        <input name="siswa_nis" id="mask_number_nis" class="form-control" placeholder="NIS" type="hidden">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-6">
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
                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">Nomor Ijazah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-graduation-cap "></i>
                        </span>
                        <input name="siswa_nomorijazah" id="nomor-ijazah" class="form-control" placeholder="Ex : 9182171" type="text">
                      </div>
                            </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">Tahun Ijazah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar-o "></i>
                        </span>
                        <input name="siswa_tahunijazah" id="mask_tahunijazah" class="form-control" placeholder="Ex : 2015" type="text">
                      </div>
                            </div>
                  </div>
                </div>


                <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                  

                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">No Handphone</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                        </span>
                        <input name="siswa_handphone" id="mask_handphonesiswa" class="form-control" placeholder="No Handphone" type="text">
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
                  <div class="col-md-6">
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

                  <div class="col-md-6">
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
                  <div class="col-md-6">
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

                  <div class="col-md-6">
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
                   <div class="col-md-6">
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

                  <div class="col-md-6">
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
                   <div class="col-md-12">
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
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah</label>
                              
                      <textarea name="siswa_alamat" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                </div>


     


                
                
                </div>


                <div class="tab-pane fade" id="tab_2_2">
                  <hr>  
                <div class="row">
              
                  <div class="col-md-12">
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
              
                  <div class="col-md-6">
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
                  <div class="col-md-6">
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
                
                  <div class="col-md-6">
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


                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">No Handphone Ayah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                        </span>
                        <input name="siswa_notelpayah" id="mask_handphoneayah" class="form-control" placeholder="+628*********" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Ayah Sekarang</label>
                              
                      <textarea name="siswa_alamatayah" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                  </div>
                  
                </div>


                <div class="tab-pane fade" id="tab_2_3">
                  <hr>

                <div class="row">
              
                  <div class="col-md-12">
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
              
                  <div class="col-md-6">
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
                  <div class="col-md-6">
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
                
                  <div class="col-md-6">
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


                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">No Handphone Ibu</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                        </span>
                        <input name="siswa_notelpibu" id="mask_handphoneibu" class="form-control" placeholder="+628*********" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Ibu Sekarang</label>
                              
                      <textarea name="siswa_alamatibu" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                </div>
                
                </div>


                <div class="tab-pane fade" id="tab_2_4">
                  <hr>

                <div class="row">
              
                  <div class="col-md-12">
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
              
                  <div class="col-md-6">
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
                  <div class="col-md-6">
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
                
                  <div class="col-md-6">
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


                  <div class="col-md-6">
                    <div class="form-group">
                              <label class="control-label">No Handphone Wali</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-phone-square"></i>
                        </span>
                        <input name="siswa_notelpwali" id="mask_handphonewali" class="form-control" placeholder="+628*********" type="text">
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Wali Sekarang</label>
                              
                      <textarea name="siswa_alamatwali" class="form-control" rows="2"></textarea>
                    
                            </div>
                  </div>
                </div>
               
                </div>

               <!-- CHANGE AVATAR TAB -->
                      <div class="tab-pane" id="tab_2_6">
                      <hr>
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
                          <input id="gambar-upload-siswa" type="file" name="image[]">
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
                        <img id="thum-gambar" class="img-responsive" src="<?php echo site_url('') ?>/raport_files/foto/profile_sekolah/thumbnail/admin-342093-iron-and-wine-c60ea24d86b720ac53c9dcbb4ca2bf22a41da72916278795e9c5015d94f2.jpg" alt="">
                        <div class="mix-details">
                          <h3 id="nama-gambar">SMK JAYA DEE FANI HARDYS</h3>
                          <p id="alamat-gambar">
                             Jl.Cawang no:24 ofani                          </p>
                          <a id="link-gambar" href="http://smkn1magelang.sch.id/" target="_blank" class="mix-link">
                          <i class="fa fa-link"> </i>
                          </a>
                          <a id="full-gambar" class="mix-preview fancybox-button" href="<?php echo site_url('') ?>/raport_files/foto/profile_sekolah/full/admin-342093-iron-and-wine-c60ea24d86b720ac53c9dcbb4ca2bf22a41da72916278795e9c5015d94f2.jpg" title="SMK JAYA DEE FANI HARDYS" data-rel="fancybox-button">
                          <i class="fa fa-arrows-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    </div>
                        </div>
                         
                        

                          <div class="row">
                          
                          </div>
                          
                          
                      </div>
                      <!-- END CHANGE AVATAR TAB -->
               
              </div>
              </div>
              </div>

                    </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update()" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Update Data Siswa</button>
                <button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset Default Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
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
//var dt = $('#datasiswaaktif' ).DataTable();
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


    $('#datasiswaaktif')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#datasiswaaktif').DataTable({
 		//dom: '<lf<tr>ip>',
    
        dom : 'B<"row"<"col-md-6 col-sm-12"l><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"i><"col-md-7 col-sm-12"p>>',
        buttons: [
           {
               extend: 'print',
               title: 'Data Siswa Perwalian - SMK N 1 Magelang',
               text: '<li><i class="glyphicon glyphicon-print"></i> Print Preview</a></li>',
               autoPrint: false,
               exportOptions: {
                     modifier: {
                        selected: false
                    },
                    columns: ':visible'
                },
               

               customize: function ( win ) {
                    $(win.document.body)
                        .css( 'background-color', '#ffffff' )
                        //.prepend(
                          //  '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        //);
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }               
           },
           
            {
               extend: 'pdf',
                download: 'open',
               text: '<li><i class="fa fa-file-pdf-o"></i> Save as PDF </a></li>',
               exportOptions: {
                
                    columns: ':visible'
                },
                title: 'Data Siswa Perwalian - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>',
               exportOptions: {
                    
                    columns: ':visible'
                },
                title: 'Data Siswa Perwalian - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'copy',
               text: '<li><i class="fa fa-copy"></i> Copy to Clipboard </a></li>',

               exportOptions: {
                
                    columns: ':visible'
                },
               
                            
           }               
        ],

        select: {
            style: 'multi',
            selector: 'td:not(:last-child)'
            
        }, 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        
        "ajax": {
            "url": "<?php echo site_url('guru/datasiswa_wali/ajax_list_siswa_wali')?>",
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

            
            "columns": [
            {
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
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": false
            }],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
                    
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
          $('td:eq(0),td:eq(1),td:eq(3),td:eq(4),td:eq(5),td:eq(6),td:eq(7)', nRow).addClass( "raport-mapel" );
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
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-users"></i> <strong>Hasil pencarian data: </strong> Ditemukan data dengan jumlah <b>'+ info.recordsDisplay +'</b> siswa <b>Aktif</b>');

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
       
    table.buttons(0,null).container().prependTo( '#export-data' );

     new $.fn.dataTable.Buttons( table, {
      buttons: [
            {
               extend: 'colvis',
               text: '<li><i class="fa fa-th-large"></i> Atur Column</a></li>',
               postfixButtons: [ 'colvisRestore' ]
              
                            
           },             
        ],     
       
    } );
 
     table.buttons(1,null).container().prependTo( '#action-data' );

     new $.fn.dataTable.Buttons( table, {
      buttons: [
           {
               extend: 'print',
               text: '<li><i class="glyphicon glyphicon-print"></i> Print Preview (selected)</a></li>',
               autoPrint: false,
               title: 'Data Siswa Perwalian - SMK N 1 Magelang',
               exportOptions: {
                     modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
               

               customize: function ( win ) {
                    $(win.document.body)
                        .css( 'background-color', '#ffffff' )
                        //.prepend(
                          //  '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        //);
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }               
           },
           
            {
               extend: 'pdf',
                download: 'open',
               text: '<li><i class="fa fa-file-pdf-o"></i> Save as PDF (selected)</a></li>',
               exportOptions: {
                     modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
                title: 'Data Siswa Perwalian - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel (selected) </a></li>',
               exportOptions: {
                     modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
                title: 'Data Siswa Perwalian - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'copy',
               text: '<li><i class="fa fa-copy"></i> Copy to Clipboard (selected) </a></li>',

               exportOptions: {
                    modifier: {
                        selected: true
                    },
                    columns: ':visible'
                },
               
                            
           }               
        ],

        select: true,      
       
    } );
 
     table.buttons(2,null).container().prependTo( '#export-data-selected' );



$('#siswa-tanggal').click(function() {   // for select box
      
       $(this).datepicker('setDate', $(this).val());
         
} );

$('#siswa-tanggalmasuk').click(function() {   // for select box
      
       $(this).datepicker('setDate', $(this).val());
         
} );

$("#ijazah-tahun").inputmask("y", {
            "placeholder": "y"
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
 
$(':reset').live('click', function(){

  Metronic.blockUI({
                target: '#edit-data-process',
                boxed: true,
                message: 'Proses Mereset Data...',
                cenrerY: true,
                animate: false
            });
    $.ajax({
        url : "<?php echo site_url('guru/datasiswa_wali/lihat_data_siswa')?>/" + $('[name="siswa_id"]').val(),
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="siswa_id"]').val(data.siswa_id);
            $('[name="siswa_nama"]').val(data.siswa_nama);
            $('[name="siswa_nis"]').val(data.siswa_nis);
            $('[name="siswa_nistampil"]').val(data.siswa_nis);
            $('[name="siswa_nis2"]').val(data.siswa_nis);
            $('[name="siswa_nisn"]').val(data.siswa_nisn);
            $('[name="siswa_email"]').val(data.siswa_email);
            $('[name="siswa_agama"]').val(data.siswa_agama);
            $('[name="siswa_handphone"]').val(data.siswa_handphone);
            $('[name="siswa_jeniskelamin"]').val(data.siswa_jeniskelamin);
            $('[name="siswa_tempatlahir"]').val(data.siswa_tempatlahir);
            $('[name="siswa_tanggallahir"]').val(data.siswa_tanggallahir);

            //$('[name="siswa_tanggalmasuk"]').val(data.siswa_tanggalmasuk);
            $('[name="siswa_telprumah"]').val(data.siswa_telprumah);
            $('[name="siswa_nomorijazah"]').val(data.siswa_nomorijazah);
            $('[name="siswa_tahunijazah"]').val(data.siswa_tahunijazah);
            $('[name="siswa_statuskeluarga"]').val(data.siswa_statuskeluarga);
            $('[name="siswa_urutansaudara"]').val(data.siswa_urutansaudara);
            
            $('[name="siswa_asalsekolah"]').val(data.siswa_asalsekolah);
            $('[name="siswa_hobi"]').val(data.siswa_hobi);
            $('[name="siswa_alamat"]').val(data.siswa_alamat);
            $('[name="siswa_namaayah"]').val(data.siswa_namaayah);
            $('[name="siswa_pekerjaanayah"]').val(data.siswa_pekerjaanayah);
            $('[name="siswa_pendidikanayah"]').val(data.siswa_pendidikanayah);
            $('[name="siswa_penghasilanayah"]').val(data.siswa_penghasilanayah);
            $('[name="siswa_notelpayah"]').val(data.siswa_notelpayah);
            $('[name="siswa_alamatayah"]').val(data.siswa_alamatayah);
            $('[name="siswa_namaibu"]').val(data.siswa_namaibu);
            $('[name="siswa_pekerjaanibu"]').val(data.siswa_pekerjaanibu);
            $('[name="siswa_pendidikanibu"]').val(data.siswa_pendidikanibu);
            $('[name="siswa_penghasilanibu"]').val(data.siswa_penghasilanibu);
            $('[name="siswa_notelpibu"]').val(data.siswa_notelpibu);
            $('[name="siswa_alamatibu"]').val(data.siswa_alamatibu);
            $('[name="siswa_namawali"]').val(data.siswa_namawali);
            $('[name="siswa_pekerjaanwali"]').val(data.siswa_pekerjaanwali);
            $('[name="siswa_pendidikanwali"]').val(data.siswa_pendidikanwali);
            $('[name="siswa_penghasilanwali"]').val(data.siswa_penghasilanwali);
            $('[name="siswa_notelpwali"]').val(data.siswa_notelpwali);
            $('[name="siswa_alamatwali"]').val(data.siswa_alamatwali);
            //$('[name="kelas_tahun"]').val(data.kelas_tahun);
            //$('[name="siswa_kelas"]').val(data.siswa_kelas);
            //$('[name="siswa_absen"]').val(data.siswa_absen);
            //$('[name="siswa_status"]').val(data.siswa_status);

            

            

            $("#siswa-agama").val(data.siswa_agama).trigger("change");
            $("#siswa-jeniskelamin").val(data.siswa_jeniskelamin).trigger("change");
            $("#siswa-pendidikanayah").val(data.siswa_pendidikanayah).trigger("change");
            $("#siswa-penghasilanayah").val(data.siswa_penghasilanayah).trigger("change");
            $("#siswa-pendidikanibu").val(data.siswa_pendidikanibu).trigger("change");
            $("#siswa-penghasilanibu").val(data.siswa_penghasilanibu).trigger("change");
            $("#siswa-pendidikanwali").val(data.siswa_pendidikanwali).trigger("change");
            $("#siswa-penghasilanwali").val(data.siswa_penghasilanwali).trigger("change");
            //$("#tahun-cari-modal").val(data.kelas_tahun).trigger("change");
            //$("#kelas-cari-modal").val(data.siswa_kelas).trigger("change");
            //$("#siswa-status").val(data.siswa_status).trigger("change");

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

             $.get("<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto)
            .done(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
                });
               $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_files/foto/siswa/full/"+data.siswa_foto,
                "title" : data.siswa_nis +"-"+ data.siswa_nama
                });

            }).fail(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                });
                  $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                "title" : data.siswa_nis +"-"+ data.siswa_nama
                });

            });
            $('#alamat-gambar').text(data.kelas_kk);
            $('#nama-gambar').text(data.siswa_nama);

           Metronic.unblockUI('#edit-data-process');
            

           

              

             
             
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
             $("#data-error-notif").empty();
               
                    

                     var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-warning\"><\/i> <strong> Reset Gagal :<\/strong> Server sedang sibuk/koneksi internet tidak stabil.');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                window.setTimeout(function() {
                    $(".error-siswa").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);
                 Metronic.unblockUI('#edit-data-process');
                DataPesanError1();
               

        }
    });

});
  

  



 function edit_data(id)
{
    $('#form-siswa')[0].reset();
    $(".error-siswa").remove();
 //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('guru/datasiswa_wali/lihat_data_siswa')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            $('[name="siswa_id"]').val(data.siswa_id);
            $('[name="siswa_nama"]').val(data.siswa_nama);
            $('[name="siswa_nis"]').val(data.siswa_nis);
            $('[name="siswa_nistampil"]').val(data.siswa_nis);
            $('[name="siswa_nis2"]').val(data.siswa_nis);
            $('[name="siswa_nisn"]').val(data.siswa_nisn);
            $('[name="siswa_email"]').val(data.siswa_email);
            $('[name="siswa_agama"]').val(data.siswa_agama);
            $('[name="siswa_handphone"]').val(data.siswa_handphone);
            $('[name="siswa_jeniskelamin"]').val(data.siswa_jeniskelamin);
            $('[name="siswa_tempatlahir"]').val(data.siswa_tempatlahir);
            $('[name="siswa_tanggallahir"]').val(data.siswa_tanggallahir);

            //$('[name="siswa_tanggalmasuk"]').val(data.siswa_tanggalmasuk);
            $('[name="siswa_telprumah"]').val(data.siswa_telprumah);
            $('[name="siswa_nomorijazah"]').val(data.siswa_nomorijazah);
            $('[name="siswa_tahunijazah"]').val(data.siswa_tahunijazah);
            $('[name="siswa_statuskeluarga"]').val(data.siswa_statuskeluarga);
            $('[name="siswa_urutansaudara"]').val(data.siswa_urutansaudara);

            $('[name="siswa_asalsekolah"]').val(data.siswa_asalsekolah);
            $('[name="siswa_hobi"]').val(data.siswa_hobi);
            $('[name="siswa_alamat"]').val(data.siswa_alamat);
            $('[name="siswa_namaayah"]').val(data.siswa_namaayah);
            $('[name="siswa_pekerjaanayah"]').val(data.siswa_pekerjaanayah);
            $('[name="siswa_pendidikanayah"]').val(data.siswa_pendidikanayah);
            $('[name="siswa_penghasilanayah"]').val(data.siswa_penghasilanayah);
            $('[name="siswa_notelpayah"]').val(data.siswa_notelpayah);
            $('[name="siswa_alamatayah"]').val(data.siswa_alamatayah);
            $('[name="siswa_namaibu"]').val(data.siswa_namaibu);
            $('[name="siswa_pekerjaanibu"]').val(data.siswa_pekerjaanibu);
            $('[name="siswa_pendidikanibu"]').val(data.siswa_pendidikanibu);
            $('[name="siswa_penghasilanibu"]').val(data.siswa_penghasilanibu);
            $('[name="siswa_notelpibu"]').val(data.siswa_notelpibu);
            $('[name="siswa_alamatibu"]').val(data.siswa_alamatibu);
            $('[name="siswa_namawali"]').val(data.siswa_namawali);
            $('[name="siswa_pekerjaanwali"]').val(data.siswa_pekerjaanwali);
            $('[name="siswa_pendidikanwali"]').val(data.siswa_pendidikanwali);
            $('[name="siswa_penghasilanwali"]').val(data.siswa_penghasilanwali);
            $('[name="siswa_notelpwali"]').val(data.siswa_notelpwali);
            $('[name="siswa_alamatwali"]').val(data.siswa_alamatwali);
            //$('[name="kelas_tahun"]').val(data.kelas_tahun);
            //$('[name="siswa_kelas"]').val(data.siswa_kelas);
            //$('[name="siswa_absen"]').val(data.siswa_absen);
            //$('[name="siswa_status"]').val(data.siswa_status);

            

            $("#siswa-agama").val(data.siswa_agama).trigger("change");
            $("#siswa-jeniskelamin").val(data.siswa_jeniskelamin).trigger("change");
            $("#siswa-pendidikanayah").val(data.siswa_pendidikanayah).trigger("change");
            $("#siswa-penghasilanayah").val(data.siswa_penghasilanayah).trigger("change");
            $("#siswa-pendidikanibu").val(data.siswa_pendidikanibu).trigger("change");
            $("#siswa-penghasilanibu").val(data.siswa_penghasilanibu).trigger("change");
            $("#siswa-pendidikanwali").val(data.siswa_pendidikanwali).trigger("change");
            $("#siswa-penghasilanwali").val(data.siswa_penghasilanwali).trigger("change");
            //$("#tahun-cari-modal").val(data.kelas_tahun).trigger("change");
            //$("#kelas-cari-modal").val(data.siswa_kelas).trigger("change");
            //$("#siswa-status").val(data.siswa_status).trigger("change");

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");

             $.get("<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto)
            .done(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
                });
               $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_files/foto/siswa/full/"+data.siswa_foto,
                "title" : data.siswa_nis +"-"+ data.siswa_nama
                });

            }).fail(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                });
                  $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                "title" : data.siswa_nis +"-"+ data.siswa_nama
                });

            });

             

            $('#alamat-gambar').text(data.kelas_kk);
            $('#nama-gambar').text(data.siswa_nama);


             $("#tab_2_1").attr({
            "class" : "tab-pane fade active in",
            
            });
              $("#tab_2_2").attr({
            "class" : "tab-pane fade",
            
            });

              $("#tab_2_3").attr({
            "class" : "tab-pane fade",
            
            });

              $("#tab_2_4").attr({
            "class" : "tab-pane fade",
            
            });


              $("#tab_2_6").attr({
            "class" : "tab-pane fade",
            
            });


             $("#active-tab1").attr({
            "class" : "active",
            
            });
             $("#active-tab2").removeClass();
             $("#active-tab3").removeClass();
             $("#active-tab4").removeClass();
             $("#active-tab6").removeClass();



           $('#modal_form_editsiswa').modal('show');
           
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });
}
 
function lihat_data_siswa(id)
{
    save_method = 'update';
    //$('#form')[0].reset(); // reset form on modals

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('guru/datasiswa_wali/lihat_data_siswa')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	var status_siswa;
        	var nisn_siswa;
        	var siswa_nisn2 = data.siswa_nisn;
        	var siswa_jk = data.siswa_jeniskelamin;
        	var siswa_jk2;
        	var siswa_foto = data.siswa_foto;
        	var siswa_foto2;

        	if (data.siswa_status == 1) {
        		status_siswa = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif</span>';
        	} else if ( data.siswa_status == 2) {
        		status_siswa = '<span class="label label-primary"><i class="fa fa-graduation-cap "></i> Alumni</span>';
        	}

        	if (siswa_nisn2 == 0) {
        		nisn_siswa = '<span class="label label-info">KOSONG</span>';
        	} else {
        		nisn_siswa = '<span class="label label-info">'+ data.siswa_nisn +'</span>';
        	}

        	if (siswa_jk == 'L') {
        		siswa_jk2 = 'LAKI-LAKI';
        	} else if (siswa_jk == 'P') {
        		siswa_jk2 = 'PEREMPUAN';
        	}

        	$.get("<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto)
            .done(function() { 
               $('#siswa-profil').html('<img src="<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/'+data.siswa_foto+'" class="img-responsive" alt="'+data.siswa_nama+'">');

            }).fail(function() { 
               $('#siswa-profil').html('<img src="<?php echo site_url('') ?>raport_themes/assets/user/foto/icon-user-default.png" class="img-responsive" alt="Foto Belum Di Upload">');

            });
 		
            $('#nama-lengkap-utama').html(data.siswa_nama);
            $('#jurusan-utama').html(data.kelas_kk);
            $('#nis-utama').html('NIS :'+data.siswa_nis);
            $('#kelas-utama').html(data.kelas_nama);
            //$('#siswa-profil').html(siswa_foto2);
            $('#siswa-info-nama').html('<b>'+data.siswa_nama+'</b>');
            $('#siswa-info-nisn').html(nisn_siswa);
            $('#siswa-info-jeniskelamin').html(siswa_jk2);
            $('#siswa-info-email').html(data.siswa_email);
            $('#siswa-info-handphone').html('<span class="badge bg-red-pink">'+ data.siswa_handphone +'</span>');
            $('#siswa-info-ttl').html(data.siswa_tempatlahir + ', ' + data.siswa_tanggallahir);
            $('#siswa-info-asalsekolah').html(data.siswa_asalsekolah);
            $('#siswa-info-hobi').html(data.siswa_hobi);
            $('#siswa-info-agama').html(data.siswa_agama);
            $('#siswa-info-alamat').html(data.siswa_alamat);
            $('#siswa-info-status').html(status_siswa);
            
            
 
            //$('#form2')[0].reset();

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Informasi Data Siswa'); // Set title to Bootstrap modal title
 
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

function update_status_siswa() {
     $('#modal_status_siswa').modal('show');
     $('#upgrade-siswa-status').val('').trigger('change');
     $('#form-upgrade')[0].reset();
     $('.remove-notif-clear').remove();
     $('.sukses-notif-clear').remove();  

}

function reload_table2()
{
    table.ajax.reload(null,false); //reload datatable ajax
    
 
}



function update_form() {
   $.ajax({
        url : "<?php echo site_url('guru/datasiswa_wali/lihat_data_siswa')?>/" + $('[name="siswa_id"]').val(),
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
             $('[name="siswa_id"]').val(data.siswa_id);
            $('[name="siswa_nama"]').val(data.siswa_nama);
            $('[name="siswa_nis"]').val(data.siswa_nis);
            $('[name="siswa_nistampil"]').val(data.siswa_nis);
            $('[name="siswa_nis2"]').val(data.siswa_nis);
            $('[name="siswa_nisn"]').val(data.siswa_nisn);
            $('[name="siswa_email"]').val(data.siswa_email);
            $('[name="siswa_agama"]').val(data.siswa_agama);
            $('[name="siswa_handphone"]').val(data.siswa_handphone);
            $('[name="siswa_jeniskelamin"]').val(data.siswa_jeniskelamin);
            $('[name="siswa_tempatlahir"]').val(data.siswa_tempatlahir);
            $('[name="siswa_tanggallahir"]').val(data.siswa_tanggallahir);

            //$('[name="siswa_tanggalmasuk"]').val(data.siswa_tanggalmasuk);
            $('[name="siswa_telprumah"]').val(data.siswa_telprumah);
            $('[name="siswa_nomorijazah"]').val(data.siswa_nomorijazah);
            $('[name="siswa_tahunijazah"]').val(data.siswa_tahunijazah);
            $('[name="siswa_statuskeluarga"]').val(data.siswa_statuskeluarga);
            $('[name="siswa_urutansaudara"]').val(data.siswa_urutansaudara);

            $('[name="siswa_asalsekolah"]').val(data.siswa_asalsekolah);
            $('[name="siswa_hobi"]').val(data.siswa_hobi);
            $('[name="siswa_alamat"]').val(data.siswa_alamat);
            $('[name="siswa_namaayah"]').val(data.siswa_namaayah);
            $('[name="siswa_pekerjaanayah"]').val(data.siswa_pekerjaanayah);
            $('[name="siswa_pendidikanayah"]').val(data.siswa_pendidikanayah);
            $('[name="siswa_penghasilanayah"]').val(data.siswa_penghasilanayah);
            $('[name="siswa_notelpayah"]').val(data.siswa_notelpayah);
            $('[name="siswa_alamatayah"]').val(data.siswa_alamatayah);
            $('[name="siswa_namaibu"]').val(data.siswa_namaibu);
            $('[name="siswa_pekerjaanibu"]').val(data.siswa_pekerjaanibu);
            $('[name="siswa_pendidikanibu"]').val(data.siswa_pendidikanibu);
            $('[name="siswa_penghasilanibu"]').val(data.siswa_penghasilanibu);
            $('[name="siswa_notelpibu"]').val(data.siswa_notelpibu);
            $('[name="siswa_alamatibu"]').val(data.siswa_alamatibu);
            $('[name="siswa_namawali"]').val(data.siswa_namawali);
            $('[name="siswa_pekerjaanwali"]').val(data.siswa_pekerjaanwali);
            $('[name="siswa_pendidikanwali"]').val(data.siswa_pendidikanwali);
            $('[name="siswa_penghasilanwali"]').val(data.siswa_penghasilanwali);
            $('[name="siswa_notelpwali"]').val(data.siswa_notelpwali);
            $('[name="siswa_alamatwali"]').val(data.siswa_alamatwali);
            //$('[name="kelas_tahun"]').val(data.kelas_tahun);
            //$('[name="siswa_kelas"]').val(data.siswa_kelas);
            //$('[name="siswa_absen"]').val(data.siswa_absen);
            //$('[name="siswa_status"]').val(data.siswa_status);

            

            

            $("#siswa-agama").val(data.siswa_agama).trigger("change");
            $("#siswa-jeniskelamin").val(data.siswa_jeniskelamin).trigger("change");
            $("#siswa-pendidikanayah").val(data.siswa_pendidikanayah).trigger("change");
            $("#siswa-penghasilanayah").val(data.siswa_penghasilanayah).trigger("change");
            $("#siswa-pendidikanibu").val(data.siswa_pendidikanibu).trigger("change");
            $("#siswa-penghasilanibu").val(data.siswa_penghasilanibu).trigger("change");
            $("#siswa-pendidikanwali").val(data.siswa_pendidikanwali).trigger("change");
            $("#siswa-penghasilanwali").val(data.siswa_penghasilanwali).trigger("change");
            //$("#tahun-cari-modal").val(data.kelas_tahun).trigger("change");
            //$("#kelas-cari-modal").val(data.siswa_kelas).trigger("change");
            //$("#siswa-status").val(data.siswa_status).trigger("change");

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

             $.get("<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto)
            .done(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_files/foto/siswa/thumbnail/"+data.siswa_foto,
                });
               $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_files/foto/siswa/full/"+data.siswa_foto,
                "title" : data.siswa_nis +"-"+ data.siswa_nama
                });

            }).fail(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                });
                  $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                "title" : data.siswa_nis +"-"+ data.siswa_nama
                });

            });
            $('#alamat-gambar').text(data.kelas_kk);
            $('#nama-gambar').text(data.siswa_nama);

 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });
 }
 
function update()
{   
    Metronic.blockUI({
                target: '#edit-data-process',
                boxed: true,
                message: 'Proses Mengupdate Data...',
                cenrerY: true,
                animate: false
            });
    $('#btnUpdate').text('Update Data Siswa...'); //change button text
     var formData = new FormData( $("#form-siswa")[0] );
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('guru/datasiswa_wali/ajax_update_siswa')?>",
        type: "POST",
        data : formData,
        contentType : false,
        processData : false,
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            { 
                $("#data-error-notif").empty();
                if (data.inputerror.length == 0 ) {
                    '';
                } else {
                    for (var i = 0; i < data.inputerror.length; i++)
                {
                    var ofani = data.error_string[i];
                    if (ofani == '') {
                        data.error_string[i] = '<i class=\"fa fa-warning\"><\/i> <strong> Upload Gagal:<\/strong>  Anda belum memilih file untuk di upload.';
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else if (ofani == 'sukses') {
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-warning alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Data foto berhasil terupload .');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    }

                     
                }
                }

               //$('#gambar-upload-siswa').val('');
              //$('#gambar-upload-siswa').replaceWith(input.val('').clone(true));
              $(".fileinput").fileinput("clear");
              update_form();
              reload_table();
              Metronic.unblockUI('#edit-data-process');
                
                DataPesan();
                window.setTimeout(function() {
                    $(".error-siswa").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 10000);

                
                
            }
            else
            {
               $("#data-error-notif").empty();
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    var ofani = data.error_string[i];
                    if (ofani == '') {
                        data.error_string[i] = '<i class=\"fa fa-warning\"><\/i> <strong> Upload Gagal:<\/strong>  Anda belum memilih file untuk di upload.';
                    } else {
                        data.error_string[i];
                    }

                     var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-siswa'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable error-siswa fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                }

                Metronic.unblockUI('#edit-data-process');
            }
            $('#btnUpdate').text(' Update Data Siswa').prepend(' <i class="fa fa-plus-circle"></i>');
            //$('#btnUpdate').text('Update Wali'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnUpdate').text(' Update Data Siswa').prepend(' <i class="fa fa-plus-circle"></i>');
            $('#btnUpdate').attr('disabled',false); //set button enable

 
        }
    });
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
<!-- SCRIPTS DATA SISWA WALI -->