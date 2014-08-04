<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <base href="<?=base_url()?>">
        		
        <title><?php xecho ( $site_title ) ?></title>
        <meta name="description" content="<?php xecho ( $meta_desc ) ?>">
        <meta name="keywords" content="<?php xecho ( $meta_keywords ) ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<?php if ( ENVIRONMENT != 'prouction' ) : ?>
		<meta name="robots" content="noindex">
		<?php endif; ?>
		
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
		
		<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/img/apple-touch-icon-precomposed.png" />
		
		<link rel="icon" type="image/ico"  href="<?=base_url()?>assets/img/favicon.ico">
      
        <script src="<?=base_url()?>assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?=base_url()?>assets/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

		<script src="<?=base_url()?>assets/js/vendor/bootstrap.min.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.2/fastclick.min.js"></script>
		
		<script src="<?=base_url()?>assets/js/plugins.js"></script>
		<script src="<?=base_url()?>assets/js/main.js"></script>
				
<!-- End HEADER -->
