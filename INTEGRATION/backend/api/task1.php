<?php
require_once '../data/employees.php';
require_once '../data/helpers.php';

$employees = getEmployees();
$result = [];

foreach ($employees as $employee) {
    $result[] = "{$employee['name']} is working in {$employee['company']} on position: {$employee['position']}";
}

sendJsonResponse([
    'success' => true,
    'data' => $result
]);
?>