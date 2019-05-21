<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Data Mapel 
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
						<a href="#">Data Mapel</a>
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
								<i class="glyphicon glyphicon-plus "></i>Tambah Mapel
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body">
							<form>
							<div class="row">
							<div class="col-md-12">
								
								<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Warning!</strong> anda belum menginput Nama Mapel.
							</div>
							<hr>
							</div>
									<div class="col-md-5">
										<div class="form-group">
															<label class="control-label">Mata Pelajaran*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="icon-notebook"></i>
											</span>
											<input class="form-control" placeholder="Nama Mapel" type="text">
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
											<input class="form-control" placeholder="Sort Mapel" type="text">
										</div>
														</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
															<label class="control-label">Status*</label>
															<div class="input-group">
											<span class="input-group-addon">
											<i class="glyphicon glyphicon-eye-open"></i>
											</span>
											<select class="form-control">
											<option>Active</option>
											<option>Not Active</option>
											
										</select>
										</div>
														</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Action*</label>
															<div class="input-group">
											<a href="javascript:;" class="btn  default">
															<i class="fa fa-plus-circle"></i> Tambah Mapel </a>
										</div>
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
								<i class="icon-notebook"></i>Mata Pelajaran
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
									<i class="fa fa-bug"></i> Action<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											<i class="glyphicon glyphicon-remove "></i> Delete Data </a>
										</li>
										
										<li class="divider">
										</li>
										
									</ul>
								</div>
								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i> Eksport Tools<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											<i class="glyphicon glyphicon-print"></i> Print </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-file-pdf-o "></i> Save as PDF </a>
										</li>
										<li>
											<a href="javascript:;">
											<i class="fa fa-file-excel-o "></i> Export to Excel </a>
										</li>
										<li class="divider">
										</li>
										
									</ul>
								</div>
								
							</div>
						</div>
						<div class="portlet-body">
						
							<table class="table table-striped table-bordered table-hover" id="datamapel">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#datamapel .checkboxes"/>
								</th>
								<th>
								No
								</th>
								<th>
									 Mata Pelajaran
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
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 1
								</td>
								<td>
									  	
									Pendidikan Agama dan Budi Pekerti
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																7 </span>
								</td>
								<td class="center hidden-xs" style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs btn-success">
															<i class="glyphicon glyphicon-remove "></i> Not Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue" >
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 2
								</td>
								
								<td>
									 Pendidikan Pancasila dan Kewarganegaraan
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																6 </span>
								</td>
								
								<td class="center hidden-xs" style="text-align:center;">
									
								<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="glyphicon glyphicon-ok "></i> Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue">
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 3
								</td>
								<td>
									 Bahasa Indonesia
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																5 </span>
								</td>
								
								<td class="center hidden-xs" style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs btn-success">
															<i class="glyphicon glyphicon-remove "></i> Not Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue">
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 4
								</td>
								<td>
									 Matematika
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																4 </span>
								</td>
								
								<td class="center hidden-xs" style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="glyphicon glyphicon-ok "></i> Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue">
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
							
							
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 5
								</td>
								<td>
									 Sejarah Indonesia
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																3 </span>
								</td>
								 
								<td class="center hidden-xs" style="text-align:center;">
									 <a href="javascript:;" class="btn btn-xs btn-success">
															<i class="glyphicon glyphicon-remove "></i> Not Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue">
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 6
								</td>
								<td>
									  	
									Bahasa Inggris
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																2 </span>
								</td>
								
								<td class="center hidden-xs" style="text-align:center;">
									 <a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="glyphicon glyphicon-ok "></i> Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue">
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 7
								</td>
								<td>
									 Seni Budaya
								</td>
								<td style="width:5px;text-align:center;">
									 <span class="badge label-info label-sm">
																1 </span>
								</td>
								<td class="center hidden-xs" style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="glyphicon glyphicon-ok "></i> Active </a>
								</td>
								<td style="text-align:center;">
									<a href="javascript:;" class="btn btn-xs blue">
															<i class="fa fa-edit"></i> Edit </a>

															<a href="javascript:;" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> Delete </a>

								</td>
							</tr>
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