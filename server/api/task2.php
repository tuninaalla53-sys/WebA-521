<?php
header('Content-Type: application/json; charset=utf-8');

$mysqli = new mysqli("localhost","root","5121981A+","employees",3306);
if ($mysqli->connect_errno) {
    http_response_code(500);
    echo json_encode(['error' => 'DB connect failed', 'details' => $mysqli->connect_error]);
    exit;
}

$sql = "SELECT name, company, position FROM staff";
$result = $mysqli->query($sql);
if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed', 'details' => $mysqli->error]);
    exit;
}

$grouped = [];
while ($row = $result->fetch_assoc()) {
    $comp = $row['company'];
    if (!isset($grouped[$comp])) $grouped[$comp] = [];
    $grouped[$comp][] = ['name' => $row['name'], 'position' => $row['position']];
}

$result->free();
$mysqli->close();

echo json_encode($grouped, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
