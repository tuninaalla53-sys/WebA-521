
<h2>Задание 6: Конвертер валют (TypeScript)</h2>

<div class="task-content">
    <label for="amount">Сумма в USD:</label>
    <input type="number" id="amount" min="0" step="0.01">
    
    <label for="currency">Выберите валюту:</label>
    <select id="currency">
        <option value="EUR">EUR (Евро)</option>
        <option value="UAN">UAN (Гривна)</option>
        <option value="AZN">AZN (Азербайджанский манат)</option>
    </select>
    
    <button onclick="convertCurrencyTask6()">Конвертировать (TypeScript)</button>
    <div id="result6" class="result"></div>
</div>

<script>
function convertCurrencyTask6() {
    const amount = parseFloat(document.getElementById('amount').value);
    const currency = document.getElementById('currency').value;
    const result = document.getElementById('result6');
    
    if (isNaN(amount) || amount <= 0) {
        result.innerHTML = '<span class="error">Пожалуйста, введите корректную сумму</span>';
        return;
    }
    
    try {
        const converted = window.convertCurrencyTS(amount, currency);
        result.innerHTML = '<span class="success">' + amount + ' USD = ' + converted.toFixed(2) + ' ' + currency + '</span>';
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>