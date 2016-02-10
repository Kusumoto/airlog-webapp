<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $function_detail->getFunctionName(); ?>'s Overview
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Application Function</li>
            <li>Overview</li>
            <li class="active"><?php echo $function_detail->getFunctionName(); ?></li>
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
                        <a class="btn btn-app" data-target="#showfuncdata" data-toggle="modal">
                            <span class="badge bg-green"></span>
                            <i class="fa fa-cloud"></i> Agent Setting
                        </a>
                        <a class="btn btn-app" href="<?php echo site_url('/functions/report'); ?>">
                            <i class="fa fa-exclamation-triangle"></i> Report
                        </a>
                        <a class="btn btn-app" href="<?php echo site_url('/functions/manage'); ?>">
                            <i class="fa fa-edit"></i> Edit Func
                        </a>
                        <a class="btn btn-app" id="remove_func">
                            <i class="fa fa-trash-o"></i> Remove Func
                        </a>
                    </div>
                    <div class="overlay" style="display:none" id="quick_load">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FUNCTION DETAIL EDITOR -->
    <div class="modal fade" id="showfuncdata" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-cloud"></i> Agent Setting</h4>
                </div>
                <div class="modal-body">
                    <div id="place-alert-model"></div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Application Token :</span>
                            <input name="func_name" id="app_token" type="text" class="form-control" value="<?php echo $application_detail->getApplicationToken(); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Function Token :</span>
                            <input name="func_token" id="func_token" type="text" class="form-control" value="<?php echo $function_detail->getFunctionToken(); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <input type="hidden" id="func_idedit" value="">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
                        Function Summary Statical
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
                    Function Used Statical
                </h3>
            </div>
            <div class="box-body chart-responsive">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#funcuse_day" data-toggle="tab">Day</a></li>
                      <li><a href="#funcuse_month" data-toggle="tab">Month</a></li>
                      <li><a href="#funcuse_year" data-toggle="tab">Year</a></li>
                  </ul>
                  <div class="tab-content no-padding">
                    <div class="chart tab-pane active" id="funcuse_day" style="height: 300px;"></div><!-- /.tab-pane -->
                    <div class="chart tab-pane" id="funcuse_month" style="height: 300px;"></div><!-- /.tab-pane -->
                    <div class="chart tab-pane" id="funcuse_year" style="height: 300px;"></div><!-- /.tab-pane -->
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
                Function Summary Ratio
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
    $.ajax({
        url: '<?php echo site_url("/functions/summarydaygraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
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
            graph_column_generate(category,'Total',response,'summary_day','Total function "<?php echo $function_detail->getFunctionName(); ?>" log in day','Source : SAMF Dataset');
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/functions/summarymonthgraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        var date_data = [];
            for (var i = 1; i <= response.lastday; i++) {
                date_data.push(i);
            };
            graph_column_generate(date_data,'Total',response.data,'summary_month','Total function "<?php echo $function_detail->getFunctionName(); ?>" log in month','Source : SAMF Dataset');
     })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/functions/summaryyeargraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
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
            graph_column_generate(category,'Total',response,'summary_year','Total function "<?php echo $function_detail->getFunctionName(); ?>" log in year','Source : SAMF Dataset');
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
}

function getusedgraph() {
    var line_color = ['#9A490B'];
    $.ajax({
        url: '<?php echo site_url("/functions/useddaygraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
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
            graph_line_generate(category,'Total',response,'funcuse_day','Total function "<?php echo $function_detail->getFunctionName(); ?>" use in day','Source : SAMF Dataset',line_color);
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/functions/usedmonthgraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        var date_data = [];
            for (var i = 1; i <= response.lastday; i++) {
                date_data.push(i);
            };
            graph_line_generate(date_data,'Total',response.data,'funcuse_month','Total function "<?php echo $function_detail->getFunctionName(); ?>" use in month','Source : SAMF Dataset',line_color);
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/functions/usedyeargraph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
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
            graph_line_generate(category,'Total',response,'funcuse_year','Total function "<?php echo $function_detail->getFunctionName(); ?>" use in year','Source : SAMF Dataset',line_color);
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
}

function getratiograph() {
    var color = ['#008106','#A2000F', '#00C8C6'];
    $.ajax({
        url: '<?php echo site_url("/functions/summarydayratiograph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        graph_pie_generate(response,'ratio_day','Ratio log type in function "<?php echo $function_detail->getFunctionName(); ?>"','Source : SAMF Dataset','Total',color);
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/functions/summarymonthratiograph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
        graph_pie_generate(response,'ratio_month','Ratio log type in function "<?php echo $function_detail->getFunctionName(); ?>"','Source : SAMF Dataset','Total',color);
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
    $.ajax({
        url: '<?php echo site_url("/functions/summaryyearratiograph"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {_id: '<?php echo $function_detail->getID(); ?>',day: $('#log_datepicker').val()},
    })
    .done(function(response) {
         graph_pie_generate(response,'ratio_year','Ratio log type in function "<?php echo $function_detail->getFunctionName(); ?>"','Source : SAMF Dataset','Total',color);
    })
    .fail(function() {
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
    })
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

    $('#remove_func').click(function(event) {
        if (confirm("Are your sure to delete this application?")) {
            $.ajax({
                url: "<?php echo site_url('/functions/delfunc'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {_id: '<?php echo $function_detail->getID(); ?>'},
            })
            .done(function(data) {
                if (data.status == 200) {
                    window.location.replace("<?php echo site_url('/functions/') ?>");
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