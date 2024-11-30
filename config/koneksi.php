<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "19043_psas";

// Membuat koneksi menggunakan mysqli
$conn = new mysqli($server, $username, $password, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
