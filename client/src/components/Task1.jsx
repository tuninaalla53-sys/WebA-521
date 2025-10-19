import React from 'react'
import useQuery from '../hooks/useQuery'

export default function Task1() {
  const { data, error, loading } = useQuery('/api/task1.php', 'GET', [])

  if (loading) return <p>Грузим…</p>
  if (error) return <p>Ошибка: {String(error)}</p>
  if (!Array.isArray(data)) return <p>Пусто или странный ответ</p>

  return (
    <div>
      <h2>Задание 1 — массив</h2>
      <pre>{JSON.stringify(data, null, 2)}</pre>
      <h3>Форматированные строки:</h3>
      <ul>
        {data.map((row, i) => (
          <li key={i}>
            {typeof row === 'string'
              ? row
              : `"${row.name}" is working in "${row.company}" as: "${row.position}"`}
          </li>
        ))}
      </ul>
    </div>
  )
}
