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

		<div class="col-xs-3 bs-wizard-step active">
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
			<div class="panel-heading">SAMF - Installation Wizard</div>
			<div class="panel-body">
			 	<h2 class="text-center"><i></i>Installing...</h2>
			 	<div class="alert alert-danger" role="alert" style="display:none" id="alert"></div>
				<hr/>
			 	<ul class="fa-ul">
			 		<li><i class="fa-li fa fa-square" id="step1"></i>Preparing Data...</li>
			 		<li><i class="fa-li fa fa-square" id="step2"></i>Test MongoDB Connection...</li>
			 		<li><i class="fa-li fa fa-square" id="step3"></i>Write Configuration Files...</li>
			 		<li><i class="fa-li fa fa-square" id="step4"></i>Install MongoDB Collection...</li>
			 		<li><i class="fa-li fa fa-square" id="step5"></i>Finalizing Installation...</li>
			 	</ul>
			 	<hr/>
			 	<div class="text-center">
			 		<button type="submit" class="btn btn-primary" disabled="disabled" id="nextbtn" onclick="window.location.href='<?php echo site_url('installation/step3'); ?>'" >Next <i class="fa fa-share"></i></button>
			 	</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#step1').prop('class','fa-li fa fa-spinner fa-spin');
		$.ajax({
			url: "<?php echo site_url('installation/install_preparing'); ?>",
			type: 'POST',
			dataType: 'json',
			data: {post: '1'},
		})
		.done(function(data) {
			if (data.Status == 200) {
				$('#step1').prop('class','fa-li fa fa-check-square');
				$('#step2').prop('class','fa-li fa fa-spinner fa-spin');
				$.ajax({
					url: "<?php echo site_url('installation/install_testmongoconnect'); ?>",
					type: 'POST',
					dataType: 'json',
					data: {post: '1'},
				})
				.done(function(data) {
					if (data.Status == 200) {
						$('#step2').prop('class','fa-li fa fa-check-square');
						$('#step3').prop('class','fa-li fa fa-spinner fa-spin');
						$.ajax({
							url: "<?php echo site_url('installation/install_setupconfigfile'); ?>",
							type: 'POST',
							dataType: 'json',
							data: {post: '1'},
						})
						.done(function(data) {
							if (data.Status == 200) {
								$('#step3').prop('class','fa-li fa fa-check-square');
								$('#step4').prop('class','fa-li fa fa-spinner fa-spin');
								$.ajax({
									url: "<?php echo site_url('installation/install_setcollectionmongo'); ?>",
									type: 'POST',
									dataType: 'json',
									data: {post: '1'},
								})
								.done(function(data) {
									if (data.Status == 200) {
										$('#step4').prop('class','fa-li fa fa-check-square');
										$('#step5').prop('class','fa-li fa fa-spinner fa-spin');
										$.ajax({
											url: "<?php echo site_url('installation/install_finalinstall'); ?>",
											type: 'POST',
											dataType: 'json',
											data: {post: '1'},
										})
										.done(function(data) {
											if (data.Status == 200) {
												$('#step5').prop('class','fa-li fa fa-check-square');
												$('#nextbtn').prop('disabled', '');
											} else {
												$('#step5').prop('class','fa-li fa fa-times');
												$('#alert').text(data.Message);
												$('#alert').show();
											}
										})
										.fail(function() {
											$('#step5').prop('class','fa-li fa fa-times');
										})
									} else {
										$('#step4').prop('class','fa-li fa fa-times');
										$('#alert').text(data.Message);
										$('#alert').show();
									}
								})
								.fail(function() {
									$('#step4').prop('class','fa-li fa fa-times');
								})
							} else {
								$('#step3').prop('class','fa-li fa fa-times');
								$('#alert').text(data.Message);
								$('#alert').show();
							}
						})
						.fail(function() {
							$('#step3').prop('class','fa-li fa fa-times');
						})						
					} else {
						$('#step2').prop('class','fa-li fa fa-times');
						$('#alert').text(data.Message);
						$('#alert').show();
					}
				})
				.fail(function() {
					$('#step2').prop('class','fa-li fa fa-times');
				})				
			} else {
				$('#step1').prop('class','fa-li fa fa-times');
				$('#alert').text(data.Message);
				$('#alert').show();
			}
		})
		.fail(function() {
			$('#step1').prop('class','fa-li fa fa-times');
		})
	});
</script>