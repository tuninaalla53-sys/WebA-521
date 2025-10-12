import React, { useState, useEffect } from 'react';
import styles from './Task.module.css';

const Task1 = () => {
  const [employees, setEmployees] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetch('http://localhost:8000/backend/api/task1.php')
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          setEmployees(data.data);
        } else {
          setError('Ошибка при загрузке данных');
        }
        setLoading(false);
      })
      .catch(err => {
        setError('Ошибка соединения с сервером');
        setLoading(false);
      });
  }, []);

  if (loading) return <div className={styles.loading}>Загрузка данных...</div>;
  if (error) return <div className={styles.error}>{error}</div>;

  return (
    <div>
      <h2 className={styles.taskTitle}>Задание 1: Список сотрудников</h2>
      <ul className={styles.employeeList}>
        {employees.map((employee, index) => (
          <li key={index} className={styles.employeeItem}>
            {employee}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default Task1;