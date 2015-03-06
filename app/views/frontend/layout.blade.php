<!DOCTYPE html>
<!-- 
Template Name: customGridGraph - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/customGridGraph-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Currency Fair Test - Message Frontend Component</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="currency fair" name="description"/>
<meta content="catalin gheonea" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo ThemePath::getPath('local');?>/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo ThemePath::getPath('local');?>/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ThemePath::getPath('local');?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
</head>
    <body class="page-header-fixed page-quick-sidebar-over-content page-full-width">
        <!-- main navbar !-->
        <?php
            require_once(app_path().'/views/navbar/mainNavbar.php');
        ?>
        
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- content !-->
            @yield('content')
        </div>
        <!-- END CONTAINER !-->
        
        <!-- main footer and scripts !-->
        <?php
            require_once(app_path().'/views/footer/mainFooter.php');
        ?>
    </body>
</html>