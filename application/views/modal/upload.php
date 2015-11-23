<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Upload
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="upload-form">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <input type="file" name="file" id="file" title="pilih file dari komputer anda">
                            <p class="help-block">pilih file dari komputer anda</p>
                        </div>
                        <button class="btn btn-lg btn-github" type="submit"><i class="fa fa-upload"> </i> Upload</button>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input name="path" id="path" type="hidden" value="<?=$path?>">
                            <input name="allowed_types" type="hidden" value="<?=$types?>">
                            <div class="form-group">
                                <label>Save as</label>
                                <input name="name" required="required" type="hidden" onchange="" value="{{saveas}}">
                                <input class="form-control" ng-model="saveas" required="required" type="text" placeholder="file.jpg">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#upload-form')
        .submit(function(e){
            $.ajax({
                url: '<?php echo base_url('sites/upload')?>',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result){
                    if (typeof upload === "function") {
                        upload();
                    }
                }
            });
            e.preventDefault();
        });

    $('#file').change(function(){
        angular.element($('#MainCtrl')).scope().select_file(this.value.split('\\').pop());
        angular.element($('#MainCtrl')).scope().$apply();
    });
</script>
