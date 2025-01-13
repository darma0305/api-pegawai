<?php
require 'db.php';

// Atur header untuk respon JSON
header("Content-Type: application/json");

// Tangkap data dari request body
$input = json_decode(file_get_contents('php://input'), true);
$nama = $conn->real_escape_string($input['nama']);
$nik = $conn->real_escape_string($input['nik']);
$alamat = $conn->real_escape_string($input['alamat']);
$nomor_telepon = $conn->real_escape_string($input['	nomor_telepon']);

// Insert data ke database
$sql = "INSERT INTO pegawai (nama, nik, alamat,nomor_telepon) 
        VALUES ('$nama', '$nik', '$alamat', '$nomor_telepon')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Data berhasil ditambahkan']);
} else {
    echo json_encode(['message' => 'Error: ' . $conn->error]);
}

$conn->close();
?>
