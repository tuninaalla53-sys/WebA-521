import React, { useState } from 'react';
import Task1 from './components/Task1';
import Task2 from './components/Task2';
import Task3 from './components/Task3';
import Task4 from './components/Task4';
import Task5 from './components/Task5';
import styles from './App.module.css';

function App() {
  const [activeTask, setActiveTask] = useState(1);

  const tasks = [
    { id: 1, title: 'Задание 1: Список сотрудников' },
    { id: 2, title: 'Задание 2: Группировка сотрудников по компаниям' },
    { id: 3, title: 'Задание 3: Возрастающая последовательность чисел' },
    { id: 4, title: 'Задание 4: Округление чисел' },
    { id: 5, title: 'Задание 5: Матрица и минимальные значения' }
  ];

  return (
    <div className={styles.app}>
      <header className={styles.appHeader}>
        <h1>PHP Массивы - Часть 2</h1>
        <nav className={styles.taskNav}>
          {tasks.map(task => (
            <button
              key={task.id}
              className={`${styles.navButton} ${activeTask === task.id ? styles.active : ''}`}
              onClick={() => setActiveTask(task.id)}
            >
              {task.title}
            </button>
          ))}
        </nav>
      </header>

      <main className={styles.taskContainer}>
        {activeTask === 1 && <Task1 />}
        {activeTask === 2 && <Task2 />}
        {activeTask === 3 && <Task3 />}
        {activeTask === 4 && <Task4 />}
        {activeTask === 5 && <Task5 />}
      </main>
    </div>
  );
}

export default App;