<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">Dashboard</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li><i class="fa fa-home"></i><a>Home</a><i class="fa fa-angle-right"></i></li>
		<li><a href="<?php echo site_url('') ?>4dm1n-D33H4RdY-n1c3dR34M/dashboard">Dashboard</a></li>
	</ul>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN DASHBOARD STATS -->
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<i class="glyphicon glyphicon-ok"></i> Welcome to <strong> Sistem Informasi Nilai Raport</strong>	
			<i class="fa fa-angle-double-right"></i> SMK N 4 Klaten
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
			<a class="more" href="<?php echo site_url() ?>4dm1n-D33H4RdY-n1c3dR34M/datasiswa/siswaaktif">
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
						<a class="more" href="<?php echo site_url() ?>4dm1n-D33H4RdY-n1c3dR34M/dataguru/lihatdata">
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
						<a class="more" href="<?php echo site_url() ?>4dm1n-D33H4RdY-n1c3dR34M/datakelas">
							View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-edit"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $jumlah_absensi ?>
							</div>
							<div class="desc">
								Data Absensi
							</div>
						</div>
						<a class="more" href="<?php echo site_url() ?>4dm1n-D33H4RdY-n1c3dR34M/dataabsensi/lihatdata">
							View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END DASHBOARD STATS -->