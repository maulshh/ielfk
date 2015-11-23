
<div class="modal fade" id="modalproduct" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Data Produk
            </div>
            <form method="post" id="form-product" action="<?php echo base_url('products/add')?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Barcode</label>
                                <input type="text" class="form-control" name="product_id" id="product_1">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select type="text" class="form-control" name="category" id="product_4">
                                    <?php foreach($cats as $cat){?>
                                        <option value="<?=$cat->product_category_id ?>"><?=$cat->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama produk</label>
                                <input type="text" class="form-control" name="title" id="product_2">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="description" id="product_3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="price" id="product_5">
                                    </div>
                                    <div class="col-md-3">value: (<span id="product_6"></span>)</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" id="product_7">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-default pull-right" id="submit-product" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript" class="init">
    function add_product(){
        $('#form-product').attr('action', '<?php echo base_url("products/add")?>');
        $('#product_1').val('');
        $('#product_2').val('');
        $('#product_3').val('');
        $('#product_4').val('');
        $('#product_5').val('');
        $('#product_6').text('0');
        $('#product_7').val('');
    }

    function edit_product(data){
        data = data.split('~');
        $('#form-product').attr('action', '<?php echo base_url("products/edit")?>/' + data[0]);
        $('#product_1').val(data[0]);
        $('#product_2').val(data[1]);
        $('#product_3').val(data[2]);
        $('#product_4').val(data[3]);
        $('#product_5').val(data[4]);
        $('#product_6').text(data[5]);
        $('#product_7').val(data[6]);
    }

    function delete_product(id){
        if(confirm('Apakah anda yakin?'))
            window.location.assign('<?php echo base_url("products/delete");?>/' + id);
    }
</script>