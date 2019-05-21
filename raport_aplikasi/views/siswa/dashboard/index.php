<!-- BEGIN PAGE HEADER -->
			<h3 class="page-title">
			Dashboard
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a>Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url('') ?>siswa/dashboard">Dashboard</a>
					</li>
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<i class="glyphicon glyphicon-ok"></i> Welcome to <strong> Sistem Informasi Nilai Raport</strong>	<i class="fa fa-angle-double-right"></i> <?php echo strtoupper($this->konfigurasi_m->konfig_sekolah()) ?>
							</div>
			</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-child "></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $jumlahsiswaaktif ?>
							</div>
							<div class="desc">
								 Siswa Aktif
							</div>
						</div>
						<a class="more" href="<?php echo site_url() ?>siswa/datasiswa/siswaaktif">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $jumlahguruaktif ?>
							</div>
							<div class="desc">
								 Guru Aktif
							</div>
						</div>
						<a class="more" href="<?php echo site_url() ?>siswa/dataguru/lihatdata">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $jumlahkelasaktif ?>
							</div>
							<div class="desc">
								 Kelas Aktif
							</div>
						</div>
						<a class="more" href="<?php echo site_url() ?>siswa/datakelas">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-calendar"></i>
						</div>
						<div class="details">
							<div class="number">
								 +<?php echo $jumlah_absensi?>
							</div>
							<div class="desc">
								 Data Absensi
							</div>
						</div>
						<a class="more" href="<?php echo site_url() ?>siswa/dataabsensi/lihatdata">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<!-- <div class="portlet light bordered ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp "></i>
								<span class="caption-subject font-green-sharp bold uppercase">Visits & Login Statistik</span>
								<span class="caption-helper">monthly stats...</span>
							</div>
							<div class="tools">
								
								<a title="" data-original-title="" href="javascript:;" class="reload">
								</a>
								<a title="" data-original-title="" href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="<?php echo site_url() ?>raport_themes/assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div> -->
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<!-- <div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-life-bouy font-green-sharp "></i>
								<span class="caption-subject font-green-sharp bold uppercase">Presentase Data Siswa</span>
								
							</div>
							<div class="tools">
								
								<a title="" data-original-title="" href="javascript:;" class="reload">
								</a>
								<a title="" data-original-title="" href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_6" class="chart">
									</div>
							
						</div>
					</div> -->
					<!-- END PORTLET-->
				</div>


			</div>
			<div class="clearfix">
			</div>

			<!-- BEGIN ROW -->
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN CHART PORTLET-->
							<!-- <div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-bar-chart font-green-haze"></i>
										<span class="caption-subject bold uppercase font-green-haze"> Rata-rata Nilai Raport Perkelas TH <?php echo $tahun_ajaran_client ?>:<?php echo $semester_client?></span>
										
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										
										<a href="javascript:;" class="reload">
										</a>
										<a href="javascript:;" class="fullscreen">
										</a>
										<a href="javascript:;" class="remove">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="chart_5" class="chart" style="height: 400px;">
									</div>
									<div class="well margin-top-20">
										<div class="row">
											<div class="col-sm-3">
												<label class="text-left">Top Radius:</label>
												<input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
											</div>
											<div class="col-sm-3">
												<label class="text-left">Angle:</label>
												<input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
											</div>
											<div class="col-sm-3">
												<label class="text-left">Depth:</label>
												<input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- END CHART PORTLET-->
						</div>
					</div>
					<!-- END ROW -->

			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER