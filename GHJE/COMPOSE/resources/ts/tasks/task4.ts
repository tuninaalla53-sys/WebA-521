
// Задание 4: Проверка високосного года
export function isLeapYear(year: number): boolean {
    return (year % 400 === 0) || (year % 4 === 0 && year % 100 !== 0);
}

declare global {
    interface Window { isLeapYearTS: (year: number) => boolean; }
}
window.isLeapYearTS = isLeapYear;