@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="text-center mb-4">Проект COMPOSE - WebA-521</h1>
        <div class="list-group">
            <a href="{{ route('tasks.task1') }}" class="list-group-item list-group-item-action">
                <h5>Задание 1: Подсветка отрицательных чисел</h5>
                <p>Функция принимает массив, ищет отрицательные числа и меняет их цвет на красный</p>
            </a>
            <a href="{{ route('tasks.task2') }}" class="list-group-item list-group-item-action">
                <h5>Задание 2: Конвертер чисел в текст</h5>
                <p>Функция конвертирует число в текстовое представление (4532 → четыре тысячи пятьсот тридцать два)</p>
            </a>
            <a href="{{ route('tasks.task3') }}" class="list-group-item list-group-item-action">
                <h5>Задание 3: Генерация div элементов</h5>
                <p>Рекурсивная генерация 10 div элементов со случайными координатами</p>
            </a>
            <a href="{{ route('tasks.task4') }}" class="list-group-item list-group-item-action">
                <h5>Задание 4: Карточки товаров</h5>
                <p>Вывод карточек телефонов с кнопкой "Купить"</p>
            </a>
            <a href="{{ route('tasks.task5') }}" class="list-group-item list-group-item-action">
                <h5>Задание 5: Корзина товаров</h5>
                <p>Функция корзины, которая группирует товары и подсчитывает общую стоимость</p>
            </a>
        </div>
    </div>
</div>
@endsection