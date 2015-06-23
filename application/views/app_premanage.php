<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
            Application Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Application</li>
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
                        <button class="btn btn-primary" id="addnewapp" data-target="#showappdata" data-toggle="modal"><i class="fa fa-plus"></i> Add new application</button>
                    </div><!-- /. tools -->

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
            <!-- APPLICATION DETAIL EDITOR -->
            <div class="modal fade" id="showappdata" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light-blue">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-cube"></i> Application Manage</h4>
                        </div>
                        <?php echo form_open("",array("id" => "form_app")); ?>
                        <div class="modal-body">
                            <div id="place-alert-model"></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Application Name :</span>
                                    <input name="app_name" id="app_name" type="text" class="form-control" placeholder="Your Application Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Application Token :</span>
                                    <input name="app_token" id="app_token" type="text" class="form-control" placeholder="Application Token" readonly>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" id="btn_gentoken">Generate Token</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Application Language :</span>
                                    <select class="form-control" id="app_lang" name="app_lang">
                                        <option value="Java">Java</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                   <span class="input-group-addon">Agent Controller :</span>
                                    <select class="form-control" id="app_agent" name="app_agent">
                                        <option value="enable">Enable</option>
                                        <option value="disable">Disable</option>
                                    </select>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer clearfix">
                        <input type="hidden" id="app_idedit" value="">
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
    function getAppdetail(_id) {
        $('#place-alert-model').html('');
        $.ajax({
            url: "<?php echo site_url('/applications/getapp'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {_id: _id},
        })
        .done(function(data) {
            $('#app_name').val(data.application_name);
            $('#app_token').val(data.application_token);
            $('#app_lang').val(data.application_lang);
            $('#app_idedit').val(_id);
            $('#app_agent').val(data.application_agent);
            $('#showappdata').modal('show');
        })
        .fail(function() {
            $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
        })
    }
    function deleteApp(_id) {
        if (confirm("Are your sure to delete this application?")) {
            $.ajax({
                url: "<?php echo site_url('/applications/delapp'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {_id: _id},
            })
            .done(function(data) {
                if (data.status == 200) {
                    $('#place-alert').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>    <i class="icon fa fa-check"></i> Success!</h4>' + data.message + '</div>');
                    showAppList()
                } else {
                    $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>' + data.message + '</div>');
                }
            })
            .fail(function() {
                $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
            })    
        }
    }

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
                    output += '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit Application" onclick="getAppdetail(\''+ value._id +'\')"><i class="fa fa-pencil-square-o"></i></button><button class="btn btn-danger" data-toggle="tooltip" title="Remove Application" onclick="deleteApp(\'' + value._id + '\')"><i class="fa fa-trash-o"></i></button></div></td>'
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
        $('#app_name').val('');
        $('#app_token').val('');
        $('#app_idedit').val('');
        $('#app_agent').val('enable');
    });
    $('#btn_gentoken').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo site_url('applications/generatetoken'); ?>",
            type: 'POST',
            dataType: 'json',
        })
        .done(function(data) {
           $('#app_token').val(data.token);
       })
        .fail(function() {
           fail_creator_model('Internal Server Error!');
       })
    });
    $('#form_app').submit(function(event) {
        event.preventDefault();
        $('#place-alert-model').html('');
        if ($('#app_name').val() == '') {
            fail_creator_model('Please enter your application name');
            $('#app_name').focus();
        } else if ($('#app_token').val() == '') {
            fail_creator_model('Please generate your application token');
        } else if ($('#app_lang').val() == '') {
            fail_creator_model('Please enter your application language');
        } else {
            if ($('#app_idedit').val() == '') {
                $.ajax({
                    url: "<?php echo site_url('applications/saveapp'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form_app').serialize(),
                })
                .done(function(data) {
                    if (data.status == 200) {
                        success_creator(data.message);
                        $('#showappdata').modal('hide');
                        showAppList()
                    } else {
                        fail_creator_model(data.message);
                    }
                })
                .fail(function() {
                    fail_creator_model('Internal Server Error!');
                })
            } else {
                $.ajax({
                    url: "<?php echo site_url('applications/updateapp'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    data: {app_idedit: $('#app_idedit').val(), app_name: $('#app_name').val(), app_token: $('#app_token').val(), app_lang: $('#app_lang').val(), app_agent: $('#app_agent').val()},
                })
                .done(function(data) {
                    if (data.status == 200) {
                        success_creator(data.message);
                        $('#showappdata').modal('hide');
                        showAppList()
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