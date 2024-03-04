<?php
// Menggunakan file connection.php untuk menghubungkan ke database
require_once "connection.php";

// Query SQL untuk mengambil data dari tabel vberobat
$sql = "SELECT vberobat.*, tpasien.tanggal_lahir
        FROM vberobat
        INNER JOIN tpasien ON vberobat.kode_pasien = tpasien.kode_pasien";

// Menjalankan query dan menyimpan hasilnya dalam variabel $result
$result = $conn->query($sql);

// Memeriksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query Error: " . $conn->error);
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Berobat</title>
<style>
    h1 {
      color:151515;
      background-color: #87ceeb;
      padding: 5px;
      font-family: 'Roboto', sans-serif;
      text-align: center;
    }
    h3{
      text-align: center;
      font-family: 'Roboto', sans-serif;
    }
</style>
</head>
<body>
<h1 align="center">Data Berobat</h1>
<table border="1" width="82%" cellpadding="5" align="center">
<tr>
  <!-- Tombol untuk menambahkan data baru -->
  <td colspan="10"><input type="button" value="Add New" onclick="location='addnew.php'" />
  <!-- Tombol untuk kembali ke menu utama -->
  <input type="button" value="Menu" onclick="location='menu.html'" /></td>
</tr>
<tr bgcolor="#87ceeb">
  <!-- Kolom-kolom tabel -->
  <th width="91" scope="col">No Transaksi</th>
  <th width="100" scope="col">Tanggal</th>
  <th width="106" scope="col">Nama Pasien</th>
  <th width="106" scope="col">Usia</th>
  <th width="118" scope="col">Jenis Kelamin</th>
  <th width="78" scope="col">Keluhan</th>
  <th width="87" scope="col">Nama Poli</th>
  <th width="68" scope="col">Dokter</th>
  <th width="138" scope="col">Biaya Administrasi</th>
  <th width="99" scope="col">Action</th>
</tr>

<?php
// Menampilkan data dari hasil query menggunakan perulangan while
while ($row = $result->fetch_assoc()) {
    // Hitung usia pasien
    $tanggal_lahir_pasien = new DateTime($row["tanggal_lahir"]);
    $today = new DateTime();
    $usia = $today->diff($tanggal_lahir_pasien)->y;
?>
<tr>
  <!-- Menampilkan data pada setiap kolom -->
  <td align="center"><?= htmlspecialchars($row["no_transaksi"]); ?></td>
  <td align="center"><?= htmlspecialchars($row["tgl_berobat"]); ?></td>
  <td><?= htmlspecialchars($row["nama_pasien"]); ?></td>
  <td align="center"><?= $usia; ?></td> <!-- Menampilkan usia -->
  <td align="center"><?= htmlspecialchars($row["jenis_kelamin"]); ?></td>
  <td align="center"><?= htmlspecialchars($row["keluhan"]); ?></td>
  <td align="center"><?= htmlspecialchars($row["nama_poli"]); ?></td>
  <td><?= htmlspecialchars($row["nama_dokter"]); ?></td>
  <td align="center"><?= htmlspecialchars($row["biaya_admin"]); ?></td>
  <td align="center">
    <!-- Tombol untuk mengedit data -->
    <a href="edit.php?notrans=<?= htmlspecialchars($row["no_transaksi"]); ?>">Edit</a>
    <!-- Tombol untuk menghapus data dengan konfirmasi -->
    | <a href="delete.php?x=<?= htmlspecialchars($row["no_transaksi"]); ?>" onclick="return confirm('Data Anda akan dihapus, klik OK untuk melanjutkan')">Del</a></h3>
  </td>
</tr>
<?php
};
?>
</table>
<h1>Muhammad Amirul--UjiKom</h1>
<h3>CIHUY!!!</h3>
</body>
</html>
