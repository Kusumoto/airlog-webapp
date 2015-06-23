<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row bs-wizard" style="border-bottom:0;">
		<div class="col-xs-3 bs-wizard-step complete">
			<div class="text-center bs-wizard-stepnum">Step 0</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Prepairing for installation.</div>
		</div>

		<div class="col-xs-3 bs-wizard-step complete">
			<div class="text-center bs-wizard-stepnum">Step 1</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Configure System.</div>
		</div>

		<div class="col-xs-3 bs-wizard-step complete">
			<div class="text-center bs-wizard-stepnum">Step 2</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Installing...</div>
		</div>

		<div class="col-xs-3 bs-wizard-step active">
			<div class="text-center bs-wizard-stepnum">Step 3</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Done!</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">SAMF - Installation Wizard</div>
			<div class="panel-body">
			 	<h2 class="text-center"><i></i>Done!</h2>
			 	<div class="alert alert-danger" role="alert" style="display:none" id="alert"></div>
				<hr/>
			 		<h3>Conglaturations</h3>
			 		<p>The wizard has be complete to install SAMF. You can access to main site in <a href="<?php echo site_url();?>"><?php echo site_url();?></a> url.</p>
			 		<div class="alert alert-warning" role="alert">
			 			<strong>Security Warning :</strong> Before use SAMF, you must to change permission path <span class="label label-danger"><?php echo APPPATH.'config/'; ?></span> and <span class="label label-danger"><?php echo FCPATH; ?></span> from 777 to 755 (read-only)
			 		</div>
			 	<hr/>
			</div>
		</div>
	</div>
</div>