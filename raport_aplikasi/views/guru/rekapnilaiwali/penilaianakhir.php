<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Rekap Penilaian Akhir :<b><?php echo $namakelas ?></b> 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Monitor Penilaian : <?php echo $namakelas ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Penilaian Akhir</a>

					</li>
					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="cek-rekap-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search-plus"></i>Pencarian Data Nilai
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

								<div id="data-sukses-indikator">
									
								</div>
								<div id="data-error-indikator">
									
								</div>
								</div>
							
							</div>

							<?php
							                $attributes = array('role' => 'form','id' => 'form-rekap-nilai', 'name' => 'form-rekap-nilai');
							                echo form_open(site_url('guru/rekapnilaiwali/download_nilaiakhir'),$attributes); 
							            ?>
						

									<div class="row">
									<div class="col-md-4">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-badge"></i>
												</span>
												<select name="rekap_semester" class="form-control select2me" data-placeholder="Pilih Semester" id="rekap_semester">
												<?php echo $data_semester ?>
												</select>
											</div>
														</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-book "></i>
												</span>
												<select name="rekap_mapel" class="form-control select2me" data-placeholder="Mata Pelajaran" id="rekap_mapel">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>

									<div class="col-md-2">
										<div class="form-actions noborder">

									<button id="reset-pencarian" type="button" class="btn default"><i class="fa fa-undo"></i> Reset Pencarian</button>
								</div>
									</div>

									<div id="data-download" class="col-md-2">
										
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
								<i class="glyphicon glyphicon-tasks"></i>Rekap Penilaian Akhir : <b><?php echo $namakelas ?></b>
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
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% ">
							
							<div id="data-sukses-notif">
									
								</div>


						</div>

								
								

						</div>
							<table class="table table-striped table-bordered table-hover" id="rekapnilaiakhir">
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
									 Mapel
								</th>

								<th style="width:5%;text-align:center;">
									 SM
								</th>
								<th style="text-align:center;">
									 KKM
								</th>
								<th style="width:5%;text-align:center;">
									 Nilai P
								</th>

								<th style="width:5%;text-align:center;">
									 Nilai K
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