<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Raport Siswa
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Cetak Nilai Raport</a>
						
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
								<i class="glyphicon glyphicon-print"></i>Cetak Raport
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
								<div id="data-info"> 
								<div class="note note-info"><i class="fa  fa-info-circle"></i><strong> Info:</strong> Silahkan masukkan <b>password login</b> untuk membuka data <b>raport</b> dalam bentuk <b>PDF</b>.</div>
								</div>
								<div id="data-info-pencarian"></div>
							</div>
							</div>
							<div class="row">
									
									<div class="col-md-2">
                    	




                                                        <div class="btn-group dropdownMenu" style="position:inherit">
                                                        <button class="btn blue dropdown-toggle" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-print "></i>
                                                        Print Options <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" style="min-width:155px">
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="glyphicon glyphicon-book"></i> Cover Raport</a>
                                                                <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="<?php echo site_url('') ?>siswa/cetakraport/cover_pdf/<?php echo $this->session->userdata('user_login') ?>" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="<?php echo site_url('') ?>siswa/cetakraport/cover_html/<?php echo $this->session->userdata('user_login') ?>" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="fa fa-university"></i> Data Sekolah </a>
                                                                 <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="<?php echo site_url('') ?>siswa/cetakraport/sekolah_pdf" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="<?php echo site_url('') ?>siswa/cetakraport/sekolah_html" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="fa fa-user"></i> Data Siswa </a>
                                                                 <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="<?php echo site_url('') ?>siswa/cetakraport/siswa_pdf/<?php echo $this->session->userdata('user_login') ?>" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="<?php echo site_url('') ?>siswa/cetakraport/siswa_html/<?php echo $this->session->userdata('user_login') ?>" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            
                                                            
                                                        </ul>
                                                    </div>




                  </div>


                   <div class="col-md-3">
                  <div class="btn-group dropdownMenu" style="position:inherit">
                                                        <button class="btn blue dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-graduation-cap "></i>
                                                       Pilih Data Semester <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" style="min-width:105px">
                                                            
                                                        <?php  echo $raport_siswa ?>
                                                        </ul>
                                                    </div>
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