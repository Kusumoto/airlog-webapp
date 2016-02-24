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
          <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Select languages
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="setting/change_language/english">English</a></li>
                <li><a href="setting/change_language/thai">ไทย</a></li>
              </ul>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Languages</h3></div>
              <div class="panel-body">
                <div class="pull-right box-tools">
                  <button class="btn btn-primary" id="addnewlang" type="button" data-target="#showlangdata" data-toggle="modal"><i class="fa fa-plus"></i> New Language</button>
                </div>
                <div class="table-responsive" style="margin-top: 50px;">
                  <table class="table table-hover" id="table_langlist">
                    <thead>
                      <tr>
                        <th width="40%">Language</th>
                        <th width="40%">Language Prefix</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="api_link">API</label>
              <input type="text" id="sys_user" name="sys_user" placeholder="API Link" class="form-control" value=""/>
            </div>
          </div>
          <div class="modal-footer clearfix">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>
        <?php form_close(); ?>
      </div>
    </div>
  </section>
</aside><!-- /.right-side -->

<div class="modal fade" id="showlangdata" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Language Editor</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Language Name</span>
            <input name="app_token" id="app_token" type="text" class="form-control" placeholder="Language Name">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Language Prefix</span>
            <input name="app_token" id="app_token" type="text" class="form-control" placeholder="Language Prefix">
          </div>
        </div>
        <div class="form-group">
          <textarea rows="13" id="codeeditor"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
          output += '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit Language" onclick="getLangDetail(\''+ value._id +'\')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-danger" data-toggle="tooltip" title="Remove Language" onclick="deleteLang(\'' + value._id + '\')"><i class="fa fa-trash-o"></i></button></div></td>'
          output += '</tr>';
        });
        $('.spinner').hide();
        $('#table_langlist').append(output);
        $('#table_langlist').find('[data-toggle="tooltip"]').tooltip()
      });
    }, 1000);
  }

  $(document).ready(function() {
    showLangList()
    var editor = CodeMirror.fromTextArea(document.getElementById("codeeditor"), {
      lineNumbers: true,
      mode: "application/x-httpd-php",
      indentWithTabs: true
    });
  });

</script>