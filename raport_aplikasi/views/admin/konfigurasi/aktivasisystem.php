<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Aktivasi Sistem
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Pengaturan Raport</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Aktivasi Sistem</a>
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
								<i class="fa fa-check-circle "></i> Aktivasi Sistem Raport
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
							<form action="#" class="form-horizontal form-bordered" id="form-aktivasi">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3">Aktivasi Tahun Ajaran</label>
										<div class="col-md-5">
										<h4>Aktivasi Sistem Admin</h4>	
										<hr>
										<div class="margin-bottom-10">
												<label for="option1">Tahun Ajaran :</label>
															
												<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
												</span>
												<select name="aktivasi_tahun_ajaran_admin" class="form-control select2me" data-placeholder="Tahun Ajaran" id="data-select2-tahunajaran">
												<option  value=""></option>
												<option value="2020/2021">2020/2021</option>
												<option value="2019/2020">2019/2020</option>
												<option value="2018/2019">2018/2019</option>
												<option value="2017/2018">2017/2018</option>
												<option value="2016/2017">2016/2017</option>
												<option value="2015/2016">2015/2016</option>
												<option value="2014/2015">2014/2015</option>
												<option value="2013/2014">2013/2014</option>
												<option value="2012/2013">2012/2013</option>
												<option value="2011/2012">2011/2012</option>
								              	<option value="2010/2011">2010/2011</option>
								              
												</select>
											</div>
											</div>
											<div class="margin-bottom-10">
												<label  for="option1">Semester :</label>
															
												<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar-o"></i>
												</span>
												<select name="aktivasi_semester_admin" class="form-control bs-select" data-placeholder="Semester">
												
												<option value="genap">Genap</option>
												<option value="gasal">Gasal</option>
												
												</select>
											</div>
											</div>
											<br>
											<h4>Aktivasi Sistem Client</h4>	
										<hr>
										<div class="margin-bottom-10">
												<label for="option1">Tahun Ajaran :</label>
															
												<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
												</span>
												<select name="aktivasi_tahun_ajaran_client" class="form-control select2me" data-placeholder="Tahun Ajaran" id="data-select2-tahunajaran-client">
													<option  value=""></option>
													<option value="2020/2021">2020/2021</option>
													<option value="2019/2020">2019/2020</option>
													<option value="2018/2019">2018/2019</option>
													<option value="2017/2018">2017/2018</option>
													<option value="2016/2017">2016/2017</option>
													<option value="2015/2016">2015/2016</option>
													<option value="2014/2015">2014/2015</option>
													<option value="2013/2014">2013/2014</option>
													<option value="2012/2013">2012/2013</option>
													<option value="2011/2012">2011/2012</option>
									              	<option value="2010/2011">2010/2011</option>
								              
												</select>
											</div>
											</div>
											<div class="margin-bottom-10">
												<label  for="option1">Semester :</label>
															
												<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-calendar-o"></i>
												</span>
												<select name="aktivasi_semester_client" class="form-control bs-select" data-placeholder="Semester">
												
												<option value="genap">Genap</option>
												<option value="gasal">Gasal</option>
												
												</select>
											</div>
											</div>
														
									
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Aktivasi Login</label>
										<div class="col-md-9">
											<div class="margin-bottom-10">
												<label for="option1">Login Siswa <span style="color:#fff">..............................</span>:</label>
												<input name="aktivasi_login_siswa" type="checkbox" <?php if ($aktivasi_sistem['aktivasi_login_siswa'] == 1) {
													echo 'checked';
												} else {
													echo '';
												}
												 ?> class="make-switch" data-size="small" value="<?php echo $aktivasi_sistem['aktivasi_login_siswa'] ?>">

											</div>
											<div class="margin-bottom-10">
												<label for="option2"> Login Guru <span style="color:#fff">...............................</span>:</label>
												<input name="aktivasi_login_guru" type="checkbox" <?php if ($aktivasi_sistem['aktivasi_login_guru'] == 1) {
													echo 'checked';
												} else {
													echo '';
												}
												 ?> class="make-switch"  data-size="small" value="<?php echo $aktivasi_sistem['aktivasi_login_guru'] ?>">
											</div>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Edit Biodata</label>
										<div class="col-md-9">
											<div class="margin-bottom-10">
												<label for="option1"> Biodata Siswa <span style="color:#fff">...........................</span>:</label>
												<input name="aktivasi_edit_biodata_siswa" type="checkbox" <?php if ($aktivasi_sistem['aktivasi_edit_biodata_siswa'] == 1) {
													echo 'checked';
												} else {
													echo '';
												}
												 ?>  class="make-switch" data-size="small" value="<?php echo $aktivasi_sistem['aktivasi_edit_biodata_siswa'] ?>">
											</div>
											<div class="margin-bottom-10">
												<label for="option2"> Biodata Guru <span style="color:#fff">............................</span>:</label>
												<input name="aktivasi_edit_biodata_guru" type="checkbox" <?php if ($aktivasi_sistem['aktivasi_edit_biodata_guru'] == 1) {
													echo 'checked';
												} else {
													echo '';
												}
												 ?>  class="make-switch" data-size="small" value="<?php echo $aktivasi_sistem['aktivasi_edit_biodata_guru'] ?>">
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