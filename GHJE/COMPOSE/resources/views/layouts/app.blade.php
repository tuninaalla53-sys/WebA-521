<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    @yield('styles')
</head>
<body>
    <!-- Навигация на всех страницах (кроме главной) -->
    @if (!Request::is('/'))
    <nav style="background: #333; padding: 15px; text-align: center; position: fixed; top: 0; width: 100%; z-index: 1000;">
        <a href="{{ url('/') }}" style="color: white; margin: 0 20px; text-decoration: none; font-weight: bold;">🏠 Главная</a>
        <a href="{{ url('/table') }}" style="color: white; margin: 0 20px; text-decoration: none;">📊 Таблица</a>
        <a href="{{ url('/sidebar') }}" style="color: white; margin: 0 20px; text-decoration: none;">🎛️ Боковое меню</a>
        <a href="{{ url('/pricing') }}" style="color: white; margin: 0 20px; text-decoration: none;">💳 Карточки подписки</a>
    </nav>
    @endif
    
    <!-- Содержимое страницы -->
    <div style="@if (!Request::is('/')) margin-top: 60px; @endif">
        @yield('content')
    </div>
</body>
</html>