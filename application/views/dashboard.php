 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <!-- Right side column. Contains the navbar and content of the page -->
 <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->lang->line("dash_dash"); ?>
            <small><?php echo $this->lang->line("dash_con_panel"); ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
            <li class="active"><?php echo $this->lang->line("dash_dash"); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div id="place-alert"></div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php echo $countApp; ?>
                        </h3>
                        <p>
                            <?php echo $this->lang->line("dash_apps"); ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cube"></i>
                    </div>
                    <a href="<?php echo site_url('/applications'); ?>" class="small-box-footer">
                        <?php echo $this->lang->line("dash_more_info"); ?> <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php echo $countFunc; ?>
                        </h3>
                        <p>
                            <?php echo $this->lang->line("dash_app_funce"); ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <a href="<?php echo site_url('/functions'); ?>" class="small-box-footer">
                        <?php echo $this->lang->line("dash_more_info"); ?> <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo $countUser; ?>
                        </h3>
                        <p>
                            <?php echo $this->lang->line("dash_users_in_sys"); ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?php echo site_url('/authenticate/userlist'); ?>" class="small-box-footer">
                        <?php echo $this->lang->line("dash_more_info"); ?> <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            0
                        </h3>
                        <p>
                            <?php echo $this->lang->line("dash_sys_warning"); ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <?php echo $this->lang->line("dash_more_info"); ?> <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

        <!-- top row -->
        <div class="row">
            <div class="col-xs-12 connectedSortable">
                <div class="box box-primary">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="getsummarygraph()"><i class="fa fa-refresh"></i></button>
                        </div><!-- /. tools -->

                        <i class="fa fa-cube"></i>
                        <h3 class="box-title">
                            <?php echo $this->lang->line("dash_all_app_summ_stat"); ?>
                        </h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#summary_day" data-toggle="tab"><?php echo $this->lang->line("dash_day"); ?></a></li>
                              <li><a href="#summary_month" data-toggle="tab"><?php echo $this->lang->line("dash_month"); ?></a></li>
                              <li><a href="#summary_year" data-toggle="tab"><?php echo $this->lang->line("dash_year"); ?></a></li>
                          </ul>
                          <div class="tab-content no-padding">
                            <div class="tab-pane active chart" id="summary_day" style="height: 400px;"></div>
                            <div class="tab-pane chart" id="summary_month" style="height: 400px;"></div>
                            <div class="tab-pane chart" id="summary_year" style="height: 400px;"></div>
                        </div><!-- /.tab-content -->
                    </div>
                </div><!-- /.box-body -->
                <div class="overlay" style="display:none" id="graph1_load">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
            <!-- /.box -->
        </div><!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable"> 
            <!-- Map box -->
            <div class="box box-primary">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="getusedgraph()"><i class="fa fa-refresh"></i></button>
                    </div><!-- /. tools -->

                    <i class="fa fa-cube"></i>
                    <h3 class="box-title">
                        <?php echo $this->lang->line("dash_all_app_used_stat"); ?>
                    </h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#appuse_day" data-toggle="tab"><?php echo $this->lang->line("dash_day"); ?></a></li>
                          <li><a href="#appuse_month" data-toggle="tab"><?php echo $this->lang->line("dash_month"); ?></a></li>
                          <li><a href="#appuse_year" data-toggle="tab"><?php echo $this->lang->line("dash_year"); ?></a></li>
                      </ul>
                      <div class="tab-content no-padding">
                        <div class="chart tab-pane active" id="appuse_day" style="height: 300px;"></div><!-- /.tab-pane -->
                        <div class="chart tab-pane" id="appuse_month" style="height: 300px;"></div><!-- /.tab-pane -->
                        <div class="chart tab-pane" id="appuse_year" style="height: 300px;"></div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div>
            </div><!-- /.box-body -->
            <div class="overlay" style="display:none" id="graph2_load">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
        <!-- /.box -->
        <div class="box box-primary">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="getratiograph()"><i class="fa fa-refresh"></i></button>
                </div><!-- /. tools -->

                <i class="fa fa-cube"></i>
                <h3 class="box-title">
                    <?php echo $this->lang->line("dash_app_func_ratio"); ?>
                </h3>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="ratio" style="height: 300px;"></div>
            </div><!-- /.box-body -->
            <div class="overlay" style="display:none" id="graph3_load">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
        <!-- /.box -->

    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-6 connectedSortable">
        <div class="box box-danger" id="loading-example3">
            <div class="box-header">
                <i class="fa fa-life-ring"></i>
                <h3 class="box-title"><?php echo $this->lang->line("dash_sys_manage"); ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <button class="btn btn-danger btn-block" id="shutdown_restart_btn" onclick="shutdown()"><i class="fa fa-power-off"></i> <?php echo $this->lang->line("dash_shutdown"); ?></button>
                <button class="btn btn-warning btn-block" onclick="reboot()" id="reboot_restart_btn"><i class="fa fa-refresh"></i> <?php echo $this->lang->line("dash_reboot"); ?></button>
                <button class="btn bg-olive btn-block" id="webservice_restart_btn" onclick="webservicerestart()"><i class="ion ion-android-sync"></i> <?php echo $this->lang->line("dash_re_web_serv"); ?></button>
                <button class="btn bg-olive btn-block" id="db_restart_btn" onclick="dbrestart()"><i class="ion ion-android-sync"></i> <?php echo $this->lang->line("dash_re_db_serv"); ?></button>
            </div><!-- /.box-body -->
            <div class="overlay" style="display:none" id="graph6_load">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div><!-- /.box -->      
        <!-- Box (with bar chart) -->
        <div class="box box-danger" id="loading-example1">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="reloadserverload();"><i class="fa fa-refresh"></i></button>
                </div><!-- /. tools -->
                <i class="fa fa-cloud"></i>

                <h3 class="box-title"><?php echo $this->lang->line("dash_server_load"); ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" id="cpu_load" data-readonly="true" value="0" data-width="60" data-height="60" data-fgColor="#f56954"/>
                        <div class="knob-label">CPU</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" id="disk_use" data-readonly="true" value="0" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                        <div class="knob-label">Disk</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                        <input type="text" class="knob" id="mem_use" data-readonly="true" value="0" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                        <div class="knob-label">RAM</div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="overlay" style="display:none" id="graph4_load">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div><!-- /.box ---->
        <!-- Box (with bar chart) -->
        <div class="box box-danger" id="loading-example2">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="reloadservice()"><i class="fa fa-refresh"></i></button>
                </div><!-- /. tools -->
                <i class="fa fa-toggle-on"></i>
                <h3 class="box-title"><?php echo $this->lang->line("dash_serv_status"); ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box box-solid bg-red" id="webservice_status">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-share-alt"></i> <?php echo $this->lang->line("dash_web_serv"); ?></h3>
                    </div>
                </div>
                <div class="box box-solid bg-red" id="db_status">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-database"></i> <?php echo $this->lang->line("dash_db"); ?></h3>
                    </div>
                </div>
                <div class="box box-solid bg-red" id="web_status">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-cloud"></i> <?php echo $this->lang->line("dash_web_app"); ?></h3>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="overlay" style="display:none" id="graph5_load">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div><!-- /.box --> 
    </section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">

    function getsummarygraph() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/summarydaygraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            category = [
            '00:00-00:59',
            '01:00-01:59',
            '02:00-02:59',
            '03:00-03:59',
            '04:00-04:59',
            '05:00-05:59',
            '06:00-06:59',
            '07:00-07:59',
            '08:00-08:59',
            '09:00-09:59',
            '10:00-10:59',
            '11:00-11:59',
            '12:00-12:59',
            '13:00-13:59',
            '14:00-14:59',
            '15:00-15:59',
            '16:00-16:59',
            '17:00-17:59',
            '18:00-18:59',
            '19:00-19:59',
            '20:00-20:59',
            '21:00-21:59',
            '22:00-22:59',
            '23:00-23:59',
            '24:00'
            ]
            graph_column_generate(category,'Total',response,'summary_day','<?php echo $this->lang->line("dash_total_log_in_day"); ?>','Source : SAMF Dataset');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })

        $.ajax({
            url: '<?php echo site_url("/dashboard/summarymonthgraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            var date_data = [];
            for (var i = 1; i <= response.lastday; i++) {
                date_data.push(i);
            };
            graph_column_generate(date_data,'Total',response.data,'summary_month','<?php echo $this->lang->line("dash_total_log_in_month"); ?>','Source : SAMF Dataset');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })

        $.ajax({
            url: '<?php echo site_url("/dashboard/summaryyeargraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            category = [
            '<?php echo $this->lang->line("jan"); ?>',
            '<?php echo $this->lang->line("feb"); ?>',
            '<?php echo $this->lang->line("mar"); ?>',
            '<?php echo $this->lang->line("apil"); ?>',
            '<?php echo $this->lang->line("may"); ?>',
            '<?php echo $this->lang->line("june"); ?>',
            '<?php echo $this->lang->line("july"); ?>',
            '<?php echo $this->lang->line("aug"); ?>',
            '<?php echo $this->lang->line("sep"); ?>',
            '<?php echo $this->lang->line("oct"); ?>',
            '<?php echo $this->lang->line("nov"); ?>',
            '<?php echo $this->lang->line("dec"); ?>'
            ]
            graph_column_generate(category,'Total',response,'summary_year','<?php echo $this->lang->line("dash_total_log_in_year"); ?>','Source : SAMF Dataset');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
    }

    function getusedgraph() {
        var line_color = ['#9A490B'];
        $.ajax({
            url: '<?php echo site_url("/dashboard/useddaygraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            category = [
            '00:00-00:59',
            '01:00-01:59',
            '02:00-02:59',
            '03:00-03:59',
            '04:00-04:59',
            '05:00-05:59',
            '06:00-06:59',
            '07:00-07:59',
            '08:00-08:59',
            '09:00-09:59',
            '10:00-10:59',
            '11:00-11:59',
            '12:00-12:59',
            '13:00-13:59',
            '14:00-14:59',
            '15:00-15:59',
            '16:00-16:59',
            '17:00-17:59',
            '18:00-18:59',
            '19:00-19:59',
            '20:00-20:59',
            '21:00-21:59',
            '22:00-22:59',
            '23:00-23:59',
            '24:00'
            ]
            graph_line_generate(category,'Total',response,'appuse_day','<?php echo $this->lang->line("dash_total_all_func_use_in_day"); ?>','Source : SAMF Dataset',line_color);
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })

        $.ajax({
            url: '<?php echo site_url("/dashboard/usedmonthgraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
           var date_data = [];
            for (var i = 1; i <= response.lastday; i++) {
                date_data.push(i);
            };
            graph_line_generate(date_data,'Total',response.data,'appuse_month','<?php echo $this->lang->line("dash_total_all_func_use_in_month"); ?>','Source : SAMF Dataset',line_color);
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
        
        $.ajax({
            url: '<?php echo site_url("/dashboard/usedyeargraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            category = [
            '<?php echo $this->lang->line("jan"); ?>',
            '<?php echo $this->lang->line("feb"); ?>',
            '<?php echo $this->lang->line("mar"); ?>',
            '<?php echo $this->lang->line("apil"); ?>',
            '<?php echo $this->lang->line("may"); ?>',
            '<?php echo $this->lang->line("june"); ?>',
            '<?php echo $this->lang->line("july"); ?>',
            '<?php echo $this->lang->line("aug"); ?>',
            '<?php echo $this->lang->line("sep"); ?>',
            '<?php echo $this->lang->line("oct"); ?>',
            '<?php echo $this->lang->line("nov"); ?>',
            '<?php echo $this->lang->line("dec"); ?>'
            ]
            graph_line_generate(category,'Total',response,'appuse_year','<?php echo $this->lang->line("dash_total_all_func_use_in_year"); ?>','Source : SAMF Dataset',line_color);
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
    }
    function getratiograph() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/ratiofunctiongraph"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            graph_pie_generate(response,'ratio','<?php echo $this->lang->line("dash_ratio_func_in_sys"); ?>','Source : SAMF Dataset','Function',null);
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
    }
    function getcpuload() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/getcpuload"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            $('#cpu_load').val(response.cpu)
            $('#cpu_load').trigger('change');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4><?php echo $this->lang->line("dash_can_not_get_cpu"); ?></div>');
        })
    }
    function getmemuse() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/getmemuse"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            $('#mem_use').val(response.memory)
            $('#mem_use').trigger('change');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4><?php echo $this->lang->line("dash_can_not_get_memory"); ?></div>');
        })
    }
    function getdiskuse() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/getdiskuse"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            $('#disk_use').val(response.disk)
            $('#disk_use').trigger('change');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4><?php echo $this->lang->line("dash_can_not_get_disk"); ?></div>');
        })
    }
    function reloadserverload() {
        $('#graph4_load').show();
        getcpuload();
        getmemuse();
        getdiskuse();
        setTimeout(function(){
           $('#graph4_load').hide();
       }, 2000);
    }
    function getwebservicestatus() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/chkwebservice"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            if (response.status == 200) {
                $('#webservice_status').prop('class','box box-solid bg-green');
            } else {
                $('#webservice_status').prop('class','box box-solid bg-red');
            }
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4><?php echo $this->lang->line("dash_can_not_get_webser"); ?></div>');
        })
    }
    function getdbstatus() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/chkdb"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            $('#db_status').prop('class','box box-solid bg-green');
        })
        .fail(function() {
            $('#db_status').prop('class','box box-solid bg-red');
        })
    }
    function getwebstatus() {
        $.ajax({
            url: '<?php echo site_url("/dashboard/chkweb"); ?>',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(response) {
            if (response.status == 200) {
                $('#web_status').prop('class','box box-solid bg-green');
            } else {
                $('#web_status').prop('class','box box-solid bg-red');
            }
        })
        .fail(function() {
            $('#web_status').prop('class','box box-solid bg-red');
        })
    }
    function reloadservice() {
        $('#graph5_load').show();
        getwebservicestatus();
        getdbstatus();
        getwebstatus();
        setTimeout(function(){
           $('#graph5_load').hide();
       }, 2000);
    }
    function webservicerestart() {
     $('#graph6_load').show();
     $('#webservice_restart_btn').prop('disabled','disabled');
     $.ajax({
        url: '<?php echo site_url("/dashboard/webservicerestart"); ?>',
        type: 'POST',
        dataType: 'json',
    })
     .done(function(response) {
        if (response.status == 200) {
            alert('Web Service restart successful!');
            $('#webservice_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        } else {
            alert('Web Service restart failed!')
            $('#webservice_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        }
    })
     .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4></h4><?php echo $this->lang->line("dash_can_not_re_webser"); ?></div>');
        $('#webservice_restart_btn').prop('disabled','');
        $('#graph6_load').hide();
    })
 }
 function dbrestart() {
    $('#graph6_load').show();
    $('#db_restart_btn').prop('disabled','disabled');
    $.ajax({
        url: '<?php echo site_url("/dashboard/dbrestart"); ?>',
        type: 'POST',
        dataType: 'json',
    })
    .done(function(response) {              
        if (response.status == 200) {
            alert('Database restart successful!');
            $('#db_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        } else {
            alert('Database restart failed!')
            $('#db_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        }
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4></h4></h4><?php echo $this->lang->line("dash_can_not_re_db"); ?></div>');
        $('#db_restart_btn').prop('disabled','');
        $('#graph6_load').hide();
    })
}
function reboot() {
    $('#graph6_load').show();
    $('#reboot_restart_btn').prop('disabled','disabled');
    $.ajax({
        url: '<?php echo site_url("/dashboard/reboot"); ?>',
        type: 'POST',
        dataType: 'json',
    })
    .done(function(response) {              
        if (response.status == 200) {
            alert('Reboot successful!');
            $('#reboot_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        } else {
            alert('Reboot failed!')
            $('#reboot_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        }
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?><?php echo $this->lang->line("dash_can_not_reboot_sys"); ?></div>');
        $('#reboot_restart_btn').prop('disabled','');
        $('#graph6_load').hide();
    })
}
function shutdown() {
    $('#graph6_load').show();
    $('#shutdown_restart_btn').prop('disabled','disabled');
    $.ajax({
        url: '<?php echo site_url("/dashboard/shutdown"); ?>',
        type: 'POST',
        dataType: 'json',
    })
    .done(function(response) {              
        if (response.status == 200) {
            alert('Shutdown successful!');
            $('#shutdown_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        } else {
            alert('Shutdown failed!')
            $('#shutdown_restart_btn').prop('disabled','');
            $('#graph6_load').hide();
        }
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line("dash_alert"); ?></h4><?php echo $this->lang->line("dash_can_not_shut_sys"); ?></div>');
        $('#shutdown_restart_btn').prop('disabled','');
        $('#graph6_load').hide();
    })
}


$(document).ready(function() {    
   $(".knob").knob();
   setInterval("getcpuload();",5000);
   setInterval("getmemuse();",5000);
   setInterval("getdiskuse();",5000);
   setInterval("getwebservicestatus();",100000);
   setInterval("getdbstatus();",100000);
   setInterval("getwebstatus();",100000);
   $('ul.nav a').on('shown.bs.tab', function (e) {
        getsummarygraph();
        getusedgraph();
   });
   getsummarygraph();
   getusedgraph();
   getratiograph();
   getcpuload();
   getmemuse();
   getdiskuse();
   getwebservicestatus();
   getdbstatus();
   getwebstatus();
});
</script>