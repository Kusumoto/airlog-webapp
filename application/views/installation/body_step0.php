<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row bs-wizard" style="border-bottom:0;">
		<div class="col-xs-3 bs-wizard-step active">
			<div class="text-center bs-wizard-stepnum">Step 0</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Prepairing for installation.</div>
		</div>

		<div class="col-xs-3 bs-wizard-step disabled">
			<div class="text-center bs-wizard-stepnum">Step 1</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Configure System.</div>
		</div>

		<div class="col-xs-3 bs-wizard-step disabled">
			<div class="text-center bs-wizard-stepnum">Step 2</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Installing...</div>
		</div>

		<div class="col-xs-3 bs-wizard-step disabled">
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
			<div class="panel-heading">Airlog - Installation Wizard</div>
			<div class="panel-body">
			 	<h2 class="text-center">Welcome to Software Analysis and Maintenance Framework Installation</h2>
			 	<hr/>
			 	<h3><i class="fa fa-check-square-o"></i> Check your system environment</h3>
			 	<table class="table table-bordered">
			 		<tr class="active">
			 			<th>Requirement</th>
			 			<th>Pass?</th>
			 		</tr>
			 		<tr>
			 			<td>Apache Version since 2.2 or more</td>
			 			<td><?php echo $webserverresult ?></td>
			 		</tr>
			 		<tr>
			 			<td>PHP Version since 5.3 or more</td>
			 			<td><?php echo $phpresult; ?></td>
			 		</tr>
			 		<tr>
			 			<td><?php echo FCPATH; ?> can writable</td>
			 			<td><?php echo $filewriter1result; ?></td>
			 		</tr>
			 		<tr>
			 			<td><?php echo APPPATH; ?>config/ can writable</td>
			 			<td><?php echo $filewriter2result; ?></td>
			 		</tr>
			 		<tr>
			 			<td>PHP Mcrypt Module</td>
			 			<td><?php echo $mcryptmodule; ?></td>
			 		</tr>
			 		<tr>
			 			<td>PHP JSON Module</td>
			 			<td><?php echo $jsonmodule; ?></td>
			 		</tr>
			 		<tr>
			 			<td>PHP MongoDB Module</td>
			 			<td><?php echo $mongomodule; ?></td>
			 		</tr>
			 	</table>
			 	<hr/>
			 	<?php echo form_open(); ?>
			 	<div class="text-center">
			 		<a href="javascript:location.reload();" class="btn btn-info"><i class="fa fa-refresh"></i> Recheck!</a>
			 		<input type="hidden" value="<?php echo $token; ?>" id="token" name="token" />
					<button type="submit" class="btn btn-primary" <?php if (!$pass) echo "disabled = \"disabled\""; ?> >Next <i class="fa fa-share"></i></button>
			 	</div>
			 	<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>


