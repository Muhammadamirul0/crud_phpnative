<?php
// Mengimpor file connection.php yang berisi skrip untuk membuat koneksi ke database
include "connection.php";

// Mengambil data dari form yang disubmit menggunakan metode POST
$notrans = $_POST["notrans"];
$nmpasien = $_POST["nmpasien"];
$tg = $_POST["tgl"];
$bl = $_POST["bln"];
$th = $_POST["thn"];

// Menggabungkan tanggal, bulan, dan tahun menjadi format tanggal yang benar
$tgl = $th . '-' . $bl . '-' . $tg;

// Mengambil data bidan, keluhan, dan biaya administrasi dari form
$nmdokter = $_POST["nmdokter"];
$kel = $_POST["keluhan"];
$biaya = $_POST["biayaadm"];

// Menyusun query SQL untuk mengupdate data berobat berdasarkan nomor transaksi
$query = "UPDATE tberobat
          SET
          kode_pasien='$nmpasien',
          tgl_berobat='$tgl',
          kode_dokter='$nmdokter',
          keluhan='$kel',
          biaya_admin='$biaya'
          WHERE no_transaksi='$notrans'";

// Menjalankan query SQL untuk mengupdate data di tabel tberobat
$conn->query($query);

// Mengarahkan pengguna kembali ke halaman data_berobat.php setelah proses selesai
header("location:data_berobat.php");
?>
