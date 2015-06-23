<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row bs-wizard" style="border-bottom:0;">
		<div class="col-xs-3 bs-wizard-step complete">
			<div class="text-center bs-wizard-stepnum">Step 0</div>
			<div class="progress"><div class="progress-bar"></div></div>
			<a href="#" class="bs-wizard-dot"></a>
			<div class="bs-wizard-info text-center">Prepairing for installation.</div>
		</div>

		<div class="col-xs-3 bs-wizard-step active">
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
			<div class="panel-heading">SAMF - Installation Wizard</div>
			<div class="panel-body">
				<h2 class="text-center">Configure System</h2>
				<hr/>
				<?php echo form_open('',array('name' => 'form_config', 'id' => 'form_config')); ?>
				<?php if (validation_errors()): ?>
				<div class="alert alert-danger" role="alert">
					<?php echo validation_errors(); ?>
				</div>
				<?php endif; ?>
				<h3><i class="fa fa-database"></i> MongoDB setup  <span class=<?php if (isset($token_dbchk)) echo "\"label label-success\""; else echo "\"label label-default\"";?> id="badge_db_info"><?php if (isset($token_dbchk)) echo "PASS"; else echo "NOT CHECK";?></span></h3>
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input type="text" id="mongo_host" name="mongo_host" placeholder="MongoDB Hostname" class="form-control" <?php if (isset($token_dbchk)) echo "disabled = \"disabled\""; else echo "value=\"localhost\""; ?>/>
					<small>Tell your MongoDB database server address default values this is 'localhost'</small>
				</div>
				<div class="form-group">
					<label for="hostname">Port</label>
					<input type="text" id="mongo_port" name="mongo_port" placeholder="MongoDB Port" class="form-control" <?php if (isset($token_dbchk)) echo "disabled = \"disabled\""; else echo "value=\"27017\""; ?>/>
					<small>Tell your MongoDB database server port default values this is '27017'</small>
				</div>
				<div class="form-group">
					<label for="hostname">Username</label>
					<input type="text" id="mongo_user" name="mongo_user" placeholder="MongoDB Username" class="form-control" <?php if (isset($token_dbchk)) echo "disabled = \"disabled\""; else echo "value=\"\""; ?>/>
					<small>Tell your MongoDB Username if your MongoDB database server use autheticate method.</small>
				</div>
				<div class="form-group">
					<label for="hostname">Password</label>
					<input type="password" id="mongo_pass" name="mongo_pass" placeholder="MongoDB Password" class="form-control" <?php if (isset($token_dbchk)) echo "disabled = \"disabled\""; else echo "value=\"\""; ?>/>
					<small>Tell your MongoDB Password if your MongoDB database server use autheticate method.</small>
				</div>
				<div class="form-group">
					<label for="hostname">Database</label>
					<input type="text" id="mongo_db" name="mongo_db" placeholder="MongoDB Hostname" class="form-control" <?php if (isset($token_dbchk)) echo "disabled = \"disabled\""; else echo "value=\"SAMF\""; ?>/>
					<small>Tell your your database name default values this is 'SAMF'</small>
				</div>
				<hr/>
				<h3><i class="fa fa-user-plus"></i> Create first user for system</h3>
				<div class="form-group">
					<label for="hostname">Username</label>
					<input type="text" id="sys_user" name="sys_user" placeholder="Username" class="form-control" value="<?php echo set_value('sys_user'); ?>"/>
				</div>
				<div class="form-group">
					<label for="hostname">Password</label>
					<input type="password" id="sys_pass1" name="sys_pass1" placeholder="Password" class="form-control" value="<?php echo set_value('sys_pass1'); ?>"/>
				</div>
				<div class="form-group">
					<label for="hostname">Confirm Password</label>
					<input type="password" id="sys_pass2" name="sys_pass2" placeholder="Confirm Password" class="form-control" value="<?php echo set_value('sys_pass2'); ?>"/>
				</div>
				<div class="form-group">
					<label for="hostname">First Name</label>
					<input type="text" id="sys_firstname" name="sys_firstname" placeholder="First Name" class="form-control" value="<?php echo set_value('sys_firstname'); ?>"/>
				</div>
				<div class="form-group">
					<label for="hostname">Last Name</label>
					<input type="text" id="sys_lastname" name="sys_lastname" placeholder="Last Name" class="form-control" value="<?php echo set_value('sys_lastname'); ?>"/>
				</div>
				<div class="form-group">
					<label for="hostname">E-Mail Address</label>
					<input type="email" id="sys_email" name="sys_email" placeholder="E-Mail Address" class="form-control" value="<?php echo set_value('sys_email'); ?>"/>
				</div>
				<hr/>
				<h3><i class="fa fa-plug"></i> Web Service <span class=<?php if (isset($token_webservicechk)) echo "\"label label-success\""; else echo "\"label label-default\"";?> id="badge_webservice_info"><?php if (isset($token_webservicechk)) echo "PASS"; else echo "NOT CHECK";?></span></h3>
				<div class="form-group">
					<label for="webservice">Web Service URL</label>
					<input type="text" id="webservice" name="webservice" placeholder="Web Service URL" class="form-control" <?php if (isset($token_webservicechk)) echo "disabled = \"disabled\""; else echo "value=\"http://localhost:8080/SAMF_SERVICE/\""; ?> />
					<small>Tell your your web service url for SAMF Web Service is installed default values this is 'http://localhost:8080/SAMF'</small>
				</div>
				<hr/>
				<div class="text-center">
					<a href="<?php echo site_url('/installation'); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Back</a> 
					<a href="#" class="btn btn-info" id="chk_dbcon" <?php if (isset($token_dbchk)) echo "disabled = \"disabled\""; ?>><i class="fa fa-database" ></i> Check Database Connection</a>
					<a href="javascript:void(0);" class="btn btn-info" <?php if (isset($token_webservicechk)) echo "disabled = \"disabled\""; ?> id="chk_webservice"><i class="fa fa-plug"></i> Check Web Service Connection</a>  
					<button type="submit" class="btn btn-primary">Next <i class="fa fa-share"></i></button>
					<input type="hidden" value="<?php echo $token; ?>" id="token" name="token" />
					<input type="hidden" value="<?php if (isset($token_dbchk)) echo $token_dbchk; ?>" id="token_dbchk" name="token_dbchk" />
					<input type="hidden" value="<?php if (isset($token_webservicechk)) echo $token_webservicechk; ?>" id="token_webservicechk" name="token_webservicechk" />
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#chk_dbcon').click(function(event) {
			$('#badge_db_info').text('...');
			$('#badge_db_info').prop('class','label label-default');
			$.ajax({
				url: "<?php echo site_url('/installation/chkmongoconnect'); ?>",
				type: 'POST',
				dataType: 'json',
				data: {mongo_host: $('#mongo_host').val(), mongo_port: $('#mongo_port').val(), mongo_user: $('#mongo_user').val(), mongo_pass: $('#mongo_pass').val(), mongo_db: $('#mongo_db').val()},
			})
			.done(function(data) {
				if (data.Status == 200) {
					$('#badge_db_info').text('Pass');
					$('#badge_db_info').prop('class','label label-success');
					$('#token_dbchk').val(data.Token);
				} else {
					$('#badge_db_info').text('Connection Problem');
					$('#badge_db_info').prop('class','label label-danger');
				}
			})
			.fail(function() {
				$('#badge_db_info').text('Internal Server Error!');
				$('#badge_db_info').prop('class','label label-danger');
			})
		});
		$('#chk_webservice').click(function(event) {
			$('#badge_webservice_info').text('...');
			$('#badge_webservice_info').prop('class','label label-default');
			$.ajax({
				url: "<?php echo site_url('/installation/chkwebservice'); ?>",
				type: 'POST',
				dataType: 'json',
				data: {webservice: $('#webservice').val()},
			})
			.done(function(data) {
				if (data.Status == 200) {
					$('#badge_webservice_info').text('Pass');
					$('#badge_webservice_info').prop('class','label label-success');
					$('#token_webservicechk').val(data.Token);
				} else {
					$('#badge_webservice_info').text('Connection Problem');
					$('#badge_webservice_info').prop('class','label label-danger');
				}
			})
			.fail(function() {
				$('#badge_webservice_info').text('Internal Server Error!');
				$('#badge_webservice_info').prop('class','label label-danger');
			})			
		});
	});
</script>


