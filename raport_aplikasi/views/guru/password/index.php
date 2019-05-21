<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Ganti Password
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Ganti Password</a>
						
					</li>
					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="ganti-password-prosess">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-key"></i>Ganti Password
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
								
							</div>
							
						<div class="row">
							<div class="col-md-8">
								<div class="note note-info">
								<i class="fa fa-info-circle "></i>
								 Gunakan password generator untuk membuat <b>password</b> secara <b>acak/random</b>.
							</div>
							</div>
							
								
							</div>
						  <div class="row">
                
			                <div class="col-md-8">
			                <div id="data-error-sukses">
			              </div>
			                <div id="data-error-notif">
			              </div>
			              </div>
			              </div>

							 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-ganti-password" id="form-ganti-password"  >

							<div class="row">
							<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_2_1">
									
							
							<div class="row">
							<div class="col-md-8">
								<div class="form-group  password-strength">
											<input name="user_password_lama" placeholder="Masukkan Password Lama" type="password" class="form-control" name="password" >
											
										</div>
									</div>
							</div>
							
							<div class="row">
							<div class="col-md-8">
								<div class="form-group  password-strength">
											<input name="user_password" placeholder="Masukkan Password Baru" type="password" class="form-control" name="password" id="password_strength">
											
										</div>
									</div>
							</div>

							<div class="row">
							<div class="col-md-8">
								<div class="form-group  password-strength">
											<input name="user_password_confirm" placeholder="Konfirmasi Password Baru" type="password" class="form-control" name="password">
											
										</div>
									</div>
							</div>

							<div class="row">
							<div class="col-md-8">
								<div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                            </span>

                                         <input onclick="select_all(this)" name="user_passwordgenerator" class="form-control" placeholder="Generator Data" type="text" readonly>
                                        </div>
                                <span class="help-block"></span>
									</div>
							</div>


								
								<hr>
							

								</div>


										
								<div class="form-actions noborder">

									<button id="btnSave" onclick="save()" type="button" class="btn grey-cascade"><i class="fa fa-key"></i> Ganti Password</button>
									<button type="button" id="btngenerator" onclick="generator()" class="btn default blue-stripe">Generate Password</button>
									<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset</button>
								</div>
								

							</div>
							</div>
							</div>
							</form>
							
						
						
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