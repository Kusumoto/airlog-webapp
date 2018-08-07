<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->lang->line("menu_hello"); ?>, <?php echo $Firstname; ?></p>

                            <i class="fa fa-circle text-success"></i> <?php echo $this->lang->line("menu_online"); ?>
                        </div>
                    </div>
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">
                        <li <?php if ($setActiveMenu == 1): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo $this->lang->line("menu_dashboard"); ?></span>
                            </a>
                        </li>
                        <li class="treeview <?php if ($setActiveMenu == 2): echo "active"; endif; ?>">
                            <a href="#">
                                <i class="fa fa-cube"></i>
                                <span><?php echo $this->lang->line("menu_applications"); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('/applications'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line("overview"); ?></a></li>
                                <li><a href="<?php echo site_url('/applications/report'); ?>"><i class="fa fa-angle-double-right"></i>  <?php echo $this->lang->line("menu_log_report"); ?></a></li>
                                <li><a href="<?php echo site_url('/applications/manage'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line("menu_manage"); ?></a></li>
                            </ul>
                        </li>
                        <li class="treeview <?php if ($setActiveMenu == 3): echo "active"; endif; ?>">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span><?php echo $this->lang->line("menu_application_functions"); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('/functions'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line("overview"); ?></a></li>
                                <li><a href="<?php echo site_url('/functions/report'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line("menu_log_report"); ?></a></li>
                                <li><a href="<?php echo site_url('/functions/manage'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line("menu_manage"); ?></a></li>
                            </ul>
                        </li>
                        <li  <?php if ($setActiveMenu == 5): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/authenticate/userlist'); ?>">
                                <i class="ion ion-person"></i> <span><?php echo $this->lang->line("menu_users_management"); ?></span>
                            </a>
                        </li>
                        <li <?php if ($setActiveMenu == 6): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/api'); ?>">
                                <i class="ion ion-code"></i> <span><?php echo $this->lang->line("menu_api_management"); ?></span>
                            </a>
                        </li>
                        </li>
                        <!-- New Change -->
                        <li <?php if ($setActiveMenu == 7): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/setting'); ?>">
                                <i class="fa fa-cog"></i></i> <span><?php echo $this->lang->line("menu_setting"); ?></span>
                            </a>
                        </li>
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>