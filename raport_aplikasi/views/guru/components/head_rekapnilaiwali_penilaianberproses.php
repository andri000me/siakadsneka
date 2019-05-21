<!DOCTYPE html>
<!-- HEAD DATA REKAP PENILAIAN BERPROSES WALI -->
<!-- 
Sistem Informasi Raport V.1
Version: V.1
Author: Ofani Dariyan
Website: http://www.fanicode.com/
Contact: ofanidariyan@hotmail.com
Follow: www.twitter.com/OfaniDariyan
Like: www.facebook.com/harwisaw
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Rekap Penilaian Berproses : <?php echo $namakelas ?> - <?php echo $meta_title ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-toastr/toastr.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/admin/layout/css/raport/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/admin/layout/css/raport/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>



<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('')?>raport_themes/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css"/>



<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo site_url('')?>raport_themes/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo site_url('')?>raport_themes/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url('')?>raport_themes/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link type="text/css" href="<?php echo site_url('')?>raport_chat/raportchat_css.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="<?php echo site_url('')?>raport_chat/raportchat_js.php" charset="utf-8"></script>


<link rel="shortcut icon" href="<?php echo site_url() ?>raport_themes/login/assets/img/favicon.ico">
<!--
<style type="text/css">
	/* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 600px;
        margin: 0 auto;
    }
 
    /* Lots of padding for the cells as SSP has limited data in the demo */
    th,
    td {
        padding-left: 40px !important;
        padding-right: 40px !important;
    }

</style>
-->

<style type="text/css">
   
</style>
</head>
<!-- END HEAD -->