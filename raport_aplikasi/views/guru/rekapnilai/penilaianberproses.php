<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Rekap Penilaian Berproses
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Rekap Penilaian</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Penilaian Berproses</a>

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
							                echo form_open(site_url('guru/rekapnilai/download_nilaiberproses'),$attributes); 
							            ?>

							
							<div class="row">
							

							<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar-o"></i>
												</span>
												  <?php $attributes = array('name' => 'rekap_tahun', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'rekap_tahun');
                         							echo form_dropdown($attributes, $arrayName = array('' => '','Angkatan Aktif' =>$data_angkatan_aktif2 ,'Angkatan Tidak Aktif/Alumni'=>$data_angkatan_tidakaktif2)); ?>
												
											</div>
														</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>
												<select name="rekap_kelas" class="form-control select2me" data-placeholder="Pilih Kelas" id="rekap_kelas">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>
									</div>

									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-badge"></i>
												</span>
												<select name="rekap_semester" class="form-control select2me" data-placeholder="Pilih Semester" id="rekap_semester">
												<option value=""></option>
												</select>
											</div>
														</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-book "></i>
												</span>
												<select name="rekap_mapel" class="form-control select2me" data-placeholder="Mata Pelajaran" id="rekap_mapel">
												<option value=""></option>
												</select>
												<input type="hidden" name="rekap_nis" id="rekap_nis" value="">
											</div>
														</div>
									</div>


									
								</div>
									

									<div class="row">
									<div class="col-md-2">
										<div class="form-actions noborder">

									<button id="reset-pencarian" type="button" class="btn default"><i class="fa fa-undo"></i> Reset Pencarian</button>
								</div>
									</div>


									<div id="data-download" class="col-md-3">
										
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
								<i class="glyphicon glyphicon-tasks"></i>Rekap Penilaian Berproses
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
									<i class="fa fa-bug"></i> Bulk Action <i class="fa fa-angle-down"></i>
									</a>
									<ul id="action-data" class="dropdown-menu pull-right">
										<li>
											<a id="reload_tabel_baru">
											<i class="fa fa-refresh"></i> Reload Data
											</a>
										</li>
										
									
		
									</ul>
								</div>
								<div class="btn-group">
									
									
								</div>
								<div class="btn-group">
									<a aria-expanded="false" class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i> Eksport Data <i class="fa fa-angle-down"></i>
									</a>
									
									<ul  id="export-data" class="dropdown-menu pull-right">
									
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
						<div id="ofani-tabel-body" class="portlet-body">
						<div class="row clear_fix"><div class="col-md-12" id="respose" style="margin-top:1% ">
							
							<div id="data-sukses-notif">
									
								</div>


						</div>

								
								

						</div>

						<div  id="TabelRekapNilaiBerproses">
							<table class="table table-striped table-bordered table-hover" id="rekapnilaiberproses">
							
							
							<thead id="Rekap_nilai_berproses">
								<tr>
								<th rowspan="3" width="5%">No</th>
								<th rowspan="3" width="10%" style="text-align:center;">NIS</th>
								<th rowspan="3" width="10%">Nama Siswa</th>
								<th rowspan="3" width="5%" style="text-align:center;">Kelas</th>
								<th rowspan="3" width="5%" style="text-align:center;">Absen</th>
								<th rowspan="3" width="10%" style="text-align:center;">Mapel</th>
								<th rowspan="3" width="4%" style="text-align:center;">SM</th>
								<th rowspan="3" width="6%" style="text-align:center;">KKM</th>


								<th colspan="12" width="16%" style="text-align:center;">Pengetahuan</th>

								<th colspan="9" width="8%" style="text-align:center;">Keterampilan</th>
								
								<th colspan="4" width="8%" style="text-align:center;">Nilai Akhir Rapor</th>
								
								
								</tr>

								<tr>
								

								<th colspan="8" width="8%" style="text-align:center;">Nilai Harian</th>

								<th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">UTS</th>
								<th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BUTS</th>

								<th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">UAS</th>
								<th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BUAS</th>	


								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">PS1</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPS</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPS</th>

								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">PR1</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPR</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPR</th>

								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">PO1</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPO</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPO</th>

								
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">NRP</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">NRK</th>

								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">Hasil Akhir P</th>
								<th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">Hasil Akhir K</th>
								
								</tr>

								<tr>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">UH1</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">RUH</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">BUH</th>

								<th  width="4%" style="text-align:center;border: 1px solid #DDD">TG1</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">RTG</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">BTG</th>

								<th  width="4%" style="text-align:center;border: 1px solid #DDD">TNH</th>
								<th  width="4%" style="text-align:center;border: 1px solid #DDD">BNH</th>

								
								

								</tr>
								</thead>
							
							<tbody>
								
							</tbody>
							</table>

							</div>
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