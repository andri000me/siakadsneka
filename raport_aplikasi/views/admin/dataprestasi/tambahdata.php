<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Prestasi
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Prestasi Manager</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Tambah Prestasi</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="tambah-data-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-plus "></i>Tambah Prestasi
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" id="form2">
							<div class="row">
								<div id="data-error-kelas" class="col-md-12">
								
							
							</div>
							
							</div>
							
							<div class="row">
									
									<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Kelas*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users"></i>
												</span>
												 <select name="prestasi_kelas" placeholder="Pilih Kelas" class="form-control select2me" id="data-kelas-aktif2">
                                            <option value=""></option>

                                            <?php echo $data_kelas ?>
                                            </select>
											</div>
														</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Nama Siswa*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<select name="prestasi_nis" class="form-control select2me" data-placeholder="Pilih Siswa" id="data-siswa-aktif2" disabled="true">
												<option value=""></option>
												
												</select>
											</div>
														</div>
									</div>
									
									
									
									
								</div>

								<div class="row">
									

									

									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Nama Prestasi/Lomba*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="glyphicon glyphicon-gift"></i>
												</span>
												<input name="prestasi_nama" class="form-control" placeholder="Nama Prestasi/Lomba" type="text">
											</div>
														</div>
									</div>
								</div>
							<div class="row">
									
								<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Peringkat*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa fa-trophy"></i>
												</span>
												<select id="data-peringkat-prestasi" name="prestasi_peringkat" class="form-control select2me" data-placeholder="Pilih Peringkat">
                                          <option value=""></option>
                                          <option value="1">Peringkat 1</option>
                                          <option value="2">Peringkat 2</option>
                                          <option value="3">Peringkat 3</option>
                                          <option value="4">Peringkat 4</option>
                                          <option value="5">Peringkat 5</option>
                                          <option value="6">Peringkat 6</option>
                                         
                                          </select>
											</div>
														</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Bidang*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-bars"></i>
												</span>
												 <select id="data-bidang-prestasi" name="prestasi_bidang" class="form-control select2me" data-placeholder="Pilih Bidang">
                                          <option value=""></option>
                                          <option value="Penalaran">Penalaran</option>
                                          <option value="Seni">Seni</option>
                                          <option value="Olahraga">Olahraga</option>
                                          <option value="Kesejahteraan/Minat Khusus">Kesejahteraan/Minat Khusus</option>
                                          </select>
											</div>
														</div>
									</div>

									
								</div>

								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Tingkat*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-institution"></i>
												</span>
												<select id="data-tingkat-prestasi" name="prestasi_tingkat" class="form-control select2me" data-placeholder="Pilih Tingkat">
                                          <option value=""></option>
                                          <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                          <option value="Provinsi">Provinsi</option>
                                          <option value="Nasional">Nasional</option>
                                          <option value="Internasional">Internasional</option>
                                         
                                          </select>
											</div>
														</div>
									</div>
								</div>

							
								
								<div class="row">
								
									

									
									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Deskripsi Prestasi*</label>
															
											<textarea name="prestasi_deskripsi" class="form-control" rows="3"></textarea>
										
														</div>
									</div>

								
									
								</div>
								<div class="form-actions noborder">

									<button id="btnSave" onclick="save()" type="button" class="btn grey-cascade"><i class="fa fa-plus-circle"></i> Tambah Prestasi</button>
									<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset</button>
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