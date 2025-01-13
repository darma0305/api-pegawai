<?php
require 'db.php';

// Atur header untuk respon JSON
header("Content-Type: application/json");

// Periksa apakah ada parameter ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM pegawai WHERE id = $id";
} else {
    $sql = "SELECT * FROM pegawai";
}

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
