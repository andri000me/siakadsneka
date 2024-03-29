<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Wali Kelas
			
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
						<a href="#">Data Wali Kelas</a>
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
								<i class="glyphicon glyphicon-plus "></i>Tambah Wali Kelas
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body form"  >
							<form action="#" id="form2">
							<div class="row">
								<div id="data-error-kelas" class="col-md-12">
								
							
							</div>
							
							</div>
							

							 <input type="hidden" value="" name="wali_kelascek" id="kelas-cek2"/> 
							<div class="row">
							
									<div class="col-md-5">
										<div class="form-group">
															<label class="control-label">Nama Guru Wali Kelas*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-graduation-cap "></i>
												</span>

												<?php $attributes = array('name' => 'wali_kodeguru', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Guru Wali Kelas','id'=>'data-select2-raport');
												 echo form_dropdown($attributes, $data_guru); ?>
											</div>
															
														</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Kelas*</label>
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>

											<select name="wali_kelas" placeholder="Pilih Kelas" class="form-control select2me" id="data-select2-raport2">
											<option value=""></option>

											<?php echo $data_kelas ?>
											</select>
												
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
											<select name="wali_status" class="form-control">
											<option value="1">Active</option>
											<option value="0">Not Active</option>
											
										</select>
										</div>
														</div>
									</div>
										</form>
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Action*</label>
															<div class="input-group">
											<a id="btnSave" onclick="save()" href="javascript:;" class="btn  default">
															<i class="fa fa-plus-circle"></i> Tambah Wali Kelas </a>
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
								<i class="fa fa-graduation-cap"></i>Data Wali Kelas
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
                
                   <i class="fa fa-info-circle"></i> <b>Info</b> : Sistem menampilkan informasi data <b>Wali Kelas</b>, pada tahun ajaran : <b><?php echo $tahun_ajaran_admin ?></b>
                
              </div>
                    
                  </div>

                  </div>
						<div class="row clear_fix"><div class="col-md-12" id="respose"></div></div>
						<table class="table table-striped table-bordered table-hover" id="datawali">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#datawali .checkboxes"/>
								</th>
								<th style="width:5%;">
								No
								</th>
								<th>
									 Nama Guru Wali
								</th>
								
								<th  style="text-align:center;" >
									 Kelas
								</th>
								
								<th   style="text-align:center;">
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