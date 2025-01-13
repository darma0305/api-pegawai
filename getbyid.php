<?php
// Connect to the database and fetch data by ID
header("Content-Type: application/json");
$connection = mysqli_connect("localhost", "root", "", "data_pegawai");

$id = $_GET['id']; // Ambil ID dari query parameter

$query = "SELECT * FROM pegawai WHERE id = $id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>
