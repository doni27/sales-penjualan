<div class="col-12 ">
<p>
	<a href="<?= base_url('admin/barang/tambah')?>" class="btn btn-success btn-lg"><i class="fa fa-plus "></i> Tambah baru</a>
</p>

    




			<table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
		 <th>No</th>
			 <th>Nama Barang</th>
 			<th>Harga  Barang</th>
 			<th>Stok Barang </th>
 			
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		
<?php $no=1; foreach($user as $user){  ?>
 		<tr>
 			<td><?= $no ?></td>
			
 			<td><?php echo $user->nama; ?></td>
             <td>
			 <?php echo $user->harga; ?>	 
					</td>
             <td> <?php echo $user->stok; ?></td>
            <td>  
			<a href="<?= base_url('admin/barang/edit/'.$user->id_barang)?>" class="btn btn-warning btn-xs " ><i class="fa fa-trash-o"></i> Ubah </a>
 				<a href="<?= base_url('admin/barang/delete/'.$user->id_barang)?>" class="btn btn-danger btn-xs " onclick="return comfirm('yakin ingin menghapus data ini')"><i class="fa fa-trash-o"></i> Delete </a>
 			  </td>
 		</tr>
         <?php $no++; } ?>
 	</tbody>
 </table>
