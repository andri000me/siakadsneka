<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Ekstra Kurikuler
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Eskul Manager</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Eskul</a>
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
								<i class="glyphicon glyphicon-plus "></i>Tambah Ekstra Kurikuler
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body">
							<form action="#" id="form2">
							<div class="row">
							<div id="data-error-data" class="col-md-12">
								
							
							</div>
									<div class="col-md-4">
										<div class="form-group">
															<label class="control-label">Nama Ekstra Kurikuler*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-support"></i>
											</span>
											<input name="eskul_nama" class="form-control" placeholder="Nama Ekstra Kurikuler" type="text">
										</div>
															
														</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Kategori*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-bars"></i>
											</span>
											<select name="eskul_kategori" class="form-control select2me" id="kategori-eskul2" placeholder="Kategori">
											<option value=""></option>
											<option value="1">Wajib</option>
											<option value="2">Tidak Wajib</option>
											
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
											<input maxlength="9" id="maxlength_thresholdconfig" name="eskul_sort" class="form-control" placeholder="Sort Eskul" type="text">
										</div>
														</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Status*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="glyphicon glyphicon-eye-open"></i>
											</span>
											<select name="eskul_status" class="form-control">
											<option value="1">Active</option>
											<option value="0">Not Active</option>
											
										</select>
										</div>
														</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Action*</label>
															<div class="input-group">
											<a id="btnSave" onclick="save()" href="javascript:;" class="btn  default">
															<i class="fa fa-plus-circle"></i> Tambah Eskul </a>
										</div>
														</div>
									
									</div>

									</form>
								</div>
								
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->



					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-notebook"></i>Data Ekstra Kurikuler
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
                
                   <i class="fa fa-info-circle"></i> <b>Info</b> : Sistem menampilkan informasi data <b>Ekstra Kurikuler</b>, pada tahun ajaran : <b><?php echo $tahun_ajaran_admin ?></b>, semester : <b> <?php echo ucfirst($semester_admin) ?></b>
                
              </div>
                    
                  </div>

                  </div>
						<div class="row clear_fix"><div class="col-md-12" id="respose"></div></div>
							<table class="table table-striped table-bordered table-hover" id="dataeskul">
							<thead>
							<tr>
								
								<th style="width:5%;">
								No
								</th>
								<th>
									 Nama Ekstra Kurikuler
								</th>

								<th style="text-align:center;">
									Kategori
								</th>
								
								<th style="text-align:center;">
									 Sort
								</th>
								
								<th  class="hidden-xs" style="text-align:center;">
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