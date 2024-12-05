<?php
$host = "localhost"; // Host database (biasanya localhost)
$user = "root"; // Username database
$pass = ""; // Password database
$dbname = "form"; // Nama database

// Membuat koneksi
$db = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
?>
