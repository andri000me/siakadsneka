<!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
      Profile Siswa
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          
          <li>
            <a href="#">Biodata Siswa</a>
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
          if (file_exists('raport_files/foto/siswa/thumbnail/'.$profilesiswa->siswa_foto)) {
            echo site_url().'raport_files/foto/siswa/thumbnail/'.$this->session->userdata('user_photo');
          } else {
            
            echo site_url().'raport_files/foto/siswa/thumbnail/default.png';

          }
          
          ?>
                " class="img-responsive" alt="">
              </div>
              <!-- END SIDEBAR USERPIC -->
              <!-- SIDEBAR USER TITLE -->
              <div class="profile-usertitle">
              
                <div id="nama-siswa" class="profile-usertitle-name">
                   <?php echo $profilesiswa->siswa_nama ?>
                </div>
                <div id="jurusan-siswa" class="profile-usertitle-job">
                   <?php echo $profilesiswa->kelas_kk ?>
                </div>
              </div>
              <!-- END SIDEBAR USER TITLE -->
              <!-- SIDEBAR BUTTONS -->
              <div class="profile-userbuttons">
                <button type="button" class="btn btn-circle green-haze btn-sm" id="siswa-nis"><?php echo $profilesiswa->siswa_nis ?></button>
                <button type="button" class="btn btn-circle btn-danger btn-sm" id="siswa-kelas"><?php echo $profilesiswa->kelas_nama ?></button>
              </div>
              <!-- END SIDEBAR BUTTONS -->
              
            </div>
            <!-- END PORTLET MAIN -->
            
          </div>
          <!-- END BEGIN PROFILE SIDEBAR -->
          <!-- BEGIN PROFILE CONTENT -->
          <div class="profile-content" id="edit-data-process">
            <div class="row">
              <div class="col-md-12 ">
                <div class="portlet light">
                  <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                      <i class="icon-globe theme-font hide"></i>
                      <span class="caption-subject font-blue-madison bold uppercase">Biodata Siswa</span>
                    </div>
                    <ul class="nav nav-tabs">
                      <li class="active">
                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                      </li>


                      <li >
                        <a href="#tab_1_2" data-toggle="tab">Data Ayah</a>
                      </li>

                      <li >
                        <a href="#tab_1_3" data-toggle="tab">Data Ibu</a>
                      </li>

                      <li >
                        <a href="#tab_1_4" data-toggle="tab">Data Wali</a>
                      </li>

                      
                      
                      <li>
                        <a href="#tab_1_5" data-toggle="tab">Ganti Foto</a>
                      </li>
                    </ul>
                  </div>
                  <div class="portlet-body">
                    <div class="tab-content">

                    <div class="row">
                      <div class="col-md-12">
                        <div id="data-edit-error-notif">
                        <?php echo $aktivasiedit ?>
                      </div>
                      <div id="data-error-notif">
                        
                      </div>
                      </div>
                    </div>
                      <!-- PERSONAL INFO TAB -->
                      <div class="tab-pane fade active in" id="tab_1_1">
                  
                   <form enctype="multipart/form-data" accept-charset="utf-8" name="form-update-siswa" id="form-update-siswa"  >
                     <div class="row">
              
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Siswa*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_nama" class="form-control" placeholder="Nama Siswa" type="text" disabled>

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
                        <input name="siswa_nis"  id="mask_number_nis" class="form-control" placeholder="NIS" type="text" disabled>
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
                        <input name="siswa_nisn" id="mask_number_nisn" class="form-control" placeholder="NISN" type="text" disabled>
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
                        <input name="siswa_nomorijazah"  class="form-control" placeholder="Ex : 9182171" type="text" disabled>
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
                        <input name="siswa_tahunijazah"  id="ijazah-tahun" class="form-control" placeholder="Ex : 2015" type="text" disabled>
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
                        <input name="siswa_email" class="form-control" placeholder="Email" type="text" disabled>
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
                        <select name="siswa_agama" class="form-control select2me" data-placeholder="Pilih Agama" id="siswa-agama" disabled>
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
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_handphone" id="mask_handphonesiswa" class="form-control" placeholder="No Handphone" type="text" disabled>
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
                        <select name="siswa_jeniskelamin" class="form-control select2me" data-placeholder="Jenis Kelamin" id="siswa-jeniskelamin" disabled>
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
                        <input name="siswa_statuskeluarga" class="form-control" placeholder="Ex: Anak Kandung" type="text" disabled>
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
                        <input name="siswa_urutansaudara" class="form-control" placeholder="Urutan Keluarga | Ex : Pertama" type="text" disabled>
                        
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
                        <input name="siswa_tempatlahir" class="form-control" placeholder="Tempat Lahir" type="text" disabled>
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
                        <input name="siswa_tanggallahir" class="form-control date-picker" placeholder="yyyy-mm-dd" type="text" id="siswa-tanggal" disabled>
                        
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
                        <input name="siswa_telprumah" id="mask_telprumah" class="form-control" placeholder="Telp Rumah" type="text" disabled>
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
                        <input name="siswa_hobi" class="form-control" placeholder="Hobi" type="text" disabled>
                        
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
                        <input name="siswa_asalsekolah" class="form-control" placeholder="Asal Sekolah" type="text" disabled>
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah</label>
                              
                      <textarea name="siswa_alamat" class="form-control" rows="2" disabled></textarea>
                    
                            </div>
                  </div>
                </div>
                        
