<?php
require_once '../data/helpers.php';

// Создаем двумерный массив 5x5
$matrix = [];
$minValues = [];
$minSum = 0;

// Заполняем массив случайными числами
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matrix[$i][$j] = rand(10, 100);
    }
}

// Находим минимальные значения в каждом столбце
for ($j = 0; $j < 5; $j++) {
    $column = array_column($matrix, $j);
    $minValue = min($column);
    $minValues[$j] = $minValue;
    $minSum += $minValue;
}

$averageMin = $minSum / 5;

sendJsonResponse([
    'success' => true,
    'data' => [
        'matrix' => $matrix,
        'minValues' => $minValues,
        'minSum' => $minSum,
        'averageMin' => round($averageMin, 2)
    ]
]);
?>