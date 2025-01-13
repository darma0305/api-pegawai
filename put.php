<?php
require 'db.php';

// Atur header untuk respon JSON
header("Content-Type: application/json");

// Tangkap ID dari parameter
$id = intval($_GET['id']);
$input = json_decode(file_get_contents('php://input'), true);
$nama = $conn->real_escape_string($input['nama']);
$nik = $conn->real_escape_string($input['nik']);
$alamat = $conn->real_escape_string($input['alamat']);
$nomor_telepon = $conn->real_escape_string($input['	nomor_telepon']);

// Update data di database
$sql = "UPDATE pegawai SET 
        nama = '$nama', 
        nik = '$nik', 
        alamat = '$alamat', 
        nomor_telepon = '$	nomor_telepon' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Data berhasil diubah']);
} else {
    echo json_encode(['message' => 'Error: ' . $conn->error]);
}

$conn->close();
?>
