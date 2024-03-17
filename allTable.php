<?php
require_once('connect.php');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    if(isset($_GET['table'])) {

        $table = $_GET['table'];

        $sql = "SELECT * FROM $table";
        try {
            $stmt = $conn->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Cek ada atau tidak ada tabel yg diberikan
            if(empty($results)) {
                $error_response = array(
                    "status" => 404,
                    "error" => "Tabel '$table' tidak ditemukan dalam database"
                );
                header('Content-Type: application/json');
                echo json_encode($error_response, JSON_PRETTY_PRINT);
            } else {
                // mengirim data jika tabel ada
                $response = array(
                    "status" => 200,
                    "data" => $results
                );
                header('Content-Type: application/json');
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        } catch(PDOException $e) {
            // Jika terjadi kesalahan lain dalam menjalankan query, kirim respons dengan format yang diinginkan
            $error_response = array(
                "status" => 500,
                "error" => $e->getMessage()
            );
            header('Content-Type: application/json');
            echo json_encode($error_response, JSON_PRETTY_PRINT);
        }
    } else {
        // gak pake parameter table di client
        $error_response = array(
            "status" => 400,
            "error" => "Parameter 'table' tidak diberikan"
        );
        header('Content-Type: application/json');
        echo json_encode($error_response, JSON_PRETTY_PRINT);
    }
}
?>
