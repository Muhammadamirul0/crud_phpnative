<?php
// Mengimpor file koneksi ke database
include "connection.php";

// Mengambil nilai parameter 'x' dari URL menggunakan metode GET
$notrans = $_GET["x"];

// Query SQL untuk menghapus data berobat berdasarkan nomor transaksi yang diterima dari parameter URL
$sql = "DELETE FROM tberobat WHERE no_transaksi='$notrans'";

// Menjalankan query DELETE untuk menghapus data dari tabel tberobat
$conn->query($sql);

// Mengarahkan pengguna kembali ke halaman data_berobat.php setelah penghapusan berhasil
header("location:data_berobat.php");
?>
