<?php 
	$titel   = 'Tambah';
	$aksi   = 'tambah';
	$button   = 'Simpan';
	if(!empty($cari_kode)) {
		if($cari_kode==1) {
			$kd_film="1";
		} else {
			foreach ($cari_kode as $row):
				$k = $row->kd_film;
			endforeach;
			$kd_film = $k+1;
		}
	}

	$judul = '';
	$jenis = '';
	$tahun = '';
	$image = '';
	$durasi = '';


	if (!empty($film)) { 
		foreach ($film as $row):
			$kd_film = $row->kd_film;    
			$judul = $row->judul;
			$jenis = $row->jenis;
			$tahun = $row->tahun_rilis;
			$image = $row->gambar;
			$durasi = $row->durasi;
			$titel   = 'Perbarui';
			$aksi   = 'perbarui';
			$button   = 'Perbarui';
		endforeach;
	}
?> 

<div class="span9">
	   <h3 class="page-title"><?php echo $titel; ?> film</h3>
	   
<div class="well">
	<form id="user" method="post" action="<?php echo base_url();?>index.php/c_film/<?php echo $aksi; ?>" enctype="multipart/form-data">
	   
		<label>Kode</label>
		<input type="text" id="kode" name="kd_film" value="<?php echo $kd_film; ?>" readonly>

		<label>Nama</label>
		<input type="text" id="nama" name="judul" value="<?php echo $judul; ?>" required>
		
		<label>Gambar</label>
		<input type="file" name="gambar" />
		<input type="hidden" name="old_image" value="<?php echo $image; ?>" />
		
		<label>Jenis</label>
		<textarea name=jenis id=jenis cols=50 rows=5 required><?php echo $jenis; ?></textarea>
		
		<label>Tahun Terbit</label>
		<input type="number" min="1977" max="2222" id="tahun" name="tahun" value="<?php echo $tahun; ?>" required>
		
		<label>Durasi</label>
		<input type="number" id="durasi" name="durasi" value="<?php echo $durasi; ?>" required>

		<div style="padding-top:20px">
		   <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> film</button>
		</div>
	</form>
</div>
</div>


   