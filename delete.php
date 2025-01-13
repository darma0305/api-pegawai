<?php

include 'db.php';


// Pastikan bahwa server bisa membaca data JSON yang dikirim
header('Content-Type: application/json');


// Mendapatkan data JSON yang dikirim
$data = json_decode(file_get_contents("php://input"), true);

// Memastikan ID tersedia dalam data yang diterima
if (isset($data['id'])) {
    $id = $data['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM pegawai WHERE id = ?";
    
    // Menggunakan prepared statement untuk menghindari SQL injection
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id); // Bind ID sebagai integer
        $stmt->execute(); // Eksekusi query
        
        if ($stmt->affected_rows > 0) {
            // Jika ada data yang dihapus
            echo json_encode(["message" => "Data successfully deleted"]);
        } else {
            // Jika tidak ada data yang dihapus (ID tidak ditemukan)
            echo json_encode(["message" => "Failed to delete data"]);
        }
        
        $stmt->close(); // Menutup statement
    } else {
        echo json_encode(["message" => "Query preparation failed"]);
    }

    $conn->close(); // Menutup koneksi database
} else {
    // Jika ID tidak ditemukan dalam request
    echo json_encode(["message" => "Invalid ID"]);
}
?>
