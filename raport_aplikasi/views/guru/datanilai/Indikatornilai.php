<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Indikator Rekap Nilai
			
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Indikator Rekap Nilai</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="cek-indikator-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search-plus "></i>Pencarian Data
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body form"  >
							
							<div class="row">
								<div class="col-md-12"> 

								<div id="data-sukses-indikator">
									
								</div>
								<div id="data-error-indikator">
									
								</div>
								</div>
							
							</div>
							

							 <form role="form" id="form-indikator-cari" name="form-indikator-cari" method="post" accept-charset="utf-8">
							
							<div class="row">
							
									
									<div class="col-md-4">
                    <div class="form-group">
                              <label class="control-label">Tahun Angkatan*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-calendar-o"></i>
                        </span>
                      <?php $attributes = array('name' => 'indikator-tahun', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'tahun-cari-modal');
                         echo form_dropdown($attributes, $arrayName = array('' => '','Angkatan Aktif' =>$data_angkatan_aktif2 ,'Angkatan Tidak Aktif/Alumni'=>$data_angkatan_tidakaktif2)); ?>
                        

                      </div>
                            </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                              <label class="control-label" >Kelas*</label>
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-users "></i>
                        </span>
                       <select name="indikator-kelas" class="form-control select2me" data-placeholder="Pilih Kelas" id="kelas-cari-modal" disabled="true">
                         <option value=""></option>
                       
                      </select>
                      </div>
                            </div>
                  </div>

                  <div class="col-md-3">
										<div class="form-group">
													<label class="control-label" >Semester*</label>		
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-badge"></i>
												</span>
												<select name="indikator-semester" class="form-control select2me" data-placeholder="Pilih Semester" id="semester-cari-modal">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>
									
										</form>
									<div class="col-md-2">
										<div class="form-group">
															<label class="control-label">Action*</label>
															<div class="input-group">

											<a id="btnSave" onclick="resetform()" href="javascript:;" class="btn grey-cascade">
															<i class="fa fa-undo"></i> Reset Pencarian</a>
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
								<i class="fa fa-empire"></i>Indikator Rekap Nilai
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
										<li>
											<a onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');" id="del_all">
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

								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-sm default" href="javascript:;" data-toggle="dropdown">
									<i class="glyphicon glyphicon-th-large "></i> Baca Panduan <i class="fa fa-angle-down "></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a onclick="bacaketerangan()">
											<i class="glyphicon glyphicon-info-sign "></i> Lihat Keterangan</a>
										</li>
										<li>
											<a onclick="bacapanduan()">
											<i class="fa fa-life-ring"></i> Ketentuan Penggunaan</a>
										</li>
									
										
									</ul>
								</div>
								
							</div>
						</div>
						<div class="portlet-body">
						<div class="row">
						 <div class="col-md-12">
                 <div id="indikator-info"> </div>
                    
                  </div>

                  </div>
						<div class="row clear_fix"><div class="col-md-12" id="respose"></div></div>
						<table class="table table-striped table-bordered table-hover" id="dataindikatornilai">
							<thead>
								<tr>
								<th rowspan="2" width="5%">No</th>
								<th rowspan="2" width="35%">Nama Mapel</th>
								<th rowspan="2" width="5%" style="text-align:center;">Kelas</th>
								<th rowspan="2" width="4%" style="text-align:center;">SM</th>
								<th rowspan="2" width="6%" style="text-align:center;">KKM</th>
								<th colspan="4" width="16%" style="text-align:center;">Pengetahuan</th>
								<th colspan="3" width="8%" style="text-align:center;">Keterampilan</th>
								
								<th colspan="2" width="8%" style="text-align:center;">Nilai Akhir Raport</th>
								<th rowspan="2" style="text-align:center;">Raport</th>
								</tr>
								<tr>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">UH</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">TG</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">UTS</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">UAS</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">PS</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">PR</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">PO</th>
							
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">P</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">K</th>
								
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