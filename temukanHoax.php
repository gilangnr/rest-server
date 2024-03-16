<?php
require_once('connect.php');

// Mengecek metode HTTP yang digunakan
$method = $_SERVER['REQUEST_METHOD'];

// Jika metode adalah GET
if ($method === 'GET') {
    $sql = "SELECT * FROM temukan_hoax";
    try {
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Mengirimkan data sebagai JSON dengan format yang diinginkan
        $response = array(
            "status" => 200,
            "data" => $results
        );

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    } catch(PDOException $e) {
        // Jika terjadi kesalahan, kirim respons dengan format yang diinginkan
        $error_response = array(
            "status" => 500,
            "error" => $e->getMessage()
        );
        header('Content-Type: application/json');
        echo json_encode($error_response, JSON_PRETTY_PRINT);
    }
}
?>
