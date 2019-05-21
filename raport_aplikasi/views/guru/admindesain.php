<?php
$url_ofani1 = $this->uri->segment ( 1 );
$url_ofani2 = $this->uri->segment ( 2 );
$url_ofani3 = $this->uri->segment ( 3 );
$url_gabung = array (
		$url_ofani2 => $url_ofani3 
);
$url_gabung2 = array (
		$url_ofani1 => $url_ofani2 
);
$str_url = $this->uri->assoc_to_uri ( $url_gabung );
$str_url2 = $this->uri->assoc_to_uri ( $url_gabung2 );
?>
<?php
if ($str_url == 'article/edit') {
$this->load->view ( 'guru/components/head_tiny' );


} else if ($this->uri->segment ( 2 ) == 'datakelas') {
$this->load->view ( 'guru/components/head_datakelas' );

} else if ($this->uri->segment ( 2 ) == 'datawali') {
$this->load->view ( 'guru/components/head_datawali' );

} else if ($this->uri->segment(2) == 'datahakmapel') {
$this->load->view ( 'guru/components/head_datahakmapel' );

} else if ($this->uri->segment(2) == 'datahakabsensi') {
$this->load->view ( 'guru/components/head_dataabsensi_hakabsensi' );

} else if ($this->uri->segment(2) == 'datahakeskul') {
$this->load->view ( 'guru/components/head_dataeskul_hakeskul' );

} else if ($this->uri->segment(2) == 'datapesertaeskul') {
$this->load->view ( 'guru/components/head_datapesertaeskul' );

} else if ($this->uri->segment(2) == 'indikatornilai') {
$this->load->view ( 'guru/components/head_indikatornilai' );

} else if ($this->uri->segment(2) == 'indikatornilai_wali') {
$this->load->view ( 'guru/components/head_indikatornilai_wali' );

} else if ($this->uri->segment(2) == 'gantipassword') {
$this->load->view ( 'guru/components/head_password_ganti' );

} else if ($this->uri->segment(2) == 'myprofile') {
$this->load->view ( 'guru/components/head_myprofile' );

} else if ($this->uri->segment(2) == 'datasiswa_wali') {
$this->load->view ( 'guru/components/head_datasiswa_wali' );

} else if ($str_url == 'datakompetensi/lihatdata') {
$this->load->view ( 'guru/components/head_datakompetensi_lihatdata' );
			
} else if ($str_url == 'datakompetensi/tambahdata') {
$this->load->view ( 'guru/components/head_datakompetensi_edit' );

} else if ($str_url == 'datasiswa/siswaaktif') {
$this->load->view ( 'guru/components/head_datasiswa_siswaaktif' );

} else if ($str_url == 'datasiswa/siswatidakaktif') {
$this->load->view ( 'guru/components/head_datasiswa_siswatidakaktif' );

} else if ($str_url == 'dataguru/tambahsiswa') {
$this->load->view ( 'guru/components/head_datasiswa_tambahsiswa' );

} else if ($str_url == 'dataguru/tambahsiswakelas') {
$this->load->view ( 'guru/components/head_datasiswa_tambahsiswakelas' );

} else if ($str_url == 'dataguru/importdatasiswa') {
$this->load->view ( 'guru/components/head_datasiswa_importdatasiswa' );

} else if ($str_url == 'dataguru/lihatdata') {
$this->load->view ( 'guru/components/head_dataguru_lihatdata' );

} else if ($str_url == 'dataguru/tambahguru') {
$this->load->view ( 'guru/components/head_dataguru_edit' );

} else if ($str_url == 'dataabsensi/lihatdata') {
$this->load->view ( 'guru/components/head_dataabsensi_lihatdata' );

} else if ($str_url == 'dataabsensi/tambahdata') {
$this->load->view ( 'guru/components/head_dataabsensi_tambahdata' );

} else if ($str_url == 'dataabsensi/hakabsensi') {
$this->load->view ( 'guru/components/head_dataabsensi_hakabsensi' );

} else if ($str_url == 'dataeskul/lihatdata') {
$this->load->view ( 'guru/components/head_dataeskul_lihatdata' );

} else if ($str_url == 'dataeskul/hakeskul') {
$this->load->view ( 'guru/components/head_dataeskul_hakeskul' );

} else if ($str_url == 'datanilai/input_nilai') {
$this->load->view ( 'guru/components/head_datanilai_inputnilai' );

} else if ($str_url == 'dataprestasi/lihatdata') {
$this->load->view ( 'guru/components/head_dataprestasi_lihatdata' );

} else if ($str_url == 'dataprestasi/tambahdata') {
$this->load->view ( 'guru/components/head_dataprestasi_tambahdata' );

} else if ($str_url == 'datanilai/edit_nilai') {
$this->load->view ( 'guru/components/head_datanilai_editnilai' );

} else if ($str_url == 'datanilaieskul/wajib_input_nilai') {
$this->load->view ( 'guru/components/head_datanilaieskul_wajib_inputnilai' );

} else if ($str_url == 'datanilaieskul/wajib_edit_nilai') {
$this->load->view ( 'guru/components/head_datanilaieskul_wajib_editnilai' );

} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai') {
$this->load->view ( 'guru/components/head_datanilaieskul_nonwajib_inputnilai' );

} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai') {
$this->load->view ( 'guru/components/head_datanilaieskul_nonwajib_editnilai' );

} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2') {
$this->load->view ( 'guru/components/head_datanilaieskul_nonwajib_inputnilai_v2' );
	
} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
$this->load->view ( 'guru/components/head_datanilaieskul_nonwajib_editnilai_v2' );
	
} else if ($str_url == 'datanilaisikap/input_nilai') {
$this->load->view ( 'guru/components/head_datanilaisikap_inputnilai' );

} else if ($str_url == 'datanilaisikap/edit_nilai') {
$this->load->view ( 'guru/components/head_datanilaisikap_editnilai' );

} else if ($str_url == 'rekapnilai/penilaianakhir') {
    $this->load->view('guru/components/head_rekapnilai_penilaianakhir');

} else if ($str_url == 'rekapnilai/penilaianberproses') {
    $this->load->view('guru/components/head_rekapnilai_penilaianberproses');


} else if ($str_url == 'rekapnilaiwali/penilaianakhir') {
    $this->load->view('guru/components/head_rekapnilaiwali_penilaianakhir');

} else if ($str_url == 'rekapnilaiwali/penilaianberproses') {
    $this->load->view('guru/components/head_rekapnilaiwali_penilaianberproses');



} else if ($str_url == 'datanilai/rekap_uh') {
$this->load->view ( 'guru/components/head_datanilai_rekap_uh' );

} else if ($str_url == 'cetaknilai/cetaktranskripnilai') {
$this->load->view ( 'guru/components/head_cetaknilai_cetaktranskripnilai' );

} else if ($str_url == 'cetaknilai/cetakraportsiswa') {
$this->load->view ( 'guru/components/head_cetaknilai_cetakraportsiswa' );

} else if ($str_url == 'cetaknilai/cetaknilaipengetahuan') {
$this->load->view ( 'guru/components/head_cetaknilai_cetaknilaipengetahuan' );

} else if ($str_url == 'cetaknilai/cetaknilaiketrampilan') {
$this->load->view ( 'guru/components/head_cetaknilai_cetaknilaiketrampilan' );

} else if ($str_url == 'cetaknilai/cetaknilaisikap') {
$this->load->view ( 'guru/components/head_cetaknilai_cetaknilaisikap' );

} else if ($str_url == 'rangking/rangkingkelas') {
$this->load->view ( 'guru/components/head_rangking_rangkingkelas' );

} else if ($str_url == 'rangking/rangkingmapel') {
$this->load->view ( 'guru/components/head_rangking_rangkingmapel' );

} else if ($str_url == 'password/gantipasswordguru') {
$this->load->view ( 'guru/components/head_password_gantipasswordguru' );

} else if ($str_url == 'password/gantipasswordsiswa') {
$this->load->view ( 'guru/components/head_password_gantipasswordsiswa' );

} else if ($str_url == 'konfigurasi/profilesekolah') {
$this->load->view ( 'guru/components/head_konfigurasi_profilesekolah' );

} else if ($str_url == 'konfigurasi/aktivasisystem') {
$this->load->view ( 'guru/components/head_konfigurasi_aktivasisystem' );

} else if ($str_url == 'kritikdansaran/lihatdata') {
$this->load->view ( 'guru/components/head_kritikdansaran_lihatdata' );

} else {
$this->load->view ( 'guru/components/head_dashboard' );
}
?>


