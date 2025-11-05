
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 5</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; min-width: 60px; }
        th { background-color: #f8f9fa; }
        .min-value { background-color: #ffebee; color: #d32f2f; font-weight: bold; }
        .results { margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 5px; }
        .back-link { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <a href="/" class="back-link">← Назад к списку заданий</a>
    <h1>Задание 5: Матрица с минимальными значениями</h1>
    
    <h3>Матрица 5x5 (минимальные значения в столбцах выделены красным):</h3>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                {{-- Заголовки для столбцов --}}
                @for($j = 0; $j < 5; $j++)
                    <th>Столбец {{ $j + 1 }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            {{-- Перебираем строки матрицы --}}
            @foreach($matrix as $rowIndex => $row)
                <tr>
                    <th>Строка {{ $rowIndex + 1 }}</th>
                    
                    {{-- Перебираем ячейки в строке --}}
                    @foreach($row as $colIndex => $value)
                        <td class="{{ in_array($rowIndex, $minPositions[$colIndex]) ? 'min-value' : '' }}">
                            {{ $value }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{-- Блок с результатами вычислений --}}
    <div class="results">
        <h3>Результаты:</h3>
        
        {{-- Выводим минимальные значения по столбцам --}}
        <p><strong>Минимальные значения по столбцам:</strong></p>
        <ul>
            @foreach($minValues as $colIndex => $minValue)
                <li>Столбец {{ $colIndex + 1 }}: {{ $minValue }}</li>
            @endforeach
        </ul>
        
        {{-- Выводим сумму и среднее значение --}}
        <p><strong>Сумма минимальных значений:</strong> {{ $minSum }}</p>
        <p><strong>Среднее значение минимальных:</strong> {{ number_format($minAverage, 2) }}</p>
    </div>
</body>
</html>