<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
            Application Overview
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><?php echo label('application'); ?></li>
            <li class="active"><?php echo label('overview'); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-cube"></i>
                    <h3 class="box-title">
                        Application
                    </h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <div class="spinner">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-hover" id="table_applist">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="70%">Application</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div><!-- /.col -->
</div> 
</section>          
</aside><!-- /.right-side -->
<script type="text/javascript">
    function showAppList() {
        $('#table_applist tbody tr').remove();
        $('.spinner').show();
        setTimeout(function(){
            $.getJSON("<?php echo site_url('/applications/listapp') ?>", function(data) {
                var output = '';
                $.each(data, function(index, value){      
                    output += '<tr id=app_"' + value._id + '">';
                    output += '<td>' + (index+1) + '</td>';
                    output += '<td>' + value.application_name + '</td>';
                    output += '<td><a href="<?php echo site_url('/applications/overview/'); ?>/'+ value._id +' " class="btn btn-info" data-toggle="tooltip" title="Overview this application"><i class="fa fa fa-search"></i></a></td>'
                    output += '</tr>';
                });
                $('.spinner').hide();
                $('#table_applist').append(output);
                $('#table_applist').find('[data-toggle="tooltip"]').tooltip()
            });
        }, 1000);
    }
    $(document).ready(function() {
        showAppList()
    });
</script>