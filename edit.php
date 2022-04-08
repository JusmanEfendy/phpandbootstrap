<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['Nik'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$Nik = $_GET['Nik'];

		//query ke database SELECT tabel masyarakat berdasarkan id = $id
		$select = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE Nik='$Nik'") or die(mysqli_error($koneksi));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
			exit();
			//jika hasil query > 0
		} else {
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$Nama			  = $_POST['Nama'];
		$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
		$Dusun	= $_POST['Dusun'];

		$sql = mysqli_query($koneksi, "UPDATE masyarakat SET Nama='$Nama', Jenis_Kelamin='$Jenis_Kelamin', Dusun='$Dusun' WHERE Nik='$Nik'") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_msyrkt";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		}
	}
	?>

	<form action="index.php?page=edit_msyrkt&Nik=<?php echo $Nik; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nik" class="form-control" size="4" value="<?php echo $data['Nik']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Masyarakat</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Nama" class="form-control" value="<?php echo $data['Nama']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
			<div class="col-md-6 col-sm-6 ">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" <?php if ($data['Jenis_Kelamin'] == 'Laki-Laki') {
																										echo 'checked';
																									} ?> required>Laki-Laki
					</label>
					<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" <?php if ($data['Jenis_Kelamin'] == 'Perempuan') {
																										echo 'checked';
																									} ?> required>Perempuan
					</label>
				</div>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Dusun</label>
			<div class="col-md-6 col-sm-6">
				<select name="Dusun" class="form-control" required>
					<option value="">Pilih Dusun</option>
					<option value="Teluk Santong" <?php if ($data['Dusun'] == 'Teluk Santong') {
														echo 'selected';
													} ?>>Teluk Santong</option>
					<option value="Labuan Jontal" <?php if ($data['Dusun'] == 'Labuan Jontal') {
														echo 'selected';
													} ?>>Labuan Jontal</option>
					<option value="Ai Boro" <?php if ($data['Dusun'] == 'Ai Boro') {
												echo 'selected';
											} ?>>Ai Boro</option>

				</select>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="index.php?page=tampil_msyrkt" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>