<?php
require_once 'connect.php'; // ไฟล์เชื่อมฐานข้อมูล

header('Content-Type: application/json');

if (!isset($_GET['username'])) {
    echo json_encode(["status" => "error", "message" => "No username"]);
    exit;
}

$username = mysqli_real_escape_string($conn, $_GET['username']);

$sql = "SELECT id FROM users WHERE username = '$username' LIMIT 1";
$res = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($res)) {
    echo json_encode([
        "status" => "success",
        "id" => $row['id']
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "User not found"
    ]);
}
