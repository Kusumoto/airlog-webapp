<aside class="right-side">
	<section class="content-header">
		<h1>
			Setting 
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>Setting</li>
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
            Setting your system
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
            <div class="form-group">
              <label for="api_link">Select languages</label>
               <select class="form-control" id="app_agent" name="app_agent">
                
              </select>
            </div>
            <div class="form-group">
              <label for="api_link">API Link</label>
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