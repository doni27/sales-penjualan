




<div class="col-12 ">
<p>
<a href="<?= base_url('admin/transaksi/tambah')?>" class="btn btn-success btn-lg"><i class="fa fa-plus "></i> Tambah baru</a>
</p>






<table class="table table-bordered" id="example1">
<thead>
<tr>
<th>No</th>
<th>Kode Transaksi</th>
<th>Keranjang</th>
<th>Total Belanja</th>
<th>Tanggal</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $no=1; foreach($user as $user){  
$keranjang = $this->transaksi_model->keranjang_listing($user->id_transaksi);
$total = $this->transaksi_model->total_keranjang($user->id_transaksi);

?>
<!-- $keranjang digunakan untuk menampilkan data keranjang -->
<tr>
<td><?= $no ?></td>
<td> <?php echo $user->kode_transaksi; ?>




</td>




<td>




<?php foreach($keranjang as $keranjang){ 
?>
<?php echo $keranjang->nama_barang; ?>,&nbsp; &nbsp;  Jumlah  <label class="btn-xs btn-success" ><?php echo $keranjang->jumlah; ?>  </label>  <br>
Total  Rp <?php echo number_format($keranjang->total ,'0',',','.') ?>&nbsp; &nbsp;  <a href="<?= base_url('admin/transaksi/delete_keranjang/'.$keranjang->id_keranjang)?>" class="btn-xs btn-danger  " onclick="return comfirm('yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Delete </a>
<br><hr> 


<?php }?>

</td>


<td>
Rp <?php echo number_format($total->berat ,'0',',','.'); ?>

</td>

<td>


<?php echo format_indo( $user->tgl);?>


</td>
<td>  
<a href="<?= base_url('admin/transaksi/keranjang/'.$user->id_transaksi)?>" class="btn btn-success btn-xs " onclick="return comfirm('yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Tambah barang </a>


<a href="<?= base_url('admin/transaksi/delete/'.$user->id_transaksi)?>" class="btn btn-danger btn-xs " onclick="return comfirm('yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Delete </a>
</td>
</tr>
<?php $no++; } ?>
</tbody>
</table>
