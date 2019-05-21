<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Penugasan Guru
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
						<a href="#">Data Penugasan Guru</a>
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
								<i class="fa fa-shield "></i>Info Penugasan
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
                
                   <i class="fa fa-info-circle"></i> <b>Info</b> : Sistem menampilkan informasi data <b>Penugasan Guru</b>, pada tahun ajaran : <b><?php echo $tahun_ajaran_client ?></b>, semester : <b> <?php echo ucfirst($semester_client) ?></b>
                
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