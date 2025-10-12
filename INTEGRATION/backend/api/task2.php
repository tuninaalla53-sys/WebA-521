<?php
require_once '../data/employees.php';
require_once '../data/helpers.php';

$employees = getEmployees();
$groupedByCompany = [];

foreach ($employees as $employee) {
    $company = $employee['company'];
    if (!isset($groupedByCompany[$company])) {
        $groupedByCompany[$company] = [];
    }
    $groupedByCompany[$company][] = $employee['name'];
}

sendJsonResponse([
    'success' => true,
    'data' => $groupedByCompany
]);
?>