<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Ganti Password Siswa
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">User Manager</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Ganti Password Siswa</a>
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
										<div class="form-actions noborder">

									<button id="reset-pencarian" type="reset" class="btn default"><i class="fa fa-undo"></i> Reset Pencarian Data</button>
								</div>
									</div>
									

								</div>
								</form>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade" id="process-selected-password">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-graduation-cap "></i>Data User Siswa
							</div>

							<div class="tools">
								
								<a onclick="reload_table2()" href="javascript:;" class="reload">
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
											<i class="fa fa-refresh"></i> Reload Data Tabel
											</a>
										</li>
										<li class="divider"></li>
										
										<li>
											<a onclick="kirim_email_selected()">
											<i class="fa fa-envelope"></i> Kirim Password via Email</a>
										</li>
										<li>
											<a onclick="kirim_sms_selected()" >
											<i class="fa fa-comments"></i> Kirim Password via SMS</a>
										</li>
										<li>
											<a onclick="clear_notif()">
											<i class="glyphicon glyphicon-trash"></i> Clear Semua Notification </a>
										</li>

		
									</ul>
								</div>
								
								
								
								
							</div>
						</div>
						<div class="portlet-body" id="process-tabel">
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% "></div></div>
						<div class="row clear_fix"><div class="col-md-12" id="respose-error" style="margin-top:0% "></div></div>
						<p id="demo"></p>
						<table class="table table-striped table-bordered table-hover" id="password">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#password .checkboxes"/>
								</th>
								<th width="5%">
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
								<th style="text-align:center;">
									 No Handphone
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