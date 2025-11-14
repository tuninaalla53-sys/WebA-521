
<h2>Задание 3: Проверка одинаковых цифр в числе (TypeScript)</h2>

<div class="task-content">
    <label for="number3">Введите трехзначное число:</label>
    <input type="number" id="number3" min="100" max="999">
    <button onclick="checkDigitsTask3()">Проверить (TypeScript)</button>
    <div id="result3" class="result"></div>
</div>

<script>
function checkDigitsTask3() {
    const number = parseInt(document.getElementById('number3').value);
    const result = document.getElementById('result3');
    
    if (isNaN(number) || number < 100 || number > 999) {
        result.innerHTML = '<span class="error">Пожалуйста, введите трехзначное число</span>';
        return;
    }
    
    try {
        const hasDuplicates = window.hasDuplicateDigitsTS(number);
        if (hasDuplicates) {
            result.innerHTML = '<span class="success">В числе есть одинаковые цифры</span>';
        } else {
            result.innerHTML = '<span class="success">Все цифры разные</span>';
        }
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>