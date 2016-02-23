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
                <div class="table-responsive">
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
  });

</script>