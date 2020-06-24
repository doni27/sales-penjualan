
		



			<?php 
// notifikasi eror

echo validation_errors('<div class= "alert alert-warning">','</div>');


// form open

echo form_open(base_url('admin/barang/edit/'.$user->id_barang),' class="form-horizontal"');
 ?>
 <div class="form-group">
<label  class="col-md-2 control-label">Nama Barang</label>
<div class="col-md-5">
<input type="text" name="nama" class="form-control"  placeholder="Nama " value="<?= $user->nama; ?>" required >
</div>
</div>

 <div class="form-group">
<label  class="col-md-2 control-label">Harga Barang</label>
<div class="col-md-5">
<input type="text" name="harga" class="form-control"  placeholder="satuan harga" value="<?= $user->harga; ?>" required >
</div>
</div>


 <div class="form-group">
<label  class="col-md-2 control-label">Stok</label>
<div class="col-md-5">
<input type="text" name="stok" class="form-control"  placeholder="satuan" value="<?= $user->stok; ?>" required >
</div>
</div>





<div class="form-group">
<label  class="col-md-2 control-label"></label>
<div class="col-md-5">
<button class="btn btn-success btn-lg" name="submit"  type="submit" ><i class="fa fa-save"></i>Simpan</button>
	
<button class="btn btn-info btn-lg" name="reset"  type="reset" ><i class="fa fa-times"></i>Reset</button>
</div>
</div>



 <?= form_close();  ?>
