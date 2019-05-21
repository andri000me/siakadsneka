<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Informasi Data Guru</h3>
            </div>
            <div class="modal-body form" >
                
	<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div id="guru-profil" class="profile-userpic">
								
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div id="nama-lengkap-utama" class="profile-usertitle-name">
									 Ofani Dariyan
								</div>
								<div id="group-utama" class="profile-usertitle-job">
									 Teknik Komputer dan Jaringan
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<span id="kode-utama" class="btn btn-circle green-haze btn-sm">KODE : 192829</span>
								<span id="notelp-utama"  class="btn btn-circle btn-danger btn-sm">HP : XIIEB</span>
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
											<span class="caption-subject font-blue-madison bold uppercase">Biodata Guru</span>
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
								<td id="guru-info-nama">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 NIP
								</td>
								<td id="guru-info-nip">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
								Jenis Kelamin
								</td>
								<td id="guru-info-jeniskelamin">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Email 
								</td>
								<td id="guru-info-email">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 No HP
								</td>
								<td id="guru-info-handphone">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Agama
								</td >
								<td id="guru-info-agama">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 TTL
								</td>
								<td id="guru-info-ttl">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Asal Universitas
								</td>
								<td id="guru-info-universitas">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Jenjang Pendidikan
								</td>
								<td id="guru-info-jenjang">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Jabatan/Tugas :
								</td>
								<td id="guru-info-tugas">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Mengajar
								</td>
								<td id="guru-info-mengajar">
									
								</td>
							</tr>
							
							
							<tr>
								<td width="25%">
									 Alamat Rumah
								</td >
								<td id="guru-info-alamat">
									
								</td>
							</tr>
							<tr>
								<td width="25%">
									 Status
								</td>
								<td id="guru-info-status">
									
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
<div class="modal fade" id="modal_form_editguru" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Informasi Data Guru</h3>
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

               <form enctype="multipart/form-data" accept-charset="utf-8" name="form-guru" id="form-guru"  >
        
      			<input name="guru_id" type="hidden">
      			<input name="guru_kode2" type="hidden">
              <div class="row">
              <div class="col-md-12">
              <div class="tabbable-line">
                <ul class="nav nav-tabs">
                <li id="active-tab1" class="active">
                  <a href="#tab_2_1" data-toggle="tab">
                  Personal Info </a>
                </li>
                <li id="active-tab2">
                  <a href="#tab_2_2" data-toggle="tab">
                  Data Options </a>
                </li>
                <li id="active-tab3">
                  <a href="#tab_2_3" data-toggle="tab">
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
												<input name="guru_kode" class="form-control" placeholder="Username" type="text" id="mask_kodeguru">
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

								
								</div>


                


                


                




                <div class="tab-pane fade" id="tab_2_2">
                  <hr>  
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
										
										<div class="col-md-6">
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



										<div class="col-md-6">
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
										
										<div class="col-md-12">
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

               
               
                 
                </div>
               <!-- CHANGE AVATAR TAB -->
                      <div class="tab-pane" id="tab_2_3">
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
                         
                        

                      </div>
                      <!-- END CHANGE AVATAR TAB -->
               
              </div>
              </div>
              </div>

                    </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update()" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Update Data Guru</button>
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
<script src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/components-form-tools-guru.js"></script>
<script type="text/javascript" src="<?php echo site_url('')?>raport_themes/assets/admin/pages/scripts/ui-blockui.js"></script>
<script src="<?php echo site_url('')?>/raport_themes/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo site_url('')?>/raport_themes/assets/admin/pages/scripts/portfolio.js"></script>
<script type="text/javascript">

