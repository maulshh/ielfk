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
                <h3 class='box-title'>Daftar Produk</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-github btn-sm" title="Download CSV" onclick="download()"><i class="fa fa-download"></i></button>
                    <button class="btn btn-tumblr  btn-sm" data-toggle="modal" data-target="#modalimport" title="Import CSV" onclick="add_import()"><i class="fa fa-upload"></i></button>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalproduct" title="Tambah Produk" onclick="add_product()"><i class="fa fa-plus"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
        </div><!-- /.box -->
        <div class='box box-solid'>
            <div class="box-header">
            </div>
            <div class='box-body table-responsive'>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped table-hover data-posts">
                            <thead>
                            <tr>
                                <th>Kode Barcode</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gudang</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($products as $product){?>
                                <tr>
                                    <td><?php echo $product->product_id?></td>
                                    <td><?php echo $product->name?></td>
                                    <td><?php echo $product->title?></td>
                                    <td style="width:32%"><textarea rows="1" disabled="disabled" style="width:90%"><?php echo $product->description?></textarea></td>
                                    <td><?php echo $product->price; if($this->session->userdata('role_id')<3) echo " : ($product->value)"?></td>
                                    <td><?php echo $product->in_shop." ".$product->unit?></td>
                                    <td><?php echo $product->in_inventory." ".$product->unit?></td>
                                    <td width="140px">
                                        <div class="btn-group">
                                            <?php $kirim = $product->product_id."~".$product->title."~".$product->description."~".$product->category.'~'.$product->price.'~'.$product->value.'~'.$product->unit;?>
                                            <?php $kirim2 = $product->product_id."~".$product->title."~".$product->in_shop."~".$product->in_inventory;?>
                                            <button class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modalexpent" title="Pembelian Produk" onclick="add_expent('<?php echo $kirim?>')"><i class="fa fa-plus"> </i></button>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalmove" title="Pindah Produk" onclick="move('<?php echo $kirim2?>')"><i class="fa fa-exchange"> </i></button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalproduct" title="Edit Produk" onclick="edit_product('<?php echo $kirim?>')"><i class="fa fa-edit"> </i></button>
                                            <button class="btn btn-primary btn-sm" title="Hapus produk" onclick="delete_product('<?php echo $product->product_id?>')"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div><!-- ./row -->

<?=$categories?>
<?=$product_modal?>
<?=$expent_modal?>

<div class="modal fade" id="modalmove" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true" >
    <div class="modal-dialog" style="width: 380px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Pindah Stok Produk
            </div>
            <form method="post" id="form-move" action="<?php echo base_url('products/move')?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Barcode</label>
                                <input type="text" class="form-control" name="product_id" id="move_1">
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" id="move_2" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>From - To</label>
                                <select type="text" class="form-control" id="move_3" name="to">
                                    <option value="in_shop">Inventory -> Shop</option>
                                    <option value="in_inventory">Shop -> Inventory</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="count" id="move_4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-default pull-right" id="submit-move" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function(){
        $('.data-posts').dataTable();
    });

    $(document).ready(function() {
        $('#move_1').autocomplete({
            source: "<?php echo base_url()?>products/search",
            minLength: 1,
            select: function (event, ui) {
                $("#move_1").val(ui.item.value);
                $("#move_2").val(ui.item.title);
                return false;
            },
            appendTo: $('#form-move')
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<a>" + item.name + "</a>")
                .appendTo(ul);
        };
    });

    function move(data = false){
        if(data){
            data = data.split('~');
            $('#move_1').val(data[0]);
            $('#move_2').val(data[1]);
            $('#move_4').val('');
        }
    }
</script>
