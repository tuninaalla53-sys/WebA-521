
<h2>Задание 7: Расчет скидки (TypeScript)</h2>

<div class="task-content">
    <label for="amount7">Сумма покупки:</label>
    <input type="number" id="amount7" min="0" step="0.01">
    <button onclick="calculateDiscountTask7()">Рассчитать скидку (TypeScript)</button>
    <div id="result7" class="result"></div>
</div>

<script>
function calculateDiscountTask7() {
    const amount = parseFloat(document.getElementById('amount7').value);
    const result = document.getElementById('result7');
    
    if (isNaN(amount) || amount < 0) {
        result.innerHTML = '<span class="error">Пожалуйста, введите корректную сумму</span>';
        return;
    }
    
    try {
        const finalAmount = window.calculateDiscountTS(amount);
        const discount = amount - finalAmount;
        
        result.innerHTML = '<span class="success">' +
            'Итоговая сумма: ' + finalAmount.toFixed(2) + '<br>' +
            'Скидка: ' + discount.toFixed(2) +
            '</span>';
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>