var save_method; //for save method string
var table;
//var dt = $('#dataguru' ).DataTable();
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


    $('#dataguru')
    .on( 'error.dt', function ( e, settings, techNote, message ) {
        console.log( 'An error has been reported by DataTables: ', message );
        DataPesanError1();
    } );
   
    //datatables
    
      //datatables
    table = $('#dataguru').DataTable({
 		//dom: '<lf<tr>ip>',
        dom : 'B<"row"<"col-md-6 col-sm-12"l><"col-md-6 col-sm-12"f>> <"table-scrollable"t> r<"row"<"col-md-5 col-sm-12"i><"col-md-7 col-sm-12"p>>',
        buttons: [
           {
               extend: 'print',
               title: 'Data Guru - SMK N 1 Magelang',
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
                title: 'Data Guru - SMK N 1 Magelang'
               
                            
           },
           {
               extend: 'excel',
               text: '<li><i class="fa fa-file-excel-o"></i> Export to Excel </a></li>',
               exportOptions: {
                    
                    columns: ':visible'
                },
                title: 'Data Guru - SMK N 1 Magelang'
               
                            
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
            "url": "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/ajax_list')?>",
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

            
            "columns": [{
                "orderable": false
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
            "pageLength": 10,            
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
          $('td:eq(2),td:eq(4),td:eq(5),td:eq(6),td:eq(7)', nRow).addClass( "raport-mapel" );
          //Metronic.initUniform($('input[type="checkbox"]'));
        },
           "drawCallback": function(oSettings) { // run some code on table redraw
                       
                        Metronic.initUniform($('input[type="checkbox"]')); // reinitialize uniform checkboxes on each table reload
                        $('.tooltips').tooltip();

                         $("#data-info-pencarian").empty();
                        var info = table.page.info();


                        var group = $('#pencarian-guru-group').val();
                        var status = $('#pencarian-guru-status').val();
                        var group2;
                        var status2;
                        if (group == 'A' ) {
                        	group2 = 'Adaptip';
                        } else if (group == 'N') {
                        	group2 = 'Normatip';
                        } else if (group == 'B') {
                        	group2 = 'Bangunan';
                        } else if (group == 'E') {
                        	group2 = 'Elektronika';
                        } else if (group == 'L') {
                        	group2 = 'Listrik';
                        } else if (group == 'M') {
                        	group2 = 'Mesin';
                        } else if (group == 'O') {
                        	group2 = 'Otomotif';
                        } else if (group == 'K') {
                        	group2 = 'Karyawan';
                        } else if (group == 'BP') {
                        	group2 = 'BP';
                        }

                        if (status == 1) {
                        	status2 = 'Aktif';
                        } else if (status == 2) {
                        	status2 = 'Mutasi';
                        } else if (status == 3) {
                        	status2 = 'Pensiun';
                        } else if (status == 4) {
                        	status2 = 'Meninggal';
                        } 
    				//var info = table.page.info();
  					var $DataDitemukan = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-graduate"></i> <strong>Hasil pencarian data: </strong> Ditemukan data dengan jumlah <b>'+ info.recordsDisplay +'</b> guru, pada group : <b>' + group2 + '</b>, dengan status : <b>' + status2 + '</b>.');

                 var $DataDitemukan2 = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-graduate"></i> <strong>Hasil pencarian data: </strong> Ditemukan data dengan jumlah <b>'+ info.recordsDisplay +'</b> guru, pada group : <b>' + group2 + '</b>.');
 				

 				var $DataDitemukan3 = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-graduate"></i> <strong>Hasil pencarian data: </strong> Ditemukan data dengan jumlah <b>'+ info.recordsDisplay +'</b> guru, pada <b>semua group</b>, dengan status : <b>' + status2 + '</b>.');

                 var $DataDitemukan4 = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-success alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-graduate"></i> <strong>Hasil pencarian data: </strong> Ditemukan data guru dengan jumlah <b>'+ info.recordsDisplay +'</b> data.');

                 var $DataTidakDitemukan = $('<div/>')   // creates a div element
                 .attr('id','wali-data-ofani'+[i])  // adds the id
                 .addClass('alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-graduate"></i> <strong>Hasil pencarian data: </strong> Maaf sistem tidak menemukan data yang sesuai pada record data <b>guru</b>');
                
                if (info.recordsDisplay ==  0) {
    				$('#data-info-pencarian').append($DataTidakDitemukan);
				} else {
    				if ($('#pencarian-guru-status').val() == '' && $('#pencarian-guru-group').val() == '') {
    					$('#data-info-pencarian').append($DataDitemukan4);
    				} else if ($('#pencarian-guru-group').val() !== '' && $('#pencarian-guru-status').val() == '') {
    					$('#data-info-pencarian').append($DataDitemukan2);
    				} else if ($('#pencarian-guru-group').val() == '' && $('#pencarian-guru-status').val() !== '') {
    					$('#data-info-pencarian').append($DataDitemukan3);
    				} else if ($('#pencarian-guru-group').val() !== '' && $('#pencarian-guru-status').val() !== '') {
    					$('#data-info-pencarian').append($DataDitemukan);
    				} else {
    					$('#data-info-pencarian').append($DataDitemukan4);
    				}
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
               title: 'Data Guru - SMK N 1 Magelang',
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
                title: 'Data Guru - SMK N 1 Magelang'
               
                            
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
                title: 'Data Guru - SMK N 1 Magelang'
               
                            
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



    //datepicker
  $('#guru-tanggal').click(function() {   // for select box
      
       $(this).datepicker('setDate', $(this).val());
         
	} );

  $('#pencarian-guru-status').prop('disabled', false);
  $('#pencarian-guru-group').prop('disabled', false);
  $("#pencarian-guru-status").val('').trigger("change");
  $("#pencarian-guru-group").val('').trigger("change");


$('#pencarian-guru-group').on( 'change', function () {   // for select box
    table
        .columns( 5 )
        .search( this.value )
        .draw();
} );

$('#pencarian-guru-status').on( 'change', function () {   // for select box
    table
        .columns( 6 )
        .search( this.value )
        .draw();
} );



  $("#reset-pencarian").click(function() {
  $('#pencarian-guru-status').prop('disabled', false);
  $('#pencarian-guru-group').prop('disabled', false);
  $("#pencarian-guru-status").val('').trigger("change");
  $("#pencarian-guru-group").val('').trigger("change");

  });

    //$("input[name='checkAll']").click(function() {
                //var checked = $(this).is(":checked");
                //$("#dataguru tbody tr td div span input:checkbox").attr("checked", checked);
                //$("#dataguru tbody tr td div span").attr("checked", checked);
            //});
            
 $('.group-checkable').change(function() {
                var set = $("#dataguru tbody tr td div span input:checkbox");
                var checked = $(this).is(":checked");
                $(set).each(function() {
                    $(this).attr("checked", checked);
                });
                $.uniform.update(set);
                //countSelectedRecords();
            });

   



    $("#del_all").on('click', function(e) {
     if(confirm('You are about to delete a record. This cannot be undone. Are you sure?'))
    {
    e.preventDefault();
    var checkValues = $('.checkbox1:checked').map(function()
    {
        return $(this).val();
    }).get();

    console.log(checkValues);
    $.each( checkValues, function( i, val ) {
        $("#"+val).remove();
        });
    // return  false;
    $.ajax({
        url: '<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/ajax_multiple_delete')?>',
        type: 'post',
        data: 'ids=' + checkValues
    }).done(function(data) {
        $("#respose").html(data);
        window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    $(".tutup-mapel-hr").fadeTo(1500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                    }, 5000);
        reload_table();
        //$('#selecctall').attr('checked', false);
    });
}
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
 
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax

 
}

function reload_table2()
{
    table.ajax.reload(null,false); //reload datatable ajax
    
 
}


function lihat_data_guru(id)
{
    save_method = 'update';
    //$('#form')[0].reset(); // reset form on modals
    
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/lihat_data_guru')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	var status_guru;
        	var guru_status = data.guru_status;
        	var nip_guru;
        	var guru_nip = data.guru_nip;
        	var guru_jk = data.guru_jeniskelamin;
        	var guru_jk2;
        	var guru_foto = data.guru_foto;
        	var guru_foto2;
        	var guru_hp = data.guru_notelp;
        	var guru_hp2;
        	var guru_hp3 = data.guru_notelp;
        	var guru_hp4;
        	var guru_tugas = data.guru_tugas;
        	var guru_tugas2;
        	var guru_mengajar = data.guru_mengajar;
        	var guru_mengajar2;
        	var guru_group = data.guru_group;
        	var guru_group2 ;

        	if ( guru_status  == 1) {
        		status_guru = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif</span>';
        	} else if (guru_status == '2') {
        		status_guru = '<span class="label bg-grey-gallery">Mutasi</span>';
        	} else if (guru_status == '3') {
        		status_guru = '<span class="label bg-green">Pensiun</span>';
        	} else if (guru_status == '4') {
        		status_guru = '<span class="label bg-red-sunglo">Meninggal</span>';
        	} else  {
        		status_guru = '<span class="label label-danger"><i class="fa fa-times "></i> Tidak Aktif</span>';
        	}

        	if (guru_nip == 0) {
        		nip_guru = '<span class="label label-info">NIP KOSONG</span>';
        	} else if (guru_nip == '') {
        		nip_guru = '<span class="label label-info">NIP KOSONG</span>';
        	} else {
        		nip_guru = '<span class="label label-info">'+ data.guru_nip +'</span>';
        	}

        	if (guru_hp == 0) {
        		guru_hp2 = '<span class="badge bg-red-pink">EMPTY/KOSONG</span>';
        	} else if (guru_hp == '-') {
        		guru_hp2  = '<span class="badge bg-red-pink">EMPTY/KOSONG</span>';
        	} else {
        		guru_hp2  = '<span class="badge bg-red-pink">'+ data.guru_notelp +'</span>';
        	}

        	if (guru_tugas == 0) {
        		guru_tugas2 = 'GURU/PENGAJAR';
        	} else if (guru_tugas == '-') {
        		guru_tugas2  = 'GURU/PENGAJAR';
        	} else {
        		guru_tugas2  = data.guru_tugas;
        	}

        	if (guru_mengajar == 0) {
        		guru_mengajar2 = 'TIDAK MENGAJAR';
        	} else if (guru_mengajar == '-') {
        		guru_mengajar2  = 'TIDAK MENGAJAR';
        	} else if (guru_mengajar == '') {
        		guru_mengajar2  = 'TIDAK MENGAJAR';
        	} else {
        		guru_mengajar2  = data.guru_mengajar;
        	}

        	if (guru_hp3 == 0) {
        		guru_hp4 = 'EMPTY/KOSONG';
        	} else if (guru_hp3 == '-') {
        		guru_hp4  = 'EMPTY/KOSONG';
        	} else {
        		guru_hp4  = data.guru_notelp;
        	}

        	if (guru_jk == 'L') {
        		guru_jk2 = 'LAKI-LAKI';
        	} else if (guru_jk == 'P') {
        		guru_jk2 = 'PEREMPUAN';
        	}

        	


        	 $.get("<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto)
            .done(function() { 
            	$('#guru-profil').html('<img src="<?php echo site_url('')?>raport_files/foto/guru/thumbnail/'+data.guru_foto+'" class="img-responsive" alt="'+data.guru_nama+'">');
               

            }).fail(function() { 
               $('#guru-profil').html('<img src="<?php echo site_url('') ?>raport_themes/assets/user/foto/icon-user-default.png" class="img-responsive" alt="Foto Belum Di Upload">');

            });

        	if (guru_group == 'A') {
        		guru_group2 = 'GROUP: GURU ADAPTIF';
        	} else if (guru_group == 'N') {
        		guru_group2 = 'GROUP : GURU NOMARTIP';
        	} else if (guru_group == 'B') {
        		guru_group2 = 'GROUP : GURU BANGUNAN';
        	} else if (guru_group == 'E') {
        		guru_group2 = 'GROUP : GURU ELEKTRONIKA';
        	} else if (guru_group == 'L') {
        		guru_group2 = 'GROUP : GURU LISTRIK ';
        	} else if (guru_group == 'M') {
        		guru_group2 = 'GROUP : GURU MESIN ';
        	} else if (guru_group == 'O') {
        		guru_group2 = 'GROUP : GURU OTOMOTIF ';
        	} else if (guru_group == 'K') {
        		guru_group2 = 'GROUP : KARYAWAN ';
        	} else if (guru_group == 'BP') {
        		guru_group2 = 'GROUP : GURU BP';
        	} 


            $('#nama-lengkap-utama').html(data.guru_nama);
            $('#group-utama').html(guru_group2);
            $('#kode-utama').html('KODE :'+data.guru_kode);
            $('#notelp-utama').html(guru_hp4);
            //$('#guru-profil').html(guru_foto2);
            $('#guru-info-nama').html('<b>'+data.guru_nama+'</b>');
            $('#guru-info-nip').html(nip_guru);
            $('#guru-info-jeniskelamin').html(guru_jk2);
            $('#guru-info-email').html(data.guru_email);
            $('#guru-info-handphone').html(guru_hp2);
            $('#guru-info-ttl').html(data.guru_tempatlahir + ', ' + data.guru_tanggallahir);
            $('#guru-info-universitas').html(data.guru_asaluniv);
            $('#guru-info-jenjang').html(data.guru_jenjang);
            $('#guru-info-agama').html(data.guru_agama);
            $('#guru-info-alamat').html(data.guru_alamat);
            $('#guru-info-status').html(status_guru);
            $('#guru-info-jenjang').html('<span class="label label-primary">'+ data.guru_jenjang +'</span>');
            $('#guru-info-tugas').html(guru_tugas2);
            $('#guru-info-mengajar').html(guru_mengajar2);
            
            
 
            //$('#form2')[0].reset();

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Informasi Data Guru'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });
}



$(':reset').live('click', function(){

  Metronic.blockUI({
                target: '#edit-data-process',
                boxed: true,
                message: 'Proses Mereset...',
                cenrerY: true,
                animate: false
            });
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/lihat_data_guru')?>/" + $('[name="guru_id"]').val(),
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="guru_id"]').val(data.guru_id);
           $('[name="guru_nama"]').val(data.guru_nama);
            $('[name="guru_kode"]').val(data.guru_kode);
            $('[name="guru_kode2"]').val(data.guru_kode);
             $('[name="guru_nip"]').val(data.guru_nip);
             $('[name="guru_email"]').val(data.guru_email);
             $('[name="guru_agama"]').val(data.guru_agama);
             $('[name="guru_notelp"]').val(data.guru_notelp);
             $('[name="guru_jeniskelamin"]').val(data.guru_jeniskelamin);
             $('[name="guru_tempatlahir"]').val(data.guru_tempatlahir);
             $('[name="guru_tanggallahir"]').val(data.guru_tanggallahir);
             $('[name="guru_asaluniv"]').val(data.guru_asaluniv);
             $('[name="guru_jurusan"]').val(data.guru_jurusan);
             $('[name="guru_jenjang"]').val(data.guru_jenjang);
             $('[name="guru_alamat"]').val(data.guru_alamat);
             $('[name="guru_group"]').val(data.guru_group);
             $('[name="guru_kelompok"]').val(data.guru_kelompok);
             $('[name="guru_tugas"]').val(data.guru_tugas);
             $('[name="guru_mengajar"]').val(data.guru_mengajar);
             $('[name="guru_status"]').val(data.guru_status);


            

            $("#guru-agama").val(data.guru_agama).trigger("change");
            $("#guru-jeniskelamin").val(data.guru_jeniskelamin).trigger("change");
            $("#guru-pendidikan").val(data.guru_jenjang).trigger("change");
            $("#guru-group").val(data.guru_group).trigger("change");
            $("#guru-kelompok").val(data.guru_kelompok).trigger("change");
            $("#guru-status").val(data.guru_status).trigger("change");
            

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

          
             $.get("<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto)
            .done(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto,
                });
               $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_files/foto/guru/full/"+data.guru_foto,
                "title" : data.guru_kode +"-"+ data.guru_nama
                });

            }).fail(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                });
                  $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                "title" : data.guru_kode +"-"+ data.guru_nama
                });

            });
            $('#alamat-gambar').text(data.guru_nip);
            $('#nama-gambar').text(data.guru_nama);


           Metronic.unblockUI('#edit-data-process');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });

});
  


 function edit_guru(id)
{
    $('#form-guru')[0].reset();
    $(".error-data-guru").remove();
 //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/lihat_data_guru')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            $('[name="guru_id"]').val(data.guru_id);
           $('[name="guru_nama"]').val(data.guru_nama);
            $('[name="guru_kode"]').val(data.guru_kode);
            $('[name="guru_kode2"]').val(data.guru_kode);
             $('[name="guru_nip"]').val(data.guru_nip);
             $('[name="guru_email"]').val(data.guru_email);
             $('[name="guru_agama"]').val(data.guru_agama);
             $('[name="guru_notelp"]').val(data.guru_notelp);
             $('[name="guru_jeniskelamin"]').val(data.guru_jeniskelamin);
             $('[name="guru_tempatlahir"]').val(data.guru_tempatlahir);
             $('[name="guru_tanggallahir"]').val(data.guru_tanggallahir);
             $('[name="guru_asaluniv"]').val(data.guru_asaluniv);
             $('[name="guru_jurusan"]').val(data.guru_jurusan);
             $('[name="guru_jenjang"]').val(data.guru_jenjang);
             $('[name="guru_alamat"]').val(data.guru_alamat);
             $('[name="guru_group"]').val(data.guru_group);
             $('[name="guru_kelompok"]').val(data.guru_kelompok);
             $('[name="guru_tugas"]').val(data.guru_tugas);
             $('[name="guru_mengajar"]').val(data.guru_mengajar);
             $('[name="guru_status"]').val(data.guru_status);


            

            $("#guru-agama").val(data.guru_agama).trigger("change");
            $("#guru-jeniskelamin").val(data.guru_jeniskelamin).trigger("change");
            $("#guru-pendidikan").val(data.guru_jenjang).trigger("change");
            $("#guru-group").val(data.guru_group).trigger("change");
            $("#guru-kelompok").val(data.guru_kelompok).trigger("change");
            $("#guru-status").val(data.guru_status).trigger("change");
            

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

          
            $.get("<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto)
            .done(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto,
                });
               $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_files/foto/guru/full/"+data.guru_foto,
                "title" : data.guru_kode +"-"+ data.guru_nama
                });

            }).fail(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                });
                  $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                "title" : data.guru_kode +"-"+ data.guru_nama
                });

            });

            $('#alamat-gambar').text(data.guru_nip);
            $('#nama-gambar').text(data.guru_nama);


             $("#tab_2_1").attr({
            "class" : "tab-pane fade active in",
            
            });
              $("#tab_2_2").attr({
            "class" : "tab-pane fade",
            
            });

              $("#tab_2_3").attr({
            "class" : "tab-pane fade",
            
            });

            


             $("#active-tab1").attr({
            "class" : "active",
            
            });
             $("#active-tab2").removeClass();
             $("#active-tab3").removeClass();
            
           $('#modal_form_editguru').modal('show');
           
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //alert('Gagal Untuk Mendapatkan Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            DataPesanError1();

        }
    });
}


