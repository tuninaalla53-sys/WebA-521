
<h2>Задание 9: Викторина (TypeScript)</h2>

<div class="task-content">
    <div id="quizQuestions"></div>
    <button onclick="submitQuizTask9()">Проверить ответы (TypeScript)</button>
    <div id="result9" class="result"></div>
</div>

<script>
// Показываем вопросы викторины
const quizHTML = `
    <div class="question">
        <p><strong>1. Столица Франции?</strong></p>
        <input type="radio" name="q1" value="0"> Лондон<br>
        <input type="radio" name="q1" value="1"> Берлин<br>
        <input type="radio" name="q1" value="2"> Париж
    </div>
    <div class="question">
        <p><strong>2. 2 + 2?</strong></p>
        <input type="radio" name="q2" value="0"> 3<br>
        <input type="radio" name="q2" value="1"> 4<br>
        <input type="radio" name="q2" value="2"> 5
    </div>
    <div class="question">
        <p><strong>3. Цвет неба?</strong></p>
        <input type="radio" name="q3" value="0"> Зеленый<br>
        <input type="radio" name="q3" value="1"> Синий<br>
        <input type="radio" name="q3" value="2"> Красный
    </div>
`;

document.getElementById('quizQuestions').innerHTML = quizHTML;

function submitQuizTask9() {
    const answers = [];
    
    // Собираем ответы
    for (let i = 1; i <= 3; i++) {
        const selected = document.querySelector('input[name="q' + i + '"]:checked');
        answers.push(selected ? parseInt(selected.value) : -1);
    }
    
    const result = document.getElementById('result9');
    
    // Проверяем, что на все вопросы ответили
    if (answers.includes(-1)) {
        result.innerHTML = '<span class="error">Пожалуйста, ответьте на все вопросы</span>';
        return;
    }
    
    try {
        const score = window.calculateScoreTS(answers);
        result.innerHTML = '<span class="success">Ваш результат: ' + score + ' баллов из 6</span>';
    } catch (error) {
        result.innerHTML = '<span class="error">Ошибка: ' + error + '</span>';
    }
}
</script>