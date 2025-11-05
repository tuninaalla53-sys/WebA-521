
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .number-list { display: flex; flex-wrap: wrap; gap: 10px; margin: 20px 0; }
        .number-item { padding: 10px 15px; background: #007bff; color: white; border-radius: 5px; }
        .back-link { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Назад к списку заданий</a>
    <h1>Задание 3: Возрастающий массив чисел</h1>
    
    <p>Массив из 10 чисел, где каждое следующее число больше предыдущего:</p>
    
    {{-- Выводим массив чисел в виде списка --}}
    <div class="number-list">
        @foreach($numbers as $index => $number)
            <div class="number-item">
                {{-- Выводим индекс и значение числа --}}
                [{{ $index }}]: {{ $number }}
            </div>
        @endforeach
    </div>
    
    {{-- Дополнительная информация о массиве --}}
    <div style="margin-top: 20px;">
        <p><strong>Первый элемент:</strong> {{ $numbers[0] }}</p>
        <p><strong>Последний элемент:</strong> {{ $numbers[count($numbers)-1] }}</p>
        <p><strong>Разница между первым и последним:</strong> {{ $numbers[count($numbers)-1] - $numbers[0] }}</p>
    </div>
</body>
</html>