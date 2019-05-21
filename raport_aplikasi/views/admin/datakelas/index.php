<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Kelas 
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
						<a href="#">Data Kelas</a>
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
								<i class="glyphicon glyphicon-plus "></i>Tambah Kelas
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
							
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Nama Kelas*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-users"></i>
											</span>
											<input name="kelas_nama" class="form-control" placeholder="Ex: XIITKJ1" type="text">
										</div>
															
														</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">ID Kelas*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="icon-diamond"></i>
											</span>
											<input maxlength="9" id="maxlength_defaultconfig" name="kelas_code" class="form-control" placeholder="Ex: 200" type="text">
										</div>
															
														</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Bidang Studi Keahlian*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class=" icon-notebook "></i>
											</span>
											<input name="kelas_bk" class="form-control" placeholder="Ex : Teknik Informasi dan Komunikasi" type="text">
										</div>
														</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Program Studi Keahlian*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class=" icon-notebook "></i>
											</span>
											<input name="kelas_pk" class="form-control" placeholder="Ex : Teknik Komputer dan Informatika" type="text">
										</div>
														</div>
									</div>
									
								</div>

								<div class="row">
							
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Keahlian Kompetensi*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="icon-notebook"></i>
											</span>
											<input name="kelas_kk" class="form-control" placeholder="Ex : Teknik Komputer dan Jaringan" type="text">
										</div>
															
														</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Tahun Angkatan*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="icon-calendar "></i>
											</span>
											<input id="raport-tahun" name="kelas_tahun" class="form-control" placeholder="Ex : 2014/2015" type="text">
										</div>
														</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Tingkat*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-sitemap "></i>
											</span>
											<select name="kelas_tingkat" class="form-control">
											<option value="1">Kelas 1</option>
											<option value="2">Kelas 2</option>
											<option value="3">Kelas 3</option>
											
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
											<input maxlength="9" id="maxlength_thresholdconfig" name="kelas_sort" class="form-control" placeholder="Sort Kelas" type="text">
										</div>
														</div>
									</div>
									
								</div>
								</form>
								<div class="row">
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Action*</label>
															<div class="input-group">
											<a id="btnSave" onclick="save()" href="javascript:;" class="btn  default">
															<i class="fa fa-plus-circle"></i> Tambah Kelas </a>
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
								<i class="fa fa-users"></i>Info Kelas
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
									<ul id="action-mapel" class="dropdown-menu pull-right">
										<li>
											<a onclick="reload_table2()">
											<i class="fa fa-refresh"></i> Reload Data
											</a>
										</li>
										<li class="divider"></li>
										<li>
											<a onclick="upgrade_kelas()">
											<i class="icon-badge"></i> Upgrade Kelas </a>
										</li>
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
									<ul  id="export-mapel" class="dropdown-menu pull-right">
									
										<li class="divider">
										</li>
										
									</ul>
								</div>

								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i> Eksport Selected<i class="fa fa-angle-down"></i>
									</a>
									<ul  id="export-mapel-selected" class="dropdown-menu pull-right">
									
										<li class="divider">
										</li>
										
									</ul>
								</div>
								
							</div>
						</div>
						<div class="portlet-body">
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% "></div></div>
						<table class="table table-striped table-bordered table-hover" id="datakelas">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input id="checkAll" name="checkAll" type="checkbox" class="group-checkable" data-set="#datakelas .checkboxes"/>
								</th>
								<th style="width:5%;">
								No
								</th>
								<th>
									 Kelas
								</th>
								<th style="text-align:center;">
									IDK
								</th>
								
								<th >
									 Bidang Studi Keahlian
								</th>
								
								
								<th>
									 Keahlian Kompetensi
								</th>
								
								<th style="width:50px;text-align:center;">
									 Angkatan
								</th>
								
								<th style="width:5px;text-align:center;">
									 TK
								</th>
								
								<th  style="width:5px;text-align:center;">
									 Sort
								</th>
								<th  style="text-align:center;">
									 Status
								</th>
								<th style="width:150px;text-align:center;">
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