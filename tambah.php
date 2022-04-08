<?php include('config.php'); ?>

<center>
	<font size="6">Tambah Data Masyarakat</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$Nik			= $_POST['Nik'];
	$Nama			= $_POST['Nama'];
	$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
	$Dusun		= $_POST['Dusun'];

	$cek = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE Nik='$Nik'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($koneksi, "INSERT INTO masyarakat(Nik, Nama, Jenis_Kelamin, Dusun) VALUES('$Nik', '$Nama', '$Jenis_Kelamin', '$Dusun')") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_msyrkt";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal, Nik sudah terdaftar.</div>';
	}
}
?>

<form action="index.php?page=tambah_msyrkt" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="Nik" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Masyarakat</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="Nama" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
		<div class="col-md-6 col-sm-6 ">
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
				</label>
				<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
				</label>
			</div>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Dusun</label>
		<div class="col-md-6 col-sm-6">
			<select name="Dusun" class="form-control" required>
				<option value="">Pilih Dusun</option>
				<option value="Teluk Santong">Teluk Santong</option>
				<option value="Labuan Jontal">Labuan Jontal</option>
				<option value="Ai Boro">Ai Boro</option>

			</select>
		</div>
	</div>
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
		</div>
</form>
</div>