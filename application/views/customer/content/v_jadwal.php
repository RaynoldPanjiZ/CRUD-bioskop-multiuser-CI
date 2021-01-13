<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">


				
<div class="span10">
						<h3 class="page-title">Data Film</h3>

<div class="well">

<table class="table table-striped table-bordered data">
	<thead>
		<tr>      
			<th>KODE JADWAL</th>
			<th>Gambar</th>
			<th>JUDUL</th>
			<th>JENIS</th>
			<th>TAHUN TERBIT</th>
			<th>DURASI</th>

			<th>Studio</th>
			<th>Tanggal</th>
			<th>Jam</th>
			<th>Harga</th>
			<th>Aksi</th>
																
		</tr>
	</thead> 
	<tbody>
			<?php foreach ($jadwal as $jdwl){ ?> 
		<tr>        
			<td><?php echo $jdwl->kd_jadwal; ?></td>
			<td><img src="<?php echo base_url('upload/film/'.$jdwl->gambar) ?>" width="64"/></td>
			<td><?php echo $jdwl->judul; ?></td>
			<td><?php echo $jdwl->jenis; ?></td>
			<td><?php echo $jdwl->tahun_rilis; ?></td>
			<td><?php echo $jdwl->durasi; ?> Menit</td>

			<td><?php echo $jdwl->studio; ?></td>
			<td><?php echo date("d-M-Y", strtotime($jdwl->tanggal)); ?></td>
			<td><?php echo $jdwl->jam; ?></td>
			<td>Rp. <?php echo $jdwl->harga; ?></td>
			<td>
				<a href="<?php echo base_url(); ?>index.php/path/pesan_tiket/<?php echo $jdwl->kd_jadwal; ?>" >
					<input type="button" value="Pesan" class="tombol small gray">
				</a>
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




