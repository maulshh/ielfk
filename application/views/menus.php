<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Pengaturan Menu</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-danger" onclick="create()"><i class="fa fa-file"></i> &nbsp; Create New Menu</button>
						<hr>
		       			<div class="form-group">
			   				<label>Menu Target</label>
		       				<select class="form-control" id="target_posts" name="target_posts" onchange="ganti_target(this.value)">
		       					<option>--Pilih Target Halaman--</option>
		       					<?php foreach($all as $target){ ?>
		       					<option value="<?php echo $target->module_target?>"><?php echo $target->module_target?></option>
		       					<?php } ?>
		       				</select>
		       			</div>
		       			<div class="col-md-12">
		       				<div id="menus">
                                <?php echo $menuss?>
		       				</div>
		       			</div>
					</div>
				</div>
			</div>
			<div class="box-footer"></div>
		</div>
	</div>
</div>

<div title="Buat Menu Baru" class="col-md-12" id="form-tambah">
	<form id="form-menu" method="post" action="<?php echo base_url('menus/add')?>">
		<br>
		<div class="col-md-4">
			Body
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input1" type="content" name="content">
		</div>
		<div class="col-md-4">
			Title
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input2" type="content" name="title">
		</div>
		<div class="col-md-4">
			URL
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input3" type="text" name="uri">
		</div>
		<div class="col-md-4">
			Role
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input4" type="text" name="role_id">
		</div>
		<div class="col-md-4">
			Modul Target
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input5" type="text" name="module_target">
		</div>
		<div class="col-md-4">
			Position
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input6" type="text" name="position">
		</div>
		<div class="col-md-4">
			Icon (optional)
		</div>
		<div class="col-md-8">
			<input class="form-control" id="input7" type="text" name="note" placeholder="e.g.: plane, check, times, trash-o">
			<small class="help"><a target="_blank" href="https://almsaeedstudio.com/themes/AdminLTE/pages/UI/icons.html">list of icons</a></small>
		</div>
		<div class="col-md-12">
			<br>
			<input type="submit" class="btn btn-danger pull-right" id="input" value="Buat Baru">
		</div>
	</form>
</div>
    
<script>
	$("#form-tambah").dialog({
	    autoOpen : false,
	    height : 380,
	    width : 600,
	    modal : true
	});	

//----------------functions--------------

	function create(){
		$('#input1').val('');
		$('#input2').val('');
		$('#input3').val('');
		$('#input4').val('');
		$('#input5').val('');
		$('#input6').val('');
		$('#input7').val('');
		$("#form-menu").attr("action", "<?php echo base_url('menus/add');?>");
		$("#form-tambah").dialog("open");
	}
	
	function edit(data){
		data = data.split('~');
		$('#input1').val(data[1]);
		$('#input2').val(data[2]);
		$('#input3').val(data[3]);
		$('#input4').val(data[4]);
		$('#input5').val(data[5]);
		$('#input6').val(data[6]);
		$('#input7').val(data[7]);
		$("#form-menu").attr("action", "<?php echo base_url('menus/edit');?>/"+data[0]);
		$("#form-tambah").dialog("open");
	}
	
	function ganti_target(target){
		$.ajax({
			type: "POST",
			url:"<?php echo base_url('menus/get_menus')?>/" + target,
			success: function(result){
				$('#menus').html(result);
			}
		})
	}
</script>