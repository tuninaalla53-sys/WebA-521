<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - WebA-521</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Стили для карточек продуктов на главной странице */
        .product-card-image {
            width: 100%;
            height: 250px;
            object-fit: cover; /* Обрезаем изображение чтобы оно заполнило контейнер */
            object-position: center; /* Центрируем изображение */
        }
        
        /* Стили для изображения на странице продукта */
        .product-detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            object-position: center;
        }
        
        /* Контейнер для изображения с фиксированной высотой */
        .image-container {
            overflow: hidden;
            background-color: #f8f9fa;
        }
        
        .comment-section {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        /* Дополнительные стили для лучшего отображения */
        .card {
            transition: transform 0.2s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">WebA-521</a>
            
            <div class="navbar-nav ms-auto">
                @auth
                    <span class="navbar-text me-3">Привет, {{ Auth::user()->name }}!</span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Выйти</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>