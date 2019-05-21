<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Rangking Kelas
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Analysis Rangking</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Rangking Kelas</a>
						
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
								<i class="fa fa-search-plus"></i>Pencarian Data
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
							<div class="col-md-12">
								<div id="data-info-pencarian"></div>
							</div>
							</div>
							<div class="row">
									

                  <div class="col-md-4">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-badge"></i>
												</span>
												<select name="semester-cari" class="form-control select2me" data-placeholder="Pilih Semester" id="semester-cari" disabled="true">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>
									

								
										<div class="col-md-2">
										<div class="form-actions noborder">

									<button id="reset-pencarian" type="button" class="btn grey-cascade"><i class="fa fa-undo"></i> Reset Pencarian Data</button>
									
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
								<i class="fa fa-trophy"></i>Rekap Analysis Ranking
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
											<a onclick="reload_table()">
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

								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-sm default" href="javascript:;" data-toggle="dropdown">
									<i class="glyphicon glyphicon-th-large "></i> Baca Panduan <i class="fa fa-angle-down "></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a onclick="bacaketerangan()">
											<i class="glyphicon glyphicon-info-sign "></i> Lihat Keterangan</a>
										</li>
										
										
									</ul>
								</div>
								
							</div>
							
						</div>
						<div class="portlet-body">
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% "></div></div>
							<table class="table table-striped table-bordered table-hover" id="rankingsiswakelas">
							<thead>
							<tr>
								
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
									 JK
								</th>
								<th style="text-align:center;">
									 RK
								</th>
								<th style="text-align:center;">
									 Rank K
								</th>
								
								<th style="text-align:center;">
									 JP
								</th>
								<th style="text-align:center;">
									 RP
								</th>
								<th style="text-align:center;">
									 Rank P
								</th>
								
								<th style="text-align:center;">
									 JPK
								</th>
								<th style="text-align:center;">
									 RPK
								</th>
								<th style="text-align:center;">
									Rank PK
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