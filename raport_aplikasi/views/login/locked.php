<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Locked Screen : E-Raport | <?php echo strtoupper($this->konfigurasi_m->konfig_sekolah()) ?></title>
    <meta name="keywords" content="E-Raport - SMK N 4 Klaten" />
    <meta name="description" content="Sistem Informasi Nilai Raport SMK N 4 Klaten">
    <meta name="author" content="Annis Nuraini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
   
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>raport_themes/login/assets/skin/default_skin/css/theme.css">

   
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>raport_themes/login/assets/admin-tools/admin-forms/css/admin-forms.css">
    <link href="<?php echo site_url() ?>raport_themes/login/assets/skin/base/components/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>raport_themes/assets/admin/pages/css/lock.css">


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo site_url() ?>raport_themes/login/assets/img/favicon.ico">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">

                        <div class="col-xs-6 va-m pln">
                            <a href="<?php echo site_url() ?>" title="Return to Dashboard">
                                <img src="<?php echo site_url() ?>raport_themes/login/assets/img/logos/logo-locked-new.png" title="E-Raport <?php echo strtoupper($this->konfigurasi_m->konfig_sekolah()) ?>" class="img-responsive w250">
                            </a>
                        </div>

                        <div class="col-xs-6 text-right va-b pr5">
                            <div class="login-links">
                               <!--
                                <a href="#" class="" title="Register">Reset Password</a>
                                -->
                            </div>

                        </div>

                    </div>

                    <div class="panel panel-info mt10 br-n">

                        
                        <!-- end .form-header section -->
                        
                        <?php echo form_open();?>
                         <?php 

                        if ($this->session->userdata('user_level') == 2 || $this->session->userdata('user_level') == 5) {
                             if (file_exists('raport_files/foto/guru/thumbnail/'.$this->session->userdata('user_photo')) == TRUE && $this->session->userdata('user_photo') == true) {
                                 $datagambar = site_url().'raport_files/foto/guru/thumbnail/'.$this->session->userdata('user_photo');
                             } else {
                                 $datagambar = site_url().'raport_files/foto/guru/thumbnail/default.png';
                             }
                        } else {
                            if (file_exists('raport_files/foto/siswa/thumbnail/'.$this->session->userdata('user_photo')) == TRUE && $this->session->userdata('user_photo') == true) {
                                 $datagambar = site_url().'raport_files/foto/siswa/thumbnail/'.$this->session->userdata('user_photo');
                             } else {
                                 $datagambar = site_url().'raport_files/foto/siswa/thumbnail/default.png';
                             }
                        }
                        ?>
                            
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                <div class="col-sm-5 br-grey pl30" style="text-align: center; padding-left: 45px !important; padding-top: 10px !important; color: #364150">
                                    <div class="pull-left lock-avatar-block">
                                        <img src="<?php echo $datagambar ?>" class="lock-avatar-ofani">
                                    </div>
                                   
                                   <!--
                                   <i class="fa fa-lock" style="font-size: 250px;"></i>
                                        <h3 class="mb25"> Informasi Mengakses E-Raport :</h3>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Pastikan anda memiliki akun, jika belum bisa menemui Administrator (WKS1)</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Jika password lupa, silahkan gunakan fasilitas reset password</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Gunakan sistem dengan bijak.</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Usakan untuk melakukan login pada komputer pribadi/milik sendiri</p>
                                            -->
                                    </div>
                                    <div class="col-sm-7 br-l pr30">
                                    <?php echo $this->session->flashdata('error'); ?>
                                    <?php echo validation_errors(); ?>
                                       
                                        <div class="section">

                                            <label for="username" class="field-label text-muted fs22 mb10" style="margin-top: 15px;"><i class="fa fa-user"></i>  <?php echo $this->session->userdata('user_nama') ?></label>

                                            
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                           
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="user_password" id="password" class="gui-input" placeholder="Enter password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->
                                        <div class="section">
                                          <div class="login-links-ofani">

                                        <a href="<?php echo site_url() ?>user/logout">Bukan <?php echo $this->session->userdata('user_nama') ?> ?</a>

                                        </div></div>
                                        <div class="section">
                                             <button type="submit" class="button btn-raport mr10 pull-right">  Login <i class="fa fa-chevron-right "></i></button>
                                        </div>


                                    </div>

                                    
                                </div>
                            </div>
                            <!-- end .form-body section -->
                           
                            <!-- end .form-footer section -->
                        <?php echo form_close();?>
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/main.js"></script>
     <script type="text/javascript" src="<?php echo site_url() ?>raport_themes/login/assets/js/demo.js"></script>
    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
