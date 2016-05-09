<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<section class="content-header">
		<h1>
			<?php echo $this->lang->line("app_report_app_log_report"); ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
			<li><?php echo $this->lang->line("application"); ?></li>
			<li class="active"><?php echo $this->lang->line("app_report_log_report"); ?></li>
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
							<?php echo $this->lang->line("app_report_report_setting"); ?>
						</h3>
					</div>
					<?php echo form_open("/pdf/appreport",array("id" => "form_reportapp", "target" => "_BLANK")); ?>
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line("app_report_date_time_range"); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="text" class="form-control pull-right" id="log_datetimepicker" name="daterange" placeholder="<?php echo $this->lang->line("app_report_choose_date"); ?>"/>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line("application"); ?></label>
									<select class="form-control" id="app_selector" name="application_id">
										<option value=""><?php echo $this->lang->line("app_report_all_app"); ?></option>
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
									<button class="btn btn-primary btn-block" id="btn_show_data"><i class="fa fa-search"></i> <?php echo $this->lang->line("app_report_show"); ?></button>
								</div>
								<div class="form-group">
									<a class="btn btn-primary btn-block" id="btn_show_pdf" onclick="generate_pdf()"><i class="fa fa-external-link"></i> <?php echo $this->lang->line("app_report_gen_report"); ?></a>
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
							<?php echo $this->lang->line("app_report_report_data"); ?>
						</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="display" id="log_container">
								<thead>
									<tr>
										<th><?php echo $this->lang->line("app_report_date"); ?></th>
										<th><?php echo $this->lang->line("app_report_time"); ?></th>
										<th><?php echo $this->lang->line("app_report_type"); ?></th>
										<th><?php echo $this->lang->line("application"); ?></th>
										<th><?php echo $this->lang->line("app_report_func"); ?></th>
										<th><?php echo $this->lang->line("app_report_message"); ?></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
<script type="text/javascript">
	var table;
	function showLogList() {
			table =	$('#log_container').DataTable({
				"ajax": {
					"dataType": 'json',
					"contentType": "application/json; charset=utf-8",
					"type": "POST",
					"url":"<?php echo site_url('/applications/getlog') ?>",
				},
				"columns": [
				{ "data": "log_date" },
				{ "data": "log_time" },
				{ "data": "log_type" },
				{ "data": "log_appname" },
				{ "data": "log_funcname" },
				{ "data": "log_data" }

				]
			});
			$('#log_container').removeClass( 'display' )
			$('#log_container').addClass('table table-striped table-bordered');
	}
	function generate_pdf() {
		$('#form_reportapp').action = "<?php echo site_url('/pdf/appreport') ?>";
		$('#form_reportapp').target = "_BLANK";
		$('#form_reportapp').submit();
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
			table.destroy();
			table = $('#log_container').DataTable({
				"ajax": {
					"dataType": 'json',
					"contentType": "application/json; charset=utf-8",
					"type": "POST",
					"url":"<?php echo site_url('/applications/getlog') ?>",
					"data" : $('#form_reportapp').serialize(),
				},
				"columns": [
				{ "data": "log_date" },
				{ "data": "log_time" },
				{ "data": "log_type" },
				{ "data": "log_appname" },
				{ "data": "log_funcname" },
				{ "data": "log_data" }

				]
			});
			$('#log_container').removeClass( 'display' )
			$('#log_container').addClass('table table-striped table-bordered');
		});
	});
</script>