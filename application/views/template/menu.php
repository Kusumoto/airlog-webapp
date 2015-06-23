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
                            <p>Hello, <?php echo $Firstname; ?></p>

                            <i class="fa fa-circle text-success"></i> Online
                        </div>
                    </div>
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">
                        <li <?php if ($setActiveMenu == 1): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview <?php if ($setActiveMenu == 2): echo "active"; endif; ?>">
                            <a href="#">
                                <i class="fa fa-cube"></i>
                                <span>Applications</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('/applications'); ?>"><i class="fa fa-angle-double-right"></i> Overview</a></li>
                                <li><a href="<?php echo site_url('/applications/report'); ?>"><i class="fa fa-angle-double-right"></i> Log Report</a></li>
                                <li><a href="<?php echo site_url('/applications/manage'); ?>"><i class="fa fa-angle-double-right"></i> Manage</a></li>
                            </ul>
                        </li>
                        <li class="treeview <?php if ($setActiveMenu == 3): echo "active"; endif; ?>">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Application Functions</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('/functions'); ?>"><i class="fa fa-angle-double-right"></i> Overview</a></li>
                                <li><a href="<?php echo site_url('/functions/report'); ?>"><i class="fa fa-angle-double-right"></i> Log Report</a></li>
                                <li><a href="<?php echo site_url('/functions/manage'); ?>"><i class="fa fa-angle-double-right"></i> Manage</a></li>
                            </ul>
                        </li>
                        <!--
                        <li class="treeview <?php if ($setActiveMenu == 4): echo "active"; endif; ?>">
                            <a href="#">
                                <i class="fa fa-tasks"></i>
                                <span>System</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> Overview</a></li>
                                <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Warning</a></li>
                            </ul>
                        </li>
                        -->
                        <li  <?php if ($setActiveMenu == 5): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/authenticate/userlist'); ?>">
                                <i class="ion ion-person"></i> <span>Users Management</span>
                            </a>
                        </li>
                        <li <?php if ($setActiveMenu == 6): echo "class=\"active\""; endif; ?>>
                            <a href="<?php echo site_url('/api'); ?>">
                                <i class="ion ion-code"></i> <span>API Management</span>
                            </a>
                        </li>
                        <!--
                        <li  <?php if ($setActiveMenu == 6): echo "class=\"active\""; endif; ?>>
                            <a href="index.html">
                                <i class="fa fa-cogs"></i> <span>Setting</span>
                            </a>
                        </li>
                        -->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>