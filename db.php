<?php
header('Access-Control-Allow-Origin: *');  // Mengizinkan semua domain
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');  // Metode yang diperbolehkan
header('Access-Control-Allow-Headers: Content-Type');  // Header yang diperbolehkan

$host = 'localhost'; // Server database
$user = 'root';      // Username database
$password = '';      // Password database
$database = 'data_pegawai'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
