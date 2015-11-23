<style>
    .site-form{
        background-color: rgba(189, 189, 189, 0.100);
        margin: 0px;
        padding: 10px;
        border: solid rgba(104, 104, 104, 0.100) 1px;
    }
    .site-body{
        min-height: 440px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid site-body">
            <div class="box-body">
                <?php if (isset($success_message) && $success_message) { echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$success_message.'</div>'; }  ?>
                <?php if (isset($message) && $message) { echo '<div class="alert alert-dismissable alert-primary"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>'; }  ?>
                <div class="row site-form">
                </div>
            </div>
        </div>
    </div>
</div>