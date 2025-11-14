
<h2>Задание 1: Определение возрастной категории (TypeScript)</h2>

<div class="task-content">
    <label for="age">Введите ваш возраст:</label>
    <input type="number" id="age" min="0" max="150">
    <button onclick="checkAgeTask1()">Проверить (TypeScript)</button>
    <div id="result1" class="result"></div>
</div>

<script>
function checkAgeTask1() {
    const age = parseInt(document.getElementById('age').value);
    const result = document.getElementById('result1');
    
    if (isNaN(age)) {
        result.innerHTML = '<span class="error">Пожалуйста, введите число</span>';
        return;
    }
    
    try {
        const category = window.checkAgeTS(age);
        result.innerHTML = `<span class="success">TypeScript говорит: ${category}</span>`;
    } catch (error) {
        result.innerHTML = `<span class="error">Ошибка: ${error}</span>`;
    }
}
</script>