<?php
require_once '../data/helpers.php';

$numbers = [1]; // Первый элемент всегда 1
$previous = 1;

for ($i = 1; $i < 10; $i++) {
    do {
        $randomNumber = rand($previous + 1, $previous + 50); // Генерируем число больше предыдущего
    } while ($randomNumber <= $previous);

    $numbers[] = $randomNumber;
    $previous = $randomNumber;
}

sendJsonResponse([
    'success' => true,
    'data' => $numbers
]);
?>