<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NumberConverterService;
use App\Services\CartService;

class TaskController extends Controller
{
    /**
     * Функция для задания 1: Проверка массива на отрицательные числа
     */
    private function highlightNegativeNumbers(array $array): bool
    {
        if (empty($array)) {
            return false;
        }
        
        foreach ($array as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }
        
        return true;
    }

    /**
     * Вспомогательная функция для отображения массива с подсветкой
     */
    private function displayArrayWithHighlight(array $array): string
    {
        $result = '[';
        
        foreach ($array as $index => $value) {
            if ($index > 0) {
                $result .= ', ';
            }
            
            if ($value < 0) {
                $result .= "<span style='color: red; font-weight: bold;'>$value</span>";
            } else {
                $result .= $value;
            }
        }
        
        $result .= ']';
        return $result;
    }

    /**
     * Главная страница со списком заданий
     */
    public function index()
    {
        return view('tasks.index');
    }

    /**
     * Задание 1: Подсветка отрицательных чисел
     */
    public function task1()
    {
        $testArray = [10, -5, 3, -8, 15, 0, -1, 7];
        
        $result = $this->highlightNegativeNumbers($testArray);
        
        return view('tasks.task1', [
            'originalArray' => $testArray,
            'result' => $result,
            'displayArray' => $this->displayArrayWithHighlight($testArray)
        ]);
    }

    /**
     * Задание 2: Конвертер чисел в текст
     */
    public function task2()
    {
        $converter = new NumberConverterService();
        
        $testNumbers = [4532, 123, 7890, 15, 1001, 7, 210];
        $convertedNumbers = [];
        
        foreach ($testNumbers as $number) {
            $convertedNumbers[$number] = $converter->convertToText($number);
        }
        
        return view('tasks.task2', [
            'convertedNumbers' => $convertedNumbers
        ]);
    }

    /**
     * Задание 3: Генерация div элементов
     */
    public function task3()
    {
        return view('tasks.task3');
    }

    /**
     * Задание 4: Карточки товаров
     */
    public function task4()
    {
        // Используем ваши реальные изображения из public/images/phones/
        $phones = [
            [
                'name' => 'iPhone 15 Pro',
                'image' => asset('images/phones/orig1.webp'), // Ваше изображение
                'price' => 99999
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'image' => asset('images/phones/orig2.webp'), // Ваше изображение
                'price' => 89999
            ],
            [
                'name' => 'Google Pixel 8',
                'image' => asset('images/phones/orig3.webp'), // Ваше изображение
                'price' => 75999
            ]
        ];
        
        return view('tasks.task4', ['phones' => $phones]);
    }

    /**
     * Задание 5: Корзина товаров
     */
    public function task5()
    {
        // Используем ваши реальные изображения
        $cartItems = [
            ['name' => 'iPhone 15 Pro', 'image' => asset('images/phones/orig1.webp'), 'price' => 99999],
            ['name' => 'Samsung Galaxy S24', 'image' => asset('images/phones/orig2.webp'), 'price' => 89999],
            ['name' => 'iPhone 15 Pro', 'image' => asset('images/phones/orig1.webp'), 'price' => 99999],
            ['name' => 'Google Pixel 8', 'image' => asset('images/phones/orig3.webp'), 'price' => 75999],
            ['name' => 'Samsung Galaxy S24', 'image' => asset('images/phones/orig2.webp'), 'price' => 89999],
        ];
        
        $cartService = new CartService();
        $processedCart = $cartService->processCart($cartItems);
        
        return view('tasks.task5', ['cart' => $processedCart]);
    }
}