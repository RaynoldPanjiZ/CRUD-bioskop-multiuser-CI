<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
				
<div class="span10">
						<h3 class="page-title">Tiket Anda</h3>
						
<div class="well">

<table class="table table-striped table-bordered data">
	<thead>
		<tr>      
			<th>Kode Tiket Anda</th>
			<th>Judul Film</th>
			<th>Kode Studio</th>
			<th>Kode Jadwal</th>
			<th>Tanggal Tayang</th>
			<th>Jam Tayang</th>
			<th>Jumlah Tiket</th>
			<th>Total Harga</th>
			<th>Aksi</th>
																
		</tr>
	</thead> 
	<tbody>
			<?php $total=0;			
			foreach ($data_tiket as $tkt){ ?> 
		<tr>        
			<td><?php echo $tkt->kd_tiket; ?></td>
			<td><?php echo $tkt->judul; ?></td>
			<td><?php echo $tkt->kd_studio; ?></td>
			<td><?php echo $tkt->kd_jadwal; ?></td>
			<td><?php echo date("d-M-Y", strtotime($tkt->tanggal)); ?></td>
			<td><?php echo $tkt->jam; ?></td>
			<td><?php echo $tkt->jum_tiket; ?></td>
			<td>Rp <?php echo $tkt->tot_harga; ?></td>
			<td>
				<a href="<?php echo base_url(); ?>index.php/c_tiket/delete/<?php echo $tkt->kd_tiket; ?>" onclick="return confirm('Anda yakin Ingin Membatalkan tiket ini ?')">
					<input type="button" value="Batalkan" class="tombol small gray">
				</a>
			</td>
		</tr>
			<?php $total+=$tkt->tot_harga; } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="6"></th>
			<th>TOTAL</th>
			<th colspan="2">Rp <?=number_format($total, 0, ',', '.')?></th>
		</tr>
	</tfoot>
</table>
			

</div>

<div class="btn-toolbar">
		<button class="btn btn-primary export"><a style="color:white" href="<?php echo base_url();?>index.php/path/pesan_tiket">Pesan <?php echo $total==0?"":"Lagi"; ?></a></button>
	<div class="btn-group"></div>
</div>

 <script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
		
</div>


