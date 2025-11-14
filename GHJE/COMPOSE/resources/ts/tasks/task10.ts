
// Задание 10: Следующая дата
export function getNextDate(day: number, month: number, year: number): string {
    const date = new Date(year, month - 1, day);
    date.setDate(date.getDate() + 1);
    
    return date.toLocaleDateString('ru-RU');
}

declare global {
    interface Window { getNextDateTS: (day: number, month: number, year: number) => string; }
}
window.getNextDateTS = getNextDate;