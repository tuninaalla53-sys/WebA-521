<?php
header('Content-Type: application/json; charset=utf-8');

$len = 10;
$arr = [1];
$prev = 1;

for ($i = 1; $i < $len; $i++) {
    do {
        $candidate = random_int($prev + 1, $prev + 20);
    } while ($candidate <= $prev);
    $arr[] = $candidate;
    $prev = $candidate;
}

echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
