<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Guru Mapel
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Master</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Guru Mapel</a>
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
								<i class="glyphicon glyphicon-plus "></i>Tambah Guru Mapel
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
							

							 <input type="hidden" value="" name="haknilai_kelascek" id="kelas-cek2"/> 
							<div class="row">
							
									<div class="col-md-6">
										<div class="form-group">
															<label class="control-label">Nama Guru*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-graduation-cap "></i>
												</span>
												<?php $attributes = array('name' => 'haknilai_kodeguru', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Guru', 'id'=>'data-select2-raport');
												 echo form_dropdown($attributes, $data_guru); ?>
											</div>
															
														</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
															<label class="control-label">Nama Mata Pelajaran*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-book-open "></i>
												</span>
												<?php $attributes = array('name' => 'haknilai_mapel', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Mata Pelajaran', 'id'=>'data-select2-raport2');
												 echo form_dropdown($attributes, $data_mapel); ?>
											</div>
														</div>
									</div>
									
									
									
								</div>

								<div class="row">
								<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Kelas*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>

												<select name="haknilai_kelas" placeholder="Pilih Kelas" class="form-control select2me" id="data-select2-raport3">
											<option value=""></option>

											<?php echo $data_kelas ?>
											</select>
												
											</div>
														</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Metode Penilaian*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-archive"></i>
											</span>
											<select name="haknilai_metode" class="form-control select2me" data-placeholder="Pilih Metode" id="nilai-metode">
												<option value=""></option>
												<option value="1">Nilai Berproses Rapor</option>
												<option value="2">Nilai Akhir Rapor</option>
								   
												</select>
											
											
										</select>
										</div>
														</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">KKM (Pengetahuan)*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-sliders"></i>
											</span>
											<input name="haknilai_kkm" class="form-control mask_kkm" id="kkm-p" placeholder="KKM-P" type="text">
											
											
										</select>
										</div>
														</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">KKM (Keterampilan)*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-sliders"></i>
											</span>
											<input name="haknilai_kkm2" class="form-control mask_kkm" id="kkm-k" placeholder="KKM-K" type="text">
											
										</div>
														</div>
									</div>

									
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Status*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class=" glyphicon glyphicon-eye-open  "></i>
											</span>
											<select name="haknilai_status" class="form-control">
											<option value="1">Active</option>
											<option value="0">Not Active</option>
											
											
										</select>
										</div>
														</div>
									</div>
									</form>
									</div>

									<div class="row">
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Action*</label>
															<div class="input-group">
											<a id="btnSave" onclick="save()" href="javascript:;" class="btn  default">
															<i class="fa fa-plus-circle"></i> Tambah Guru Mapel   </a>
										</div>
														</div>
									</div>
								</div>
								
								
								
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

				<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet  light grey-cararra">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search"></i>Filter Data
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div id="data-info-pencarian" class="col-md-12">
								
							
							</div>
							
							</div>
							
							<div class="row">
									<div class="col-md-3">
										<div class="form-group">
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>

												<select placeholder="Pilih Kelas" class="form-control select2me" id="pencarian-kelas">
											<option value=""></option>
											<option value="">Semua Kelas</option>
											<?php echo $data_kelas ?>
											</select>
												
											</div>
														</div>
									</div>

										<div class="col-md-3">
										<div class="form-group">
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-archive"></i>
											</span>
											<select class="form-control select2me" data-placeholder="Pilih Metode" id="pencarian-metode">
												<option value=""></option>
												<option value="1">Nilai Berproses Rapor</option>
												<option value="2">Nilai Akhir Rapor</option>
								   
												</select>
											
											
										</select>
										</div>
														</div>
									</div>


										<div class="col-md-3">
										<div class="form-group">
												
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-tasks"></i>
											</span>
											<select class="form-control select2me" data-placeholder="Status Kirim Nilai" id="pencarian-status-kirim">
												<option value=""></option>
												<option value="1">Nilai Belum Terkirim</option>
												<option value="2">Nilai Sudah Terkirim</option>
								   
												</select>
											
											
										</select>
										</div>
														</div>
									</div>
									
										<div class="col-md-2" style="width:13.6667%">
										<div class="form-group">
										<div class="form-actions noborder">

									<button type="button" class="btn grey-cascade" id="pencarian-reset"><i class="fa fa-undo"></i> Reset Pencarian</button>
									</div>
								</div>
								</div>
								
									
									
								
								</div>
								
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-shield "></i>Data Guru Mapel
							</div>

							<div class="tools">
								
								
								<a href="javascript:;" class="fullscreen">
										</a>
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
							<div class="actions">
								
								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-bug"></i> Bulk Action<i class="fa fa-angle-down"></i>
									</a>
									<ul id="action-data" class="dropdown-menu pull-right">
										<li>
											<a onclick="reload_table2()">
											<i class="fa fa-refresh"></i> Reload Data
											</a>
										</li>
										<li class="divider"></li>
										<li>
											<a id="del_all">
											<i class="glyphicon glyphicon-remove "></i> Delete Data </a>
										</li>
		
									</ul>
								</div>
								<div class="btn-group">
									
									
								</div>
								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i> Eksport All<i class="fa fa-angle-down"></i>
									</a>
									<ul  id="export-data" class="dropdown-menu pull-right">
									
										<li class="divider">
										</li>
										
									</ul>
								</div>

								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i> Eksport Selected<i class="fa fa-angle-down"></i>
									</a>
									<ul  id="export-data-selected" class="dropdown-menu pull-right">
									
										<li class="divider">
										</li>
										
									</ul>
								</div>
								
							</div>
						</div>
						<div class="portlet-body">

						<div class="row">
						 <div class="col-md-12">
                  <div class="note note-info">
                
                   <i class="fa fa-info-circle"></i> <b>Info</b> : Sistem menampilkan informasi data <b>Hak Nilai Mapel</b>, pada tahun ajaran : <b><?php echo $tahun_ajaran_admin ?></b>, semester : <b> <?php echo ucfirst($semester_admin) ?></b>
                
              </div>
                    
                  </div>

                  </div>
						<div class="row clear_fix"><div class="col-md-12" id="respose"></div></div>
						<table class="table table-striped table-bordered table-hover" id="datahakmapel">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#datahakmapel .checkboxes"/>
								</th>
								<th style="width:5%;">
								No
								</th>
								<th>
									 Nama Guru
								</th>
								
								<th>
									Nama Mapel
								</th>
								<th style="text-align:center;">
									Kelas
								</th>
								<th style="text-align:center;">
									KKM
								</th>
								<th style="text-align:center;">
									Metode
								</th>
								<th style="text-align:center;">
									<i class="fa fa-tasks"></i>
								</th>
								
								<th style="text-align:center;">
									 Status
								</th>
								
								<th style="text-align:center;">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
								
							</tbody>
							</table>
							
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