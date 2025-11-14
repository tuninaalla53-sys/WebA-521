
<h2>Задание 4: Проверка високосного года (TypeScript)</h2>

<div class="task-content">
    <label for="year">Введите год:</label>
    <input type="number" id="year" min="1" max="3000">
    <button onclick="checkLeapYearTask4()">Проверить (TypeScript)</button>
    <div id="result4" class="result"></div>
</div>

<script>
function checkLeapYearTask4() {
    const year = parseInt(document.getElementById('year').value);
    const result = document.getElementById('result4');
    
    if (isNaN(year) || year < 1) {
        result.innerHTML = '<span class="error">Пожалуйста, введите корректный год</span>';
        return;
    }
    
    try {
        const isLeap = window.isLeapYearTS(year);
        if (isLeap) {
            result.innerHTML = '<span class="success">' + year + ' год - високосный</span>';
        } else {
            result.innerHTML = '<span class="success">' + year + ' год - не високосный</span>';
        }
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>