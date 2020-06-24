<?php 
// notifikasi eror

echo validation_errors('<div class= "alert alert-warning">','</div>');


// form open

echo form_open(base_url('admin/barang/tambah'),' class="form-horizontal"');
 ?>
 <div class="form-group">
<label  class="col-md-2 control-label">Nama Barang</label>
<div class="col-md-5">
<input type="text" name="nama" class="form-control"  placeholder="Nama Barang" value="<?= set_value('harga') ?>" required >
</div>
</div>

 <div class="form-group">
<label  class="col-md-2 control-label">Harga barang</label>
<div class="col-md-5">
<input type="text" name="harga" class="form-control"  placeholder="Harga Barang" value="<?= set_value('harga') ?>" required >
</div>
</div>


 <div class="form-group">
<label  class="col-md-2 control-label">Stok Barang</label>
<div class="col-md-5">
<input type="text" name="stok" class="form-control"  placeholder="Stok barang" value="<?= set_value('stok') ?>" required >
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
