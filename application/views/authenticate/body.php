<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container-fluid" style="height:100px; background-color:#2ADBFF;">
  <div class="container">
      <img src="<?php echo base_url(); ?>assets/img/airlog_logo.png" class="img_samf" alt="No image samf logo" /> <span class="content_header">Debug your Software with AirLog</span>
  </div>
</div>
</div>
<div class="container" style="margin-top:2%">
<div class="col-md-offset-3 hidden-xs">
  <!-- <div class="col-md-1">
      <img src="<?php echo base_url(); ?>assets/img/samf-logo.png" class="img_samf" alt="No image samf logo" />
   </div> --> 
</div> 
  <div class="row">
    <div class="col-xs-12  col-md-12">
      <!-- <div class="panel panel-danger"> -->
        <!-- <div class="panel-heading set-heading">SAMF - Login</div> -->
        <!-- <div class="panel-body set-login"> -->
          <!-- <div class="col-md-12" >
            <img src="<?php echo base_url(); ?>assets/img/user.png" class="user_login" alt="No image" />
          </div> -->
          <div class="col-xs-12 col-md-offset-2 col-md-8 control_login">
            <div class="row">
              <?php if (isset($ErrorMessage)): ?><div class="col-md-offset-3 col-md-6 alert alert-danger set-error"><?php echo $ErrorMessage; ?></div><?php endif; ?>
            <?php echo form_open('',array('id' => 'form_login')); ?>
            </div>
            <div class="inner-addon right-addon set-user col-md-offset-1 col-md-10">
              <i class="glyphicon glyphicon-user"></i>
              <input type="text" name="username" id="username" placeholder="Username" class="form-control"  value="<?php echo set_value('username'); ?>">
              <?php echo form_error('username','<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="inner-addon right-addon set-pass col-md-offset-1 col-md-10">
              <i class="glyphicon glyphicon-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" class="form-control "  value="<?php echo set_value('password'); ?>"> 
              <?php echo form_error('password','<p class="text-danger">', '</p>'); ?>
            </div>
            <div style="text-align:center"><button class="btn btn-login set-btn-login" type="submit"><span class="glyphicon glyphicon-lock"></span> Login</button>
              <button class="btn btn-reset" type="reset"><span class="glyphicon glyphicon-repeat"> </span>Reset</button></div>
              <?php echo form_close(); ?>
            </div>
          </div>
          <!-- <div class="panel-footer">&copy; 2014-2016 AirLog Dev Team</div> -->
        <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>