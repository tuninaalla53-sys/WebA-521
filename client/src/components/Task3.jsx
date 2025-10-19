import React from 'react'
import useQuery from '../hooks/useQuery'

export default function Task3() {
  const { data, error, loading } = useQuery('/api/task3.php', 'GET', [])

  if (loading) return <p>Грузим…</p>
  if (error) return <p>Ошибка: {String(error)}</p>

  return (
    <div>
      <h2>Задание 3 — возрастающий массив</h2>
      <pre>{JSON.stringify(data, null, 2)}</pre>
    </div>
  )
}
