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
    var chart_1;
    var chart_2;
    var chart_3;
    var chart_4;
    var chart_5;
    var chart_6;
    var chart_7;

    AmCharts.ready(function () {

                // LINE CHART FOR APP SUMMARY STATIC (DAY)
                chart_1 = new AmCharts.AmSerialChart();
                chart_1.categoryField = "time";
                chart_1.pathToImages = "<?php echo base_url(); ?>assets/amcharts/images/";

                chart_1.addListener("dataUpdated", zoomChart1);

                var valueAxis1_1 = new AmCharts.ValueAxis();
                valueAxis1_1.axisColor = "#FF6600";
                valueAxis1_1.axisThickness = 2;
                valueAxis1_1.gridAlpha = 0;
                chart_1.addValueAxis(valueAxis1_1);

                var valueAxis2_1 = new AmCharts.ValueAxis();
                valueAxis2_1.position = "right";
                valueAxis2_1.axisColor = "#FCD202";
                valueAxis2_1.gridAlpha = 0;
                valueAxis2_1.axisThickness = 2;
                chart_1.addValueAxis(valueAxis2_1);

                valueAxis3_1 = new AmCharts.ValueAxis();
                valueAxis3_1.offset = 50; 
                valueAxis3_1.gridAlpha = 0;
                valueAxis3_1.axisColor = "#B0DE09";
                valueAxis3_1.axisThickness = 2;
                chart_1.addValueAxis(valueAxis3_1);

                var graph1_1 = new AmCharts.AmGraph();
                graph1_1.valueAxis = valueAxis1_1; 
                graph1_1.title = "Error";
                graph1_1.valueField = "error";
                graph1_1.bullet = "round";
                graph1_1.hideBulletsCount = 30;
                graph1_1.bulletBorderThickness = 1;
                chart_1.addGraph(graph1_1);

                var graph2_1 = new AmCharts.AmGraph();
                graph2_1.valueAxis = valueAxis2_1; 
                graph2_1.title = "Notice";
                graph2_1.valueField = "notice";
                graph2_1.bullet = "square";
                graph2_1.hideBulletsCount = 30;
                graph2_1.bulletBorderThickness = 1;
                chart_1.addGraph(graph2_1);

                var graph3_1 = new AmCharts.AmGraph();
                graph3_1.valueAxis = valueAxis3_1;
                graph3_1.valueField = "debug";
                graph3_1.title = "Debug";
                graph3_1.bullet = "triangleUp";
                graph3_1.hideBulletsCount = 30;
                graph3_1.bulletBorderThickness = 1;
                chart_1.addGraph(graph3_1);

                var chartCursor_1 = new AmCharts.ChartCursor();
                chartCursor_1.cursorAlpha = 0.1;
                chartCursor_1.fullWidth = true;
                chart_1.addChartCursor(chartCursor_1);

                var chartScrollbar_1 = new AmCharts.ChartScrollbar();
                chart_1.addChartScrollbar(chartScrollbar_1);

                var legend_1 = new AmCharts.AmLegend();
                legend_1.marginLeft = 110;
                legend_1.useGraphSettings = true;
                chart_1.addLegend(legend_1);

                chart_1.write("summary_day");

                // LINE CHART FOR APP SUMMARY STATIC (MONTH)
                chart_2 = new AmCharts.AmSerialChart();
                chart_2.categoryField = "date";
                chart_2.pathToImages = "<?php echo base_url(); ?>assets/amcharts/images/";

                chart_2.addListener("dataUpdated", zoomChart2);

                var valueAxis1_2 = new AmCharts.ValueAxis();
                valueAxis1_2.axisColor = "#FF6600";
                valueAxis1_2.axisThickness = 2;
                valueAxis1_2.gridAlpha = 0;
                chart_2.addValueAxis(valueAxis1_2);

                var valueAxis2_2 = new AmCharts.ValueAxis();
                valueAxis2_2.position = "right"; 
                valueAxis2_2.axisColor = "#FCD202";
                valueAxis2_2.gridAlpha = 0;
                valueAxis2_2.axisThickness = 2;
                chart_2.addValueAxis(valueAxis2_2);

                valueAxis3_2 = new AmCharts.ValueAxis();
                valueAxis3_2.offset = 50; 
                valueAxis3_2.gridAlpha = 0;
                valueAxis3_2.axisColor = "#B0DE09";
                valueAxis3_2.axisThickness = 2;
                chart_2.addValueAxis(valueAxis3_2);

                var graph1_2 = new AmCharts.AmGraph();
                graph1_2.valueAxis = valueAxis1_2;
                graph1_2.title = "Error";
                graph1_2.valueField = "error";
                graph1_2.bullet = "round";
                graph1_2.hideBulletsCount = 30;
                graph1_2.bulletBorderThickness = 1;
                chart_2.addGraph(graph1_2);

                var graph2_2 = new AmCharts.AmGraph();
                graph2_2.valueAxis = valueAxis2_2;
                graph2_2.title = "Notice";
                graph2_2.valueField = "notice";
                graph2_2.bullet = "square";
                graph2_2.hideBulletsCount = 30;
                graph2_2.bulletBorderThickness = 1;
                chart_2.addGraph(graph2_2);

                var graph3_2 = new AmCharts.AmGraph();
                graph3_2.valueAxis = valueAxis3_2;
                graph3_2.valueField = "debug";
                graph3_2.title = "Debug";
                graph3_2.bullet = "triangleUp";
                graph3_2.hideBulletsCount = 30;
                graph3_2.bulletBorderThickness = 1;
                chart_2.addGraph(graph3_2);

                var chartCursor_2 = new AmCharts.ChartCursor();
                chartCursor_2.cursorAlpha = 0.1;
                chartCursor_2.fullWidth = true;
                chart_2.addChartCursor(chartCursor_2);

                var chartScrollbar_2 = new AmCharts.ChartScrollbar();
                chart_2.addChartScrollbar(chartScrollbar_2);

                var legend_2 = new AmCharts.AmLegend();
                legend_2.marginLeft = 110;
                legend_2.useGraphSettings = true;
                chart_2.addLegend(legend_2);

                chart_2.write("summary_month");

               // LINE CHART FOR APP SUMMARY STATIC (YEAR)
               chart_3 = new AmCharts.AmSerialChart();
               chart_3.categoryField = "month";
               chart_3.pathToImages = "<?php echo base_url(); ?>assets/amcharts/images/";

               chart_3.addListener("dataUpdated", zoomChart3);

               var valueAxis1_3 = new AmCharts.ValueAxis();
               valueAxis1_3.axisColor = "#FF6600";
               valueAxis1_3.axisThickness = 2;
               valueAxis1_3.gridAlpha = 0;
               chart_3.addValueAxis(valueAxis1_3);

               var valueAxis2_3 = new AmCharts.ValueAxis();
               valueAxis2_3.position = "right";
               valueAxis2_3.axisColor = "#FCD202";
               valueAxis2_3.gridAlpha = 0;
               valueAxis2_3.axisThickness = 2;
               chart_3.addValueAxis(valueAxis2_3);

               valueAxis3_3 = new AmCharts.ValueAxis();
               valueAxis3_3.offset = 50;
               valueAxis3_3.gridAlpha = 0;
               valueAxis3_3.axisColor = "#B0DE09";
               valueAxis3_3.axisThickness = 2;
               chart_3.addValueAxis(valueAxis3_3);

               var graph1_3 = new AmCharts.AmGraph();
               graph1_3.valueAxis = valueAxis1_3;
               graph1_3.title = "Error";
               graph1_3.valueField = "error";
               graph1_3.bullet = "round";
               graph1_3.hideBulletsCount = 30;
               graph1_3.bulletBorderThickness = 1;
               chart_3.addGraph(graph1_3);

               var graph2_3 = new AmCharts.AmGraph();
               graph2_3.valueAxis = valueAxis2_3;
               graph2_3.title = "Notice";
               graph2_3.valueField = "notice";
               graph2_3.bullet = "square";
               graph2_3.hideBulletsCount = 30;
               graph2_3.bulletBorderThickness = 1;
               chart_3.addGraph(graph2_3);

               var graph3_3 = new AmCharts.AmGraph();
               graph3_3.valueAxis = valueAxis3_3;
               graph3_3.valueField = "debug";
               graph3_3.title = "Debug";
               graph3_3.bullet = "triangleUp";
               graph3_3.hideBulletsCount = 30;
               graph3_3.bulletBorderThickness = 1;
               chart_3.addGraph(graph3_3);

               var chartCursor_3 = new AmCharts.ChartCursor();
               chartCursor_3.cursorAlpha = 0.1;
               chartCursor_3.fullWidth = true;
               chart_3.addChartCursor(chartCursor_3);

               var chartScrollbar_3 = new AmCharts.ChartScrollbar();
               chart_3.addChartScrollbar(chartScrollbar_3);

               var legend_3 = new AmCharts.AmLegend();
               legend_3.marginLeft = 110;
               legend_3.useGraphSettings = true;
               chart_3.addLegend(legend_3);

               chart_3.write("summary_year");

               // LINE CHART FOR APP USE STATIC (DAY)
               chart_4 = new AmCharts.AmSerialChart();
               chart_4.categoryField = "time";
               chart_4.pathToImages = "<?php echo base_url(); ?>assets/amcharts/images/";

               chart_4.addListener("dataUpdated", zoomChart4);

               var valueAxis1_4 = new AmCharts.ValueAxis();
               valueAxis1_4.axisColor = "#3080e9";
               valueAxis1_4.title = "Number of Users";
               valueAxis1_4.axisThickness = 2;
               valueAxis1_4.gridAlpha = 0;
               chart_4.addValueAxis(valueAxis1_4);

               var graph1_4 = new AmCharts.AmGraph();
               graph1_4.valueAxis = valueAxis1_4;
               graph1_4.type = "line";
               graph1_4.title = "Users";
               graph1_4.valueField = "total";
               graph1_4.bullet = "round";
               graph1_4.hideBulletsCount = 30;
               graph1_4.bulletBorderThickness = 1;
               chart_4.addGraph(graph1_4);

               var chartCursor_4 = new AmCharts.ChartCursor();
               chartCursor_4.cursorAlpha = 0.1;
               chartCursor_4.fullWidth = true;
               chart_4.addChartCursor(chartCursor_4);

               var chartScrollbar_4 = new AmCharts.ChartScrollbar();
               chart_4.addChartScrollbar(chartScrollbar_4);

               var legend_4 = new AmCharts.AmLegend();
               legend_4.marginLeft = 110;
               legend_4.useGraphSettings = true;
               chart_4.addLegend(legend_4);

               chart_4.write("appuse_day");

               // LINE CHART FOR APP USE STATIC (MONTH)
               chart_5 = new AmCharts.AmSerialChart();
               chart_5.categoryField = "date";
               chart_5.pathToImages = "<?php echo base_url(); ?>assets/amcharts/images/";

               chart_5.addListener("dataUpdated", zoomChart5);

               var valueAxis1_5 = new AmCharts.ValueAxis();
               valueAxis1_5.axisColor = "#3080e9";
               valueAxis1_5.title = "Number of Users";
               valueAxis1_5.axisThickness = 2;
               valueAxis1_5.gridAlpha = 0;
               chart_5.addValueAxis(valueAxis1_5);

               var graph1_5 = new AmCharts.AmGraph();
               graph1_5.valueAxis = valueAxis1_5;
               graph1_5.type = "line";
               graph1_5.title = "Users";
               graph1_5.valueField = "total";
               graph1_5.bullet = "round";
               graph1_5.hideBulletsCount = 30;
               graph1_5.bulletBorderThickness = 1;
               chart_5.addGraph(graph1_5);

               var chartCursor_5 = new AmCharts.ChartCursor();
               chartCursor_5.cursorAlpha = 0.1;
               chartCursor_5.fullWidth = true;
               chart_5.addChartCursor(chartCursor_5);

               var chartScrollbar_5 = new AmCharts.ChartScrollbar();
               chart_5.addChartScrollbar(chartScrollbar_5);

               var legend_5 = new AmCharts.AmLegend();
               legend_5.marginLeft = 110;
               legend_5.useGraphSettings = true;
               chart_5.addLegend(legend_5);

               chart_5.write("appuse_month");

               // LINE CHART FOR APP USE STATIC (YEAR)
               chart_6 = new AmCharts.AmSerialChart();
               chart_6.categoryField = "month";
               chart_6.pathToImages = "<?php echo base_url(); ?>assets/amcharts/images/";

               chart_6.addListener("dataUpdated", zoomChart6);

               var valueAxis1_6 = new AmCharts.ValueAxis();
               valueAxis1_6.axisColor = "#3080e9";
               valueAxis1_6.title = "Number of Users";
               valueAxis1_6.axisThickness = 2;
               valueAxis1_6.gridAlpha = 0;
               chart_6.addValueAxis(valueAxis1_6);

               var graph1_6 = new AmCharts.AmGraph();
               graph1_6.valueAxis = valueAxis1_6;
               graph1_6.type = "line";
               graph1_6.title = "Users";
               graph1_6.valueField = "total";
               graph1_6.bullet = "round";
               graph1_6.hideBulletsCount = 30;
               graph1_6.bulletBorderThickness = 1;
               chart_6.addGraph(graph1_6);

               var chartCursor_6 = new AmCharts.ChartCursor();
               chartCursor_6.cursorAlpha = 0.1;
               chartCursor_6.fullWidth = true;
               chart_6.addChartCursor(chartCursor_6);

               var chartScrollbar_6 = new AmCharts.ChartScrollbar();
               chart_6.addChartScrollbar(chartScrollbar_6);

               var legend_6 = new AmCharts.AmLegend();
               legend_6.marginLeft = 110;
               legend_6.useGraphSettings = true;
               chart_6.addLegend(legend_6);

               chart_6.write("appuse_year");

               // PIE CHART FOR APP RATIO (DAY)
               chart_7 = new AmCharts.AmPieChart();
               chart_7.titleField = "title";
               chart_7.valueField = "total";
               chart_7.outlineColor = "#FFFFFF";
               chart_7.outlineAlpha = 0.8;
               chart_7.outlineThickness = 2;
               chart_7.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[total]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart_7.depth3D = 15;
                chart_7.angle = 30;

                // WRITE
                chart_7.write("ratio");

            });

           // this method is called when chart is first inited as we listen for "dataUpdated" event
           function zoomChart1() {
               chart_1.zoomToIndexes(10, 20);
           }
           function zoomChart2() {
               chart_2.zoomToIndexes(10, 20);
           }
           function zoomChart3() {
               chart_3.zoomToIndexes(10, 20);
           }
           function zoomChart4() {
               chart_4.zoomToIndexes(10, 20);
           }
           function zoomChart5() {
               chart_5.zoomToIndexes(10, 20);
           }
           function zoomChart6() {
               chart_6.zoomToIndexes(10, 20);
           }
           function zoomChart7() {
               chart_7.zoomToIndexes(10, 20);
           }

           function getsummarygraph() {
            $('#graph1_load').show();
            $.ajax({
                url: '<?php echo site_url("/dashboard/summarydaygraph"); ?>',
                type: 'POST',
                dataType: 'json',
            })
            .done(function(response) {
                chart_1.dataProvider = response;
                chart_1.validateData(); 

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
                chart_2.dataProvider = response;
                chart_2.validateData(); 
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
                chart_3.dataProvider = response;
                chart_3.validateData(); 
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
     /*chart_1.invalidateSize();
     chart_2.invalidateSize();
     chart_3.invalidateSize();
     chart_4.invalidateSize();
     chart_5.invalidateSize();
     chart_6.invalidateSize();
     chart_7.invalidateSize();*/
     setInterval("getcpuload();",5000);
     setInterval("getmemuse();",5000);
     setInterval("getdiskuse();",5000);
     setInterval("getwebservicestatus();",100000);
     setInterval("getdbstatus();",100000);
     setInterval("getwebstatus();",100000);
     $('ul.nav a').on('shown.bs.tab', function (e) {
        chart_1.invalidateSize();
        chart_2.invalidateSize();
        chart_3.invalidateSize();
        chart_4.invalidateSize();
        chart_5.invalidateSize();
        chart_6.invalidateSize();
        chart_7.invalidateSize();
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