<<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Tasks - COMPOSE</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">COMPOSE Project</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('tasks.task1') }}">Задание 1</a>
                <a class="nav-link" href="{{ route('tasks.task2') }}">Задание 2</a>
                <a class="nav-link" href="{{ route('tasks.task3') }}">Задание 3</a>
                <a class="nav-link" href="{{ route('tasks.task4') }}">Задание 4</a>
                <a class="nav-link" href="{{ route('tasks.task5') }}">Задание 5</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>