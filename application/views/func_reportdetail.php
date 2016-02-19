<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<section class="content-header">
		<h1>
			Application Function Log Report
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>Application Function</li>
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
					<?php echo form_open("/pdf/funcreport",array("id" => "form_reportfunc", "target" => "_BLANK")); ?>
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
									<label>Function</label>
									<select class="form-control" id="app_selector" name="function_id">
										<option value="">All functions</option>
										<?php foreach ($function as $function) {
											echo "<option value=\"" . $function['_id'] . "\">[" . $function['application_name'] . "] ".$function['function_name']."</option>";
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
										<input type="checkbox" id="chkbox_1" value="Info" name="typeselect[]" class="flat-green" checked> Info
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
									<button class="btn btn-primary btn-block" id="btn_show_data"><i class="fa fa-search"></i> Show</button>
								</div>
								<div class="form-group">
									<a class="btn btn-primary btn-block" id="btn_show_pdf" onclick="generate_pdf()"><i class="fa fa-external-link"></i> Generate Report</a>
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
			$.getJSON("<?php echo site_url('/functions/getlog') ?>", function(data) {
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
	function generate_pdf() {
        $('#form_reportfunc').action = "<?php echo site_url('/pdf/funcreport') ?>";
        $('#form_reportfunc').target = "_BLANK";
        $('#form_reportfunc').submit()
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
		$('#btn_show_data').click(function(event) {
			$('#place-alert').html('');
			event.preventDefault();
			$('.spinner').show();
			$.ajax({
				url: "<?php echo site_url('/functions/getlog') ?>",
				type: 'POST',
				dataType: 'json',
				data: $('#form_reportfunc').serialize(),
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