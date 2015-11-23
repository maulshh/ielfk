<script src="<?= base_url(); ?>cashier-assets/js/redactor.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>cashier-assets/css/redactor.css" type="text/css">
<script>
    $(function () {
        $('.textarea').redactor({
            buttons: ['formatting', '|', 'alignleft', 'aligncenter', 'alignright', 'justify', '|', 'bold', 'italic', 'underline', '|', 'unorderedlist', 'orderedlist', '|', 'html'],
            formattingTags: ['p', 'pre', 'h3', 'h4'],
            minHeight: 100	});
        $('.redactor_toolbar a').tooltip({container: 'body'});
    });

</script>
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
                <?php if ($success_message) { echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$success_message.'</div>'; }  ?>
                <?php if ($message) { echo '<div class="alert alert-dismissable alert-primary"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>'; }  ?>
                <div class="row site-form">
                    <div class="col-md-12">
                        <h3>Update Settings</h3><br>
                        <form method="post" action="<?php echo base_url('sites/edit')?>">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" for="code">
                                            <?= ("site_name"); ?>
                                        </label>
                                        <?= form_input('site_name', $sites->site_name, 'class="form-control input-sm" id="code"');?>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Site Title</label>
                                        <input class="form-control" type="text" name="site_title" value="<?php echo $sites->site_title?>">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Site URL</label>
                                        <input class="form-control" type="text" name="site_url" value="<?php echo $sites->site_url?>">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="date_format"><?php echo ("date_format"); ?></label>
                                        <div class="controls">
                                            <select title="" data-original-title="" name="date_format" class="form-control input-sm tip chzn-select" data-placeholder="Select Date Format" required="required" data-error="Date Format is required or need attention" value="<?php echo $sites->date_format?>">
                                                <option value="m-d-Y">mm-dd-yyyy</option>
                                                <option value="m/d/Y">mm/dd/yyyy</option>
                                                <option value="m.d.Y">mm.dd.yyyy</option>
                                                <option value="d-m-Y">dd-mm-yyyy</option>
                                                <option value="d/m/Y">dd/mm/yyyy</option>
                                                <option value="d.m.Y">dd.mm.yyyy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" for="rows_per_page">
                                            <?=('row per page')?>
                                        </label>
                                        <?php
                                        $rw = array ('10' => '10', '25' => '25', '50' => '50', '100' => '100');
                                        echo form_dropdown('rows_per_page', $rw, $sites->rows_per_page, 'class="form-control input-sm" id="rows_per_page"')?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php echo form_submit('', ('Update Settings'), 'class="btn btn-primary btn-sm"');?> <?php echo form_close();?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>