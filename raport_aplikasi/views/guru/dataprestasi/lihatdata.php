<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Prestasi
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemen Prestasi</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Prestasi</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					


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
												<i class="fa fa-bars"></i>
												</span>


											<select id="pencarian-bidang-prestasi" class="form-control select2me" data-placeholder="Pilih Bidang">
                                          <option value=""></option>
                                          <option value="">Semua Bidang</option>
                                          <option value="Penalaran">Penalaran</option>
                                          <option value="Seni">Seni</option>
                                          <option value="Olahraga">Olahraga</option>
                                          <option value="Kesejahteraan/Minat Khusus">Kesejahteraan/Minat Khusus</option>
                                          </select>
												
											</div>
														</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-institution"></i>
												</span>


											<select id="pencarian-tingkat-prestasi" class="form-control select2me" data-placeholder="Pilih Tingkat">
                                          <option value=""></option>
                                          <option value="">Semua Tingkat</option>
                                          <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                          <option value="Provinsi">Provinsi</option>
                                          <option value="Nasional">Nasional</option>
                                          <option value="Internasional">Internasional</option>
                                         
                                          </select>
												
											</div>
														</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-trophy"></i>
												</span>


											<select id="pencarian-peringkat-prestasi" class="form-control select2me" data-placeholder="Pilih Peringkat">
                                          <option value=""></option>
                                          <option value="">Semua Peringkat</option>
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
								<i class="glyphicon glyphicon-gift"></i>Data Prestasi
							</div>

							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
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
                
                   <i class="fa fa-info-circle"></i> <b>Info</b> : Sistem menampilkan informasi data <b>Prestasi Siswa</b>, pada tahun ajaran : <b><?php echo $tahun_ajaran_client ?></b>, semester : <b> <?php echo ucfirst($semester_client) ?></b>
                
              </div>
                    
                  </div>

                  </div>
						<div class="row clear_fix"><div class="col-md-12" id="respose"></div></div>
							<table class="table table-striped table-bordered table-hover" id="dataprestasi">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#dataprestasi .checkboxes"/>
								</th>
								<th style="width:5%;">
								No
								</th>
								<th style="text-align:center;">
									 NIS
								</th>
								<th>
									 Nama Siswa
								</th>
								<th width="8%" style="text-align:center;">
									 Kelas
								</th>
								
								<th>
									 Bidang
								</th>

								<th style="text-align:center;">
									 Tingkat
								</th>

								<th style="text-align:center;">
									 Peringkat
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