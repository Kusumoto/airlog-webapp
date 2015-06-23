<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container" style="margin-top:10%">
  <div class="row">
    <div class="col-md-6">

    </div>
    <div class="col-md-6">
      <div class="panel panel-warning">
        <div class="panel-heading">Software Analysis and Maintenance Framework - Login</div>
        <div class="panel-body">
          <?php if (isset($ErrorMessage)): ?><div class="alert alert-danger"><?php echo $ErrorMessage; ?></div><?php endif; ?>
          <?php echo form_open('',array('id' => 'form_login')); ?>
          <div class="form-group">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" placeholder="Username" class="form-control"  value="<?php echo set_value('username'); ?>">
            <?php echo form_error('username','<p class="text-danger">', '</p>'); ?>
          </div>
          <div class="form-group">
            <label for="username">Password : </label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control"  value="<?php echo set_value('password'); ?>">
            <?php echo form_error('password','<p class="text-danger">', '</p>'); ?>
          </div>
          <div style="text-align:center"><button class="btn btn-info" type="submit">Login</button>
            <button class="btn btn-danger" type="reset">Reset</button></div>
            <?php echo form_close(); ?>
          </div>
          <div class="panel-footer">&copy; 2014 SAMF Dev Team</div>
        </div>
      </div>
    </div>
  </div>