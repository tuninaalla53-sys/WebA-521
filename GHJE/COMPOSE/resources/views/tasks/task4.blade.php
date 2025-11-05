
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 4</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; }
        .back-link { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Назад к списку заданий</a>
    <h1>Задание 4: Округление чисел</h1>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Исходное число</th>
                <th>Точность округления</th>
                <th>Результат округления</th>
            </tr>
        </thead>
        <tbody>
            {{-- Перебираем массив чисел и выводим в таблицу --}}
            @foreach($numbers as $index => $numberData)
                <tr>
                    {{-- Номер элемента --}}
                    <td>{{ $index + 1 }}</td>
                    
                    {{-- Исходное число с плавающей точкой --}}
                    <td>{{ $numberData['original'] }}</td>
                    
                    {{-- Степень округления --}}
                    <td>{{ $numberData['precision'] }} знак(ов)</td>
                    
                    {{-- Результат после округления --}}
                    <td><strong>{{ $numberData['rounded'] }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>