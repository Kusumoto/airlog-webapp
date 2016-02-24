<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $this->lang->line("user_list_user_manage"); ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
			<li><?php echo $this->lang->line("user_list_user_manage"); ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- top row -->
		<div class="row">
			<div class="col-md-12">
				<div id="place-alert"></div>
			</div>
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
						<i class="ion ion-person"></i>
						<h3 class="box-title">
							<?php echo $this->lang->line("user_list_user_manage"); ?>
						</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-primary" id="showusermodel" data-target="#showuserdata" data-toggle="modal"><i class="fa fa-plus"></i> <?php echo $this->lang->line("user_list_add_new_user"); ?></button>
						</div><!-- /. tools -->
					</div>
					<div class="box-body table-responsive no-padding">
						<div class="spinner">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover" id="table_userlist">
								<thead>
									<tr>
										<th width="10%"><?php echo $this->lang->line("user_list_id"); ?></th>
										<th width="20%"><?php echo $this->lang->line("user_list_user"); ?></th>
										<th width="20%"><?php echo $this->lang->line("user_list_fname"); ?></th>
										<th width="20%"><?php echo $this->lang->line("user_list_lname"); ?></th>
										<th width="20%"><?php echo $this->lang->line("user_list_action"); ?></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div><!-- /.box-body -->
				</div>
				<!-- /.box -->
				<!-- USER DETAIL EDITOR -->
				<div class="modal fade" id="showuserdata" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-light-blue">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><i class="ion ion-person"></i> <?php echo $this->lang->line("user_list_user_manage"); ?></h4>
							</div>
							<?php echo form_open("",array("id" => "form_user")); ?>
							<div class="modal-body">
								<div id="place-alert-model"></div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo $this->lang->line("user_list_username"); ?></span>
										<input name="username" id="username" type="text" class="form-control" placeholder="<?php echo $this->lang->line("user_list_username_placeholder"); ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo $this->lang->line("user_list_passwd"); ?></span>
										<input name="password1" id="password1" type="password" class="form-control" placeholder="<?php echo $this->lang->line("user_list_passwd_placeholder"); ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo $this->lang->line("user_list_con_passwd"); ?></span>
										<input name="password2" id="password2" type="password" class="form-control" placeholder="<?php echo $this->lang->line("user_list_con_passwd_placeholder"); ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo $this->lang->line("user_list_frist_name"); ?></span>
										<input name="firstname" id="firstname" type="text" class="form-control" placeholder="<?php echo $this->lang->line("user_list_frist_name_placeholder"); ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo $this->lang->line("user_list_last_name"); ?></span>
										<input name="lastname" id="lastname" type="text" class="form-control" placeholder="<?php echo $this->lang->line("user_list_last_name_placeholder"); ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><?php echo $this->lang->line("user_list_email"); ?></span>
										<input name="email" id="email" type="email" class="form-control" placeholder="<?php echo $this->lang->line("user_list_email_placeholder"); ?>">
									</div>
								</div>
							</div>
							<div class="modal-footer clearfix">
								<input type="hidden" id="user_editid" value="">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo $this->lang->line("user_list_cancel"); ?></button>
								<button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> <?php echo $this->lang->line("user_list_save"); ?></button>
							</div>
							<?php form_close(); ?>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div><!-- /.col -->
		</div> 
	</section>          
</aside><!-- /.right-side -->
<script type="text/javascript">
	function listuser() {
		$('#table_userlist tbody tr').remove();
        $('.spinner').show();
        setTimeout(function(){
            $.getJSON("<?php echo site_url('/authenticate/getuserlist') ?>", function(data) {
                var output = '';
                $.each(data, function(index, value){      
                    output += '<tr id=app_"' + value._id + '">';
                    output += '<td>' + (index+1) + '</td>';
                    output += '<td>' + value.username + '</td>';
                    output += '<td>' + value.firstname + '</td>';
                    output += '<td>' + value.lastname + '</td>';
                    output += '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit this user" onclick="getUserdetail(\''+ value._id +'\')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-danger" data-toggle="tooltip" title="Remove user" onclick="deleteUser(\'' + value._id + '\')"><i class="fa fa-trash-o"></i></button></div></td>'
                    output += '</tr>';
                });
                $('.spinner').hide();
                $('#table_userlist').append(output);
                $('#table_userlist').find('[data-toggle="tooltip"]').tooltip()
            });
        }, 1000);
	}

	function getUserdetail(_id) {
        $('#place-alert-model').html('');
        $.ajax({
            url: "<?php echo site_url('/authenticate/getuser'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {_id: _id},
        })
        .done(function(data) {
            $('#user_editid').val(_id);
			$('#password1').val('');
			$('#password2').val('');
			$('#firstname').val(data.firstname);
			$('#lastname').val(data.lastname);
			$('#email').val(data.email);
			$('#username').val(data.username);
            $('#showuserdata').modal('show');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
    }

	function deleteUser(_id) {
		if (confirm("Are your sure to delete this user?")) {
            $.ajax({
                url: "<?php echo site_url('/authenticate/deluser'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {_id: _id},
            })
            .done(function(data) {
                if (data.status == 200) {
                    $('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + data.message + '</div>');
                    listuser()
                } else {
                    $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + data.message + '</div>');
                }
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })    
        }
	}

	$(document).ready(function() {
		listuser()
		fail_creator_model = function(message){
			$('#place-alert-model').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
		};
		success_creator = function(message) {
			$('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + message + '</div>');
		};
		fail_creator = function(message){
			$('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
		};
		$('#showusermodel').click(function(event) {
			$('#place-alert').html('');
			$('#place-alert-model').html('');
			$('#username').val('');
			$('#password1').val('');
			$('#password2').val('');
			$('#firstname').val('');
			$('#lastname').val('');
			$('#email').val('');
			$('#user_editid').val('');
		});
		$('#form_user').submit(function(event) {
			$('#place-alert').html('');
			$('#place-alert-model').html('');
			event.preventDefault();
			if ($('#user_editid').val() == '') {
				$.ajax({
					url: "<?php echo site_url('/authenticate/saveuser'); ?>",
					type: 'POST',
					dataType: 'json',
					data: $('#form_user').serialize(),
				})
				.done(function(data) {
					if (data.status == 200) {
						success_creator(data.message);
                        $('#showuserdata').modal('hide');
                        listuser()
					} else {
						fail_creator_model(data.message);
					}
				})
				.fail(function() {
					fail_creator_model("Internal Server Error!");
				})
			} else {
				$.ajax({
					url: "<?php echo site_url('/authenticate/updatedata'); ?>",
					type: 'POST',
					dataType: 'json',
					data: {user_editid: $('#user_editid').val(), username: $('#username').val(), password1: $('#password1').val(), password2: $('#password2').val(), firstname: $('#firstname').val(), lastname: $('#lastname').val(), email: $('#email').val()},
				})
				.done(function(data) {
					if (data.status == 200) {
						success_creator(data.message);
                        $('#showuserdata').modal('hide');
                        listuser()
					} else {
						fail_creator_model(data.message);
					}
				})
				.fail(function() {
					fail_creator_model("Internal Server Error!");
				})
			}
		});
	});
</script>