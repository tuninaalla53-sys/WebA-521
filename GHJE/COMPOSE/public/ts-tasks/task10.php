
<h2>Задание 10: Следующая дата (TypeScript)</h2>

<div class="task-content">
    <label for="day">День:</label>
    <input type="number" id="day" min="1" max="31">
    
    <label for="month">Месяц:</label>
    <input type="number" id="month" min="1" max="12">
    
    <label for="year">Год:</label>
    <input type="number" id="year" min="1" max="3000">
    
    <button onclick="getNextDateTask10()">Получить следующую дату (TypeScript)</button>
    <div id="result10" class="result"></div>
</div>

<script>
function getNextDateTask10() {
    const day = parseInt(document.getElementById('day').value);
    const month = parseInt(document.getElementById('month').value);
    const year = parseInt(document.getElementById('year').value);
    const result = document.getElementById('result10');
    
    if (isNaN(day) || isNaN(month) || isNaN(year) || 
        day < 1 || day > 31 || month < 1 || month > 12 || year < 1) {
        result.innerHTML = '<span class="error">Пожалуйста, введите корректную дату</span>';
        return;
    }
    
    try {
        const nextDate = window.getNextDateTS(day, month, year);
        result.innerHTML = '<span class="success">Следующая дата: ' + nextDate + '</span>';
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>