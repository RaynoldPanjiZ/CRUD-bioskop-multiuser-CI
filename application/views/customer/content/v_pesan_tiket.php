<?php 
	$titel   = 'Tambah';
	$aksi   = 'tambah';
	$button   = 'Simpan';
	if(!empty($cari_kode)) {
		if($cari_kode==1) {
			$kd_tiket=1;
		} else {
			foreach ($cari_kode as $row):
				$k = $row->kd_tiket;
			endforeach;
			$kd_tiket = $k+1;
		}
	}

?> 

<div class="span9">
	   <h3 class="page-title"><?php echo $titel; ?></h3>
	   
<div class="well">
	<form id="user" form=user method="post" action="<?php echo base_url();?>index.php/c_tiket/<?php echo $aksi; ?>" enctype="multipart/form-data">
	   
		<label>Kode Tiket</label>
		<input type="text" id="kd_tiket" name="kd_tiket" value="<?php echo $kd_tiket; ?>" readonly>
				
		<label>ID User</label>
		<input type="text" id="id_user" name="id_user" value="<?php echo $this->id_akses; ?>" readonly>
		
		<label>Jadwal</label>
		<select name="kd_jadwal" id="kd_jadwal" required hidden onchange="proses()" >
		    <option value="" disabled selected hidden> Pilih </option>
		    <?php $hide=''; foreach ($data_jadwal as $jdw) : 
		    	// cek apakah url menyimpan kd_jadwal untuk melakukan select otomatis
		    	if ($id_jadwal!='') {
		    		if ($jdw->kd_jadwal == $id_jadwal) {
		    			echo "<option selected ";
		    		} else {
		    			echo "<option ";
		    		}
		    	} else {
		    		echo "<option ";
		    	}
		    	echo " $hide value=$jdw->kd_jadwal>[$jdw->kd_jadwal] - $jdw->judul - $jdw->studio</option>";
		    endforeach; ?>
		</select>

		<label>Jumlah</label>
		<input type="number" id="jum_tiket" name="jum_tiket" min="1" value="1" required>

		<div style="padding-top:20px">
		   <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?></button>
		</div>
	</form>
</div>
</div>


   