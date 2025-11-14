
<h2>Задание 8: Окружность в квадрате (TypeScript)</h2>

<div class="task-content">
    <label for="circumference">Длина окружности:</label>
    <input type="number" id="circumference" min="0" step="0.01">
    
    <label for="perimeter">Периметр квадрата:</label>
    <input type="number" id="perimeter" min="0" step="0.01">
    
    <button onclick="checkFitTask8()">Проверить (TypeScript)</button>
    <div id="result8" class="result"></div>
</div>

<script>
function checkFitTask8() {
    const circumference = parseFloat(document.getElementById('circumference').value);
    const perimeter = parseFloat(document.getElementById('perimeter').value);
    const result = document.getElementById('result8');
    
    if (isNaN(circumference) || isNaN(perimeter) || circumference <= 0 || perimeter <= 0) {
        result.innerHTML = '<span class="error">Пожалуйста, введите корректные значения</span>';
        return;
    }
    
    try {
        const canFit = window.canCircleFitInSquareTS(circumference, perimeter);
        if (canFit) {
            result.innerHTML = '<span class="success">Окружность помещается в квадрат</span>';
        } else {
            result.innerHTML = '<span class="success">Окружность НЕ помещается в квадрат</span>';
        }
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>