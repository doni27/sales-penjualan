<?php 
// notifikasi eror

echo validation_errors('<div class= "alert alert-warning">','</div>');


// form open

echo form_open(base_url('admin/transaksi/tambah'),' class="form-horizontal"');
 ?>
 <div class="form-group">
<label  class="col-md-2 control-label">Nomor nota</label>
<div class="col-md-5">
<input type="text" name="kode_transaksi" class="form-control"  placeholder="Jumlah barang" value="nota-<?php echo date('sdsh'); ?>" Readonly >
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
