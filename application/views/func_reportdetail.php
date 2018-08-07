<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<section class="content-header">
		<h1>
			<?php echo $this->lang->line("func_rep_app_func_log_rep"); ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
			<li><?php echo $this->lang->line("func_rep_app_func"); ?></li>
			<li class="active"><?php echo $this->lang->line("func_rep_log_rep"); ?></li>
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
							<?php echo $this->lang->line("func_rep_rep_set"); ?>
						</h3>
					</div>
					<?php echo form_open("/pdf/funcreport",array("id" => "form_reportfunc", "target" => "_BLANK")); ?>
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line("func_rep_date_and_time_range"); ?></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input type="text" class="form-control pull-right" id="log_datetimepicker" name="daterange" placeholder="<?php echo $this->lang->line("func_rep_choose_date"); ?>"/>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><?php echo $this->lang->line("func_rep_func"); ?></label>
									<select class="form-control" id="app_selector" name="function_id">
										<option value=""><?php echo $this->lang->line("func_rep_all_func"); ?></option>
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
									<button class="btn btn-primary btn-block" id="btn_show_data"><i class="fa fa-search"></i> <?php echo $this->lang->line("func_rep_show"); ?></button>
								</div>
								<div class="form-group">
									<a class="btn btn-primary btn-block" id="btn_show_pdf" onclick="generate_pdf()"><i class="fa fa-external-link"></i> <?php echo $this->lang->line("func_rep_gen_rep"); ?></a>
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
							<?php echo $this->lang->line("func_rep_rep_data"); ?>
						</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-hover" id="log_container">
								<thead>
									<tr>
										<th><?php echo $this->lang->line("func_rep_date"); ?></th>
										<th><?php echo $this->lang->line("func_rep_time"); ?></th>
										<th><?php echo $this->lang->line("func_rep_type"); ?></th>
										<th><?php echo $this->lang->line("application"); ?></th>
										<th><?php echo $this->lang->line("func_rep_func"); ?></th>
										<th><?php echo $this->lang->line("func_rep_message"); ?></th>
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
	$.fn.serializeObject = function()
	{
   		var o = {};
   		var a = this.serializeArray();
   		$.each(a, function() {
       		if (o[this.name]) {
           		if (!o[this.name].push) {
               		o[this.name] = [o[this.name]];
           		}
           		o[this.name].push(this.value || '');
       		} else {
           		o[this.name] = this.value || '';
       		}
   		});
   		return o;
	};
	function showLogList() {
		table =	$('#log_container').DataTable({
				"ajax": {
					"dataType": 'json',
					"type": "POST",
					"url":"<?php echo site_url('/functions/getlog') ?>",
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
			table.destroy();
			table = $('#log_container').DataTable({
				"ajax": {
					"dataType": 'json',
					"type": "POST",
					"url":"<?php echo site_url('/functions/getlog') ?>",
					"data" : $('#form_reportfunc').serializeObject(),
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