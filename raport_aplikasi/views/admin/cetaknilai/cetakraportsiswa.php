<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Raport Siswa
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Cetak Nilai</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Raport Siswa</a>
						
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
                        <i class="fa fa-calendar-o"></i>
                        </span>
                      <?php $attributes = array('name' => 'tahun-cari', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'tahun-cari');
                         echo form_dropdown($attributes, $arrayName = array('' => '','Angkatan Aktif' =>$data_angkatan_aktif2 ,'Angkatan Tidak Aktif/Alumni'=>$data_angkatan_tidakaktif2)); ?>
                        

                      </div>
                            </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                             
                              <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-users "></i>
                        </span>
                       <select name="kelas-cari" class="form-control select2me" data-placeholder="Pilih Kelas" id="kelas-cari" disabled="true">
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
								<i class="fa fa-database"></i>Nilai Raport Siswa
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
							
								
							</div>
							
						</div>
						<div class="portlet-body">
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% "></div></div>
							<table class="table table-striped table-bordered table-hover" id="raportsiswacetak">
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
									 Print Action
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