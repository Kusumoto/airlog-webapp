<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $application_detail->getApplicationName(); ?>'s Overview
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Application</li>
            <li>Overview</li>
            <li class="active"><?php echo $application_detail->getApplicationName(); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- top row -->
       <div class="row">
        <div class="col-md-12">
            <div id="place-alert"></div>
        </div>

        <div class="col-md-6">
            <!-- Box (with bar chart) -->
            <div class="box box-primary">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="box-title"><i class="fa fa-cog"></i> Display Setting</div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="text-center" id="loading" style="display:none"><h1><i class="ion ion-loading-a"></i></h1></div>
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="log_datepicker" name="daterange" value="<?php echo date('Y-m-d'); ?>"/>
                            <div class="input-group-btn">
                                <button type='submit' name='search' id="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <!-- Box (with bar chart) -->
                <div class="box box-primary">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="box-title"><i class="fa fa-list"></i> Quick Menu</div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="text-center" id="loading" style="display:none"><h1><i class="ion ion-loading-a"></i></h1></div>
                        <a class="btn btn-app" href="<?php echo site_url('/functions/'); ?>">
                            <i class="fa fa-terminal"></i> Function
                        </a>
                        <a class="btn btn-app" href="<?php echo site_url('/applications/report'); ?>">
                            <i class="fa fa-exclamation-triangle"></i> Report
                        </a>
                        <a class="btn btn-app" id="agent_control">

                            <?php if ($application_detail->getApplicationAgent() == 'disable'): ?> <i class="fa fa-check"></i> Enable Agent <?php else: ?>
                                <i class="fa fa-times"></i> Disable Agent
                            <?php endif; ?>    
                        </a>
                        <a class="btn btn-app" href="<?php echo site_url('/applications/manage'); ?>">
                            <i class="fa fa-edit"></i> Edit App
                        </a>
                        <a class="btn btn-app" id="remove_app">
                            <i class="fa fa-trash-o"></i> Remove App
                        </a>
                    </div>
                    <div class="overlay" style="display:none" id="quick_load">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="getsummarygraph()"><i class="fa fa-refresh"></i></button>
                    </div><!-- /. tools -->

                    <i class="fa fa-cube"></i>
                    <h3 class="box-title">
                        Application Summary Statical
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
<div class="row">
    <div class="col-lg-6"> 
        <!-- Map box -->
        <div class="box box-primary">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="getusedgraph()"><i class="fa fa-refresh"></i></button>
                </div><!-- /. tools -->

                <i class="fa fa-cube"></i>
                <h3 class="box-title">
                    Application Used Statical
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
</div>
<div class="col-lg-6"> 
    <div class="box box-primary">
        <div class="box-header">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" onclick="getratiograph()"><i class="fa fa-refresh"></i></button>
            </div><!-- /. tools -->

            <i class="fa fa-bullhorn"></i>
            <h3 class="box-title">
                Application Summary Ratio
            </h3>
        </div>
        <div class="box-body chart-responsive">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#ratio_day" data-toggle="tab">Day</a></li>
                    <li><a href="#ratio_month" data-toggle="tab">Month</a></li>
                    <li><a href="#ratio_year" data-toggle="tab">Year</a></li>
                </ul>
                <div class="tab-content no-padding">
                    <div class="chart tab-pane active" id="ratio_day" style="height: 300px;"></div><!-- /.tab-pane -->
                    <div class="chart tab-pane" id="ratio_month" style="height: 300px;"></div><!-- /.tab-pane -->
                    <div class="chart tab-pane" id="ratio_year" style="height: 300px;"></div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- /.box-body -->
        </div>
        <div class="overlay" style="display:none" id="graph3_load">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- /.box -->
    </div><!-- /.Left col -->
</div>
</section><!-- right col -->
</section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">

 function getsummarygraph() {
    $('#graph1_load').show();
    $.ajax({
        url: '<?php echo site_url("/applications/summarydaygraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        //

    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/applications/summarymonthgraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        //
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/applications/summaryyeargraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        //
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    setTimeout(function(){
       $('#graph1_load').hide();
   }, 1000);
}

function getusedgraph() {
    $('#graph2_load').show();
    $.ajax({
        url: '<?php echo site_url("/applications/useddaygraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
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
            graph_line_generate(category,'Total',response,'appuse_day','Total applications "<?php echo $application_detail->getApplicationName(); ?>" use in day','Source : SAMF Dataset');
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/applications/usedmonthgraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        var date_data = [];
            for (var i = 1; i <= response.lastday; i++) {
                date_data.push(i);
            };
            graph_line_generate(date_data,'Total',response.data,'appuse_month','Total applications "<?php echo $application_detail->getApplicationName(); ?>" use in month','Source : SAMF Dataset');
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/applications/usedyeargraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        category = [
            'January',
            'February',
            'March',
            'Apil',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
            ]
            graph_line_generate(category,'Total',response,'appuse_year','Total applications "<?php echo $application_detail->getApplicationName(); ?>" use in year','Source : SAMF Dataset');
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    setTimeout(function(){
       $('#graph2_load').hide();
   }, 1000);
}

function getratiograph() {
    $('#graph3_load').show();
    $.ajax({
        url: '<?php echo site_url("/applications/summarydayratiograph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        //
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/applications/summarymonthratiograph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        //
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/applications/summaryyearratiograph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $application_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        //
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    setTimeout(function(){
       $('#graph3_load').hide();
   }, 1000);
}

$(document).ready(function() {
    $('#log_datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('ul.nav a').on('shown.bs.tab', function (e) {
        getsummarygraph();
        getusedgraph();
        getratiograph();
    });
    $('#agent_control').click(function(event) {
        $('#quick_load').show();
        $.ajax({
            url: "<?php echo site_url('/applications/agentcontrol'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {_id: '<?php echo $application_detail->getID(); ?>'},
        })
        .done(function(data) {
            if (data.status == 200) {
                if (data.agent == 'enable') {
                    $('#agent_control').html('<i class="fa fa-times"></i> Disable Agent');
                } else {
                    $('#agent_control').html('<i class="fa fa-check"></i> Enable Agent');
                }
            } else {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + data.message + '</div>');
            }
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
        setTimeout(function(){
           $('#quick_load').hide();
       }, 1000);
    });
    $('#remove_app').click(function(event) {
        if (confirm("Are your sure to delete this application?")) {
            $.ajax({
                url: "<?php echo site_url('/applications/delapp'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {_id: '<?php echo $application_detail->getID(); ?>'},
            })
            .done(function(data) {
                if (data.status == 200) {
                    window.location.replace("<?php echo site_url('/applications/') ?>");
                } else {
                    $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + data.message + '</div>');
                }
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })    
        }
    });

    $('#search').click(function(event) {
        getsummarygraph();
        getusedgraph();
        getratiograph();
    });

    getsummarygraph();
    getusedgraph();
    getratiograph();
});

</script>