<?php
$url_ofani1 = $this->uri->segment(1);
$url_ofani2 = $this->uri->segment(2);
$url_ofani3 = $this->uri->segment(3);
$url_gabung = array(
    $url_ofani2 => $url_ofani3,
);
$url_gabung2 = array(
    $url_ofani1 => $url_ofani2,
);
$str_url  = $this->uri->assoc_to_uri($url_gabung);
$str_url2 = $this->uri->assoc_to_uri($url_gabung2);
?>
<?php
if ($str_url == 'article/edit') {
    $this->load->view('admin/components/head_tiny');
} else if ($str_url == 'datamapel/coba') {
    $this->load->view('admin/components/head_coba');

} else if ($this->uri->segment(2) == 'datamapel') {
    $this->load->view('admin/components/head_datamapel');

} else if ($this->uri->segment(2) == 'datakelas') {
    $this->load->view('admin/components/head_datakelas');

} else if ($this->uri->segment(2) == 'datawali') {
    $this->load->view('admin/components/head_datawali');

} else if ($this->uri->segment(2) == 'datahakmapel') {
    $this->load->view('admin/components/head_datahakmapel');

} else if ($this->uri->segment(2) == 'datahakabsensi') {
    $this->load->view('admin/components/head_dataabsensi_hakabsensi');

} else if ($this->uri->segment(2) == 'datahakeskul') {
    $this->load->view('admin/components/head_dataeskul_hakeskul');

} else if ($this->uri->segment(2) == 'datapesertaeskul') {
    $this->load->view('admin/components/head_datapesertaeskul');

} else if ($this->uri->segment(2) == 'indikatornilai') {
    $this->load->view('admin/components/head_indikatornilai');

} else if ($str_url == 'datakompetensi/lihatdata') {
    $this->load->view('admin/components/head_datakompetensi_lihatdata');

} else if ($str_url == 'datakompetensi/tambahdata') {
    $this->load->view('admin/components/head_datakompetensi_edit');

} else if ($str_url == 'datasiswa/siswaaktif') {
    $this->load->view('admin/components/head_datasiswa_siswaaktif');

} else if ($str_url == 'datasiswa/siswatidakaktif') {
    $this->load->view('admin/components/head_datasiswa_siswatidakaktif');

} else if ($str_url == 'datasiswa/tambahsiswa') {
    $this->load->view('admin/components/head_datasiswa_tambahsiswa');

} else if ($str_url == 'datasiswa/tambahsiswakelas') {
    $this->load->view('admin/components/head_datasiswa_tambahsiswakelas');

} else if ($str_url == 'datasiswa/importdatasiswa') {
    $this->load->view('admin/components/head_datasiswa_importdatasiswa');

} else if ($str_url == 'dataguru/lihatdata') {
    $this->load->view('admin/components/head_dataguru_lihatdata');

} else if ($str_url == 'dataguru/tambahguru') {
    $this->load->view('admin/components/head_dataguru_edit');

} else if ($str_url == 'dataabsensi/lihatdata') {
    $this->load->view('admin/components/head_dataabsensi_lihatdata');

} else if ($str_url == 'dataabsensi/hakabsensi') {
    $this->load->view('admin/components/head_dataabsensi_hakabsensi');

} else if ($str_url == 'dataeskul/lihatdata') {
    $this->load->view('admin/components/head_dataeskul_lihatdata');

} else if ($str_url == 'dataeskul/hakeskul') {
    $this->load->view('admin/components/head_dataeskul_hakeskul');

} else if ($str_url == 'datanilai/input_nilai') {
    $this->load->view('admin/components/head_datanilai_inputnilai');

} else if ($str_url == 'dataprestasi/lihatdata') {
    $this->load->view('admin/components/head_dataprestasi_lihatdata');

} else if ($str_url == 'dataprestasi/tambahdata') {
    $this->load->view('admin/components/head_dataprestasi_tambahdata');

} else if ($str_url == 'datanilai/edit_nilai') {
    $this->load->view('admin/components/head_datanilai_editnilai');

} else if ($str_url == 'datanilaieskul/wajib_input_nilai') {
    $this->load->view('admin/components/head_datanilaieskul_wajib_inputnilai');

} else if ($str_url == 'datanilaieskul/wajib_edit_nilai') {
    $this->load->view('admin/components/head_datanilaieskul_wajib_editnilai');

} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai') {
    $this->load->view('admin/components/head_datanilaieskul_nonwajib_inputnilai');

} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai') {
    $this->load->view('admin/components/head_datanilaieskul_nonwajib_editnilai');

} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2') {
    $this->load->view('admin/components/head_datanilaieskul_nonwajib_inputnilai_v2');

} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
    $this->load->view('admin/components/head_datanilaieskul_nonwajib_editnilai_v2');

} else if ($str_url == 'datanilaisikap/input_nilai') {
    $this->load->view('admin/components/head_datanilaisikap_inputnilai');

} else if ($str_url == 'datanilaisikap/edit_nilai') {
    $this->load->view('admin/components/head_datanilaisikap_editnilai');



} else if ($str_url == 'rekapnilai/penilaianakhir') {
    $this->load->view('admin/components/head_rekapnilai_penilaianakhir');

} else if ($str_url == 'rekapnilai/penilaianberproses') {
    $this->load->view('admin/components/head_rekapnilai_penilaianberproses');


} else if ($str_url == 'cetaknilai/cetaktranskripnilai') {
    $this->load->view('admin/components/head_cetaknilai_cetaktranskripnilai');

} else if ($str_url == 'cetaknilai/cetakraportsiswa') {
    $this->load->view('admin/components/head_cetaknilai_cetakraportsiswa');

} else if ($str_url == 'cetaknilai/cetaknilaipengetahuan') {
    $this->load->view('admin/components/head_cetaknilai_cetaknilaipengetahuan');

} else if ($str_url == 'cetaknilai/cetaknilaiketrampilan') {
    $this->load->view('admin/components/head_cetaknilai_cetaknilaiketrampilan');

} else if ($str_url == 'cetaknilai/cetaknilaisikap') {
    $this->load->view('admin/components/head_cetaknilai_cetaknilaisikap');

}  else if ($str_url == 'password/gantipasswordguru') {
    $this->load->view('admin/components/head_password_gantipasswordguru');

} else if ($str_url == 'password/gantipasswordsiswa') {
    $this->load->view('admin/components/head_password_gantipasswordsiswa');

} else if ($str_url == 'konfigurasi/profilesekolah') {
    $this->load->view('admin/components/head_konfigurasi_profilesekolah');

} else if ($str_url == 'konfigurasi/lembarpengesahan') {
    $this->load->view('admin/components/head_konfigurasi_lembarpengesahan');

} else if ($str_url == 'konfigurasi/aktivasisystem') {
    $this->load->view('admin/components/head_konfigurasi_aktivasisystem');

} else if ($str_url == 'konfigurasi/bobotnilai') {
    $this->load->view('admin/components/head_konfigurasi_bobotnilai');

} else if ($str_url == 'kritikdansaran/lihatdata') {
    $this->load->view('admin/components/head_kritikdansaran_lihatdata');

} else {
    $this->load->view('admin/components/head_dashboard');
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
			<a href="<?php echo site_url() ?>admin/dashboard">
			<img src="<?php echo site_url('') ?>raport_themes/assets/admin/layout/img/logo1.png" alt="logo" class="logo-default"/>
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

				<!-- <li class="dropdown dropdown-ofani ">
					<a href="<?php echo site_url() ?>user/lockuser" class="dropdown-toggle">
					<i class="icon-lock"></i>
					</a>
				</li> -->
				<!-- END INBOX DROPDOWN -->

				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php
if (file_exists('raport_files/foto/chat/' . $this->session->userdata('user_photo')) && $this->session->userdata('user_photo') == true) {
    echo site_url() . 'raport_files/foto/chat/' . $this->session->userdata('user_photo');
} else {

    echo site_url() . 'raport_files/foto/chat/sneka.png';

}

?>"/>
					<span class="username username-hide-on-mobile">
					<?php echo $this->session->userdata('user_nama'); ?> </span>

					</a>

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
							<div class="form-control" style="color: #f7e551;" id="raport-semester">TH : <b><?php echo $tahun_ajaran_admin ?></b> | <b><?php echo strtoupper($semester_admin) ?></b></div>
							<span class="input-group-btn">
							<a class="btn submit"><i class="glyphicon glyphicon-bullhorn"></i></a>
							</span>
						</div>
					</div>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>

				<li <?php
if ($this->uri->segment(2) == 'dashboard') {
    echo "class='start active open'";
} else {
    echo "";
}
?>>
					<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dashboard'); ?>">
					<i class="glyphicon glyphicon-home "></i>
					<span class="title">Dashboard</span>

					<?php
if ($this->uri->segment(2) == 'dashboard') {
    echo "<span class='selected'></span><span class='open'></span>";
} else {
    echo "";
}
?>


					</a>

				</li>

				<li <?php
if ($this->uri->segment(2) == 'datakelas' || $this->uri->segment(2) == 'datawali' || $this->uri->segment(2) == 'datahakmapel' || $this->uri->segment(2) == 'datakompetensi' || $this->uri->segment(2) == 'datamapel') {
    echo "class='active open'";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="glyphicon glyphicon-briefcase"></i>
					<span class="title">Master</span>
					<?php
if ($this->uri->segment(2) == 'datakelas' || $this->uri->segment(2) == 'datawali' || $this->uri->segment(2) == 'datahakmapel' || $this->uri->segment(2) == 'datakompetensi' || $this->uri->segment(2) == 'datamapel') {
    echo "<span class='arrow open'></span><span class='selected'></span>";
} else {
    echo "<span class='arrow'></span>";
}
?>

					</a>
					<ul class="sub-menu">
						<li <?php
if ($this->uri->segment(2) == 'datamapel') {
    echo "class='active '";
} else {
    echo "";
}
?> >
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datamapel'); ?>">
							<i class="fa fa-chevron-right"></i><span class="badge <?php if ($jumlah_mapel > 0) {
    echo 'badge-warning';
} else {
    echo 'badge-danger';
}
?>" id="jumlahmapel"><?php if ($jumlah_mapel > 0) {
    echo $jumlah_mapel;
} else {
    echo 'EMPTY';
}
?></span>
							Data Mapel</a>
						</li>
						<li <?php
