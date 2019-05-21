<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Tambah Siswa Perkelas
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url() ?>guru/dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manajemen Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Data Siswa</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Tambah Siswa Kelas Perkelas</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered" id="set-form-process">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i>Tambah Data Siswa
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
								<div id="data-error-notif-top">
			              </div>
							</div>
							</div>
							<div class="row">
									<div class="col-md-4">
										<div class="form-group">
															
															<div class="input-group">

												<span class="input-group-addon">
												<i class="fa fa-calendar-o"></i>
												</span>
												  <?php $attributes = array('name' => 'kelas_tahun', 'class' => 'form-control select2me', 'data-placeholder' => 'Pilih Angkatan', 'id'=>'tahun-cari-modal');
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
												  <select name="siswa_kelas" class="form-control select2me" data-placeholder="Pilih Kelas" id="kelas-cari-modal" disabled="true">
							                         <option value=""></option>
							                       
							                      </select>
											</div>
														</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
															
															<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												 	<input id="generate_nis" type="text" placeholder="Generate NIS" class="form-control datanis-siswa-tambah" >
											</div>
														</div>
									</div>


										<div class="col-md-2">
										<div class="form-actions noborder">

									<button id="set-form" onclick="set_form()" type="button" class="btn grey-cascade"><i class="fa fa-plus-circle"></i> Set Form Data</button>
									
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
								<i class="fa fa-users"></i>Tambah Data Siswa (Multiple Row)
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
											<a onclick="clear_notif()">
											<i class="glyphicon glyphicon-trash"></i> Clear Semua Notification </a>
										</li>

		
									</ul>
								</div>
								
								
								
								
							</div>
							
						</div>
						<div class="portlet-body form" id="save-data-process">
						<div class="form-body">
						<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-info-circle"></i>
								<strong>Info:</strong> Password siswa secara <b>otomatis</b> akan diacak secara <b>random</b> oleh <b>sistem</b>.
							</div>

							<div id="data-sukses-siswa">
								
							</div>

							<div id="data-error-notif-remove">
								
							</div>



							<div id="data-error-siswa">
								
							</div>
						<div class="table-responsive">
						 <form enctype="multipart/form-data" accept-charset="utf-8" name="form-siswa" id="form-siswa"  >
							<input id="data-masuk" name="data_masuk" type="hidden" >
							<table id="tambah-siswa-kelas" class="table table-striped table-bordered table-hover" >
							<thead>
							<tr>
								
								<th width="3%">
								No
								</th>
								<th width="18%">
									 NIS SISWA
								</th>
								<th width="35%">
									 NAMA SISWA
								</th>
								<th width="12%" style="text-align:center;">
									 KELAS
								</th>
								<th width="7%" style="text-align:center;">
									 ABSEN
								</th>
								<th width="13%" style="text-align:center;">
									 JENIS KELAMIN
								</th>
								<th width="14%" style="text-align:center;">
									 ANGKATAN
								</th>
								<th style="text-align:center">
									<li class="fa fa-minus-circle "></li>
								</th>
								
								
								
							</tr>
							</thead>
							<tbody>
							
							<tr class="odd gradeX">
								
								<td>
									 1
								</td>
								<td style="text-align:center;">
								<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-lock"></i>
																</span>
									<input id="siswa-nis1" name="siswa_nis[1]" type="text" placeholder="NIS" class="form-control datanis-siswa-tambah2 input-nis-siswa" >
									</div>
								</td>
								<td>
									  	<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-user"></i>
																</span>
																<input name="siswa_nama[1]" type="text" placeholder="Nama Siswa" class="form-control input-nama-siswa" >
															</div>
									
								</td>
								<td style="text-align:center;">
									 <input style="text-align:center;" type="text"  size="2" disabled="" class="form-control setkelas input-kelas-siswa" >
									<input type="hidden"  size="2" name="siswa_kelas[1]"  class="form-control setidkelas" >
								</td>
								<td style="text-align:center;">
									<input name="siswa_absen[1]" type="text" placeholder="No" class="form-control dataabsen-siswa-tambah" id="siswa-absen1" >
								</td>
								<td style="text-align:center;">
									<select name="siswa_jeniskelamin[1]" class="form-control input-jk-siswa bs-select" >
												
												<option value="L">Laki-Laki</option>
								                <option value="P">Perempuan</option>
								                
												</select>
								</td>
								<td>
									<input style="text-align:center;" type="text"  size="2" name="siswa_angkatan[1]" disabled="" class="form-control setangkatan input-tahun-siswa" >
								</td>

								<td style="text-align:center">
									<a id="baris-hapus1" onclick="hapusbaris2('1')" class="btn btn-icon-only default">
															<i class="fa fa-trash-o"></i>
															</a>
								</td>
								
							</tr>
							
							
							<tr class="odd gradeX">
								
								<td>
									 2
								</td>
								<td style="text-align:center;">
									<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-lock"></i>
																</span>
									<input id="siswa-nis2" name="siswa_nis[2]" type="text" placeholder="NIS" class="form-control datanis-siswa-tambah2 input-nis-siswa" >
									</div>
								</td>
								<td>
									<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-user"></i>
																</span>  	
									<input name="siswa_nama[2]" type="text" placeholder="Nama Siswa" class="form-control input-nama-siswa" >
									</div>
								</td>
								<td style="text-align:center;">
									 <input style="text-align:center;" type="text"  size="2" disabled="" class="form-control setkelas  input-kelas-siswa" >
									<input type="hidden"  size="2" name="siswa_kelas[2]"  class="form-control setidkelas" >
								</td>
								<td style="text-align:center;">
									<input name="siswa_absen[2]" type="text" placeholder="No" class="form-control dataabsen-siswa-tambah" id="siswa-absen2" >
								</td>
								<td style="text-align:center;">
									<select name="siswa_jeniskelamin[2]" class="form-control input-jk-siswa bs-select" >
												
												<option value="L">Laki-Laki</option>
								                <option value="P">Perempuan</option>
								                
												</select>
								</td>
								<td>
									<input style="text-align:center;" type="text"  size="2" name="siswa_angkatan[2]" disabled="" class="form-control setangkatan input-tahun-siswa" >
								</td>
								<td style="text-align:center">
									<a id="baris-hapus3" onclick="hapusbaris2('3')" class="btn btn-icon-only default">
															<i class="fa fa-trash-o"></i>
															</a>
								</td>
								
							</tr>
							<tr class="odd gradeX">
								
								<td>
									 3
								</td>
								<td style="text-align:center;">
									<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-lock"></i>
																</span>
									<input id="siswa-nis3" name="siswa_nis[3]" type="text" placeholder="NIS" class="form-control datanis-siswa-tambah2 input-nis-siswa" >
									</div>
								</td>
								<td>
									 <div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-user"></i>
																</span> 	
									<input name="siswa_nama[3]" type="text" placeholder="Nama Siswa" class="form-control input-nama-siswa" >
									</div>
								</td>
								<td style="text-align:center;">
									 <input style="text-align:center;" type="text"  size="2" disabled="" class="form-control setkelas input-kelas-siswa" >
									<input type="hidden"  size="2" name="siswa_kelas[3]"  class="form-control setidkelas" >
								</td>
								<td style="text-align:center;">
									<input name="siswa_absen[3]" type="text" placeholder="No" class="form-control dataabsen-siswa-tambah" id="siswa-absen3">
								</td>
								<td style="text-align:center;">
									<select name="siswa_jeniskelamin[3]" class="form-control input-jk-siswa bs-select" >
												
												<option value="L">Laki-Laki</option>
								                <option value="P">Perempuan</option>
								                
												</select>
								</td>
								<td>
									<input style="text-align:center;" type="text"  size="2" name="siswa_angkatan[3]" disabled="" class="form-control setangkatan input-tahun-siswa" >
								</td>
								<td style="text-align:center">
									<a id="baris-hapus4" onclick="hapusbaris2('4')" class="btn btn-icon-only default">
															<i class="fa fa-trash-o"></i>
															</a>
								</td>
								
							</tr>

							<tr class="odd gradeX">
								
								<td>
									 4
								</td>
								<td style="text-align:center;">
								<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-lock"></i>
																</span>
									<input id="siswa-nis4" name="siswa_nis[4]" type="text" placeholder="NIS" class="form-control datanis-siswa-tambah2 input-nis-siswa" >
									</div>
								</td>
								<td>
									<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-user"></i>
																</span>  	
									<input name="siswa_nama[4]" type="text" placeholder="Nama Siswa" class="form-control input-nama-siswa" >
									</div>
								</td>
								<td style="text-align:center;">
									 <input style="text-align:center;" type="text"  size="2" disabled="" class="form-control setkelas input-kelas-siswa" >
									<input type="hidden"  size="2" name="siswa_kelas[4]"  class="form-control setidkelas" >
								</td>
								<td style="text-align:center;">
									<input name="siswa_absen[4]" type="text" placeholder="No" class="form-control dataabsen-siswa-tambah" id="siswa-absen4" >
								</td>
								<td style="text-align:center;">
									<select name="siswa_jeniskelamin[4]" class="form-control input-jk-siswa bs-select" >
												
												<option value="L">Laki-Laki</option>
								                <option value="P">Perempuan</option>
								                
												</select>
								</td>
								<td>
									<input style="text-align:center;" type="text"  size="2" name="siswa_angkatan[4]" disabled="" class="form-control setangkatan input-tahun-siswa" >
								</td>
								<td style="text-align:center">
									<a id="baris-hapus5" onclick="hapusbaris2('5')" class="btn btn-icon-only default">
															<i class="fa fa-trash-o"></i>
															</a>
								</td>
								
							</tr>
						
							<tr class="odd gradeX">
								
								<td>
									 5
								</td>
								<td style="text-align:center;">
									<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-lock"></i>
																</span>
									<input id="siswa-nis5" name="siswa_nis[5]" type="text" placeholder="NIS" class="form-control datanis-siswa-tambah2 input-nis-siswa" >
									</div>
								</td>
								<td>
									<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-user"></i>
																</span>  	
									<input name="siswa_nama[5]" type="text" placeholder="Nama Siswa" class="form-control input-nama-siswa" >
									</div>
								</td>
								<td style="text-align:center;">
									 <input style="text-align:center;" type="text"  size="2" disabled="" class="form-control setkelas input-kelas-siswa" >
									<input type="hidden"  size="2" name="siswa_kelas[5]"  class="form-control setidkelas" >
								</td>
								<td style="text-align:center;">
									<input name="siswa_absen[5]" type="text" placeholder="No" class="form-control dataabsen-siswa-tambah" id="siswa-absen5" >
								</td>
								<td style="text-align:center;">
									<select name="siswa_jeniskelamin[5]" class="form-control bs-select input-jk-siswa" >
												
												<option value="L">Laki-Laki</option>
								                <option value="P">Perempuan</option>
								                
												</select>
								</td>
								<td>
									<input style="text-align:center;" type="text"  size="2" name="siswa_angkatan[5]" disabled="" class="form-control setangkatan input-tahun-siswa" >
								</td>
								<td style="text-align:center">
									<a id="baris-hapus2" onclick="hapusbaris2('2')" class="btn btn-icon-only default">
															<i class="fa fa-trash-o"></i>
															</a>
								</td>
								
							</tr>

							
						
						
						
							</tbody>
							</table>
							</div>
							<div class="form-actions noborder">
									
										<button id="btnSave" onclick="save()" type="button" class="btn grey-cascade"> Tambah Siswa</button>

										<button type="reset" class="btn default"><i class="fa fa-undo"></i> Reset Form</button>

									
									<button onclick="tambahbaris()" type="button" class="btn default grey-gallery-stripe"><i class="fa fa-plus-circle"></i> Add Row</button>
									
									<button onclick="hapusbaris()" type="button" class="btn default grey-gallery-stripe"><i class="fa  fa-minus-circle"></i> Remove Row</button>
									
									
									
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