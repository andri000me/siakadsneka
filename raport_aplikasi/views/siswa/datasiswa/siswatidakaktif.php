<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Siswa Tidak Aktif 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Siswa Manager</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Tidak Siswa Aktif</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search-plus"></i>Pencarian Siswa
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
							<form>
							<div class="row">
									
									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar-o"></i>
												</span>
												<?php $attributes = array('class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'tahun-cari');
												 echo form_dropdown($attributes, $data_angkatan); ?>
												
											</div>
														</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>
												<select class="form-control select2me" data-placeholder="Pilih Kelas" id="kelas-cari" disabled="true">
												<option value=""></option>
												</select>
										
											</div>
														</div>
									</div>

									

									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa  fa-info-circle"></i>
												</span>
												<select id="status-siswa-cari" class="form-control select2me" data-placeholder="Pilih Status">
												<option value=""></option>
												<option value="">Semua Siswa</option>
												<option value="2">Alumni</option>
												<option value="3">Pindah</option>
												<option value="4">Meninggal</option>
												<option value="5">Keluar</option>
												</select>
											</div>
														</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-actions noborder">

									<button id="reset-pencarian" type="button" class="btn default"><i class="fa fa-undo"></i> Reset Pencarian Data</button>
								</div>
									</div>
									

								</div>
								
								</form>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->



					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i>Data Siswa
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
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% "></div></div>
							<table class="table table-striped table-bordered table-hover" id="datasiswaaktif">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#datasiswaaktif .checkboxes"/>
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
								<th style="text-align:center;">
									 Kelas
								</th>
								<th style="width:5%;text-align:center;">
									 Absen
								</th>
								
								<th style="text-align:center;">
									 Angkatan
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