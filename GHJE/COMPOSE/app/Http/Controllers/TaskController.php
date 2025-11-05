<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task1()
    {
        $employees = [
            ['name' => 'Иван Иванов', 'company' => 'Google', 'position' => 'Разработчик'],
            ['name' => 'Петр Петров', 'company' => 'Microsoft', 'position' => 'Дизайнер'],
            ['name' => 'Мария Сидорова', 'company' => 'Apple', 'position' => 'Менеджер'],
            ['name' => 'Анна Ковалева', 'company' => 'Google', 'position' => 'Аналитик'],
            ['name' => 'Сергей Смирнов', 'company' => 'Amazon', 'position' => 'Тестировщик'],
            ['name' => 'Ольга Новикова', 'company' => 'Microsoft', 'position' => 'Разработчик'],
            ['name' => 'Дмитрий Кузнецов', 'company' => 'Apple', 'position' => 'Дизайнер'],
            ['name' => 'Елена Васнецова', 'company' => 'Google', 'position' => 'Менеджер'],
            ['name' => 'Алексей Попов', 'company' => 'Amazon', 'position' => 'Аналитик'],
            ['name' => 'Наталья Орлова', 'company' => 'Microsoft', 'position' => 'Тестировщик']
        ];

        return view('tasks.task1', compact('employees'));
    }

    public function task2()
    {
        $employees = [
            ['name' => 'Иван Иванов', 'company' => 'Google', 'position' => 'Разработчик'],
            ['name' => 'Петр Петров', 'company' => 'Microsoft', 'position' => 'Дизайнер'],
            ['name' => 'Мария Сидорова', 'company' => 'Apple', 'position' => 'Менеджер'],
            ['name' => 'Анна Ковалева', 'company' => 'Google', 'position' => 'Аналитик'],
            ['name' => 'Сергей Смирнов', 'company' => 'Amazon', 'position' => 'Тестировщик'],
            ['name' => 'Ольга Новикова', 'company' => 'Microsoft', 'position' => 'Разработчик'],
            ['name' => 'Дмитрий Кузнецов', 'company' => 'Apple', 'position' => 'Дизайнер'],
            ['name' => 'Елена Васнецова', 'company' => 'Google', 'position' => 'Менеджер'],
            ['name' => 'Алексей Попов', 'company' => 'Amazon', 'position' => 'Аналитик'],
            ['name' => 'Наталья Орлова', 'company' => 'Microsoft', 'position' => 'Тестировщик']
        ];

        $groupedEmployees = [];
        foreach ($employees as $employee) {
            $groupedEmployees[$employee['company']][] = $employee;
        }

        return view('tasks.task2', compact('groupedEmployees'));
    }

    public function task3()
    {
        $numbers = [1];
        for ($i = 1; $i < 10; $i++) {
            $previous = $numbers[$i - 1];
            do {
                $newNumber = rand($previous + 1, $previous + 20);
            } while ($newNumber <= $previous);
            $numbers[] = $newNumber;
        }

        return view('tasks.task3', compact('numbers'));
    }

    public function task4()
    {
        $numbers = [];
        for ($i = 0; $i < 10; $i++) {
            $floatNumber = rand(100, 1000) / 100;
            $precision = rand(1, 3);
            $rounded = round($floatNumber, $precision);
            
            $numbers[] = [
                'original' => $floatNumber,
                'precision' => $precision,
                'rounded' => $rounded
            ];
        }

        return view('tasks.task4', compact('numbers'));
    }

    public function task5()
    {
        $matrix = [];
        $minValues = [];
        $minPositions = [];
        
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $matrix[$i][$j] = rand(10, 100);
            }
        }
        
        for ($j = 0; $j < 5; $j++) {
            $columnValues = array_column($matrix, $j);
            $minValue = min($columnValues);
            $minValues[$j] = $minValue;
            
            $minPositions[$j] = [];
            foreach ($matrix as $rowIndex => $row) {
                if ($row[$j] == $minValue) {
                    $minPositions[$j][] = $rowIndex;
                }
            }
        }
        
        $minSum = array_sum($minValues);
        $minAverage = $minSum / count($minValues);

        return view('tasks.task5', compact('matrix', 'minValues', 'minPositions', 'minSum', 'minAverage'));
    }
}