<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Airlog Installation</title>
	<style type="text/css">
		.bs-wizard {margin-top: 40px;}
		/*Form Wizard*/
		.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
		.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
		.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
		.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
		.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
		.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
		.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
		.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
		.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
		.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
		.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
		.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
		.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
		.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
		.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
		.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
		.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
		.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
		/*END Form Wizard*/
		.icon_wrong {font-size: 24px; color: red}
		.icon_corrent {font-size: 24px; color: green}
		li {font-size: 16px;}
	</style>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>