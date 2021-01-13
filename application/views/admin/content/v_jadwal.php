<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
		
<div class="span9">
	<h3 class="page-title">Data Jadwal FIlm</h3>
			
<div class="btn-toolbar">
	<button class="btn btn-primary export"><a style="color:white" href="<?php echo base_url();?>index.php/path/tambah_jadwal">Tambah Jadwal FIlm</a></button>
  <div class="btn-group">
  </div>
</div>

<div class="well">
	<table class="table table-striped table-bordered data">
		<thead>
			<tr>			
				<th>KODE</th>
				<th>KODE STUDIO</th>
				<th>KODE FILM</th>
				<th>TANGGAL</th>
				<th>JAM</th>
				<th>HARGA</th>
				<th>ACTION</th>
									
			</tr>
		</thead> 
		<tbody>
				 <?php foreach ($jadwal as $jdwl){ ?> 
			<tr>				
				<td><?php echo $jdwl->kd_jadwal; ?></td>
				<td title="<?php echo $jdwl->studio; ?>"><?php echo $jdwl->kd_studio; ?></td>
				<td title="<?php echo $jdwl->judul; ?>"><?php echo $jdwl->kd_film; ?></td>
				<td><?php echo date("d-M-Y", strtotime($jdwl->tanggal)); ?></td> 
				<td><?php echo $jdwl->jam; ?></td>
				<td><?php echo "Rp.".$jdwl->harga; ?></td>
				<td align="center">
					<a href="<?php echo base_url();?>index.php/path/edit_jadwal/<?php echo $jdwl->kd_jadwal; ?>">
					<input type="button" value="Edit" class="tombol small gray"></a>
					<a href="<?php echo base_url(); ?>index.php/c_jadwal/delete/<?php echo $jdwl->kd_jadwal; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
					<input type="button" value="Hapus" class="tombol small gray"></a>
				</td>
			</tr>
				 <?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
		
</div>


