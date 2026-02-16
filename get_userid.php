<?php
header("Content-Type: application/json");

try {

require_once 'config.php';

$username = $_GET['username'] ?? '';

if (!$username) {
    echo json_encode(["status"=>"error","msg"=>"no username"]);
    exit;
}

// ป้องกัน error ถ้าไม่มี $pdo
if (!isset($pdo)) {
    throw new Exception("PDO not connected");
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode([
        "status" => "success",
        "id" => $user['id']
    ]);
} else {
    echo json_encode(["status"=>"error","msg"=>"not found"]);
}

} catch (Exception $e) {
    echo json_encode([
        "status"=>"error",
        "msg"=>$e->getMessage()
    ]);
}
