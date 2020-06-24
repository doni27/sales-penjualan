<?php 
// notifikasi eror

echo validation_errors('<div class= "alert alert-warning">','</div>');


// form open

echo form_open(base_url('admin/transaksi/keranjang/'.$id),' class="form-horizontal"');
 ?>
 <div class="form-group">
<label  class="col-md-2 control-label">Nama Barang</label>
<div class="col-md-5">

<select name="no_barang" class="form-control">				
					
					<?php foreach($barang as $barang) {?>
					<option value="<?php echo $barang->id_barang ?>">
						<?php  echo $barang->nama ?>
					</option>
				<?php } ?>	 

					
					
				</select>
</div>
</div>

<div class="form-group">
<label  class="col-md-2 control-label">Jumlah Barang</label>
<div class="col-md-5">

<input type="text" name="jumlah" class="form-control"  placeholder="Jumlah barang" value="<?= set_value('stok') ?>" required >
                    
					

					
					
				</select>
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
