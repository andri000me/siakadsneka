<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Lembar Pengesahan Raport
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
						<a href="#">Lembar Pengesahan Raport</a>
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
								<i class="fa fa-check-circle"></i>Konfigurasi Lembar Pengesahan
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
								
								<div id="data-error-notif">
								
							
							</div>
							
							</div>
							</div>

							
							 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-pengesahan" id="form-pengesahan"  >
        					

        						<div class="row">
							<div class="col-md-7">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_2_1" data-toggle="tab">
									Setting Pengesahan </a>
								</li>
								
								<li>
									<a href="#tab_2_5" data-toggle="tab">
									Tanda Tangan </a>
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
							
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Nama Kepala Sekolah*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input name="pengesahan_namakepala" class="form-control" placeholder="Nama Kepala Sekolah" type="text">
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
												<input name="pengesahan_nipkepala" class="form-control" placeholder="NIP" type="text" id="mask_nipguru">
											</div>
														</div>
									</div>
									
									
									
									
								</div>
								<div class="row">
								

								<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Tempat Pengesahan*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-university"></i>
												</span>
												<input name="pengesahan_tempat" class="form-control" placeholder="Tempat Pengesahan" type="text">
											</div>
														</div>
									</div>
									


									<div class="col-md-4">
									 <div class="form-group">
                              <label class="control-label">Tanggal Pengesahan Raport*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar "></i>
                        </span>
                        <input name="pengesahan_tanggal" class="form-control date-picker" placeholder="yyyy-mm-dd" type="text" id="tanggal-pengesahan" readonly>
                        
                      </div>
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
													<div class="row mix-grid thumbnails">
														<div class="col-md-4 col-sm-6 mix category_1">
											<div class="mix-inner">
												<img id="thum-gambar" class="img-responsive" src="<?php echo site_url('')?>raport_files/foto/lembar_pengesahan/thumbnail/<?php echo $lembar_pengesahan['pengesahan_tandatangankepala'] ?>" alt="">
												<div class="mix-details">
													<h3 id="nama-gambar"><?php echo $lembar_pengesahan['pengesahan_namakepala'] ?></h3>
													<p id="alamat-gambar">
														 <?php echo $lembar_pengesahan['pengesahan_nipkepala'] ?>
													</p>
													
													<a id="full-gambar" class="mix-ofani fancybox-button" href="<?php echo site_url('')?>raport_files/foto/lembar_pengesahan/full/<?php echo $lembar_pengesahan['pengesahan_tandatangankepala'] ?>" title="<?php echo $lembar_pengesahan['pengesahan_namakepala'] ?>" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										</div>
												</div>
												 
												

													<div class="row">
													
													</div>
													
													<hr>
											</div>
											<!-- END CHANGE AVATAR TAB -->
									
								</div>
							
								
							



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