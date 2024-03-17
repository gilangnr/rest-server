<?php
require_once('connect.php');

// Mengecek metode HTTP yang digunakan
$method = $_SERVER['REQUEST_METHOD'];

// Jika metode adalah POST
if ($method === 'POST') {
    // Memeriksa apakah header X-Authorization disertakan dalam permintaan
    if (!isset($_SERVER['HTTP_X_AUTHORIZATION'])) {
        // Jika tidak disertakan, kirim respons error
        $error_response = array(
            "status" => 401,
            "error" => "Unauthorized: X-Authorization header is missing"
        );
        header('Content-Type: application/json');
        echo json_encode($error_response, JSON_PRETTY_PRINT);
        exit(); // Menghentikan eksekusi skrip
    }

    // Mengambil tanggal saat ini dengan format 'YYYY-MM-DD'
    $current_date = date('Y-m-d');

    // Mengenkripsi tanggal saat ini menjadi hash MD5
    $api_key_hash = md5($current_date);

    // Memeriksa apakah body request mengandung api_key 
    if (!isset($_POST['api_key']) || $_POST['api_key'] !== $api_key_hash) { 
        // Jika api_key tidak sesuai, kirim respons error
        $error_response = array(
            "status" => 401,
            "error" => "Unauthorized: Invalid api_key "
        );
        header('Content-Type: application/json');
        echo json_encode($error_response, JSON_PRETTY_PRINT);
        exit(); // Menghentikan eksekusi skrip
    }

    // Mengambil token otorisasi dari database
    $sql_token = "SELECT authorization_token FROM authorization WHERE id = 1"; // Ganti dengan query yang sesuai
    try {
        $stmt_token = $conn->query($sql_token);
        $row = $stmt_token->fetch(PDO::FETCH_ASSOC);
        $authorization_token_db = $row['authorization_token'];

        // Memeriksa apakah token otorisasi valid
        $authorization_token_request = $_SERVER['HTTP_X_AUTHORIZATION'];
        $hashed_token_db = md5($authorization_token_db); // Mengenkripsi token dari database dengan MD5
        $bearer_token = 'Bearer ' . $hashed_token_db; // Menambahkan "Bearer " di depan token yang telah dienkripsi
        
        if ($authorization_token_request !== $bearer_token) {
            // Jika token tidak valid, kirim respons error
            $error_response = array(
                "status" => 401,
                "error" => "Unauthorized: Invalid X-Authorization token"
            );
            header('Content-Type: application/json');
            echo json_encode($error_response, JSON_PRETTY_PRINT);
            exit(); // Menghentikan eksekusi skrip
        }

        // Jika token otorisasi valid, lanjutkan dengan pengambilan data
        $sql = "SELECT * FROM jagoan_hoax";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Mengirimkan data sebagai JSON dengan format yang diinginkan
        $response = array(
            "status" => 200,
            "data" => $results
        );

        // Menambahkan header X-Authorization
        header('Content-Type: application/json');
        header('X-Authorization: ' . $bearer_token); // Mengirimkan token dengan "Bearer " di depannya
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
