<div class="modal fade" id="modalexpent" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true" >
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Pembelian Produk
            </div>
            <form method="post" id="form-expent" action="<?php echo base_url('expenditures/add')?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Barcode</label>
                                <input type="text" class="form-control" name="product_id" id="expent_1">
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" id="expent_2" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Harga Pembelian</label>
                                <input type="text" class="form-control" name="price" id="expent_3">
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="count" id="expent_4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-default pull-right" id="submit-expent" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#expent_1').autocomplete({
            source: "<?php echo base_url()?>products/search",
            minLength: 1,
            select: function (event, ui) {
                $("#expent_1").val(ui.item.value);
                $("#expent_2").val(ui.item.title);
//                $("#expent_3").val(ui.item.price);
                return false;
            },
            appendTo: $('#form-expent')
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<a>" + item.name + "<br>" + item.desc + "</a>")
                .appendTo(ul);
        };
    });

    function add_expent(data = false){
        data = data.split('~');
        $('#form-expent').attr('action', '<?php echo base_url("expenditures/add")?>');
        if(data){
            $('#expent_1').val(data[0]);
            $('#expent_2').val(data[1]);
//            $('#expent_3').val(data[5]);
            $('#expent_4').val('');
        }
    }

    function edit_expent(data){
        data = data.split('~');
        $('#form-expent').attr('action', '<?php echo base_url("expenditures/edit")?>/' + data[2]);
        $('#expent_1').val(data[0]);
        $('#expent_2').val(data[1]);
        $('#expent_3').val(data[4]);
        $('#expent_4').val(data[3]);
    }

    function delete_expent(id){
        if(confirm('Apakah anda yakin?'))
            window.location.assign('<?php echo base_url("expenditures/delete");?>/' + id);
    }
</script>