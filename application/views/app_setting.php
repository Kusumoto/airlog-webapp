<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<aside class="right-side">
	<section class="content-header">
		<h1>
			<?php echo $this->lang->line("setting_set"); ?>  
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
			<li><?php echo $this->lang->line("setting_set"); ?></li>
		</ol>
	</section>
	<!-- Main content -->
  <section class="content">
   <div class="row">
    <div class="col-xs-12">
      <div id="place-alert"></div>
      <?php echo form_open("",array("id" => "form_setting")); ?>
      <div class="box box-primary">
        <div class="box-header">
          <i class="fa fa-cog"></i>
          <h3 class="box-title">
            <?php echo $this->lang->line("setting_set_your_sys"); ?>
          </h3>
        </div>
        <div class="box-body">
          <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
          </div>
          <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $this->lang->line("setting_select_lang"); ?>
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="setting/change_language/english">English</a></li>
                <li><a href="setting/change_language/thai">ไทย</a></li>
              </ul>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title"><?php echo $this->lang->line("setting_langs"); ?></h3></div>
              <div class="panel-body">
                <div class="pull-right box-tools">
                  <button class="btn btn-primary" id="addnewlang" type="button" data-target="#showlangdata" data-toggle="modal"><i class="fa fa-plus"></i> <?php echo $this->lang->line("setting_new_lang"); ?></button>
                </div>
                <div class="table-responsive" style="margin-top: 50px;">
                  <table class="table table-hover" id="table_langlist">
                    <thead>
                      <tr>
                        <th width="40%"><?php echo $this->lang->line("setting_lang"); ?></th>
                        <th width="40%"><?php echo $this->lang->line("setting_lang_prefix"); ?></th>
                        <th width="20%"><?php echo $this->lang->line("setting_action"); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="api_link"><?php echo $this->lang->line("setting_api"); ?></label>
              <input type="text" id="sys_user" name="sys_user" placeholder="<?php echo $this->lang->line("setting_api_link"); ?>" class="form-control" value=""/>
            </div>
          </div>
          <div class="modal-footer clearfix">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $this->lang->line("setting_save"); ?></button>
          </div>
        </div>
        <?php form_close(); ?>
      </div>
    </div>
  </section>
</aside><!-- /.right-side -->

<div class="modal fade" id="showlangdata" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $this->lang->line("setting_lang_editor"); ?></h4>
      </div>
      <div class="modal-body">
        <div id="place-alert-model"></div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><?php echo $this->lang->line("setting_lang_name"); ?></span>
            <input name="lang_name" id="lang_name" type="text" class="form-control" placeholder="<?php echo $this->lang->line("setting_lang_name"); ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><?php echo $this->lang->line("setting_lang_prefix"); ?></span>
            <input name="lang_prefix" id="lang_prefix" type="text" class="form-control" placeholder="<?php echo $this->lang->line("setting_lang_prefix"); ?>">
          </div>
        </div>
        <div class="form-group">
          <textarea rows="13" id="codeeditor">
          </textarea>
        </div>
        <small><span style="color:#DA1C1C">*</span> <?php echo $this->lang->line("setting_warning"); ?></small>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="lang_id" value="">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("setting_close"); ?></button>
        <button type="button" class="btn btn-primary" id="btn-savesetting"><?php echo $this->lang->line("setting_save_changes"); ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

  function showLangList() {
    $('#table_langlist tbody tr').remove();
    $('.spinner').show();
    setTimeout(function(){
      $.getJSON("<?php echo site_url('/setting/getlanglist') ?>", function(data) {
        var output = '';
        $.each(data, function(index, value){      
          output += '<tr id=func_"' + value._id + '">';
          output += '<td>' + value.lang_name + '</td>';
          output += '<td>' + value.lang_prefix + '</td>';
          output += '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit Language" type="button" onclick="getLangDetail(\''+ value._id +'\')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-danger" data-toggle="tooltip" type="button" title="Remove Language" onclick="deleteLang(\'' + value._id + '\')"><i class="fa fa-trash-o"></i></button></div></td>'
          output += '</tr>';
        });
        $('.spinner').hide();
        $('#table_langlist').append(output);
        $('#table_langlist').find('[data-toggle="tooltip"]').tooltip()
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
    fail_creator_model = function(message){
      $('#place-alert-model').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
    };

    showLangList()
    var editor = CodeMirror.fromTextArea(document.getElementById("codeeditor"), {
      lineNumbers: true,
      matchBrackets: true,
      mode: "application/x-httpd-php",
      htmlMode: true
    });

    getLangDetail = function(id) {
      $.ajax({
        url: '<?php echo site_url('/setting/getlangdetail'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: id},
      })
      .done(function(data) {
        $('#place-alert-model').html('');
        $('#lang_prefix').prop('disabled','disabled');
        $('#lang_name').prop('disabled','disabled');
        $('#lang_prefix').val(data.lang_prefix);
        $('#lang_name').val(data.lang_name);
        $('#lang_id').val(data._id);
        editor.setValue(data.lang_file);
        setTimeout(function() {
         editor.refresh();
       }, 500);
        $('#showlangdata').modal('show');
      })
      .fail(function() {
        fail_creator('Internal Server Error!');
      })   
    } 

    deleteLang = function(id) {
      $.ajax({
        url: '<?php echo site_url('/setting/deletelang'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: id},
      })
      .done(function(data) {
        if (data.status == 403)
          fail_creator_model(data.message);
        else {
          success_creator('Delete language file successful');
        }
      })
      .fail(function() {
        fail_creator('Internal Server Error!');
      })
    }

    $('#btn-savesetting').click(function(event) {
      if ($('#lang_id').val()) {
        $.ajax({
          url: '<?php echo site_url('/setting/update'); ?>',
          type: 'POST',
          dataType: 'json',
          data: {_id: $('#lang_id').val(), lang_name: $('#lang_name').val(), lang_prefix: $('#lang_prefix').val()},
        })
        .done(function(data) {
          if (data.status == 403)
            fail_creator_model(data.message);
          else {
            $('#showlangdata').modal('hide');
            success_creator('Update language successful');
          }
        })
        .fail(function() {
          fail_creator_model('Internal Server Error!');
        })
      } else {
        $.ajax({
          url: '<?php echo site_url('/setting/addlang'); ?>',
          type: 'POST',
          dataType: 'json',
          data: {lang_name: $('#lang_name').val(), lang_prefix: $('#lang_prefix').val(), lang_data: editor.getValue()}
        })
        .done(function(data) {
          if (data.status == 403)
            fail_creator_model(data.message);
          else {
            $('#showlangdata').modal('hide');
            success_creator('Add new language successful');
          }
          
        })
        .fail(function() {
          fail_creator_model('Internal Server Error!');
        })
      }
    });   

    $('#addnewlang').click(function(event) {
      $('#place-alert-model').html('');
      $('#lang_prefix').val('');
      $('#lang_name').val('');
      $('#lang_id').val('');
      $('#lang_prefix').removeAttr('disabled');
      $('#lang_name').removeAttr('disabled');
      $.ajax({
        url: '<?php echo site_url('/setting/getDefaultLang'); ?>',
        type: 'POST',
        dataType: 'json',
      })
      .done(function(data) {
        editor.setValue(data.data);
        setTimeout(function() {
         editor.refresh();
       }, 100);
      })
      .fail(function() {
       $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
     })
    });
  });

</script>