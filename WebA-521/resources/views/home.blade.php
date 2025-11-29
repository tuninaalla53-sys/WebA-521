
@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="text-center mb-5">WebA-521 - Задания</h1>
        
        <div class="list-group">
            <!-- Задание 1 - Таблица Comments -->
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">
                <h5>Задание 1: Таблица Comments</h5>
                <p class="mb-1">Добавление таблицы комментариев с внешними ключами</p>
            </a>

            <!-- Задание 2 - Страница продукта -->
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">
                <h5>Задание 2: Страница продукта</h5>
                <p class="mb-1">Возможность перехода на страницу с описанием продукта</p>
            </a>

            <!-- Задание 3-5 - Комментарии -->
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">
                <h5>Задание 3-5: Система комментариев</h5>
                <p class="mb-1">Форма комментариев, список комментариев, удаление своих комментариев</p>
            </a>

            <!-- Задание 6 - Изображения продуктов -->
            <a href="{{ route('products.create') }}" class="list-group-item list-group-item-action">
                <h5>Задание 6: Изображения продуктов</h5>
                <p class="mb-1">Загрузка и отображение изображений продуктов</p>
            </a>
        </div>

        <!-- Кнопка для просмотра всех продуктов -->
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Посмотреть все продукты</a>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">Добавить новый продукт</a>
        </div>
    </div>
</div>
@endsection