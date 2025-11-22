
<?php

/**
 * Задание 1: Функция для подсветки отрицательных чисел
 * 
 * @param array $array Входной массив чисел
 * @return bool true при успешном выполнении, false при ошибке
 */
function highlightNegativeNumbers(array $array): bool
{
    // Проверяем, что массив не пустой
    if (empty($array)) {
        return false;  // Возвращаем false если массив пустой
    }
    
    // Проходим по всем элементам массива
    foreach ($array as $value) {
        // Проверяем, что элемент является числом
        if (!is_numeric($value)) {
            return false;  // Если найден не числовой элемент - возвращаем false
        }
    }
    
    // Если все проверки пройдены - возвращаем true
    return true;
}

/**
 * Вспомогательная функция для отображения массива с подсветкой
 * 
 * @param array $array Массив для отображения
 * @return string HTML строка с подсвеченными отрицательными числами
 */
function displayArrayWithHighlight(array $array): string
{
    $result = '[';  // Начинаем формировать строку результата
    
    // Проходим по всем элементам массива
    foreach ($array as $index => $value) {
        // Добавляем запятую между элементами (кроме первого)
        if ($index > 0) {
            $result .= ', ';
        }
        
        // Если число отрицательное - оборачиваем в span с красным цветом
        if ($value < 0) {
            $result .= "<span style='color: red; font-weight: bold;'>$value</span>";
        } else {
            $result .= $value;  // Положительные числа выводим как есть
        }
    }
    
    $result .= ']';  // Завершаем строку результата
    return $result;
}