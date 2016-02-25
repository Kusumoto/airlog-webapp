<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container" style="margin-top:2%">
  <div class="row">
    <div class="col-sx-12 col-md-offset-3 col-md-6">
      <div class="panel panel-danger">
        <div class="panel-heading set-heading">Software Analysis and Maintenance Framework - Login</div>
        <div class="panel-body set-login">
          <div class="col-md-12" >
            <img src="<?php echo base_url(); ?>assets/img/user.png" class="user_login" alt="No image" />
          </div>
          <?php if (isset($ErrorMessage)): ?><div class="alert alert-danger"><?php echo $ErrorMessage; ?></div><?php endif; ?>
          <?php echo form_open('',array('id' => 'form_login')); ?>
          <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username" class="form-control set_input"  value="<?php echo set_value('username'); ?>">
            <?php echo form_error('username','<p class="text-danger">', '</p>'); ?>
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password" class="form-control set_input"  value="<?php echo set_value('password'); ?>">
            <?php echo form_error('password','<p class="text-danger">', '</p>'); ?>
          </div>
          <div style="text-align:center"><button class="btn btn-login set-btn-login" type="submit"><span class="glyphicon glyphicon-lock"></span> Login</button>
            <button class="btn btn-reset" type="reset"><span class="glyphicon glyphicon-repeat"> </span>Reset</button></div>
            <?php echo form_close(); ?>
          </div>
          <div class="panel-footer">&copy; 2014-2016 SAMF Dev Team</div>
        </div>
      </div>
    </div>
  </div>