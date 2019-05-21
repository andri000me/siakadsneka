<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
	Profile Sekolah
</h3>

<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="index.html">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Pengaturan Raport</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Profile Sekolah</a>
		</li>
	</ul>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
	
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet light bordered" id="edit-data-process">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-university"></i>Konfigurasi Profile Sekolah
			</div>
			<div class="tools">
				<a href="javascript:;" class="reload"></a>
				<a href="javascript:;" class="collapse"></a>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="row">
				<div class="col-md-8">
					<div id="data-error-notif"></div>
				</div>
			</div>
			<form enctype="multipart/form-data" accept-charset="utf-8" name="form-profile" id="form-profile">
				<div class="row">
					<div class="col-md-7">
						<div class="tabbable-line">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_2_1" data-toggle="tab">School Info </a>
								</li>
								<li>
									<a href="#tab_2_5" data-toggle="tab">School Photo </a>
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
												<label class="control-label">Nama Sekolah*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-university"></i>
													</span>
													<input name="sekolah_nama" class="form-control" placeholder="Nama Sekolah" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Kepala Sekolah*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input name="sekolah_kepala" class="form-control" placeholder="Kelapa Sekolah" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Email*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input name="sekolah_email" class="form-control" placeholder="Email" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">NSS Sekolah*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="icon-book-open"></i>
													</span>
													<input id="mask_nss" name="sekolah_nss" class="form-control" placeholder="NSS" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">NPSN Sekolah*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-lock  "></i>
													</span>
													<input id="mask_npsn" name="sekolah_npsn" class="form-control" placeholder="NPSN" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Telp*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input id="mask_telp" name="sekolah_telp" class="form-control" placeholder="0274-28***" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Fax*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fax"></i>
													</span>
													<input id="mask_fax" name="sekolah_fax" class="form-control" placeholder="0274-28***" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Alamat Web*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-globe"></i>
													</span>
													<input name="sekolah_alamatweb" class="form-control" placeholder="Alamat Web" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Kode Post*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope-square"></i>
													</span>
													<input id="mask_kodepost" name="sekolah_kodepost" class="form-control" placeholder="Kodepos" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Kelurahan*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>
													<input name="sekolah_kelurahan" class="form-control" placeholder="Kelurahan" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Kecamatan*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>
													<input name="sekolah_kecamatan" class="form-control" placeholder="Kecamatan" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Kabupaten*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>
													<input name="sekolah_kabupaten" class="form-control" placeholder="Kabupaten" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Provinsi*</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>
													<input name="sekolah_provinsi" class="form-control" placeholder="Provinsi" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label">Alamat Sekolah*</label>
												<textarea name="sekolah_alamat" class="form-control" rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>

								<!-- CHANGE AVATAR TAB -->
								<div class="tab-pane" id="tab_2_5">
								<hr>
								<div class="row">
									<div class="col-md-8">
										<div class="note note-info">
											<i class="fa fa-info-circle"></i> Pastikan ekstensi data foto : <strong> .png|.jpg|.gif</strong> dan Max ukuran file : <strong> 2 MB</strong> .
										</div>
										<div class="form-group">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
												<div>
													<span class="btn default btn-file">
														<span class="fileinput-new">Select image </span>
														<span class="fileinput-exists">Change </span>
														<input type="file" name="image[]">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
												</div>
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-danger">NOTE! </span>
												<span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
											</div>
										</div>
									</div>
									<div class="row mix-grid thumbnails">
										<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img id="thum-gambar" class="img-responsive" src="<?php echo site_url('')?>raport_files/foto/profile_sekolah/thumbnail/<?php echo $profile_sekolah['sekolah_foto'] ?>" alt="">
												<div class="mix-details">
													<h3 id="nama-gambar"><?php echo $profile_sekolah['sekolah_nama'] ?></h3>
													<p id="alamat-gambar">
														<?php echo $profile_sekolah['sekolah_alamat'] ?>
													</p>
													<a id="link-gambar" href="<?php echo $profile_sekolah['sekolah_alamatweb'] ?>" target="_blank" class="mix-link">
														<i class="fa fa-link"> </i>
													</a>
													<a id="full-gambar" class="mix-preview fancybox-button" href="<?php echo site_url('')?>raport_files/foto/profile_sekolah/full/<?php echo $profile_sekolah['sekolah_foto'] ?>" title="<?php echo $profile_sekolah['sekolah_nama'] ?>" data-rel="fancybox-button">
														<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row"></div>
								<hr>
								</div>
								<!-- END CHANGE AVATAR TAB -->
			</form>
			<div class="form-actions noborder">
				<button id="btnUpdate" onclick="update()" type="button" class="btn grey-cascade"><i class="fa fa-plus-circle"></i> Simpan Data</button>
				<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset</button>
			</div>
		</div>
	</div>
</div>

							</div>
						
						
							</div>
										
									</div>

								
									
								</div>

							
								
						</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->



					
				
			</div>
		
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->