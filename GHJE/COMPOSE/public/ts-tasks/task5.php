
<h2>Задание 5: Проверка палиндрома (TypeScript)</h2>

<div class="task-content">
    <label for="number5">Введите пятизначное число:</label>
    <input type="number" id="number5" min="10000" max="99999">
    <button onclick="checkPalindromeTask5()">Проверить (TypeScript)</button>
    <div id="result5" class="result"></div>
</div>

<script>
function checkPalindromeTask5() {
    const number = parseInt(document.getElementById('number5').value);
    const result = document.getElementById('result5');
    
    if (isNaN(number) || number < 10000 || number > 99999) {
        result.innerHTML = '<span class="error">Пожалуйста, введите пятизначное число</span>';
        return;
    }
    
    try {
        const isPal = window.isPalindromeTS(number);
        if (isPal) {
            result.innerHTML = '<span class="success">' + number + ' - палиндром</span>';
        } else {
            result.innerHTML = '<span class="success">' + number + ' - не палиндром</span>';
        }
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>