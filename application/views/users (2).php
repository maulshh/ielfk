<?php //print_r($users);?>
<style>
    .preview{
        background-color: rgba(185, 185, 185, 0.100);
        height:52px;
        width:300px;
        padding:2px;
        border: solid rgba(96, 96, 96, 0.100) 1px;
    }
</style>
<div class='row'>
    <div class='col-md-12'>
        <div class='box box-primary collapsed-box'>
            <div class='box-header'>
                <h3 class='box-title'>Add Users</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Add a New User"><i class="fa fa-plus"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <form method="post" action="<?php echo base_url('users/add')?>">
                <div class='box-body pad'>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Username <small>(required)</small></label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Email <small>(required)</small></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Password <small>(required)</small></label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="form-group">
                                <label>Retype Password <small>(required)</small></label>
                                <input type="password" class="form-control" name="re-pass">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="banned">Banned</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <div class="form-group">
                                    <select class="form-control" name="role_id">
                                        <option value="3">User Biasa</option>
                                        <option value="2">User Lumayan</option>
                                        <option value="1">User Sangar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Send Password?</label>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="send">
                                        Send this password to the new user by email.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary pull-right" value="Add New User">
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.box -->
        <div class='box box-solid'>
            <div class="box-header">
            </div>
            <div class='box-body table-responsive'>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped table-hover" id="data-posts">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Posts</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user){?>
                                <tr>
                                    <td style="min-width:150px !important;">
                                        <div>
                                            <div class="pull-left" style="padding:4px; min-width:54px;"><img alt="foto" src="<?php echo base_url($user->pict)?>" class="img img-thumbnail" style="height:48px; width:48px"></div>
                                            <div style="padding: 2px 6px 6px 6px; font-weight:bold;"><a href="<?php echo base_url($user->uri)?>"><?php echo $user->username?></a></div>
                                        </div>
                                        <div>
                                            <a href="">edit</a> - <a href="">remove</a>
                                        </div>
                                    </td>
                                    <td><?php echo $user->name?></td>
                                    <td><?php echo $user->role_name?></td>
                                    <td><a href="mailto:<?php echo $user->email?>"><?php echo $user->email?></a></td>
                                    <td><a href="<?php echo base_url('posts/author/'.$user->user_id)?>"><?php echo $user->posts?></a></td>
                                    <td min-width="100px">
                                        <?php echo $user->status?>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Posts</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./row -->

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function(){
        $('#data-posts').dataTable();
    });
</script>
