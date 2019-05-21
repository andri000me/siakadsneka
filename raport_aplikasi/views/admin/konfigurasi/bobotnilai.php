<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Bobot Nilai
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Pengaturan Raport</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Bobot Nilai</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
				
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="edit-data-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-dashboard"></i> Bobot Penilaian Berproses
							</div>
							<div class="tools">
								
								<a href="javascript:;" class="reload">
								</a>
								
								<a href="javascript:;" class="collapse">
								</a>
								
								
							</div>
						</div>
						<div class="portlet-body form">
							
							
							<div class="row">
								
								<div class="col-md-8">
								
								<div id="data-error-notif">
								
							
							</div>
							
							</div>
							</div>
							
						
						
							
							<!-- BEGIN FORM-->
							<form action="#" class="form-horizontal form-bordered" id="form-bobotnilai">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3">Nilai Pengetahuan</label>


										<div class="col-md-5">
										<h4>Nilai Ulangan Harian</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-uh" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot UH: <b><span id="bobot-nilai-uh-value">
												</span></b>

											</div>
										
											<input id="bobot-nilai-uh-value-text" name="bobot_uh" class="form-control"  type="hidden">

												
											</div>

											<br>

										<h4>Nilai Tugas Harian/PR</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-tg" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot Tugas/PR: <b><span id="bobot-nilai-tg-value">
												</span></b>
											</div>
			
											<input id="bobot-nilai-tg-value-text" name="bobot_tg" class="form-control"  type="hidden">

											</div>

											<br>
											
											<h4>Nilai Harian (Rerata UH + Tugas)</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-nh" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot NH: <b><span id="bobot-nilai-nh-value">
												</span></b>
											</div>
			
											<input id="bobot-nilai-nh-value-text" name="bobot_nh" class="form-control"  type="hidden">

											</div>


										<br>
										<h4>Nilai UTS</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-uts" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot UTS: <b><span id="bobot-nilai-uts-value">
												</span></b>
											</div>
			
												
											<input id="bobot-nilai-uts-value-text" name="bobot_uts" class="form-control"  type="hidden">
											</div>

											<br>
										<h4>Nilai UAS</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-uas" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot UAS: <b><span id="bobot-nilai-uas-value">
												</span></b>
											</div>
			
											<input id="bobot-nilai-uas-value-text" name="bobot_uas" class="form-control"  type="hidden">

											</div>

														
									
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Nilai Keterampilan</label>
										

										<div class="col-md-5">
										<h4>Nilai Proses</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-ps" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot Proses: <b><span id="bobot-nilai-ps-value">
												</span></b>
											</div>
										
								
											<input id="bobot-nilai-ps-value-text" name="bobot_ps" class="form-control"  type="hidden">
												
											</div>

											<br>

										<h4>Nilai Produk</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-pr" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot Produk: <b><span id="bobot-nilai-pr-value">
												</span></b>
											</div>
			
											<input id="bobot-nilai-pr-value-text" name="bobot_pr" class="form-control"  type="hidden">

											</div>

										<br>
										<h4>Nilai Proyek</h4>	
										<hr>
										<div class="margin-bottom-10">

										
										
											<div id="bobot-nilai-po" class="slider bg-purple">
											</div>
											<div class="slider-value">
												 Bobot Proyek: <b><span id="bobot-nilai-po-value">
												</span></b>
											</div>

											<input id="bobot-nilai-po-value-text" name="bobot_po" class="form-control"  type="hidden">
												
											</div>

										

														
									
										</div>
									</div>
									



									
								</div>
								</form>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="btnUpdate" onclick="update()" type="submit" class="btn green"><i class="fa fa-check"></i> Simpan</button>
											<button type="reset" class="btn default">Reset Default</button>
										</div>
									</div>
								</div>
							
						
							<!-- END FORM-->
						




							
						
						
							</div>
										
									</div>

								
									
								</div>

							
								
						</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->



					
				
			</div>
		
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->