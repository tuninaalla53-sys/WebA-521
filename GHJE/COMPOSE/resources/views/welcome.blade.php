<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Задания</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .task-list { list-style-type: none; padding: 0; }
        .task-list li { margin: 15px 0; }
        .task-list a { 
            display: block; 
            padding: 20px; 
            background: #007bff; 
            color: white; 
            text-decoration: none; 
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 18px;
            text-align: center;
        }
        .task-list a:hover { 
            background: #0056b3; 
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,123,255,0.3);
        }
        h1 { color: #333; text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎯 Выполнение заданий на Laravel</h1>
        <ul class="task-list">
            <li><a href="/task1">📋 Задание 1 - Массив сотрудников</a></li>
            <li><a href="/task2">🏢 Задание 2 - Фильтрация по компаниям</a></li>
            <li><a href="/task3">📈 Задание 3 - Возрастающий массив</a></li>
            <li><a href="/task4">🔢 Задание 4 - Округление чисел</a></li>
            <li><a href="/task5">🎲 Задание 5 - Матрица с минимумами</a></li>
        </ul>
    </div>
</body>
</html>