<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<section class="content-header">
		<h1>
			<?php echo $this->lang->line("api_api_management"); ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
			<li>API</li>
			<li class="active"><?php echo $this->lang->line("api_manage"); ?></li>
		</ol>
	</section>
	<!-- Main content -->
  <section class="content">
   <div class="row">
    <div class="col-xs-12">
      <div id="place-alert"></div>
      <div class="box box-primary">
        <div class="box-header">
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-primary" id="addnewapi" data-target="#showapidata" data-toggle="modal"><i class="fa fa-plus"></i> <?php echo $this->lang->line("api_add_new_api_key"); ?></button>
          </div><!-- /. tools -->

          <i class="ion ion-code"></i>
          <h3 class="box-title">
            <?php echo $this->lang->line("api_api_key_for_3rd"); ?>
          </h3>
        </div>
        <div class="box-body table-responsive no-padding">
          <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover" id="table_apilist">
              <thead>
                <tr>
                  <th width="10%"><?php echo $this->lang->line("api_id"); ?></th>
                  <th width="70%"><?php echo $this->lang->line("api_app_name"); ?></th>
                  <th width="20%"><?php echo $this->lang->line("api_action"); ?></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <!-- API DETAIL EDITOR -->
        <div class="modal fade" id="showapidata" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-light-blue">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-cube"></i> <?php echo $this->lang->line("api_api_manage"); ?></h4>
              </div>
              <?php echo form_open("",array("id" => "form_api")); ?>
              <div class="modal-body">
                <div id="place-alert-model"></div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><?php echo $this->lang->line("api_app_name"); ?></span>
                    <input name="api_name" id="api_name" type="text" class="form-control" placeholder="Your Application Name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><?php echo $this->lang->line("api_api_key_token"); ?></span>
                    <input name="api_key" id="api_key" type="text" class="form-control" placeholder="API Key Token" readonly>
                    <div class="input-group-btn">
                      <button class="btn btn-default" id="btn_gentoken"><?php echo $this->lang->line("api_gen_token"); ?></button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                   <span class="input-group-addon"><?php echo $this->lang->line("api_api_enable"); ?></span>
                   <select class="form-control" id="api_isenable" name="api_isenable">
                    <option value="true"><?php echo $this->lang->line("api_enable"); ?></option>
                    <option value="false"><?php echo $this->lang->line("api_disable"); ?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer clearfix">
              <input type="hidden" id="_id" value="">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo $this->lang->line("api_cancel"); ?></button>
              <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> <?php echo $this->lang->line("api_save"); ?></button>
            </div>
            <?php form_close(); ?>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </div>
</div>
</section>
</aside><!-- /.right-side -->
<script type="text/javascript">
  function getAPIdetail(_id) {
    $('#place-alert-model').html('');
    $.ajax({
      url: "<?php echo site_url('/api/getdetail'); ?>",
      type: 'POST',
      dataType: 'json',
      data: {_id: _id},
    })
    .done(function(data) {
      $('#api_name').val(data.api_name);
      $('#api_key').val(data.api_key);
      $('#api_isenable').val(data.api_isenable);
      $('#_id').val(_id);
      $('#showapidata').modal('show');
    })
    .fail(function() {
      $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
  }
  function deleteAPI(_id) {
    if (confirm("Are your sure to delete this application?")) {
      $.ajax({
        url: "<?php echo site_url('/api/delete'); ?>",
        type: 'POST',
        dataType: 'json',
        data: {_id: _id},
      })
      .done(function(data) {
        if (data.Status == 200) {
          $('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + data.Message + '</div>');
          showAPIList()
        } else {
          $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + data.Message + '</div>');
        }
      })
      .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
      })    
    }
  }
  function showAPIList() {
    $('#table_apilist tbody tr').remove();
    $('.spinner').show();
    setTimeout(function(){
      $.getJSON("<?php echo site_url('/api/get') ?>", function(data) {
        var output = '';
        $.each(data, function(index, value){      
          output += '<tr id=api_"' + value._id + '">';
          output += '<td>' + (index+1) + '</td>';
          output += '<td>' + value.api_name + '</td>';
          output += '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit API data" onclick="getAPIdetail(\''+ value._id +'\')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-danger" data-toggle="tooltip" title="Remove API data" onclick="deleteAPI(\'' + value._id + '\')"><i class="fa fa-trash-o"></i></button></div></td>'
          output += '</tr>';
        });
        $('.spinner').hide();
        $('#table_apilist').append(output);
        $('#table_apilist').find('[data-toggle="tooltip"]').tooltip()
      });
    }, 2000);
  }
  $(document).ready(function() {
    showAPIList()

    fail_creator_model = function(message){
      $('#place-alert-model').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
    };
    success_creator = function(message) {
      $('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + message + '</div>');
    };
    fail_creator = function(message){
      $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
    };

    $('#addnewapi').click(function(event) {
      $('#place-alert-model').html('');
      $('#api_name').val('');
      $('#api_key').val('');
      $('#_id').val('');
      $('#api_isenable').val('true');
    });
    $('#btn_gentoken').click(function(event) {
      event.preventDefault();
      $.ajax({
        url: "<?php echo site_url('api/generate'); ?>",
        type: 'POST',
        dataType: 'json',
      })
      .done(function(data) {
       $('#api_key').val(data.token);
     })
      .fail(function() {
       fail_creator_model('Internal Server Error!');
     })
    });
    $('#form_api').submit(function(event) {
      event.preventDefault();
      $('#place-alert-model').html('');
      if ($('#api_name').val() == '') {
        fail_creator_model('Please enter your application name');
        $('#api_name').focus();
      } else if ($('#api_key').val() == '') {
        fail_creator_model('Please generate your API key');
      } else if ($('#api_isenable').val() == '') {
        fail_creator_model('Service not available.');
      } else {
        if ($('#_id').val() == '') {
          $.ajax({
            url: "<?php echo site_url('api/create'); ?>",
            type: 'POST',
            dataType: 'json',
            data: $('#form_api').serialize(),
          })
          .done(function(data) {
            if (data.Status == 200) {
              success_creator(data.Message);
              $('#showapidata').modal('hide');
              showAPIList()
            } else {
              fail_creator_model(data.Message);
            }
          })
          .fail(function() {
            fail_creator_model('Internal Server Error!');
          })
        } else {
          $.ajax({
            url: "<?php echo site_url('api/save'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {_id: $('#_id').val(), api_name: $('#api_name').val(), api_key: $('#api_key').val(), api_isenable: $('#api_isenable').val()},
          })
          .done(function(data) {
            if (data.Status == 200) {
              success_creator(data.Message);
              $('#showapidata').modal('hide');
              showAPIList()
            } else {
              fail_creator_model(data.Message);
            }
          })
          .fail(function() {
            fail_creator_model('Internal Server Error!');
          })
        }
      }
    });
  });
</script>