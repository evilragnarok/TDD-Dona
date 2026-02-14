<?php
header('Content-Type: application/json');

if (!isset($_GET['username'])) {
    echo json_encode(["error" => "no username"]);
    exit;
}

$username = $_GET['username'];
$url = "https://www.torrentdd.net/userdetails.php?username=" . urlencode($username);

$html = @file_get_contents($url);

if (!$html) {
    echo json_encode(["error" => "cannot fetch"]);
    exit;
}

preg_match('/userdetails\.php\?id=(\d+)/', $html, $matches);

if (isset($matches[1])) {
    echo json_encode(["id" => $matches[1]]);
} else {
    echo json_encode(["error" => "not found"]);
}
?>
