<?php
// Menginclude file connection.php untuk menghubungkan ke database
include "connection.php";

// Query SQL untuk mengambil data pasien
$sql1 = "SELECT * FROM tpasien";
$result1 = $conn->query($sql1);

// Query SQL untuk mengambil data dokter
$sql2 = "SELECT * FROM tdokter";
$result2 = $conn->query($sql2);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Rekam Medis</title>
</head>
<style>
    h1{
        text-align: center;
        background-color: #87ceeb;
        color: 151515;
        font-family: 'Roboto', sans-serif;
        padding: 5px;
    }
    h3{
        color: 151515;
        font-family: 'Roboto', sans-serif;
    }
</style>
<body>
    <h1>Masukan Data Pasien</h1>
    <h3>Masukan Data</h3>
<form method="post" action="save.php">
 <table width="80%" border="0" cellpadding="5">
 <tr>
 <th width="31%" scope="row"><div align="left">Nomor Transaksi</div></th>
 <td width="69%"><label for="no_transaksi"></label>
 <input type="text" name="no_transaksi" id="no_transaksi" required="required" /></td>
 </tr>
 <tr>
 <th scope="row">
 <div align="left">
 <label for="nama_peserta">Nama Pasien</label>
 </div>
 </th>
 <td>
 <!-- Select box untuk memilih nama pasien -->
 <select name="nama_pasien">
 <?php
// Loop untuk menampilkan data pasien dalam select box
while ($row1 = $result1->fetch_assoc()) {
    echo "<option value=".$row1["kode_pasien"].">".$row1["nama_pasien"]."</option>";
}
?>
 </select>
 </td>
 </tr>
 <tr>
 <th scope="row">
 <div align="left">
 <label for="tgl_berobat">Tanggal Berobat</label>
 </div>
 </th>
 <td>
 <!-- Select box untuk memilih tanggal berobat -->
 <select name="tgl_berobat">
 <?php
// Loop untuk menampilkan pilihan tanggal dalam select box
for ($t = 1; $t <= 31; $t++) {
    echo "<option value=$t>$t</option>";
}
?>
 </select>
 <!-- Select box untuk memilih bulan berobat -->
 <label for="bln">Bulan</label>
 <select name="bln" id="bln">
 <?php
// Array untuk menyimpan nama bulan
$nmbulan = array ("--Pilih Bulan--",
     "Januari",
     "Februari",
     "Maret",
     "April",
     "Mei",
     "Juni",
     "Juli",
     "Agustus",
     "September",
     "Oktober",
     "November",
     "Desember");
// Loop untuk menampilkan pilihan bulan dalam select box
for ($b = 1; $b <= 12; $b++) {
    echo "<option value=$b>$nmbulan[$b]</option>";
}
?>
 </select>
 <!-- Input untuk memasukkan tahun berobat -->
 <label for="thn">Tahun</label>
 <input type="number" maxlength="4" min="2000" max="2030" id="thn" size="10" name="thn" required/>
 </td>
 </tr>
 <tr>
 <th scope="row">
 <div align="left">
 <label for="nama_dokter">Nama Dokter</label>
 </div>
 </th>
 <td>
 <!-- Select box untuk memilih nama dokter -->
 <select name="nama_dokter">
 <?php
// Loop untuk menampilkan data dokter dalam select box
while ($row2 = $result2->fetch_assoc()) {
    echo "<option value=".$row2["kode_dokter"].">".$row2["nama_dokter"]."</option>";
}
?>
 </select>
 </td>
 </tr>
 <tr>
 <th scope="row"><div align="left">Keluhan</div></th>
 <td>
 <!-- Input untuk memasukkan keluhan -->
 <input type="text" name="keluhan" id="keluhan" required />
 </td>
 </tr>
 <tr>
 <th scope="row"><div align="left">Biaya Administrasi</div></th>
 <td>
 <!-- Input untuk memasukkan biaya administrasi -->
 <input type="number" name="biaya_admin" id="biaya_admin" required />
 </td>
 </tr>
 <tr>
 <td>&nbsp;</td>
 <!-- Tombol untuk menyimpan data dan mereset form -->
 <td><input type="submit" value="Simpan" /><input type="reset" value="Clear" />
 </td>
 </tr>
 </table>
</form>
<h1>Muhammad Amirul--UjiKom</h1>
</body>
</html>
