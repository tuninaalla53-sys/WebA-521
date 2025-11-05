
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .employee { margin: 10px 0; padding: 10px; background: #f8f9fa; border-radius: 5px; }
        .back-link { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Назад к списку заданий</a>
    <h1>Задание 1: Вывод массива сотрудников</h1>
    
    {{-- Перебираем массив сотрудников и выводим в нужном формате --}}
    @foreach($employees as $employee)
        <div class="employee">
            {{-- Выводим информацию в формате: "Name" is working in "Company" as: "position" --}}
            <strong>"{{ $employee['name'] }}"</strong> is working in <strong>"{{ $employee['company'] }}"</strong> as: <strong>"{{ $employee['position'] }}"</strong>
        </div>
    @endforeach
    
    {{-- Выводим общее количество сотрудников --}}
    <div style="margin-top: 20px; font-weight: bold;">
        Всего сотрудников: {{ count($employees) }}
    </div>
</body>
</html>