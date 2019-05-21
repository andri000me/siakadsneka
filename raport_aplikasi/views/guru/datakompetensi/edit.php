<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Kompetensi
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Master</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Kompetensi</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Tambah Kompetensi</a>
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
								<i class="glyphicon glyphicon-plus "></i>Tambah Kompetensi
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
							
									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Nama Mapel*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-book-open "></i>
												</span>
												 <?php $attributes = array('name' => 'kompetensi_mapel', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Mapel','id' => 'data-kompetensi-select1');
                                                 echo form_dropdown($attributes, $data_mapel); ?>
											</div>
														</div>
									</div>
									
									
									
									
								</div>

								<div class="row">
									

									

									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Nama Kompetensi*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-book "></i>
												</span>
												<input name="kompetensi_nama" id="nama-kompetensi" class="form-control" placeholder="Nama Kompetensi" type="text">
											</div>
														</div>
									</div>
								</div>
							<div class="row">
									
								<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Kelompok*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-cubes"></i>
												</span>
												<select name="kompetensi_kelompok" class="form-control select2me" data-placeholder="Kelompok" id="data-kompetensi-select2">
												<option value=""></option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C1">C1</option>
											<option value="C2">C2</option>
											<option value="C3">C3</option>
											<option value="M">M</option>
								            
																				</select>
											</div>
														</div>
									</div>


									<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Semester*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-badge "></i>
												</span>
												<select name="kompetensi_semesterfilter" class="form-control select2me" data-placeholder="Pilih Semester" id="data-kompetensi-select3">
												<option value=""></option>
											<?php echo $semester ?>
								            
																				</select>
											</div>
														</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Sort*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-sort"></i>
												</span>
												<input maxlength="9" id="maxlength_thresholdconfig" name="kompetensi_sort" class="form-control" placeholder="Sort Komp" type="text">
											</div>
														</div>
									</div>
								</div>

								<div class="row">
								
									

									
									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Deskripsi Pengetahuan*</label>
															
											<textarea name="kompetensi_pengetahuan" class="form-control" rows="3"></textarea>
										
														</div>
									</div>
									
								</div>
								<div class="row">
								
									

									
									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Deskripsi Keterampilan*</label>
															
											<textarea name="kompetensi_keterampilan" class="form-control" rows="3"></textarea>
										
														</div>
									</div>
									
								</div>
								<div class="row">
								
									

									
									<div class="col-md-7">
										<div class="form-group">
															<label class="control-label">Deskripsi Sikap, Spritual dan Sosial*</label>
															
											<textarea name="kompetensi_sikap" class="form-control" rows="3"></textarea>
										
														</div>
									</div>

								
									
								</div>
								<div class="form-actions noborder">

									<button id="btnSave" onclick="save()" type="button" class="btn grey-cascade"><i class="fa fa-plus-circle"></i> Tambah Kompetensi</button>
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