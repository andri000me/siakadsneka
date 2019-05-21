<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Rekap Nilai Ulangan Harian
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemen Nilai</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Pengetahuan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Nilai UH</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Rekap Nilai UH</a>
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
								<i class="fa fa-database "></i>Rekap Nilai UH
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
								
								<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Warning!</strong> anda belum menginput Kelas.
							</div>
							
							</div>
							</div>
							<div class="row">
									
									
									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-users "></i>
												</span>
												<select class="form-control select2me" data-placeholder="Kelas">
												<option value=""></option>
												<option value="XBB">XBB</option>
								                <option value="XBC">XBC</option>
								                <option value="XBD">XBD</option>
								                <option value="XEA">XEA</option>
								                <option value="XEB">XEB</option>
								                <option value="XEC">XEC</option>
								                <option value="XED">XED</option>
								                <option value="XLA">XLA</option>
								                <option value="XLB">XLB</option>
								                <option value="XLC">XLC</option>
								                <option value="XLD">XLD</option>
								                <option value="XMA">XMA</option>
								                <option value="XMB">XMB</option>
								                <option value="XMC">XMC</option>
								                <option value="XMD">XMD</option>
								                <option value="XOA">XOA</option>
								                <option value="XOB">XOB</option>
								                <option value="XOC">XOC</option>
								                <option value="XOD">XOD</option>
												</select>
											</div>
														</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-book "></i>
												</span>
												<select class="form-control select2me" data-placeholder="Mata Pelajaran">
												<option value=""></option>
											<option value="1">Pendidikan Agama dan Budi Pekerti</option>
								            <option value="2">Pendidikan Pancasila dan Kewarganegaraan</option>
								            <option value="4">Bahasa Indonesia</option>
								            <option value="5">Matematika</option>
								            <option value="6">Sejarah Indonesia</option>
								            <option value="7">Bahasa Inggris</option>
								            <option value="8">Seni Budaya</option>
								            <option value="9">Prakarya dan Kewirausahaan</option>
								            <option value="10">Pendidikan Jasmani, Olah Raga &amp; Kesehatan</option>
								            <option value="3">Fisika</option>
								            <option value="11">Kimia</option>
								            <option value="13">Teknik Konstruksi Kayu</option>
								            <option value="14">Teknik Konstruksi Batu Beton</option>
								            <option value="15">Teknik Gambar Bangunan</option>
																				</select>
											</div>
														</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-dot-circle-o "></i>
												</span>
												<select class="form-control select2me" data-placeholder="Pilih UH">
												<option value=""></option>
												<option value="">Semua UH</option>
								                <option value="XBC">UH1</option>
								                <option value="XBD">UH2</option>
								                <option value="XEA">UH3</option>
								                <option value="XEB">UH4</option>
								                
												</select>
											</div>
														</div>
									</div>
										<div class="col-md-2">
										<div class="form-actions noborder">

									<button type="button" class="btn grey-cascade"><i class="fa fa-search-plus"></i> Lihat Nilai Siswa</button>
									
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
								<i class="fa fa-database"></i>Rekap Nilai UH
							</div>

							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
										</a>
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
							
						</div>
						<div class="portlet-body form">
						<div class="form-body">
						<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-info-circle"></i>
								<strong>Informasi :</strong> Default <b>Password User</b> yaitu <strong>NIS + NOABSEN</strong>.
							</div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="datasiswaaktif">
							<thead>
							<tr>
								
								<th width="5%">
								No
								</th>
								<th width="10%" style="text-align:center;">
									 NIS
								</th>
								<th width="64%">
									 Nama Siswa
								</th>
								<th width="6%">
									 Kelas
								</th>
								<th width="5%" style="text-align:center;">
									 Absen
								</th>
								<th width="10%" style="text-align:center;">
									 UH1
								</th>
								<th width="10%" style="text-align:center;">
									 Action
								</th>
								
								
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">
								
								<td>
									 1
								</td>
								<td style="text-align:center;">
									1418681
								</td>
								<td>
									  	
									 	ADELLIA DAINTY
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									7 </span>
								</td>
								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 2
								</td>
								<td style="text-align:center;">
									1418682
								</td>
								<td>
									  	
									 ANGELINA CORBARA JELITA PRADINA WIDYA
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									6 </span>
								</td>
								
								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 3
								</td>
								<td style="text-align:center;">
									1418683
								</td>
								<td>
									  	
									 	ANISATU ULFAH
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									5 </span>
								</td>
								
								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 4
								</td>
								<td style="text-align:center;">
									1418684
								</td>
								<td>
									  	
									 	ARIF PAMBUDI
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									4 </span>
								</td>
								
								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 5
								</td>
								<td style="text-align:center;">
									1418685
								</td>
								<td>
									  	
									 	AZIZAH WAHYU LESTARI
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									3 </span>
								</td>

								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 6
								</td>
								<td style="text-align:center;">
									1418686
								</td>
								<td>
									  	
									 CHAIERUL ANAS
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									2 </span>
								</td>
								
								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 7
								</td>
								<td style="text-align:center;">
									1418687
								</td>
								<td>
									  	
									 	HIDAYATULLOH MUHAMMAD YUSUF
								</td>
								<td style="text-align:center;">
									 XEB
								</td>
								<td style="text-align:center;">
									<span class="badge label-danger label-sm">
									1 </span>
								</td>

								<td style="text-align:center;">
									<span class="badge label-primary label-sm">
									90 </span>
								</td>
								<td style="text-align:center">
									<a href="javascript:;" class="btn btn-xs btn-warning">
															<i class="fa fa-edit"></i> Edit</a>
								</td>
							</tr>
							
							
							
						
						
						
							</tbody>
							</table>


							</div>
							
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