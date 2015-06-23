<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
            Application Function Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Application Function</li>
            <li class="active">Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
            <div id="place-alert"></div>
            <div class="box box-primary">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-primary" id="addnewapp" data-target="#showfuncdata" data-toggle="modal"><i class="fa fa-plus"></i> Add new function</button>
                    </div><!-- /. tools -->

                    <i class="fa fa-cube"></i>
                    <h3 class="box-title">
                        Application Function
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
                                <th width="10%">ID</th>
                                <th width="30%">Application</th>
                                <th width="30%">Function</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->
            <!-- FUNCTION DETAIL EDITOR -->
            <div class="modal fade" id="showfuncdata" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light-blue">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-cube"></i> Function Manage</h4>
                        </div>
                        <?php echo form_open("",array("id" => "form_func")); ?>
                        <div class="modal-body">
                            <div id="place-alert-model"></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Function Name :</span>
                                    <input name="func_name" id="func_name" type="text" class="form-control" placeholder="Your Function Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Function Token :</span>
                                        <input name="func_token" id="func_token" type="text" class="form-control" placeholder="Function Token">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Application :</span>
                                    <select class="form-control" id="func_appid" name="func_appid">
                                    <option value="">----- Select -----</option>
                                    <?php foreach ($app_list as $app_list) {
                                        echo "<option value=\"".$app_list['_id']."\">".$app_list['application_name']."</option>";
                                    } ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                   <span class="input-group-addon">Primary Function :</span>
                                    <select class="form-control" id="func_primary" name="func_primary">
                                        <option value="">--- Select ---</option>
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer clearfix">
                        <input type="hidden" id="func_idedit" value="">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Save</button>
                    </div>
                    <?php form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div> <!-- /.box -->
</div><!-- /.col -->
</div> 
</section>          
</aside><!-- /.right-side -->

<script type="text/javascript">
    function getFuncdetail(_id) {
        $('#place-alert-model').html('');
        $.ajax({
            url: "<?php echo site_url('/functions/getfunc'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {_id: _id},
        })
        .done(function(data) {
            $('#place-alert-model').html('');
            $('#func_name').val(data.function_name);
            $('#func_token').val(data.function_token);
            $('#func_appid').val(data.application_id);
            $('#func_idedit').val(data.function_id);
            $('#func_primary').val(data.function_primary);
            $('#showfuncdata').modal('show');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
    }
    function deleteFunc(_id) {
        if (confirm("Are your sure to delete this function?")) {
            $.ajax({
                url: "<?php echo site_url('/functions/delfunc'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {_id: _id},
            })
            .done(function(data) {
                if (data.status == 200) {
                    $('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + data.message + '</div>');
                    showFuncList()
                } else {
                    $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + data.message + '</div>');
                }
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })    
        }
    }

    function showFuncList() {
        $('#table_funclist tbody tr').remove();
        $('.spinner').show();
        setTimeout(function(){
            $.getJSON("<?php echo site_url('/functions/list_func') ?>", function(data) {
                var output = '';
                $.each(data, function(index, value){      
                    output += '<tr id=func_"' + value._id + '">';
                    output += '<td>' + (index+1) + '</td>';
                    output += '<td>' + value.application_name + '</td>';
                    output += '<td>' + value.function_name + '</td>';
                    output += '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit Function" onclick="getFuncdetail(\''+ value._id +'\')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-danger" data-toggle="tooltip" title="Remove Function" onclick="deleteFunc(\'' + value._id + '\')"><i class="fa fa-trash-o"></i></button></div></td>'
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

    fail_creator_model = function(message){
        $('#place-alert-model').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
    };
    success_creator = function(message) {
        $('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + message + '</div>');
    };
    fail_creator = function(message){
        $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + message + '</div>');
    };

    $('#addnewapp').click(function(event) {
        $('#place-alert-model').html('');
        $('#func_name').val('');
        $('#func_token').val('');
        $('#func_appid').val('');
        $('#func_primary').val('');
        $('#func_idedit').val('');
    });
    $('#form_func').submit(function(event) {
        event.preventDefault();
        $('#place-alert-model').html('');
        if ($('#func_name').val() == '') {
            fail_creator_model('Please enter your function name');
            $('#func_name').focus();
        } else if ($('#func_token').val() == '') {
            fail_creator_model('Please generate your function token');
        } else if ($('#func_primary').val() == '') {
            fail_creator_model('Please select your function primary');
        } else {
            if ($('#func_idedit').val() == '') {
                $.ajax({
                    url: "<?php echo site_url('functions/savefunc'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form_func').serialize(),
                })
                .done(function(data) {
                    if (data.status == 200) {
                        success_creator(data.message);
                        $('#showfuncdata').modal('hide');
                        showFuncList()
                    } else {
                        fail_creator_model(data.message);
                    }
                })
                .fail(function() {
                    fail_creator_model('Internal Server Error!');
                })
            } else {
                $.ajax({
                    url: "<?php echo site_url('functions/updatefunc'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: {func_idedit: $('#func_idedit').val(), func_name: $('#func_name').val(), func_token: $('#func_token').val(), func_appid: $('#func_appid').val(), func_primary: $('#func_primary').val()},
                })
                .done(function(data) {
                    if (data.status == 200) {
                        success_creator(data.message);
                        $('#showfuncdata').modal('hide');
                        showFuncList()
                    } else {
                        fail_creator_model(data.message);
                    }
                })
                .fail(function() {
                    fail_creator_model('Internal Server Error!');
                })
            }
        }

    });
});

</script>