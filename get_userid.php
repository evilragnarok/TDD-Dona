<?php
header("Content-Type: application/json");
require_once 'config.php'; // ไฟล์เชื่อมต่อ DB

$username = $_GET['username'] ?? '';

if (!$username) {
    echo json_encode(["status"=>"error"]);
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode([
        "status" => "success",
        "id" => $user['id']
    ]);
} else {
    echo json_encode(["status"=>"error"]);
}
