<?php
//koneksi ke database mysql,
$koneksi = mysqli_connect("localhost", "root", "", "santong");

//cek jika koneksi ke mysql gagal, maka akan tampil kata dibawah. venven
if (mysqli_connect_errno()) {
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
