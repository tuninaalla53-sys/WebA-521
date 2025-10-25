
@extends('layouts.app')

@section('title', 'Главная страница')

@section('styles')
<style>
    /* Стили для главной страницы */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    
    .container {
        max-width: 800px;
        margin: 50px auto;
        text-align: center;
    }
    
    h1 {
        color: #333;
        margin-bottom: 30px;
    }
    
    .nav-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .nav-link {
        display: inline-block;
        padding: 15px 30px;
        background: white;
        color: #333;
        text-decoration: none;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .nav-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    
    .nav-link.table { border-left: 4px solid #629aed; }
    .nav-link.sidebar { border-left: 4px solid #333; }
    .nav-link.pricing { border-left: 4px solid pink; }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Добро пожаловать в проект COMPOSE</h1>
    <p>Выберите задание для просмотра:</p>
    
    <div class="nav-links">
        <a href="{{ url('/table') }}" class="nav-link table">
            📊 Задание 1 - Таблица
        </a>
        <a href="{{ url('/sidebar') }}" class="nav-link sidebar">
            🎛️ Задание 2 - Боковое меню
        </a>
        <a href="{{ url('/pricing') }}" class="nav-link pricing">
            💳 Задание 3 - Карточки подписки
        </a>
    </div>
</div>
@endsection