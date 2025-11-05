

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 2</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .company { margin-bottom: 30px; }
        .company-name { color: #007bff; font-size: 1.2em; margin-bottom: 10px; }
        .employee-list { list-style-type: none; padding: 0; }
        .employee-item { padding: 5px 0; border-bottom: 1px solid #eee; }
        .back-link { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Назад к списку заданий</a>
    <h1>Задание 2: Сотрудники по компаниям</h1>
    
    {{-- Перебираем сгруппированный массив по компаниям --}}
    @foreach($groupedEmployees as $company => $employees)
        <div class="company">
            {{-- Выводим название компании --}}
            <div class="company-name">{{ $company }}</div>
            
            {{-- Создаем неупорядоченный список для сотрудников компании --}}
            <ul class="employee-list">
                {{-- Перебираем сотрудников текущей компании --}}
                @foreach($employees as $employee)
                    <li class="employee-item">
                        {{ $employee['name'] }} - {{ $employee['position'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</body>
</html>