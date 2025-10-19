<?php
header('Content-Type: application/json; charset=utf-8');

$rows = 5;
$cols = 5;
$matrix = [];

for ($r = 0; $r < $rows; $r++) {
    $row = [];
    for ($c = 0; $c < $cols; $c++) {
        $row[] = mt_rand(10, 100);
    }
    $matrix[] = $row;
}

$columnMins = array_fill(0, $cols, PHP_INT_MAX);
for ($c = 0; $c < $cols; $c++) {
    for ($r = 0; $r < $rows; $r++) {
        if ($matrix[$r][$c] < $columnMins[$c]) {
            $columnMins[$c] = $matrix[$r][$c];
        }
    }
}

$sumMins = array_sum($columnMins);
$avgMins = $sumMins / count($columnMins);

echo json_encode([
    'matrix' => $matrix,
    'columnMins' => $columnMins,
    'sumMins' => $sumMins,
    'avgMins' => $avgMins
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
