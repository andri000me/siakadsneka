<?php
$url_ofani = $this->uri->segment ( 2 );
$url_ofani2 = $this->uri->segment ( 3 );
$url_gabung = array (
		$url_ofani => $url_ofani2 
);

$str_url = $this->uri->assoc_to_uri ( $url_gabung );

?>


		<?php
		if ($this->uri->segment ( 2 ) == 'verifikasi') {
			$this->load->view ( 'components/head_verifikasi' );
		} else if ($this->uri->segment ( 1 ) == 'register') {
			$this->load->view ( 'components/head_register' );
		} else if ($this->uri->segment ( 1 ) == 'about') {
			$this->load->view ( 'components/head_about' );
		} else if ($this->uri->segment ( 1 ) == 'kirim') {
			$this->load->view ( 'components/head_kirim' );

	} else if ($this->uri->segment ( 1 ) == 'article') {
			$this->load->view ( 'components/artikel_head' );

	
		} else if ($this->uri->segment ( 1 ) == 'sponsor') {
			$this->load->view ( 'components/head_sponsor' );

		} else if ($this->uri->segment ( 1 ) == 'berita') {
			$this->load->view ( 'components/head_berita' );

			} else if ($this->uri->segment ( 1 ) == 'syaratdanketentuan') {
			$this->load->view ( 'components/head_syarat' );
		} else if ($this->uri->segment ( 1 ) == 'error') {
			$this->load->view ( 'components/head_error' );
		} else if ($this->uri->segment ( 1 ) == 'contact') {
			$this->load->view ( 'components/head_contact' );
		} else if ($this->uri->segment ( 1 ) == NULL) {
			$this->load->view ( 'components/desain_head' );
		} else {
			$this->load->view ( 'components/head_error' );
		}
		?>


<?php $this->load->view('templates/' . $subview); ?>





			
	
	<?php
	
	if ($this->uri->segment ( 1 ) == 'about') {
		$this->load->view ( 'components/tail_about' );

	} else if ($this->uri->segment ( 1 ) == 'sponsor') {
		$this->load->view ( 'components/tail_sponsor' );

	} else if ($this->uri->segment ( 2 ) == 'verifikasi') {
		$this->load->view ( 'components/tail_verifikasi' );

	} else if ($this->uri->segment ( 1 ) == 'berita') {
		$this->load->view ( 'components/tail_berita' );
	} else if ($this->uri->segment ( 1 ) == 'register') {
		$this->load->view ( 'components/tail_register' );
	} else {
		$this->load->view ( 'components/desain_tail' );
	}
	?>