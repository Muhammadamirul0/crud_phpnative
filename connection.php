<?php
// Informasi untuk koneksi database
$srvr = "localhost";   // Alamat server database (localhost)
$un = "root";          // Username database
$pw = "";              // Password database (kosong karena tidak ada password)
$db = "klinik";     // Nama database yang akan digunakan

// Membuat objek koneksi baru ke database MySQL menggunakan informasi di atas
$conn = new mysqli($srvr, $un, $pw, $db);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    // Jika koneksi gagal, maka tampilkan pesan error dan hentikan eksekusi skrip
    die("Gagal Koneksi: " . $conn->connect_error);
}
?>
