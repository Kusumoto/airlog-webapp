<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<section class="content-header">
		<h1>
			Application Log Report
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>Application</li>
			<li class="active">Log Report</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div id="place-alert"></div>
				<div class="box box-primary">
					<div class="box-header">
						<i class="fa fa fa-cog"></i>
						<h3 class="box-title">
							Report Setting
						</h3>
					</div>
					<?php echo form_open("",array("id" => "form_reportapp")); ?>
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Date and time range</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="text" class="form-control pull-right" id="log_datetimepicker" name="daterange" placeholder="Choose a Date"/>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Application</label>
									<select class="form-control" id="app_selector" name="application_id">
										<option value="">All applications</option>
										<?php foreach ($application as $application) {
											echo "<option value=\"" . $application['_id'] . "\">" . $application['application_name'] . "</option>";
										}
										?>
									</select>
								</div><!-- /.form group -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 col-md-offset-4">
								<div class="form-group">
									<label class="checkbox-inline">
										<input type="checkbox" id="chkbox_1" value="Notice" name="typeselect[]" class="flat-green" checked> Notice
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" id="chkbox_2" value="Debug" name="typeselect[]" class="flat-green" checked> Debug
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" id="chkbox_3" value="Error" name="typeselect[]" class="flat-green" checked> Error
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<div class="form-group">
									<button class="btn btn-primary btn-block" id="btn_show"><i class="fa fa-search"></i> Show</button>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" id="btn_show"><i class="fa fa-external-link"></i> Generate Report</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="box-header">
						<i class="fa fa-list-alt"></i>
						<h3 class="box-title">
							Report Data
						</h3>
					</div>
					<div class="box-body">
						<div class="spinner">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover" id="log_container">
								<thead>
									<tr>
										<th>Date</th>
										<th>Time</th>
										<th>Type</th>
										<th>Application</th>
										<th>Function</th>
										<th>Message</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
<script type="text/javascript">
	function showLogList() {
		$('#log_container tbody tr').remove();
		$('.spinner').show();
		setTimeout(function(){
			$.getJSON("<?php echo site_url('/applications/getlog') ?>", function(data) {
				var output = '';
				$.each(data, function(index, value){      
					output += '<tr id=log_"' + value._id + '">';
					output += '<td>' + value.log_date + '</td>';
					output += '<td>' + value.log_time + '</td>';
					output += '<td>' + value.log_type + '</td>';
					output += '<td>' + value.log_appname + '</td>';
					output += '<td>' + value.log_funcname + '</td>';
					output += '<td>' + value.log_data + '</td>';
					output += '</tr>';
				});
				$('.spinner').hide();
				$('#table_applist').append(output);
			});
		}, 1000);
	}
	$(document).ready(function() {
		success_creator = function(message) {
			$('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + message + '</div>');
		};
		fail_creator = function(message){
			$('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
		};

		showLogList()
		$('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
			checkboxClass: 'icheckbox_flat-green',
			radioClass: 'iradio_flat-green'
		});
		//Date range picker with time picker
		$('#log_datetimepicker').daterangepicker({timePicker: true, timePickerIncrement: 1, format: 'YYYY/MM/DD H:mm'})
		$('#form_reportapp').submit(function(event) {
			$('#place-alert').html('');
			event.preventDefault();
			$('.spinner').show();
			$.ajax({
				url: "<?php echo site_url('/applications/getlog') ?>",
				type: 'POST',
				dataType: 'json',
				data: $('#form_reportapp').serialize(),
			})
			.done(function(data) {
				$('#log_container tbody tr').remove();
				setTimeout(function(){
					var output = '';
					$.each(data, function(index, value){      
						output += '<tr id=log_"' + value._id + '">';
						output += '<td>' + value.log_date + '</td>';
						output += '<td>' + value.log_time + '</td>';
						output += '<td>' + value.log_type + '</td>';
						output += '<td>' + value.log_appname + '</td>';
						output += '<td>' + value.log_funcname + '</td>';
						output += '<td>' + value.log_data + '</td>';
						output += '</tr>';
					});
					$('.spinner').hide();
					$('#log_container').append(output);
				}, 1000);
			})
			.fail(function() {
				fail_creator('Internal Server Error!')
			})
		});
	});
</script>