import React from 'react'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom'
import App from '../App.jsx'
import Main from '../pages/Main.tsx'
import Task1 from '../components/Task1.jsx'
import Task2 from '../components/Task2.jsx'
import Task3 from '../components/Task3.jsx'
import Task4 from '../components/Task4.jsx'
import Task5 from '../components/Task5.jsx'

export default function Routing() {
  return (
    <BrowserRouter>
      <App>
        <nav style={{ display: 'flex', gap: 12, marginBottom: 12 }}>
          <Link to="/">Главная</Link>
          <Link to="/task1">Задание 1</Link>
          <Link to="/task2">Задание 2</Link>
          <Link to="/task3">Задание 3</Link>
          <Link to="/task4">Задание 4</Link>
          <Link to="/task5">Задание 5</Link>
        </nav>
        <Routes>
          <Route path="/" element={<Main />} />
          <Route path="/task1" element={<Task1 />} />
          <Route path="/task2" element={<Task2 />} />
          <Route path="/task3" element={<Task3 />} />
          <Route path="/task4" element={<Task4 />} />
          <Route path="/task5" element={<Task5 />} />
        </Routes>
      </App>
    </BrowserRouter>
  )
}
