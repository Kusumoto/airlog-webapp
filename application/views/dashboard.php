 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <!-- Right side column. Contains the navbar and content of the page -->
 <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
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
                            Applications
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cube"></i>
                    </div>
                    <a href="<?php echo site_url('/applications'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
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
                            Application Functions
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <a href="<?php echo site_url('/functions'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
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
                            Users in System
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?php echo site_url('/authenticate/userlist'); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
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
                            System Warning
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
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
                            All Application Summary Statical
                        </h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#summary_day" data-toggle="tab">Day</a></li>
                              <li><a href="#summary_month" data-toggle="tab">Month</a></li>
                              <li><a href="#summary_year" data-toggle="tab">Year</a></li>
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
                        All Application Used Statical
                    </h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#appuse_day" data-toggle="tab">Day</a></li>
                          <li><a href="#appuse_month" data-toggle="tab">Month</a></li>
                          <li><a href="#appuse_year" data-toggle="tab">Year</a></li>
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
                    Application Function Ratio
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
                <h3 class="box-title">System Management</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <button class="btn btn-danger btn-block" id="shutdown_restart_btn" onclick="shutdown()"><i class="fa fa-power-off"></i> Shutdown</button>
                <button class="btn btn-warning btn-block" onclick="reboot()" id="reboot_restart_btn"><i class="fa fa-refresh"></i> Reboot</button>
                <button class="btn bg-olive btn-block" id="webservice_restart_btn" onclick="webservicerestart()"><i class="ion ion-android-sync"></i> Restart Web Service</button>
                <button class="btn bg-olive btn-block" id="db_restart_btn" onclick="dbrestart()"><i class="ion ion-android-sync"></i> Restart Database Service</button>
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

                <h3 class="box-title">Server Load</h3>
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
                <h3 class="box-title">Service Status</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box box-solid bg-red" id="webservice_status">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-share-alt"></i> Web Service</h3>
                    </div>
                </div>
                <div class="box box-solid bg-red" id="db_status">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-database"></i> Database</h3>
                    </div>
                </div>
                <div class="box box-solid bg-red" id="web_status">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-cloud"></i> Web Application</h3>
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
            $('#graph1_load').show();
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
                '23:00-23:59'
            ]
                graph_column_generate(category,'Total',response,'appuse_day','Total Log in day','Source : SAMF Dataset');
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
                //
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
                //
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })
            setTimeout(function(){
               $('#graph1_load').hide();
           }, 2000);
        }
        function getusedgraph() {
            $('#graph2_load').show();
            $.ajax({
                url: '<?php echo site_url("/dashboard/useddaygraph"); ?>',
                type: 'POST',
                dataType: 'json',
            })
            .done(function(response) {
                chart_4.dataProvider = response;
                chart_4.validateData(); 
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
                chart_5.dataProvider = response;
                chart_5.validateData(); 
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
                chart_6.dataProvider = response;
                chart_6.validateData(); 
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })
            setTimeout(function(){
             $('#graph2_load').hide();
         }, 2000);
        }
        function getratiograph() {
            $('#graph3_load').show();
            $.ajax({
                url: '<?php echo site_url("/dashboard/ratiofunctiongraph"); ?>',
                type: 'POST',
                dataType: 'json',
            })
            .done(function(response) {
                chart_7.dataProvider = response;
                chart_7.validateData(); 
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })
            setTimeout(function(){
             $('#graph3_load').hide();
         }, 2000);
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
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not get cpu loaded!</div>');
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
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not get memory use!</div>');
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
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not get disk use!</div>');
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
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not get web service status!</div>');
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
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not restart web service!</div>');
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
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not restart database!</div>');
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
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not reboot the system!</div>');
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
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Can not shutdown the system!</div>');
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