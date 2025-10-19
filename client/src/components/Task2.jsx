import React from 'react'
import useQuery from '../hooks/useQuery'

export default function Task2() {
  const { data, error, loading } = useQuery('/api/task2.php', 'GET', [])

  if (loading) return <p>Грузим…</p>
  if (error) return <p>Ошибка: {String(error)}</p>
  if (!data || typeof data !== 'object') return <p>Нет данных</p>

  const companies = Object.keys(data)
  const top3 = companies.slice(0, 3)

  return (
    <div>
      <h2>Задание 2 — список компаний (три позиции)</h2>
      <ol>
        {top3.map((company) => (
          <li key={company}>
            <strong>{company}</strong>
            <ul>
              {data[company].map((emp, i) => (
                <li key={i}>
                  {emp.name} — {emp.position}
                </li>
              ))}
            </ul>
          </li>
        ))}
      </ol>
    </div>
  )
}
