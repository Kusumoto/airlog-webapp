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
      <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-code"></i>
          <h3 class="box-title">
            Setting your system
          </h3>
        </div>
        <div class="box-body ">
          <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Select languages
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="setting/change_language/english">English</a></li>
              <li><a href="setting/change_language/thai">ไทย</a></li>
            </ul>
          </div>
        </div>
         <div class="modal-footer clearfix">
              <input type="hidden" id="_id" value="">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Save</button>
            </div>
    </div>
  </div>
</div>
</section>
</aside><!-- /.right-side -->