if ($this->uri->segment(2) == 'datakelas') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datakelas'); ?>">
							<i class="fa fa-chevron-right"></i>
							Data Kelas</a>
						</li>
						<li <?php
if ($this->uri->segment(2) == 'datawali') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datawali'); ?>">
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
if ($this->uri->segment(2) == 'datahakmapel') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakmapel'); ?>">
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
							Data Guru Mapel</a>
						</li>
						<li <?php
if ($this->uri->segment(2) == 'datakompetensi') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="javascript:;">
							<i class="fa fa-chevron-right"></i> Data Kompetensi
							<?php
if ($this->uri->segment(2) == 'datakompetensi') {
    echo "<span class='arrow open'></span>";
} else {
    echo "<span class='arrow'></span>";
}
?>

							</a>
							<ul class="sub-menu">
								<li <?php
if ($str_url == 'datakompetensi/lihatdata') {
    echo "class='active'";
} else {
    echo "";
}
?>>
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datakompetensi/lihatdata'); ?>"><i class="fa fa-book"></i><span class="badge <?php if ($jumlah_kompetensi > 0) {
    echo 'badge-success';
} else {
    echo 'badge-danger';
}
?>" id="jumlahkompetensi"><?php if ($jumlah_kompetensi > 0) {
    echo $jumlah_kompetensi;
} else {
    echo 'EMPTY';
}
?></span> Lihat Data</a>
								</li>
								<li <?php
