import React from 'react'
import useQuery from '../hooks/useQuery'

export default function Task5() {
  const { data, error, loading } = useQuery('/api/task5.php', 'GET', [])

  if (loading) return <p>Грузим…</p>
  if (error) return <p>Ошибка: {String(error)}</p>
  if (!data || !Array.isArray(data.matrix)) return <p>Нет матрицы</p>

  const { matrix, columnMins, sumMins, avgMins } = data

  return (
    <div>
      <h2>Задание 5 — матрица 5x5</h2>
      <table border="1" cellPadding="6">
        <tbody>
          {matrix.map((row, r) => (
            <tr key={r}>
              {row.map((val, c) => {
                const isMin = val === columnMins[c]
                return (
                  <td key={c} style={{ color: isMin ? 'red' : 'inherit' }}>
                    {val}
                  </td>
                )
              })}
            </tr>
          ))}
        </tbody>
      </table>

      <p>Минимумы по столбцам: {JSON.stringify(columnMins)}</p>
      <p>Сумма минимумов: {sumMins}</p>
      <p>Среднее минимумов: {avgMins}</p>
    </div>
  )
}
