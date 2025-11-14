
<h2>Задание 2: Спецсимволы клавиш (TypeScript)</h2>

<div class="task-content">
    <label for="number">Введите число от 0 до 9:</label>
    <input type="number" id="number" min="0" max="9">
    <button onclick="showSymbolTask2()">Показать символ (TypeScript)</button>
    <div id="result2" class="result"></div>
</div>

<script>
function showSymbolTask2() {
    const number = parseInt(document.getElementById('number').value);
    const result = document.getElementById('result2');
    
    if (isNaN(number) || number < 0 || number > 9) {
        result.innerHTML = '<span class="error">Пожалуйста, введите число от 0 до 9</span>';
        return;
    }
    
    try {
        const symbol = window.getSymbolTS(number);
        result.innerHTML = `<span class="success">Символ: ${symbol}</span>`;
    } catch (error) {
        result.innerHTML = `<span class="error">Ошибка: ${error}</span>`;
    }
}
</script>