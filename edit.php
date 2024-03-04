<!DOCTYPE html>
<html>
<head>
<title>Pengelolaan Pasien</title>
</head>
<style>
    h1 {
        text-align: center;
        background-color: #87ceeb;
        color: 151515;
        font-family: 'Roboto', sans-serif;
        padding: 5px;
    }
</style>
<body>
<h1>Pengelolaan Data Pasien</h1>
<br/>
<!-- Link untuk melihat data berobat -->
<a href="data_berobat.php">Kembali Ke View Berobat</a>
<br/>
<br/>
<!-- Heading untuk bagian edit data -->
<h3>Edit Data</h3>
<?php
// Mengimpor file connection.php yang berisi skrip koneksi ke database
include 'connection.php';

// Mengambil nomor transaksi dari parameter URL
$notrans = $_GET['notrans'];

// Query SQL untuk mengambil data berobat berdasarkan nomor transaksi
$sql = "SELECT * FROM tberobat WHERE no_transaksi='$notrans'";

// Menjalankan query SQL dan menyimpan hasilnya dalam variabel $data
$data = mysqli_query($conn, $sql);

// Memulai loop while untuk menampilkan form edit
while ($r = mysqli_fetch_array($data)) {
    // Memecah tanggal berobat menjadi tahun, bulan, dan tanggal
    $tgl = explode("-", $r["tgl_berobat"]);
    $bl = intval($tgl[1]);
    $tg = intval($tgl[2]);
?>
<!-- Form untuk mengupdate data berobat -->
<form method="post" action="update.php">
    <table>
        <tr>
            <td>No Transaksi </td>
            <!-- Input untuk nomor transaksi -->
            <td><input type="text" name="notrans" value="<?= $notrans ?>" ></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <!-- Select box untuk memilih nama pasien -->
            <td>
                <select name="nmpasien">
                <?php
                // Query SQL untuk mengambil data pasien
                $data_pasien = mysqli_query($conn, "SELECT * FROM tpasien");
                // Menampilkan opsi nama pasien dalam dropdown
                while($d = mysqli_fetch_array($data_pasien)){
                    if ($r['kode_pasien'] == $d['kode_pasien'])
                        echo "<option value=" . $d['kode_pasien'] ." selected='selected'>" . $d['nama_pasien']. "</option>";
                    else
                        echo "<option value=" . $d['kode_pasien'] .">" . $d['nama_pasien']. "</option>";
                }
                ?>
                </select>
            </td>
        </tr>
        <!-- Bagian untuk memilih tanggal berobat -->
        <tr>
            <td>Tanggal</td>
            <td>
                <!-- Select box untuk tanggal -->
                <select name="tgl">
                <?php
                // Loop untuk menampilkan opsi tanggal
                for ($x=1; $x<=31; $x++){
                    if($x == $tg)
                        echo "<option value='$x' selected='selected'>$x</option>";
                    else
                        echo "<option value='$x'>$x</option>";
                }
                ?>
                </select>
                <!-- Select box untuk bulan -->
                Bulan
                <select name="bln">
                <?php
                // Loop untuk menampilkan opsi bulan
                for ($x=1; $x<=12; $x++){
                    if($x == $bl)
                        echo "<option value='$x' selected='selected'>$x</option>";
                    else
                        echo "<option value='$x'>$x</option>";
                }
                ?>
                </select>
                <!-- Input untuk tahun -->
                <label for="thn">Tahun</label>
                <input type="number" maxlength="4" min="2000" max="2030" id="thn" size="10" name="thn" value="<?= $tgl[0] ?>" required/>
            </td>
        </tr>
        <tr>
            <td>Nama Dokter</td>
            <!-- Select box untuk memilih nama dokter -->
            <td>
                <select name="nmdokter">
                <?php
                // Query SQL untuk mengambil data dokter
                $data_dokter = mysqli_query($conn, "SELECT * FROM tdokter");
                // Menampilkan opsi nama dokter dalam dropdown
                while($d = mysqli_fetch_array($data_dokter)){
                    if ($r['kode_dokter'] == $d['kode_dokter'])
                        echo "<option value=" . $d['kode_dokter'] ." selected='selected'>" . $d['nama_dokter']. "</option>";
                    else
                        echo "<option value=" . $d['kode_dokter'] .">" . $d['nama_dokter']. "</option>";
                }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Keluhan</td>
            <!-- Input untuk keluhan -->
            <td><input type="text" name="keluhan" value="<?= $r['keluhan'] ?>"></td>
        </tr>
        <tr>
            <td>Biaya Administrasi</td>
            <!-- Input untuk biaya administrasi -->
            <td><input type="number" name="biayaadm" value="<?= $r['biaya_admin'] ?>"></td>
        </tr>
        <!-- Tombol untuk menyimpan perubahan -->
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan" /><input type="reset" value="Ulang" /></td>
        </tr>
    </table>
</form>
<?php
}
?>
<h1>Muhammad Amirul--UjiKom</h1>
</body>
</html>
