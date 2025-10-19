<?php
header('Content-Type: application/json; charset=utf-8');

$out = [];
for ($i = 0; $i < 10; $i++) {
    $value = mt_rand(0, 10000) / 100;
    $round = mt_rand(0, 4);
    $rounded = round($value, $round);
    $out[] = ['value' => $value, 'round' => $round, 'rounded' => $rounded];
}
echo json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