<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo site_url() ?>guru/dashboard">
			<img src="<?php echo site_url('')?>raport_themes/assets/admin/layout/img/logo-new.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<li class="dropdown dropdown-ofani ">
					<a href="<?php echo site_url() ?>user/lockuser" class="dropdown-toggle">
					<i class="icon-lock"></i>
					</a>
				</li>
				<!-- END INBOX DROPDOWN -->
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" id="profile-guru" class="img-circle" src="

					<?php 
					if (file_exists('raport_files/foto/chat/'.$this->session->userdata('user_photo')) && $this->session->userdata('user_photo') == true) {
						echo site_url().'raport_files/foto/chat/'.$this->session->userdata('user_photo');
					} else {
						
						echo site_url().'raport_files/foto/chat/default.png';

					}
					
					?>
					"/>
					<span class="username username-hide-on-mobile" id="nama-guru2"> 
					<?php echo $this->session->userdata('user_nama'); ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo site_url() ?>guru/myprofile">
							<i class="icon-user"></i> My Profile </a>
						</li>
						
						
						<li class="divider">
						</li>
						
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				
				
				<li class="dropdown dropdown-ofani">
					<a href="<?php echo site_url() ?>user/logout" class="dropdown-toggle">
					<i class="icon-power"></i>
					</a>
				</li>

			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="500">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<div class="sidebar-search">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group" >
							<div class="form-control" style="color: #b4bcc8;" id="raport-semester">TH : <b><?php echo $tahun_ajaran_client ?></b> | <b><?php echo strtoupper($semester_client) ?></b></div>
							<span class="input-group-btn">
							<a class="btn submit"><i class="glyphicon glyphicon-bullhorn"></i></a>
							</span>
						</div>
					</div>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>

				<li <?php
					if ($this->uri->segment ( 2 ) == 'dashboard') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/dashboard'); ?>">
					<i class="glyphicon glyphicon-home "></i>
					<span class="title">Dashboard</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'dashboard') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					
					</a>
					
				</li>

				<li <?php
					if ($this->uri->segment ( 2 ) == 'myprofile') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/myprofile'); ?>">
					<i class="icon-user"></i>
					<span class="title">Profile</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'myprofile') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					
					</a>
					
				</li>
				
				<li <?php
					if ($this->uri->segment ( 2 ) == 'datakelas' || $this->uri->segment ( 2 ) == 'datawali' || $this->uri->segment ( 2 ) == 'datahakmapel' || $this->uri->segment ( 2 ) == 'datakompetensi'  ) {
						echo "class='active open'";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="glyphicon glyphicon-briefcase"></i>
					<span class="title">Master</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'datakelas' || $this->uri->segment ( 2 ) == 'datawali' || $this->uri->segment ( 2 ) == 'datahakmapel' || $this->uri->segment ( 2 ) == 'datakompetensi' ) {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					
					</a>
					<ul class="sub-menu">
						
						<li <?php
					if ($this->uri->segment ( 2 ) == 'datakelas') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datakelas'); ?>">
							<i class="fa fa-chevron-right"></i>
							Data Kelas</a>
						</li>
						<li <?php
					if ($this->uri->segment ( 2 ) == 'datawali') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datawali'); ?>">
							<i class="fa fa-chevron-right"></i><span class="badge <?php if ($jumlah_wali > 0) {
								echo 'badge-warning';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlahwali"><?php if ($jumlah_wali > 0) {
								echo $jumlah_wali;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Data Walikelas</a>
						</li>
						<li <?php
					if ($this->uri->segment ( 2 ) == 'datahakmapel') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datahakmapel'); ?>">
							<i class="fa fa-chevron-right"></i><span class="badge <?php if ($jumlah_hakmapel > 0) {
								echo 'badge-warning';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlahhakmapel"><?php if ($jumlah_hakmapel > 0) {
								echo $jumlah_hakmapel;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Data Penugasan</a>
						</li>
						<li <?php
					if ($this->uri->segment ( 2 ) == 'datakompetensi') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datakompetensi/lihatdata'); ?>">
							<i class="fa fa-chevron-right"></i> Data Kompetensi
							

							</a>
							
						</li>
					</ul>
				</li>


				<li <?php
					if ($this->uri->segment ( 3 ) == 'siswaaktif' || $this->uri->segment ( 3 ) == 'siswatidakaktif' || $this->uri->segment ( 3 ) == 'tambahsiswa' || $this->uri->segment ( 3 ) == 'tambahsiswakelas' || $this->uri->segment ( 3 ) == 'importdatasiswa') {
						echo "class='active open'";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">Manajemen Siswa</span>
					<?php
					if ($this->uri->segment ( 3 ) == 'siswaaktif' || $this->uri->segment ( 3 ) == 'siswatidakaktif' || $this->uri->segment ( 3 ) == 'tambahsiswa' || $this->uri->segment ( 3 ) == 'tambahsiswakelas' || $this->uri->segment ( 3 ) == 'importdatasiswa') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					</a>
					<ul class="sub-menu">
						<li <?php
					if ($str_url == 'datasiswa/siswaaktif' || $str_url == 'datasiswa/siswatidakaktif') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="javascript:;">
							<i class="fa fa-chevron-right"></i> Data Siswa
							<?php
					if ($str_url == 'datasiswa/siswaaktif' || $str_url == 'datasiswa/siswatidakaktif') {
						echo "<span class='arrow open'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
							</a>
							<ul class="sub-menu">
								<li <?php
					if ($str_url == 'datasiswa/siswaaktif') {
						echo "class='active'";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datasiswa/siswaaktif'); ?>"><i class="fa fa-check-circle-o"></i> Siswa Aktif</a>
								</li>
								<li <?php
					if ($str_url == 'datasiswa/siswatidakaktif') {
						echo "class='active'";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datasiswa/siswatidakaktif'); ?>"><i class="fa fa-times-circle-o "></i> Siswa Tidak Aktif</a>
								</li>
							</ul>
						</li>
						
						
						
					</ul>
				</li>
				<li <?php
					if ($this->uri->segment ( 2 ) == 'dataguru') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="fa fa-graduation-cap "></i>
					<span class="title">Manajemen Guru</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'dataguru') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					</a>
					<ul class="sub-menu">
						<li <?php
					if ($str_url == 'dataguru/lihatdata') {
						echo "class='active'";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/dataguru/lihatdata'); ?>">
							<i class="fa fa-chevron-right "></i>
							Data Guru</a>
						</li>
						
					</ul>
				</li>
				<li <?php
					if ($this->uri->segment ( 2 ) == 'dataabsensi' || $this->uri->segment(2) == 'datahakabsensi') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="fa fa-calendar "></i>
					<span class="title">Manajemen Absensi</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'dataabsensi' || $this->uri->segment(2) == 'datahakabsensi') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					</a>
					<ul class="sub-menu">

						<?php 

						if (count($this->absensi_m->statusabsensi())) {
						?>

						<li <?php
					if ($str_url == 'dataabsensi/tambahdata') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/dataabsensi/tambahdata'); ?>">
							<i class="fa fa-chevron-right "></i><span class="badge <?php if ($jumlah_absensi > 0) {
								echo 'badge-success';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlahabsensi"><?php if ($jumlah_absensi > 0) {
								echo $jumlah_absensi;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Input Absensi

							<span class="badge badge-roundless bg-blue-madison" style="margin-right: 3px">BP</span> 
							</a>
							
						</li>

						<?php
						}
						?>
						

						<li <?php
					if ($str_url == 'dataabsensi/lihatdata') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/dataabsensi/lihatdata'); ?>">
							<i class="fa fa-chevron-right "></i><span class="badge <?php if ($jumlah_absensi > 0) {
								echo 'badge-success';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlahabsensi_all"><?php if ($jumlah_absensi > 0) {
								echo $jumlah_absensi_all;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Data Absensi

							
							</a>
							
						</li>

						<li <?php
					if ($this->uri->segment(2) == 'datahakabsensi') {
						echo "class='active'";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datahakabsensi'); ?>">
							<i class="fa fa-chevron-right "></i><span class="badge <?php if ($jumlah_hakabsensi > 0) {
								echo 'badge-warning';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlahhakabsensi"><?php if ($jumlah_hakabsensi > 0) {
								echo $jumlah_hakabsensi;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Penugasan Absensi</a>
						</li>
					</ul>
				</li>

				
				<li <?php
					if ($this->uri->segment ( 2 ) == 'dataeskul' || $this->uri->segment(2) == 'datahakeskul' || $this->uri->segment(2) == 'datapesertaeskul') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="fa fa-support"></i>
					<span class="title">Manajemen Eskul</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'dataeskul' || $this->uri->segment(2) == 'datahakeskul' || $this->uri->segment(2) == 'datapesertaeskul') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					</a>
					<ul class="sub-menu">
						<li <?php
					if ($str_url == 'dataeskul/lihatdata') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/dataeskul/lihatdata'); ?>">
							<i class="fa fa-chevron-right "></i><span class="badge <?php if ($jumlah_eskul > 0) {
								echo 'badge-warning';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlaheskul"><?php if ($jumlah_eskul > 0) {
								echo $jumlah_eskul;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Data Eskul</a>
						</li>

						<li <?php
					if ($this->uri->segment(2) == 'datapesertaeskul') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datapesertaeskul'); ?>">
							<i class="fa fa-chevron-right "></i>
							Data Peserta Eskul</a>
						</li>

						<li <?php
					if ($this->uri->segment(2) == 'datahakeskul') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/datahakeskul'); ?>">
							<i class="fa fa-chevron-right "></i><span class="badge <?php if ($jumlah_hakeskul > 0) {
								echo 'badge-warning';
							} else {
								echo 'badge-danger';
							}
							 ?>" id="jumlahhakeskul"><?php if ($jumlah_hakeskul > 0) {
								echo $jumlah_hakeskul;
							} else {
								echo 'EMPTY';
							}
							 ?></span>
							Penugasan Nilai Eskul</a>
						</li>


						
					</ul>
				</li>


				<li <?php
					if ($this->uri->segment ( 2 ) == 'dataprestasi') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="glyphicon glyphicon-gift "></i>
					<span class="title">Manajemen Prestasi</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'dataprestasi') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					</a>
					<ul class="sub-menu">
						<li <?php
					if ($str_url == 'dataprestasi/lihatdata') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="<?php echo site_url('guru/dataprestasi/lihatdata'); ?>">
							<i class="fa fa-chevron-right "></i>
							Data Prestasi Siswa</a>
						</li>

						
						

						
					</ul>
				</li>
				<li class="heading">
					<h3 class="uppercase">MENU NILAI</h3>
				</li>

				<li <?php
					if ($this->uri->segment ( 2 ) == 'datanilai' || $this->uri->segment ( 2 ) == 'datanilaieskul') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
					<a href="javascript:;">
					<i class="fa fa-archive "></i>
					<span class="title">Manajemen Nilai</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'datanilai' || $this->uri->segment ( 2 ) == 'datanilaieskul') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					</a>
					<ul class="sub-menu">
						<li <?php
					if ($str_url == 'datanilai/input_nilai' || $str_url == 'datanilai/edit_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="javascript:;">
							<i class="icon-notebook"></i> Data Nilai Mapel
							<?php
					if ($str_url == 'datanilai/input_nilai' || $str_url == 'datanilai/edit_nilai') {
						echo "<span class='arrow open'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
							</a>
							<ul class="sub-menu">
							<li <?php
					if ($str_url == 'datanilai/input_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilai/input_nilai'); ?>">
									<i class="fa fa-chevron-right"></i>
									Input Nilai
									<?php
					if ($str_url == 'datanilai/input_nilai') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
								</li>

								<li <?php
					if ($str_url == 'datanilai/edit_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilai/edit_nilai'); ?>">
									<i class="fa fa-chevron-right"></i>
									Edit Nilai
									<?php
					if ($str_url == 'datanilai/edit_nilai') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
									
								</li>
							</ul>
						</li>

						
					
						<li <?php
					if ($str_url == 'datanilaieskul/wajib_input_nilai' || $str_url == 'datanilaieskul/wajib_edit_nilai' || $str_url == 'datanilaieskul/nonwajib_input_nilai_v2' || $str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="javascript:;">
							<i class="fa fa-plus-square "></i> Data Nilai Eskul
							<?php
					if ($str_url == 'datanilaieskul/wajib_input_nilai' || $str_url == 'datanilaieskul/wajib_edit_nilai' || $str_url == 'datanilaieskul/nonwajib_input_nilai_v2' || $str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
						echo "<span class='arrow open'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
					<span class="badge badge-roundless bg-blue-madison" >BP</span> 
							</a>
							<ul class="sub-menu">

							<li <?php
					if ($str_url == 'datanilaieskul/wajib_input_nilai' || $str_url == 'datanilaieskul/wajib_edit_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="javascript:;">
							<i class="fa fa-star "></i> Eskul Wajib 
							<?php
					if ($str_url == 'datanilaieskul/wajib_input_nilai' || $str_url == 'datanilaieskul/wajib_edit_nilai') {
						echo "<span class='arrow open'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
							</a>
							<ul  class="sub-menu">
							<li <?php
					if ($str_url == 'datanilaieskul/wajib_input_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilaieskul/wajib_input_nilai'); ?>">
									<i class="fa fa-chevron-right"></i>
									Input Nilai
									<?php
					if ($str_url == 'datanilaieskul/wajib_input_nilai') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
								</li>

								<li <?php
					if ($str_url == 'datanilaieskul/wajib_edit_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilaieskul/wajib_edit_nilai'); ?>">
									<i class="fa fa-chevron-right"></i>
									Edit Nilai
									<?php
					if ($str_url == 'datanilaieskul/wajib_edit_nilai') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
									
								</li>
								</ul>
								</li>

								<li <?php
					if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2' || $str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="javascript:;">
							<i class="fa fa-star-half-o"></i> Eskul Non Wajib 
							<?php
					if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2' || $str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
						echo "<span class='arrow open'></span>";
					} else {
						echo "<span class='arrow'></span>";
					}
					?>
							</a>
							<ul  class="sub-menu">
							<li <?php
					if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilaieskul/nonwajib_input_nilai_v2'); ?>">
									<i class="fa fa-chevron-right"></i>
									Input Nilai
									<?php
					if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
								</li>

								<li <?php
					if ($str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilaieskul/nonwajib_edit_nilai_v2'); ?>">
									<i class="fa fa-chevron-right"></i>
									Edit Nilai
									<?php
					if ($str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
									
								</li>
								</ul>
								</li>
							</ul>
						</li>



						
						
						

						
					</ul>
				</li>









				<li <?php
if ($this->uri->segment(2) == 'rekapnilai') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="glyphicon glyphicon-tasks "></i>
					<span class="title">Rekap Penilaian</span>
					<?php
if ($this->uri->segment(2) == 'rekapnilai') {
    echo "<span class='arrow open'></span><span class='selected'></span>";
} else {
    echo "<span class='arrow'></span>";
}
?>
					</a>
					<ul class="sub-menu">


						<li <?php
if ($str_url == 'rekapnilai/penilaianakhir') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('guru/rekapnilai/penilaianakhir'); ?>">
							<i class="fa fa-circle-o-notch "></i>
							Penilaian Akhir</a>
						</li>


						<li <?php
if ($str_url == 'rekapnilai/penilaianberproses') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('guru/rekapnilai/penilaianberproses'); ?>">
							<i class="fa fa-spinner"></i>
							Penilaian Berproses</a>
						</li>





					</ul>
				</li>






				<li <?php
					if ($this->uri->segment ( 2 ) == 'indikatornilai') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/indikatornilai'); ?>">
					<i class="fa fa-empire"></i>
					<span class="title">Indikator Rekap Nilai</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'indikatornilai') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					
					</a>
					
				</li>


				<?php 

				if (count($this->wali_m->statuswali())) {
					
					?>



				<li class="heading">
					<h3 class="uppercase">MENU WALI</h3>
				</li>

					
					<li <?php
					if ($this->uri->segment ( 2 ) == 'datasiswa_wali') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/datasiswa_wali'); ?>">
					<i class="glyphicon glyphicon-credit-card"></i>
					<span class="title">Data Siswa Perwalian</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'datasiswa_wali') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					<span class="badge badge-roundless badge-danger"><?php echo $namakelas ?></span>
					</a>
					
				</li>


				

						<li <?php
					if ($str_url == 'datanilaisikap/input_nilai' || $str_url == 'datanilaisikap/edit_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
							<a href="javascript:;">
							<i class="fa fa-user-md"></i> Data Nilai Sikap

							<span class="badge badge-roundless badge-danger"><?php echo $namakelas ?></span>
					
							<?php
					if ($str_url == 'datanilaisikap/input_nilai' || $str_url == 'datanilaisikap/edit_nilai') {
						echo "<span class='arrow open'></span><span class='selected'></span>";
					} else {
						echo "<span class='arrow open'></span>";
					}
					?>	
							</a>
							<ul class="sub-menu">
							<li <?php
					if ($str_url == 'datanilaisikap/input_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilaisikap/input_nilai'); ?>">
									<i class="fa fa-chevron-right"></i>
									Input Nilai
									<?php
					if ($str_url == 'datanilaisikap/input_nilai') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
								</li>

								<li <?php
					if ($str_url == 'datanilaisikap/edit_nilai') {
						echo "class='active '";
					} else {
						echo "";
					}
					?>>
									<a href="<?php echo site_url('guru/datanilaisikap/edit_nilai'); ?>">
									<i class="fa fa-chevron-right"></i>
									Edit Nilai
									<?php
					if ($str_url == 'datanilaisikap/edit_nilai') {
						echo "<span class='open'></span>";
					} else {
						echo "<span class=''></span>";
					}
					?>
									</a>
									
								</li>
							</ul>
						</li>





				<li <?php
				if ($this->uri->segment(2) == 'rekapnilaiwali') {
				    echo "class='active '";
				} else {
				    echo "";
				}
				?>>
									<a href="javascript:;">
									<i class="fa fa-desktop"></i>
									<span class="title">Monitor Penilaian </span>
									<span class="badge badge-roundless badge-danger"><?php echo $namakelas ?></span>
									<?php
				if ($this->uri->segment(2) == 'rekapnilaiwali') {
				    echo "<span class='arrow open'></span><span class='selected'></span>";
				} else {
				    echo "<span class='arrow'></span>";
				}
				?>

									</a>
									<ul class="sub-menu">


										<li <?php
				if ($str_url == 'rekapnilaiwali/penilaianakhir') {
				    echo "class='active '";
				} else {
				    echo "";
				}
				?>>
											<a href="<?php echo site_url('guru/rekapnilaiwali/penilaianakhir'); ?>">
											<i class="fa fa-circle-o-notch "></i>
											Penilaian Akhir</a>
										</li>


										<li <?php
				if ($str_url == 'rekapnilaiwali/penilaianberproses') {
				    echo "class='active '";
				} else {
				    echo "";
				}
				?>>
											<a href="<?php echo site_url('guru/rekapnilaiwali/penilaianberproses'); ?>">
											<i class="fa fa-spinner"></i>
											Penilaian Berproses</a>
										</li>





					</ul>
				</li>



					


				<li <?php
					if ($this->uri->segment ( 2 ) == 'indikatornilai_wali') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/indikatornilai_wali'); ?>">
					<i class="fa fa-sun-o"></i>
					<span class="title">Monitor Rekap Nilai</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'indikatornilai_wali') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					<span class="badge badge-roundless badge-danger"><?php echo $namakelas ?></span>
					</a>
					
				</li>

				<li <?php
					if ($this->uri->segment ( 2 ) == 'cetaknilai') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/cetaknilai/cetakraportsiswa'); ?>">
					<i class="glyphicon glyphicon-print"></i>
					<span class="title">Cetak Nilai Raport</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'cetaknilai') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					<span class="badge badge-roundless badge-danger"><?php echo $namakelas ?></span>
					</a>
					
				</li>

				<<!-- li <?php
					if ($this->uri->segment ( 2 ) == 'rangking') {
						echo "class='start active open'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/rangking/rangkingkelas'); ?>">
					<i class="fa fa-trophy "></i>
					<span class="title">Rangking Kelas</span>
					
					<?php
					if ($this->uri->segment ( 2 ) == 'rangking') {
						echo "<span class='selected'></span><span class='open'></span>";
					} else {
						echo "";
					}
					?>
					
					<span class="badge badge-roundless badge-danger"><?php echo $namakelas ?></span>
					</a>
					
				</li> -->
				


					<?php
				}

				?>


				
				<li class="heading">
					<h3 class="uppercase">PASSWORD</h3>
				</li>
				<li  <?php
					if ($this->uri->segment ( 2 ) == 'gantipassword') {
						echo "class='active'";
					} else {
						echo "";
					}
					?>>
					<a href="<?php echo site_url('guru/gantipassword'); ?>">
					<i class="fa fa-key"></i>
					<span class="title">Ganti Password</span>
					<?php
					if ($this->uri->segment ( 2 ) == 'gantipassword') {
						echo "<span class='open'></span><span class='selected'></span>";
					} else {
						echo "";
					}
					?>
					</a>
					
				</li>

				<li class="heading">
					<h3 class="uppercase">More</h3>
				</li>
				<li>
					<a href="<?php echo site_url('user/logout'); ?>">
					<i class="fa fa-power-off"></i>
					<span class="title">Logout</span>
				
					</a>
					
				</li>

				
				

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<!-- <div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Theme Style </span>
						<select class="layout-style-option form-control input-sm">
							<option value="square" selected="selected">Square corners</option>
							<option value="rounded">Rounded corners</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div> -->
			<!-- END STYLE CUSTOMIZER -->
			
			
			<?php $this->load->view($subview); ?>



			
			<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				 2015 &copy; Created and Developed by  <a href="http://www.twitter.com/OfaniDariyan" title="Ofani Dariyan a.k.a NiceDream" target="_blank">PTI UNY</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- END FOOTER -->



		<?php $ofani2 = $this->uri->segment(3)?>
		<?php $ofani3 = $this->uri->segment(2)?>
		
		<?php
		 if ($str_url == 'email/kirim') {
			$this->load->view ( 'guru/components/script_components' );

		} else if ($this->uri->segment(2) == 'datamapel') {
			$this->load->view ( 'guru/components/script_datamapel' );

		} else if ($this->uri->segment(2) == 'datakelas') {
			$this->load->view ( 'guru/components/script_datakelas' );

		} else if ($this->uri->segment(2) == 'datawali') {
			$this->load->view ( 'guru/components/script_datawali' );
		
		} else if ($this->uri->segment(2) == 'datahakmapel') {
			$this->load->view ( 'guru/components/script_datahakmapel' );

		} else if ($this->uri->segment(2) == 'datahakabsensi') {
			$this->load->view ( 'guru/components/script_dataabsensi_hakabsensi' );
		
		} else if ($this->uri->segment(2) == 'datahakeskul') {
			$this->load->view ( 'guru/components/script_dataeskul_hakeskul' );

		} else if ($this->uri->segment(2) == 'datapesertaeskul') {
			$this->load->view ( 'guru/components/script_datapesertaeskul' );

		} else if ($this->uri->segment(2) == 'indikatornilai') {
			$this->load->view ( 'guru/components/script_indikatornilai' );

		} else if ($this->uri->segment(2) == 'indikatornilai_wali') {

			if (count($this->wali_m->statuswali())) {
				$this->load->view ( 'guru/components/script_indikatornilai_wali' );

			} else {
				$this->load->view ( 'guru/components/script_default' );

			}
			
		} else if ($this->uri->segment(2) == 'gantipassword') {
			$this->load->view ( 'guru/components/script_password_ganti' );
		
		} else if ($this->uri->segment(2) == 'myprofile') {
			$this->load->view ( 'guru/components/script_myprofile' );

		} else if ($this->uri->segment(2) == 'datasiswa_wali') {
			$this->load->view ( 'guru/components/script_datasiswa_wali' );


		} else if ($str_url == 'datakompetensi/lihatdata') {
			$this->load->view ( 'guru/components/script_datakompetensi_lihatdata' );
		
		} else if ($str_url == 'datakompetensi/tambahdata') {
			$this->load->view ( 'guru/components/script_datakompetensi_edit' );
		
		} else if ($str_url == 'datasiswa/siswaaktif') {
			$this->load->view ( 'guru/components/script_datasiswa_siswaaktif' );

		} else if ($str_url == 'datasiswa/siswatidakaktif') {
			$this->load->view ( 'guru/components/script_datasiswa_siswatidakaktif' );

		} else if ($str_url == 'dataguru/tambahsiswa') {
			$this->load->view ( 'guru/components/script_datasiswa_tambahsiswa' );

		} else if ($str_url == 'dataguru/tambahsiswakelas') {
			$this->load->view ( 'guru/components/script_datasiswa_tambahsiswakelas' );

		} else if ($str_url == 'dataguru/importdatasiswa') {
			$this->load->view ( 'guru/components/script_datasiswa_importdatasiswa' );
			
		} else if ($str_url == 'dataguru/lihatdata') {
			$this->load->view ( 'guru/components/script_dataguru_lihatdata' );

		} else if ($str_url == 'dataguru/tambahguru') {
			$this->load->view ( 'guru/components/script_dataguru_edit' );
		
		} else if ($str_url == 'dataabsensi/lihatdata') {
			$this->load->view ( 'guru/components/script_dataabsensi_lihatdata' );

		} else if ($str_url == 'dataabsensi/tambahdata') {

			 if (count($this->absensi_m->statusabsensi())) {
			 	$this->load->view ( 'guru/components/script_dataabsensi_tambahdata' );

			 } else {
			 	$this->load->view ( 'guru/components/script_default' );
			 }
			

		} else if ($str_url == 'dataabsensi/hakabsensi') {	
			$this->load->view ( 'guru/components/script_dataabsensi_hakabsensi' );

		} else if ($str_url == 'dataeskul/lihatdata') {
			$this->load->view ( 'guru/components/script_dataeskul_lihatdata' );

		} else if ($str_url == 'dataeskul/hakeskul') {
			$this->load->view ( 'guru/components/script_dataeskul_hakeskul' );
		
		} else if ($str_url == 'datanilai/input_nilai') {
			$this->load->view ( 'guru/components/script_datanilai_inputnilai' );

		} else if ($str_url == 'dataprestasi/lihatdata') {
			$this->load->view ( 'guru/components/script_dataprestasi_lihatdata' );

		} else if ($str_url == 'dataprestasi/tambahdata') {
			$this->load->view ( 'guru/components/script_dataprestasi_tambahdata' );

		} else if ($str_url == 'datanilai/edit_nilai') {
			$this->load->view ( 'guru/components/script_datanilai_editnilai' );

		} else if ($str_url == 'datanilaieskul/wajib_input_nilai') {
			$this->load->view ( 'guru/components/script_datanilaieskul_wajib_inputnilai' );

		} else if ($str_url == 'datanilaieskul/wajib_edit_nilai') {
			$this->load->view ( 'guru/components/script_datanilaieskul_wajib_editnilai' );

		} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2') {
			$this->load->view ( 'guru/components/script_datanilaieskul_nonwajib_inputnilai_v2' );

		} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
			$this->load->view ( 'guru/components/script_datanilaieskul_nonwajib_editnilai_v2' );

		} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai') {
			$this->load->view ( 'guru/components/script_datanilaieskul_nonwajib_inputnilai' );

		} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai') {
			$this->load->view ( 'guru/components/script_datanilaieskul_nonwajib_editnilai' );

		} else if ($str_url == 'cetaknilai/cetaktranskripnilai') {
			$this->load->view ( 'guru/components/script_cetaknilai_cetaktranskripnilai' );


		} else if ($str_url == 'datanilaisikap/input_nilai') {

			if (count($this->wali_m->statuswali())) {
				$this->load->view ( 'guru/components/script_datanilaisikap_inputnilai' );

			} else {
				$this->load->view ( 'guru/components/script_default' );

			}
			

		} else if ($str_url == 'datanilaisikap/edit_nilai') {

			if (count($this->wali_m->statuswali())) {
				
			$this->load->view ( 'guru/components/script_datanilaisikap_editnilai' );

			} else {
				$this->load->view ( 'guru/components/script_default' );

			}



		} else if ($str_url == 'cetaknilai/cetakraportsiswa') {

			if (count($this->wali_m->statuswali())) {
				$this->load->view ( 'guru/components/script_cetaknilai_cetakraportsiswa' );

			} else {
				$this->load->view ( 'guru/components/script_default' );

			}



		} else if ($str_url == 'rekapnilai/penilaianakhir') {
		    $this->load->view('guru/components/script_rekapnilai_penilaianakhir');

		} else if ($str_url == 'rekapnilai/penilaianberproses') {
		    $this->load->view('guru/components/script_rekapnilai_penilaianberproses');

		} else if ($str_url == 'rekapnilaiwali/penilaianakhir') {
		    $this->load->view('guru/components/script_rekapnilaiwali_penilaianakhir');

		} else if ($str_url == 'rekapnilaiwali/penilaianberproses') {
		    $this->load->view('guru/components/script_rekapnilaiwali_penilaianberproses');


		} else if ($str_url == 'cetaknilai/cetaknilaipengetahuan') {
			$this->load->view ( 'guru/components/script_cetaknilai_cetaknilaipengetahuan' );

		} else if ($str_url == 'cetaknilai/cetaknilaiketrampilan') {
			$this->load->view ( 'guru/components/script_cetaknilai_cetaknilaiketrampilan' );

		} else if ($str_url == 'cetaknilai/cetaknilaisikap') {
			$this->load->view ( 'guru/components/script_cetaknilai_cetaknilaisikap' );

		} else if ($str_url == 'rangking/rangkingkelas') {
			if (count($this->wali_m->statuswali())) {
				$this->load->view ( 'guru/components/script_rangking_rangkingkelas' );

			} else {
				$this->load->view ( 'guru/components/script_default' );

			}


		} else if ($str_url == 'rangking/rangkingmapel') {
			$this->load->view ( 'guru/components/script_rangking_rangkingmapel' );

		} else if ($str_url == 'password/gantipasswordguru') {
			$this->load->view ( 'guru/components/script_password_gantipasswordguru' );

		} else if ($str_url == 'password/gantipasswordsiswa') {
			$this->load->view ( 'guru/components/script_password_gantipasswordsiswa' );

		} else if ($str_url == 'konfigurasi/profilesekolah') {
			$this->load->view ( 'guru/components/script_konfigurasi_profilesekolah' );

		} else if ($str_url == 'konfigurasi/aktivasisystem') {
			$this->load->view ( 'guru/components/script_konfigurasi_aktivasisystem' );

		} else if ($str_url == 'kritikdansaran/lihatdata') {
			$this->load->view ( 'guru/components/script_kritikdansaran_lihatdata' );


		} else {
			
			$this->load->view ( 'guru/components/script_dashboard' );
		}
		?>



		<?php $this->load->view('guru/components/tail_admin'); ?>