<?php
$task = isset($_GET['task']) ? (int)$_GET['task'] : 0;

echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>TypeScript Tasks</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; background: #f4f4f4; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        header { background: #9b59b6; color: white; padding: 1rem; margin-bottom: 2rem; border-radius: 5px; }
        .task-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 2rem; }
        .task-button { display: block; padding: 1rem; background: #3498db; color: white; text-decoration: none; border-radius: 5px; text-align: center; }
        .task-button:hover { background: #2980b9; }
        .task-container { background: white; padding: 2rem; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: 1rem 0; }
        .back-button { display: inline-block; padding: 0.5rem 1rem; background: #95a5a6; color: white; text-decoration: none; border-radius: 3px; margin-top: 1rem; }
        .task-content { margin: 2rem 0; }
        .task-content label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        .task-content input, .task-content select, .task-content button { 
            padding: 0.5rem; margin: 0.5rem 0; border: 1px solid #ddd; border-radius: 3px; 
        }
        .task-content button { background: #27ae60; color: white; border: none; cursor: pointer; padding: 0.5rem 1rem; }
        .task-content button:hover { background: #219a52; }
        .result { margin-top: 1rem; padding: 1rem; border-radius: 3px; }
        .success { color: #27ae60; font-weight: bold; }
        .error { color: #e74c3c; font-weight: bold; }
    </style>
</head>
<body>
    <div class='container'>
        <header>
            <h1>TypeScript Tasks - Домашнее задание №2</h1>
            <nav>
                <a href='/' style='color: white;'>← Назад к JavaScript заданиям</a>
            </nav>
        </header>
        
        <main>";

if ($task === 0) {
    // Показываем меню
    echo "<div class='tasks-menu'>
            <h2>Выберите TypeScript задание:</h2>
            <div class='task-list'>";
    
    for ($i = 1; $i <= 10; $i++) {
        echo "<a href='ts-index.php?task=$i' class='task-button'>Задание $i</a>";
    }
    
    echo "</div></div>";
} else {
    // Показываем задание
    echo "<div class='task-container'>";
    echo "<a href='ts-index.php' class='back-button'>← Назад к списку заданий</a>";
    
    $taskFile = "ts-tasks/task$task.php";
    if (file_exists($taskFile)) {
        include $taskFile;
    } else {
        echo "<h2>Задание $task (TypeScript)</h2>";
        echo "<div class='task-content'>";
        echo "<p>Файл задания еще не создан</p>";
        echo "<p>Создайте файл: <code>ts-tasks/task$task.php</code></p>";
        echo "</div>";
    }
    
    echo "</div>";
}

echo "      </main>
    </div>
    <script src='js/app.js'></script>
</body>
</html>";
?>