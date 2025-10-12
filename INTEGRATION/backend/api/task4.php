<?php
require_once '../data/helpers.php';

$numbersWithPrecision = [];

for ($i = 0; $i < 10; $i++) {
    $floatNumber = rand(100, 1000) / 100; // Генерируем числа с плавающей точкой 1.00 - 10.00
    $precision = rand(1, 3); // Степень округления от 1 до 3
    $rounded = round($floatNumber, $precision);

    $numbersWithPrecision[] = [
        'original' => $floatNumber,
        'precision' => $precision,
        'rounded' => $rounded
    ];
}

sendJsonResponse([
    'success' => true,
    'data' => $numbersWithPrecision
]);
?>