function update_form() {
   $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/lihat_data_guru')?>/" + $('[name="guru_id"]').val(),
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="guru_id"]').val(data.guru_id);
           $('[name="guru_nama"]').val(data.guru_nama);
            $('[name="guru_kode"]').val(data.guru_kode);
            $('[name="guru_kode2"]').val(data.guru_kode);
             $('[name="guru_nip"]').val(data.guru_nip);
             $('[name="guru_email"]').val(data.guru_email);
             $('[name="guru_agama"]').val(data.guru_agama);
             $('[name="guru_notelp"]').val(data.guru_notelp);
             $('[name="guru_jeniskelamin"]').val(data.guru_jeniskelamin);
             $('[name="guru_tempatlahir"]').val(data.guru_tempatlahir);
             $('[name="guru_tanggallahir"]').val(data.guru_tanggallahir);
             $('[name="guru_asaluniv"]').val(data.guru_asaluniv);
             $('[name="guru_jurusan"]').val(data.guru_jurusan);
             $('[name="guru_jenjang"]').val(data.guru_jenjang);
             $('[name="guru_alamat"]').val(data.guru_alamat);
             $('[name="guru_group"]').val(data.guru_group);
             $('[name="guru_kelompok"]').val(data.guru_kelompok);
             $('[name="guru_tugas"]').val(data.guru_tugas);
             $('[name="guru_mengajar"]').val(data.guru_mengajar);
             $('[name="guru_status"]').val(data.guru_status);


            

            $("#guru-agama").val(data.guru_agama).trigger("change");
            $("#guru-jeniskelamin").val(data.guru_jeniskelamin).trigger("change");
            $("#guru-pendidikan").val(data.guru_jenjang).trigger("change");
            $("#guru-group").val(data.guru_group).trigger("change");
            $("#guru-kelompok").val(data.guru_kelompok).trigger("change");
            $("#guru-status").val(data.guru_status).trigger("change");
            

             //$("#data-select2-raport4").val(data.wali_kelas).trigger("change");
            

          
             
            $.get("<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto)
            .done(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_files/foto/guru/thumbnail/"+data.guru_foto,
                });
               $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_files/foto/guru/full/"+data.guru_foto,
                "title" : data.guru_kode +"-"+ data.guru_nama
                });

            }).fail(function() { 
                $("#thum-gambar").attr({
                "src" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                });
                  $("#full-gambar").attr({
                "href" : "<?php echo site_url('')?>raport_themes/assets/user/foto/icon-user-default.png",
                "title" : data.guru_kode +"-"+ data.guru_nama
                });

            });

            
            $('#alamat-gambar').text(data.guru_nip);
            $('#nama-gambar').text(data.guru_nama);

 
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
    $('#btnUpdate').text('Update Data Guru...'); //change button text
     var formData = new FormData( $("#form-guru")[0] );
    // ajax update data to database
    $.ajax({
        url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/ajax_update_guru')?>",
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
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else if (ofani == 'sukses') {
                        var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-warning alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class=\"fa fa-thumbs-up  \"><\/i> <strong> Successfully:<\/strong>  Data foto berhasil terupload .');
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    } else {
                       var $newDiv = $('<div/>')   // creates a div element
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                    }

                     
                }
                }

              $(".fileinput").fileinput("clear");
              update_form();
              reload_table();
              Metronic.unblockUI('#edit-data-process');
                
                DataPesan();
                window.setTimeout(function() {
                    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
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
                 .attr('id','data-profile-guru'+[i])  // adds the id
                 .addClass('error-data-guru alert alert-danger alert-dismissable fade in')   // add a class
                 .html(' <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> '+ data.error_string[i]);
                //$('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                //$('[name="'+data.inputerror[i]+'"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                $('#data-error-notif').append($newDiv);
                }

                Metronic.unblockUI('#edit-data-process');
            }
            $('#btnUpdate').text(' Update Data Guru').prepend(' <i class="fa fa-plus-circle"></i>');
            //$('#btnUpdate').text('Update Wali'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   
          Metronic.unblockUI('#edit-data-process');
            DataPesanError3();
            //alert('Gagal untuk Update Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            $('#btnUpdate').text(' Update Data Guru').prepend(' <i class="fa fa-plus-circle"></i>');
            $('#btnUpdate').attr('disabled',false); //set button enable

 
        }
    });
}
 
function delete_guru(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
                DataPesanDelete();
                
            }
            else
            {	 
            	$('#modal_form').modal('hide');
                reload_table();
                DataPesanError6();
            }
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {   
                DataPesanError2();
                //alert('Gagal untuk Delete Data (Kemungkinan Server Sibuk/Koneksi Internet Tidak Stabil)');
            }
        });
 
    }
}


 
</script>

<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   //TableOfaniOtomatis.init();
 ComponentsPickers.init();
Portfolio.init();
ComponentsFormTools.init();
});
</script>
<!-- SCRIPTS DATA GURU LIHAT DATA -->