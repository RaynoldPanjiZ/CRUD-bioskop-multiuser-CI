<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
				
<div class="span9">
						<h3 class="page-title">Data Film</h3>
						
<div class="btn-toolbar">
		<button class="btn btn-primary export"><a style="color:white" href="<?php echo base_url();?>index.php/path/tambah_film">Tambah Film</a></button>
	<div class="btn-group">
	</div>
</div>

<div class="well">

<table class="table table-striped table-bordered data">
	<thead>
		<tr>      
			<th>KD</th>
			<th>JUDUL</th>
			<th>JENIS</th>
			<th>TAHUN TERBIT</th>
			<th>Gambar</th>
			<th>DURASI</th>
			<th>Action</th>
																
		</tr>
	</thead> 
	<tbody>
			<?php foreach ($film as $agt){ ?> 
		<tr>        
			<td><?php echo $agt->kd_film; ?></td>
			<td><?php echo $agt->judul; ?></td>
			<td><?php echo $agt->jenis; ?></td>
			<td><?php echo $agt->tahun_rilis; ?></td>
			<td><img src="<?php echo base_url('upload/film/'.$agt->gambar) ?>" width="64"/></td>
			<td><?php echo $agt->durasi; ?> menit</td>
			<td align="center">
					<a href="<?php echo base_url();?>index.php/path/edit_film/<?php echo $agt->kd_film; ?>">
					<input type="button" value="Edit" class="tombol small gray"></a>
					<a href="<?php echo base_url(); ?>index.php/c_film/delete/<?php echo $agt->kd_film; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
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