if ($str_url == 'datakompetensi/tambahdata') {
    echo "class='active'";
} else {
    echo "";
}
?>>
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datakompetensi/tambahdata'); ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Kompetensi</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>


				<li <?php
if ($this->uri->segment(3) == 'siswaaktif' || $this->uri->segment(3) == 'siswatidakaktif' || $this->uri->segment(3) == 'tambahsiswa' || $this->uri->segment(3) == 'tambahsiswakelas' || $this->uri->segment(3) == 'importdatasiswa') {
    echo "class='active open'";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">Manajemen Siswa</span>
					<?php
if ($this->uri->segment(3) == 'siswaaktif' || $this->uri->segment(3) == 'siswatidakaktif' || $this->uri->segment(3) == 'tambahsiswa' || $this->uri->segment(3) == 'tambahsiswakelas' || $this->uri->segment(3) == 'importdatasiswa') {
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/siswaaktif'); ?>"><i class="fa fa-check-circle-o"></i> Siswa Aktif</a>
								</li>
								<li <?php
if ($str_url == 'datasiswa/siswatidakaktif') {
    echo "class='active'";
} else {
    echo "";
}
?>>
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/siswatidakaktif'); ?>"><i class="fa fa-times-circle-o "></i> Siswa Tidak Aktif</a>
								</li>
							</ul>
						</li>
						<li <?php
if ($str_url == 'datasiswa/tambahsiswa') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/tambahsiswa'); ?>">
							<i class="fa fa-chevron-right "></i>
							Tambah Siswa</a>
						</li>
						<li <?php
if ($str_url == 'datasiswa/tambahsiswakelas') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/tambahsiswakelas'); ?>">
							<i class="fa fa-chevron-right "></i>
							Tambah Siswa Perkelas</a>
						</li>


						<li <?php
if ($str_url == 'datasiswa/importdatasiswa') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datasiswa/importdatasiswa'); ?>">
							<i class="fa fa-chevron-right "></i>
							Import Data Siswa</a>
						</li>


					</ul>
				</li>
				<li <?php
if ($this->uri->segment(2) == 'dataguru') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-graduation-cap "></i>
					<span class="title">Manajemen Guru</span>
					<?php
if ($this->uri->segment(2) == 'dataguru') {
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/lihatdata'); ?>">
							<i class="fa fa-chevron-right "></i>
							Data Guru</a>
						</li>
						<li <?php
if ($str_url == 'dataguru/tambahguru') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataguru/tambahguru'); ?>">
							<i class="fa fa-chevron-right "></i>
							Tambah Guru</a>
						</li>
					</ul>
				</li>
				<li <?php
if ($this->uri->segment(2) == 'dataabsensi' || $this->uri->segment(2) == 'datahakabsensi') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-calendar "></i>
					<span class="title">Manajemen Absensi</span>
					<?php
if ($this->uri->segment(2) == 'dataabsensi' || $this->uri->segment(2) == 'datahakabsensi') {
    echo "<span class='arrow open'></span><span class='selected'></span>";
} else {
    echo "<span class='arrow'></span>";
}
?>
					</a>
					<ul class="sub-menu">
						<li <?php
if ($str_url == 'dataabsensi/lihatdata') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataabsensi/lihatdata'); ?>">
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
							Data Absensi</a>
						</li>
						<li <?php
if ($this->uri->segment(2) == 'datahakabsensi') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakabsensi'); ?>">
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
							Hak Input Absensi</a>
						</li>
					</ul>
				</li>


				<li <?php
if ($this->uri->segment(2) == 'dataeskul' || $this->uri->segment(2) == 'datahakeskul' || $this->uri->segment(2) == 'datapesertaeskul') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-support"></i>
					<span class="title">Manajemen Ekskul</span>
					<?php
if ($this->uri->segment(2) == 'dataeskul' || $this->uri->segment(2) == 'datahakeskul' || $this->uri->segment(2) == 'datapesertaeskul') {
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataeskul/lihatdata'); ?>">
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datapesertaeskul'); ?>">
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datahakeskul'); ?>">
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
							Hak Input Eskul</a>
						</li>



					</ul>
				</li>


				<li <?php
if ($this->uri->segment(2) == 'dataprestasi') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="glyphicon glyphicon-gift "></i>
					<span class="title">Manajemen Prestasi</span>
					<?php
if ($this->uri->segment(2) == 'dataprestasi') {
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataprestasi/lihatdata'); ?>">
							<i class="fa fa-chevron-right "></i>
							Data Prestasi</a>
						</li>


						<li <?php
if ($str_url == 'dataprestasi/tambahdata') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/dataprestasi/tambahdata'); ?>">
							<i class="fa fa-chevron-right "></i>
							Tambah Prestasi</a>
						</li>



					</ul>
				</li>



				<li class="heading">
					<h3 class="uppercase">MENU NILAI</h3>
				</li>

				<li <?php
if ($this->uri->segment(2) == 'datanilai' || $this->uri->segment(2) == 'datanilaieskul' || $this->uri->segment(2) == 'datanilaisikap') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-archive "></i>
					<span class="title">Manajemen Nilai</span>
					<?php
if ($this->uri->segment(2) == 'datanilai' || $this->uri->segment(2) == 'datanilaieskul' || $this->uri->segment(2) == 'datanilaisikap') {
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilai/input_nilai'); ?>">
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilai/edit_nilai'); ?>">
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
if ($str_url == 'datanilaisikap/input_nilai' || $str_url == 'datanilaisikap/edit_nilai') {
    echo "class='active '";
} else {
    echo "";
}
?>>
							<a href="javascript:;">
							<i class="fa fa-user-md"></i> Data Nilai Sikap
							<?php
if ($str_url == 'datanilaisikap/input_nilai' || $str_url == 'datanilaisikap/edit_nilai') {
    echo "<span class='arrow open'></span>";
} else {
    echo "<span class='arrow'></span>";
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilaisikap/input_nilai'); ?>">
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilaisikap/edit_nilai'); ?>">
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilaieskul/wajib_input_nilai'); ?>">
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilaieskul/wajib_edit_nilai'); ?>">
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilaieskul/nonwajib_input_nilai_v2'); ?>">
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
									<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/datanilaieskul/nonwajib_edit_nilai_v2'); ?>">
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/rekapnilai/penilaianakhir'); ?>">
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
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/rekapnilai/penilaianberproses'); ?>">
							<i class="fa fa-spinner"></i>
							Penilaian Berproses</a>
						</li>





					</ul>
				</li>






				<li <?php
if ($this->uri->segment(2) == 'indikatornilai') {
    echo "class='start active open'";
} else {
    echo "";
}
?>>
					<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/indikatornilai'); ?>">
					<i class="fa fa-empire"></i>
					<span class="title">Indikator Rekap Nilai</span>

					<?php
if ($this->uri->segment(2) == 'indikatornilai') {
    echo "<span class='selected'></span><span class='open'></span>";
} else {
    echo "";
}
?>


					</a>

				</li>


				<li <?php
if ($this->uri->segment(2) == 'cetaknilai') {
    echo "class='active '";
} else {
    echo "";
}
?>>
					<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/cetaknilai/cetakraportsiswa'); ?>">
					<i class="glyphicon glyphicon-print "></i>
					<span class="title">Cetak Raport Siswa</span>
					<?php
if ($this->uri->segment(2) == 'cetaknilai') {
    echo "<span class='open'></span><span class='selected'></span>";
} else {
    echo "";
}
?>
					</a>

				</li>

				
				<li class="heading">
					<h3 class="uppercase">MENU USER & SETTING</h3>
				</li>
				<li  <?php
if ($this->uri->segment(2) == 'password') {
    echo "class='active'";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span class="title">Manajemen User</span>
					<?php
if ($this->uri->segment(2) == 'password') {
    echo "<span class='arrow open'></span><span class='selected'></span>";
} else {
    echo "<span class='arrow'></span>";
}
?>
					</a>
					<ul class="sub-menu">
						<li <?php
if ($str_url == 'password/gantipasswordguru') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/gantipasswordguru'); ?>">
							<i class="fa fa-key"></i>
							Password Guru</a>
						</li>
						<li <?php
if ($str_url == 'password/gantipasswordsiswa') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/password/gantipasswordsiswa'); ?>">
							<i class="fa fa-key"></i>
							Password Siswa</a>
						</li>

					</ul>
				</li>

				<li <?php
if ($this->uri->segment(2) == 'konfigurasi') {
    echo "class='active'";
} else {
    echo "";
}
?>>
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">Pengaturan Raport</span>
					<?php
if ($this->uri->segment(2) == 'konfigurasi') {
    echo "<span class='arrow open'></span><span class='selected'></span>";
} else {
    echo "<span class='arrow'></span>";
}
?>
					</a>

					<ul class="sub-menu">
						<li <?php
if ($str_url == 'konfigurasi/profilesekolah') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/profilesekolah'); ?>">
							<i class="fa fa-university "></i>
							Profile Sekolah</a>
						</li>

						<li <?php
if ($str_url == 'konfigurasi/lembarpengesahan') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/lembarpengesahan'); ?>">
							<i class="fa fa-check-circle "></i>
							Lembar Pengesahan</a>
						</li>


						<li <?php
if ($str_url == 'konfigurasi/bobotnilai') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/bobotnilai'); ?>">
							<i class="glyphicon glyphicon-dashboard "></i>
							Bobot Nilai</a>
						</li>

						<li <?php
if ($str_url == 'konfigurasi/aktivasisystem') {
    echo "class='active'";
} else {
    echo "";
}
?>>
							<a href="<?php echo site_url('4dm1n-D33H4RdY-n1c3dR34M/konfigurasi/aktivasisystem'); ?>">
							<i class="glyphicon glyphicon-cog "></i>
							Aktivasi System</a>
						</li>
					</ul>
				</li>


				<!-- <li class="heading">
					<h3 class="uppercase">More</h3>
				</li>
				<li>
					<a href="<?php echo site_url('user/logout'); ?>">
					<i class="fa fa-power-off"></i>
					<span class="title">Logout</span>

					</a>

				</li> -->




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
			
			<?php $this->load->view($subview);?>




			<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				 2017 &copy; Created and Developed by PTI UNY
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
    $this->load->view('admin/components/script_components');

} else if ($this->uri->segment(2) == 'datamapel') {
    $this->load->view('admin/components/script_datamapel');

} else if ($this->uri->segment(2) == 'datakelas') {
    $this->load->view('admin/components/script_datakelas');

} else if ($this->uri->segment(2) == 'datawali') {
    $this->load->view('admin/components/script_datawali');

} else if ($this->uri->segment(2) == 'datahakmapel') {
    $this->load->view('admin/components/script_datahakmapel');

} else if ($this->uri->segment(2) == 'datahakabsensi') {
    $this->load->view('admin/components/script_dataabsensi_hakabsensi');

} else if ($this->uri->segment(2) == 'datahakeskul') {
    $this->load->view('admin/components/script_dataeskul_hakeskul');

} else if ($this->uri->segment(2) == 'datapesertaeskul') {
    $this->load->view('admin/components/script_datapesertaeskul');

} else if ($this->uri->segment(2) == 'indikatornilai') {
    $this->load->view('admin/components/script_indikatornilai');

} else if ($str_url == 'datakompetensi/lihatdata') {
    $this->load->view('admin/components/script_datakompetensi_lihatdata');

} else if ($str_url == 'datakompetensi/tambahdata') {
    $this->load->view('admin/components/script_datakompetensi_edit');

} else if ($str_url == 'datasiswa/siswaaktif') {
    $this->load->view('admin/components/script_datasiswa_siswaaktif');

} else if ($str_url == 'datasiswa/siswatidakaktif') {
    $this->load->view('admin/components/script_datasiswa_siswatidakaktif');

} else if ($str_url == 'datasiswa/tambahsiswa') {
    $this->load->view('admin/components/script_datasiswa_tambahsiswa');

} else if ($str_url == 'datasiswa/tambahsiswakelas') {
    $this->load->view('admin/components/script_datasiswa_tambahsiswakelas');

} else if ($str_url == 'datasiswa/importdatasiswa') {
    $this->load->view('admin/components/script_datasiswa_importdatasiswa');

} else if ($str_url == 'dataguru/lihatdata') {
    $this->load->view('admin/components/script_dataguru_lihatdata');

} else if ($str_url == 'dataguru/tambahguru') {
    $this->load->view('admin/components/script_dataguru_edit');

} else if ($str_url == 'dataabsensi/lihatdata') {
    $this->load->view('admin/components/script_dataabsensi_lihatdata');

} else if ($str_url == 'dataabsensi/hakabsensi') {
    $this->load->view('admin/components/script_dataabsensi_hakabsensi');

} else if ($str_url == 'dataeskul/lihatdata') {
    $this->load->view('admin/components/script_dataeskul_lihatdata');

} else if ($str_url == 'dataeskul/hakeskul') {
    $this->load->view('admin/components/script_dataeskul_hakeskul');

} else if ($str_url == 'datanilai/input_nilai') {
    $this->load->view('admin/components/script_datanilai_inputnilai');

} else if ($str_url == 'dataprestasi/lihatdata') {
    $this->load->view('admin/components/script_dataprestasi_lihatdata');

} else if ($str_url == 'dataprestasi/tambahdata') {
    $this->load->view('admin/components/script_dataprestasi_tambahdata');

} else if ($str_url == 'datanilai/edit_nilai') {
    $this->load->view('admin/components/script_datanilai_editnilai');

} else if ($str_url == 'datanilaieskul/wajib_input_nilai') {
    $this->load->view('admin/components/script_datanilaieskul_wajib_inputnilai');

} else if ($str_url == 'datanilaieskul/wajib_edit_nilai') {
    $this->load->view('admin/components/script_datanilaieskul_wajib_editnilai');

} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai') {
    $this->load->view('admin/components/script_datanilaieskul_nonwajib_inputnilai');

} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai') {
	$this->load->view('admin/components/script_datanilaieskul_nonwajib_editnilai');

} else if ($str_url == 'datanilaieskul/nonwajib_input_nilai_v2') {
    $this->load->view('admin/components/script_datanilaieskul_nonwajib_inputnilai_v2');

} else if ($str_url == 'datanilaieskul/nonwajib_edit_nilai_v2') {
    $this->load->view('admin/components/script_datanilaieskul_nonwajib_editnilai_v2');

} else if ($str_url == 'datanilaisikap/input_nilai') {
    $this->load->view('admin/components/script_datanilaisikap_inputnilai');

} else if ($str_url == 'datanilaisikap/edit_nilai') {
    $this->load->view('admin/components/script_datanilaisikap_editnilai');

} else if ($str_url == 'cetaknilai/cetaktranskripnilai') {
    $this->load->view('admin/components/script_cetaknilai_cetaktranskripnilai');

} else if ($str_url == 'cetaknilai/cetakraportsiswa') {
    $this->load->view('admin/components/script_cetaknilai_cetakraportsiswa');

} else if ($str_url == 'cetaknilai/cetaknilaipengetahuan') {
    $this->load->view('admin/components/script_cetaknilai_cetaknilaipengetahuan');

} else if ($str_url == 'cetaknilai/cetaknilaiketrampilan') {
    $this->load->view('admin/components/script_cetaknilai_cetaknilaiketrampilan');

} else if ($str_url == 'cetaknilai/cetaknilaisikap') {
    $this->load->view('admin/components/script_cetaknilai_cetaknilaisikap');


} else if ($str_url == 'rekapnilai/penilaianakhir') {
    $this->load->view('admin/components/script_rekapnilai_penilaianakhir');

} else if ($str_url == 'rekapnilai/penilaianberproses') {
    $this->load->view('admin/components/script_rekapnilai_penilaianberproses');



}  else if ($str_url == 'password/gantipasswordguru') {
    $this->load->view('admin/components/script_password_gantipasswordguru');

} else if ($str_url == 'password/gantipasswordsiswa') {
    $this->load->view('admin/components/script_password_gantipasswordsiswa');

} else if ($str_url == 'konfigurasi/profilesekolah') {
    $this->load->view('admin/components/script_konfigurasi_profilesekolah');

} else if ($str_url == 'konfigurasi/lembarpengesahan') {
    $this->load->view('admin/components/script_konfigurasi_lembarpengesahan');

} else if ($str_url == 'konfigurasi/aktivasisystem') {
    $this->load->view('admin/components/script_konfigurasi_aktivasisystem');

} else if ($str_url == 'konfigurasi/bobotnilai') {
    $this->load->view('admin/components/script_konfigurasi_bobotnilai');

} else if ($str_url == 'kritikdansaran/lihatdata') {
    $this->load->view('admin/components/script_kritikdansaran_lihatdata');

} else {

    $this->load->view('admin/components/script_dashboard');
}
?>



		<?php $this->load->view('admin/components/tail_admin');?>