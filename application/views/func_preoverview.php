<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
           <?php echo $this->lang->line("func_preover_app_func_over"); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("home"); ?></a></li>
            <li><?php echo $this->lang->line("func_preover_app_func"); ?></li>
            <li class="active"><?php echo $this->lang->line("overview"); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-cubes"></i>
                    <h3 class="box-title">
                        <?php echo $this->lang->line("func_preover_app_func"); ?>
                    </h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <div class="spinner">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-hover" id="table_funclist">
                        <thead>
                            <tr>
                                <th width="10%"><?php echo $this->lang->line("func_preover_id"); ?></th>
                                <th width="30%"><?php echo $this->lang->line("application"); ?></th>
                                <th width="30%"><?php echo $this->lang->line("func_preover_func"); ?></th>
                                <th width="20%"><?php echo $this->lang->line("func_preover_action"); ?></th>
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
    function showFuncList() {
        $('#table_funclist tbody tr').remove();
        $('.spinner').show();
        setTimeout(function(){
            $.getJSON("<?php echo site_url('/functions/list_func') ?>", function(data) {
                var output = '';
                $.each(data, function(index, value){      
                    output += '<tr id=app_"' + value._id + '">';
                    output += '<td>' + (index+1) + '</td>';
                    output += '<td>' + value.application_name + '</td>';
                    output += '<td>' + value.function_name + '</td>';
                    output += '<td><a href="<?php echo site_url('/functions/overview/'); ?>/'+ value._id +' " class="btn btn-info" data-toggle="tooltip" title="<?php echo $this->lang->line("app_preover_over_this_app"); ?>"><i class="fa fa fa-search"></i></a></td>'
                    output += '</tr>';
                });
                $('.spinner').hide();
                $('#table_funclist').append(output);
                $('#table_funclist').find('[data-toggle="tooltip"]').tooltip()
            });
        }, 1000);
    }
    $(document).ready(function() {
        showFuncList()
    });
</script>