<hr>
                
                </div>
                      <!-- END PERSONAL INFO TAB -->
                      
                
                <div class="tab-pane" id="tab_1_2">
                <div class="row">
              
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Ayah</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_namaayah" class="form-control" placeholder="Nama Ayah" type="text" disabled>
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
                        <input name="siswa_pekerjaanayah" class="form-control" placeholder="Pekerjaan Ayah" type="text" disabled>
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
                        <select name="siswa_pendidikanayah" class="form-control select2me" data-placeholder="Pendidikan Ayah" id="siswa-pendidikanayah" disabled>
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
                        <select name="siswa_penghasilanayah" class="form-control select2me" data-placeholder="Penghasilan Ayah" id="siswa-penghasilanayah" disabled>
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
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_notelpayah" id="mask_handphoneayah" class="form-control" placeholder="+628*********" type="text" disabled>
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Ayah Sekarang</label>
                              
                      <textarea name="siswa_alamatayah" class="form-control" rows="2" disabled></textarea>
                    
                            </div>
                  </div>
                  </div>
                <hr>
                </div> <!-- CHANGE AVATAR TAB -->

                <div class="tab-pane" id="tab_1_3">
                
                <div class="row">
              
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Ibu</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_namaibu"  class="form-control" placeholder="Nama Ibu" type="text" disabled>
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
                        <input name="siswa_pekerjaanibu" class="form-control" placeholder="Pekerjaan Ibu" type="text" disabled>
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
                        <select name="siswa_pendidikanibu" class="form-control select2me" data-placeholder="Pendidikan Ibu" id="siswa-pendidikanibu" disabled>
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
                        <select name="siswa_penghasilanibu" class="form-control select2me" data-placeholder="Penghasilan Ibu" id="siswa-penghasilanibu" disabled>
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
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_notelpibu" id="mask_handphoneibu" class="form-control" placeholder="+628*********" type="text" disabled>
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Ibu Sekarang</label>
                              
                      <textarea name="siswa_alamatibu" class="form-control" rows="2" disabled></textarea>
                    
                            </div>
                  </div>
                </div>
                <hr>
                </div> <!-- CHANGE AVATAR TAB -->

                <div class="tab-pane" id="tab_1_4">
                
                <div class="row">
              
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Nama Lengkap Wali</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </span>
                        <input name="siswa_namawali" class="form-control" placeholder="Nama Wali" type="text" disabled>
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
                        <input name="siswa_pekerjaanwali" class="form-control" placeholder="Pekerjaan Wali" type="text" disabled>
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
                        <select name="siswa_pendidikanwali" class="form-control select2me" data-placeholder="Pendidikan Wali" id="siswa-pendidikanwali" disabled>
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
                        <select name="siswa_penghasilanwali" class="form-control select2me" data-placeholder="Penghasilan Wali" id="siswa-penghasilanwali" disabled>
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
                        <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input name="siswa_notelpwali" id="mask_handphonewali" class="form-control" placeholder="+628*********" type="text" disabled>
                      </div>
                            </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                              <label class="control-label">Alamat Rumah Wali Sekarang</label>
                              
                      <textarea name="siswa_alamatwali" class="form-control" rows="2" disabled></textarea>
                    
                            </div>
                  </div>
                </div>
                <hr>
                </div> <!-- CHANGE AVATAR TAB -->


                      <div class="tab-pane" id="tab_1_5">
                      
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
                          <input type="file" name="image[]" id="uploadgambar" disabled>
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
          if (file_exists('raport_files/foto/siswa/thumbnail/'.$profilesiswa->siswa_foto)) {
            echo site_url().'raport_files/foto/siswa/thumbnail/'.$this->session->userdata('user_photo');
          } else {
            
            echo site_url().'raport_files/foto/siswa/thumbnail/default.png';

          }
          
          ?>
                        

                        " alt="">
                        <div class="mix-details">
                          <h3 id="nama-gambar"><?php echo $profilesiswa->siswa_nama ?></h3>
                           <p id="alamat-gambar">
                             <?php echo $profilesiswa->siswa_nis ?>                     </p>
                          <a id="link-gambar"  target="_blank" class="mix-link">
                          <i class="fa fa-link"> </i>
                          </a>
                          <a id="full-gambar" class="mix-preview fancybox-button" href="<?php 
          if (file_exists('raport_files/foto/siswa/thumbnail/'.$profilesiswa->siswa_foto)) {
            echo site_url().'raport_files/foto/siswa/thumbnail/'.$this->session->userdata('user_photo');
          } else {
            
            echo site_url().'raport_files/foto/siswa/thumbnail/default.png';

          }
          
          ?>" title="<?php echo $profilesiswa->siswa_nis.' - '.$profilesiswa->siswa_nama ?>" data-rel="fancybox-button">
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
                            <a class="btn green-haze" disabled>
                            Simpan Data </a>
                            <button type="reset" class="btn default" disabled><i class="fa fa-undo"></i> Reset Default Data</button>
                            
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