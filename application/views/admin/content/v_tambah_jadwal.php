<?php 
	$titel   = 'Tambah';
	$aksi   = 'tambah';
	$button   = 'Simpan';
	if(!empty($cari_kode)) {
		if($cari_kode==1) {
			$kd_jadwal=1;
		} else {
			foreach ($cari_kode as $row):
				$k = $row->kd_jadwal;
			endforeach;
			$kd_jadwal = $k+1;
		}
	}

	$kd_studio = '';
	$kd_film = '';
	$tanggal = '';
	$jam = '';
	$harga = '';

	if (!empty($jadwal)) { 
		foreach ($jadwal as $row):
			$kd_jadwal = $row->kd_jadwal;    
			$kd_studio = $row->kd_studio;
			$kd_film = $row->kd_film;
			$tanggal = $row->tanggal;
			$jam = $row->jam;
			$harga = $row->harga;
			$titel   = 'Perbarui';
			$aksi   = 'perbarui';
			$button   = 'Perbarui';
		endforeach;
	}
?> 
<div class="span9">
	<h3 class="page-title"><?php echo $titel; ?> Jadwal</h3>
	   
	<div class="well">
		<form id="user" method="post" action="<?php echo base_url();?>index.php/c_jadwal/<?php echo $aksi; ?>">
		   
			<label>Kode Jadwal</label>
			<input type="text" id="kode" name="kode" value="<?php echo $kd_jadwal; ?>" readonly>
			
			<label>Kode Film</label>
			<select name="kd_film" required>
			    <option value="" disabled selected hidden> Pilih </option>
			    <?php foreach ($film as $f) : 
			    	echo "<option value=".$f->kd_film; 
			    	// membuat select otomatis jika edit data
			    	if (!$kd_film=="") {
				    	if ($f->kd_film==$kd_film) {
				        	echo " selected";
				        } else {
				         	echo "";
				        }
			    	}
			        echo ">[kode:$f->kd_film] $f->judul</option>;";
			    endforeach; ?>
			</select>
			
			<label>Studio</label>
			<select name="kd_studio" required>
			    <option value="" disabled selected hidden> Pilih </option>
			    <?php foreach ($data_studio as $agt) : 
			    	echo "<option value=".$agt->kd_studio; 
			    	// membuat select otomatis jika edit data
			    	if (!$kd_studio=="") {
				    	if ($agt->kd_studio==$kd_studio) {
				        	echo " selected";
				        } else {
				         	echo "";
				        }
			    	}
			        echo ">$agt->studio </option>;";
			    endforeach; ?>
			</select>
			
			<label>Tanggal</label>
			<input type="date" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" required>

			<label>Jam</label>
			<input type="time" id="jam" name="jam" value="<?php echo $jam; ?>" required>

			<label>Harga Tiket</label>
			<input type="number" id="harga" name="harga" min="2000" step="500" value="<?php echo $harga; ?>" required>

			<div style="padding-top:20px">
			   <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Jadwal</button> 
			</div>
		</form>
	</div>
</div>


   