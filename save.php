<?php
// Mengimpor file connection.php yang berisi skrip untuk membuat koneksi ke database
include "connection.php";

// Mengambil data dari form yang disubmit menggunakan metode POST
$no_transaksi = $_POST["no_transaksi"];
$nama_pasien = $_POST["nama_pasien"];
$tg = $_POST["tgl_berobat"];
$bl = $_POST["bln"];
$th = $_POST["thn"];

// Menggabungkan tanggal, bulan, dan tahun menjadi format tanggal yang benar
$tgl = $th . '-' . $bl . '-' . $tg;

// Mengambil data bidan dan keluhan dari form
$nama_dokter = $_POST["nama_dokter"];
$keluhan = $_POST["keluhan"];

// Mengambil biaya administrasi dari form
$biaya_admin = $_POST["biaya_admin"];

// Menyusun query SQL untuk memasukkan data baru ke dalam tabel trekammedis
$query = "INSERT INTO tberobat VALUES ('$no_transaksi', '$nama_pasien', '$tgl', '$nama_dokter', '$keluhan', '$biaya_admin')";

// Menjalankan query SQL untuk memasukkan data ke dalam tabel tberobat
$conn->query($query);

// Mengarahkan pengguna kembali ke halaman data_berobat.php setelah proses selesai
header("location:data_berobat.php");
?>
